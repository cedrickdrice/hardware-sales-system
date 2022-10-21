
<h1>You need to verify your account.</h1>

@if(Session::has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if(Session::has('failed'))
    <div class="alert alert-danger">
        {{ session('failed') }}
    </div>
@endif

<form action="{{ URL('/verify') }}" method="POST">
    {{ csrf_field() }}
    <input type="text" name="code" placeholder="Verification Code" />
    <input type="submit" name="submit" value="Verify">
    <a href="{{ URL('/verify/send-code') }}">Resend Code</a>
</form>