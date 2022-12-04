<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Notifications\SMSVerification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword;
use Crypt;
use Hash;
use Auth;
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function cart()
    {
        return $this->hasOne('App\Model\Cart');
    }
    public function review()
    {
        return $this->hasOne('App\Model\Product_Review');
    }
    public function orders()
    {
        return $this->hasMany('App\Model\Order')->orderBy('id', 'DESC');
    }
    public function addresses()
    {
        return $this->hasMany('App\Model\User_Address');
    }
    public function logtrails()
    {
        return $this->hasMany('App\Model\LogTrail');
    }
    public function audittrails()
    {
        return $this->hasMany('App\Model\AuditTrail');
    }
    public function galleries()
    {
        return $this->hasMany('App\Model\Gallery');
    }
    public static function validate_employee()
    {
        return [
            'first_name'        => 'required|string|max:191',
            'last_name'         => 'required|string|max:191',
            'middle_name'       => 'max:191',
            'username'          => 'required|unique:users|max:50',
            'email'             => 'required|unique:users|email|max:191',
            'password'          => 'required|max:191',
            'confirm_password'  => 'required|max:191|same:password'
        ];
    }
    public static function validate_code()
    {
        return [
            'username'          => 'required|unique:users|max:50',
            'email'             => 'required|unique:users|email|max:191',
            'password'          => 'required|max:191',
            'confirm_password'  => 'required|max:191|same:password'
        ];
    }
    public static function validate() 
    {
        return [
            'first_name'        => 'required|string|max:191',
            'last_name'         => 'required|string|max:191',
            'username'          => 'required|unique:users|max:50',
            'phone_number'      => 'max:12',
            'email'             => 'required|unique:users,email|email|max:191',
            'password'          => 'required|max:191',
            'retype_password'   => 'required|max:191|same:password'
        ];
    }
    public static function validate_update()
    { 
        return [
            'first_name'        => 'required|string|max:191',
            'last_name'         => 'required|string|max:191',
            'middle_name'       => 'max:191',
            'username'          => 'required|max:50',
            'phone_number'      => 'max:12',
            'address'           => 'required',
            'email'             => 'required|email|max:191',
            'current_password'  => 'max:191',
            'password'      => 'max:191',
            'confirm_password'  => 'max:191|same:password'
        ];
    }
    public static function reset_password_rule()
    {
        return [
            'password'          => 'required|max:191',
            'confirm_password'   => 'required|max:191|same:password'
        ];
    }
    public function full_name()
    {
        return $this->first_name . ' ' . $this->last_name; 
    }
    public static function manageData($request,$id = 0)
    {

        $data = self::findOrNew($id);
        if ( $id !== 0 ) {
            $data->middle_name = $request->middle_name;
            if ( $request->address !== null) {
                $data->address = $request->address;
            }
        } 
        $data->phone_number = $request->phone_number;
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->username = $request->username;
        $data->email = $request->email;
        
        
        if ( $request->password !== null ) 
            $data->password = Hash::make($request->password);
        $data->type = 'user';

        /*
            send verification if new user
        */
        if ($id == 0) {
            $length = 6;
            $key = '';
            $keys = array_merge(range(0, 9), range('A', 'Z'));
        
            for ($i = 0; $i < $length; $i++) {
                $key .= $keys[array_rand($keys)];
            }

            $data->notify(new SMSVerification($key));
            $data->random_code = $key;
        }

        $data->save();
        return $data;

    }
    public static function addAddress($request,$id)
    {
        $data = self::find($id);
        $data->address = $request->address;
        $data->save();
    }
    public static function verify($request, $user_id)
    {
        $data = self::find($user_id);
        if ($data->random_code === $request->code) {
            $data->status = 1;
            $data->save();
        }
            
        return $data;
    }

    public static function sendVerificationCode($id)
    {
        $data = self::find($id);
        $length = 6;
        $key = '';
        $keys = array_merge(range(0, 9), range('A', 'Z'));
    
        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        $data->notify(new SMSVerification($key));
        $data->random_code = $key;
        $data->save();
    }

    public static function sendResetPasswordLink($email)
    {
        $data = self::where('email', $email)->first();

        if ($data !== null) {
            //send to email
            $data->notify(new ResetPassword($data));
        }

        return $data;
    }

    public static function resetPassword($request)
    {
        $id = Crypt::decrypt($request->id);
        $data = self::find($id);
        $data->password = Hash::make($request->password);
        $data->save();

        return $data;
    }
    public static function manageEmployee($request, $id = 0)
    {
        $data = self::findOrNew($id);
        $data->first_name = $request->first_name;
        $data->middle_name = $request->middle_name;
        $data->last_name = $request->last_name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->status = '1';
        $data->type = 'cashier';
        $data->save();
    }
    public static function changePassword($request, $user_id)
    {
        $data = self::find($user_id);
        $data->password = Hash::make($request->new_password);
        $data->save();
        return $data;
    }
    public static function updateAccount($request)
    {
        $data = self::find(Auth::user()->id);
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->save();
    }
}
