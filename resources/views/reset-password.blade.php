<!DOCTYPE html>
<html>
<head>
  <title>Forgot Password</title>

 <link rel="apple-touch-icon" href="{{ URL::asset('public/user/img/bem-logo.png')}}">
  <link rel="shortcut icon" href="{{ URL::asset('public/user/img/bem-logo.png')}}">

  <link href="{{URL::asset('public/css/reset.min.css')}}" rel="stylesheet" id="bootstrap-css">

</head>

<style type="text/css">
  .form-gap {
    padding-top: 60px;
}
</style>

<body>
  <!------ Include the above in your HEAD tag ---------->

  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> -->
  <div class="form-gap"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="text-center">
              <h3><img src="{{ URL::asset('public/user/img/bem-logo.png')}}" alt="bem-logo" width="120"></h3>
              <h2 class="text-center"></h2>
              <p>Anda dapat mengatur ulang kata sandi disini.</p>
              <div class="panel-body">

                <form id="register-form" role="form" autocomplete="off" class="form" method="post" action="">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                      <input id="email" name="email" placeholder="email address" class="form-control"  type="email" disabled="">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-log-in color-blue"></i></span>
                      <input id="password" name="password" placeholder="New Password" class="form-control"  type="password">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-ok-sign color-blue"></i></span>
                      <input id="confirm" name="confirm" placeholder="Password Confirmation" class="form-control"  type="password">
                    </div>
                  </div>
                  <div class="form-group">
                    <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                  </div>

                  <input type="hidden" class="hide" name="token" id="token" value=""> 
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{URL::asset('public/js/reset.min.js')}}"></script>
  <script src="{{URL::asset('public/js/resetPass.min.js')}}"></script>

</body>
</html>