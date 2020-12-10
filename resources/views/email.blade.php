<h1> hello {{$user->nama_lengkap}}</h1>

<p>
	please clik password reset
	<a href="{{url('reset_password/'.$user->email.'/'.$code)}}">Reset Password</a>
</p>