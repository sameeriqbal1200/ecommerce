<?php
include('../db_connection/connection.php');

session_start();
if(isset($_SESSION['username'])){
	// header('location:home.php');
	header('location: index.php');
}

if (isset($_POST['login'])) {
	$email_username = $_POST['email_username'];
	// $username = $_POST['email_username'];
	$password = $_POST['password'];

	$password = md5($password);
	$sql = "SELECT * FROM users WHERE (email='$email_username' OR username='$email_username') AND password='$password'";
	$result = mysqli_query($database, $sql);
// print_r($query);die;
	if (mysqli_num_rows($result) == 1) {
		$_SESSION['message'] = 'You are now logged in';
		$_SESSION['email_username'] = $email_username;


		if ( $count == 1 ) {
    $_SESSION['login_id'] = $row['id']; // i prefer to name it login_id, you can use $row['id'] or $row[0]. but i prefer to write with the column name

    if ( $_SESSION['login_id'] == 1 ) { // it means if login id = 1 then go to index.php
        header("location: ../index.php");  
    } else { 
        header("location: login.php");  
    }
}
		header('location: ../index.php');
	}	else {
		$_SESSION['message'] = 'email/password Combination Incorrect';

	}
}



?>
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 7
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" >
    <!-- begin::Head -->
    
<!-- Mirrored from keenthemes.com/metronic/preview/demo1/custom/pages/user/login-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 May 2019 07:19:25 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
        <meta charset="utf-8"/>
        
        <title>Metronic | Login Page 4</title>
        <meta name="description" content="Login page example"> 
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--begin::Fonts -->
        <script src="../../../../../../../ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
            WebFont.load({
                google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>
        <!--end::Fonts -->

        
                    
            <!--begin::Page Custom Styles(used by this page) --> 
                             <link href="assets/css/demo1/pages/general/login/login-4.css" rel="stylesheet" type="text/css" />
                        <!--end::Page Custom Styles -->
        
        <!--begin::Global Theme Styles(used by all pages) -->
                    <link href="assets/vendors/global/vendors.bundle.css" rel="stylesheet" type="text/css" />
                    <link href="assets/css/demo1/style.bundle.css" rel="stylesheet" type="text/css" />
                <!--end::Global Theme Styles -->

        <!--begin::Layout Skins(used by all pages) -->
        
<link href="assets/css/demo1/skins/header/base/light.css" rel="stylesheet" type="text/css" />
<link href="assets/css/demo1/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
<link href="assets/css/demo1/skins/brand/dark.css" rel="stylesheet" type="text/css" />
<link href="assets/css/demo1/skins/aside/dark.css" rel="stylesheet" type="text/css" />        <!--end::Layout Skins -->

        <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    </head>
    <!-- end::Head -->

    <!-- begin::Body -->
    <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading"  >

       
    	<!-- begin:: Page -->
	<div class="kt-grid kt-grid--ver kt-grid--root">
		<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v4 kt-login--signin" id="kt_login">
	<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(assets/media/bg/bg-2.jpg);">
		<div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
			<div class="kt-login__container">
				<div class="kt-login__logo">
					<a href="#">
						<img src="assets/media/logos/logo-5.png">  	
					</a>
				</div>
				<div class="kt-login__signin">
					<div class="kt-login__head">
						<h3 class="kt-login__title">Sign In To Admin</h3>
					</div>
					<form class="kt-form" action="" method="POST">
						<div class="input-group">
							<input class="form-control" type="text" placeholder="Email / Username" name="email_username" autocomplete="off">
						</div>
						<div class="input-group">
							<input class="form-control" type="password" placeholder="Password" name="password">
						</div>
						<div class="row kt-login__extra">
							<div class="col">
								<label class="kt-checkbox">
									<input type="checkbox" name="remember"> Remember me
									<span></span>
								</label>
							</div>
							<div class="col kt-align-right">
								<a href="javascript:;" id="kt_login_forgot" class="kt-login__link">Forget Password ?</a>
							</div>
						</div>
						<div class="kt-login__actions">
							<input id="" class="btn btn-brand btn-pill kt-login__btn-primary" type="submit" name="login" value="Login">
							<!-- <button >Sign In</button> -->
						</div>
					</form>
				</div>
				<div class="kt-login__signup">
					<div class="kt-login__head">
						<h3 class="kt-login__title">Sign Up</h3>
						<div class="kt-login__desc">Enter your details to create your account:</div>
					</div>
					<form class="kt-form" action="" method="POST">
						<div class="input-group">
							<input class="form-control" type="text" placeholder="Fullname" name="fullname">
						</div>
						<div class="input-group">
							<input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off">
						</div>
						<div class="input-group">
							<input class="form-control" type="password" placeholder="Password" name="password">
						</div>
						<div class="input-group">
							<input class="form-control" type="password" placeholder="Confirm Password" name="rpassword">
						</div>
						<div class="row kt-login__extra">
							<div class="col kt-align-left">
								<label class="kt-checkbox">
									<input type="checkbox" name="agree">I Agree the <a href="#" class="kt-link kt-login__link kt-font-bold">terms and conditions</a>.
									<span></span>
								</label>
								<span class="form-text text-muted"></span>
							</div>
						</div>
						<div class="kt-login__actions">

							<button id="kt_login_signup_submit" class="btn btn-brand btn-pill kt-login__btn-primary">Sign Up</button>&nbsp;&nbsp;
							<button id="kt_login_signup_cancel" class="btn btn-secondary btn-pill kt-login__btn-secondary">Cancel</button>
						</div>
					</form>
				</div>
				<div class="kt-login__forgot">
					<div class="kt-login__head">
						<h3 class="kt-login__title">Forgotten Password ?</h3>
						<div class="kt-login__desc">Enter your email to reset your password:</div>
					</div>
					<form class="kt-form" action="#">
						<div class="input-group">
							<input class="form-control" type="text" placeholder="Email" name="email" id="kt_email" autocomplete="off">
						</div>
						<div class="kt-login__actions">
							<button id="kt_login_forgot_submit" class="btn btn-brand btn-pill kt-login__btn-primary">Request</button>&nbsp;&nbsp;
							<button id="kt_login_forgot_cancel" class="btn btn-secondary btn-pill kt-login__btn-secondary">Cancel</button>
						</div>
					</form>
				</div>
			</div>	
		</div>
	</div>
</div>	
	</div>
	
<!-- end:: Page -->


        <!-- begin::Global Config(global config for global JS sciprts) -->
        <script>
            var KTAppOptions = {"colors":{"state":{"brand":"#5d78ff","dark":"#282a3c","light":"#ffffff","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
        </script>
        <!-- end::Global Config -->

    	<!--begin::Global Theme Bundle(used by all pages) -->
    	    	   <script src="assets/vendors/global/vendors.bundle.js" type="text/javascript"></script>
		    	   <script src="assets/js/demo1/scripts.bundle.js" type="text/javascript"></script>
				<!--end::Global Theme Bundle -->

         

                    
            <!--begin::Page Scripts(used by this page) -->
                            <script src="assets/js/demo1/pages/login/login-general.js" type="text/javascript"></script>
                        <!--end::Page Scripts -->
            </body>
    <!-- end::Body -->

<!-- Mirrored from keenthemes.com/metronic/preview/demo1/custom/pages/user/login-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 May 2019 07:19:26 GMT -->
</html>