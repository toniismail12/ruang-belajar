<!doctype html>
<html lang="en">

<head>
<title>Login</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="assets/logincss/main.css">
<link rel="stylesheet" href="assets/css/color_skins.css">
</head>

<body class="theme-cyan">
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle auth-main">
				
                <div class="auth-box">
                    <div class="top">
                        <!-- <img src=".." alt="..."> -->
                    </div>
					<div class="card">
                        <div class="header">
                             <h1>Lentera</h1>
                            <p class="lead">Login to your account</p>

                        </div>
                        <div class="body">

                            @if (session()->has('login_error'))
                            <div class="alert alert-danger alert-dismissible col-lg-12" role="alert">
                                {{ session('login_error') }}
                               <!--  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 -->
                            </div>
                            @endif

                            <form class="form-auth-small" action="/login-proses" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Email</label>
                                    <input type="email" name="email" class="form-control" id="email"  placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input type="password" name="password" class="form-control" id="signin-password"  placeholder="Password" required>
                                </div>
                               
                                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                                <div class="bottom">
                                    <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
                                    <span>Don't have an account? <a href="/register">Register</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
				</div>

			</div>

		</div>

	</div>
	<!-- END WRAPPER -->
</body>
</html>
