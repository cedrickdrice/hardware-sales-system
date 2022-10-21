
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

<form action="{{ URL('/forgot-password') }}" method="POST">
    {{ csrf_field() }}
    <input type="email" name="email" placeholder="Email">
    <input type="submit" name="submit" value="Submit">
</form>