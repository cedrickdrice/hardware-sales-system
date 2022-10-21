<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="first_name" class="radius5 py-3 px-4 w-100 login_field mb-4" autocomplete="off" placeholder="FIRST NAME" value="{{$account->first_name}}">
                    <div class="text-danger mb-1" id="first_name_error">{{ $errors->first('first_name') }}</div>
                </div>
                <div class="col-md-6">
                    <input type="text" name="middle_name" class="radius5 py-3 px-4 w-100 login_field mb-4" autocomplete="off" placeholder="MIDDLE NAME" value="{{$account->middle_name}}" >
                    <div class="text-danger mb-1" id="middle_name_error">{{ $errors->first('middle_name') }}</div>
                </div>
                <div class="col-md-6">
                    <input type="text" name="last_name" class="radius5 py-3 px-4 w-100 login_field mb-4" autocomplete="off" placeholder="LAST NAME" value="{{$account->last_name}}">
                    <div class="text-danger mb-1" id="last_name_error">{{ $errors->first('last_name') }}</div>
                </div>
                <div class="col-md-6">
                    <input type="text" name="username" class="radius5 py-3 px-4 w-100 login_field mb-4" autocomplete="off" placeholder="USERNAME" value="{{$account->username}}">
                    <div class="text-danger mb-1" id="username_error">{{ $errors->first('username') }}</div>
                </div>
                <div class="col-md-6">
                    <input type="text" name="email" class="radius5 py-3 px-4 w-100 login_field mb-4" autocomplete="off" placeholder="E-MAIL" value="{{$account->email}}">
                    <div class="text-danger mb-1" id="email_error">{{ $errors->first('email') }}</div>
                </div>
                <div class="col-md-6">
                    <input type="number" name="phone_number" class="radius5 py-3 px-4 w-100 login_field mb-4" autocomplete="off" placeholder="PHONE NUMBER" value="{{$account->phone_number}}" >
                    <div class="text-danger mb-1" id="phone_number_error">{{ $errors->first('phone_number') }}</div>
                </div>
                <div class="col-md-12">
                    <input type="text" name="address" class="radius5 py-3 px-4 w-100 login_field mb-4 text-capitalize" autocomplete="off" placeholder="address" value="{{$account->address}}" >
                    <div class="text-danger mb-1" id="address_error">{{ $errors->first('address') }}</div>
                </div>
            </div>

        </div>
        <div class="col-md-6">

            <p class="passwordChange py-4"><b>PASSWORD CHANGE</b></p>

            <input type="password" name="current_password" class="radius5 py-3 px-4 w-100 login_field mb-4" autocomplete="off" placeholder="CURRENT PASSWORD">
            <div class="text-danger mb-1" id="current_password_error">{{ $errors->first('current_password') }}</div>
            <input type="password" name="password" class="radius5 py-3 px-4 w-100 login_field mb-4" autocomplete="off" placeholder="NEW PASSWORD">
            <div class="text-danger mb-1" id="password_error">{{ $errors->first('new_password') }}</div>
            <input type="password" name="confirm_password" class="radius5 py-3 px-4 w-100 login_field mb-4" autocomplete="off" placeholder="CONFIRM PASSWORD">
            <div class="text-danger mb-1" id="confirm_password_error">{{ $errors->first('confirm_password') }}</div>
        </div>
    </div>
</div>