<?

/*
    Init vars
*/

//$l->set_page("header");

$navbar_args = array();

$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);

$current_uri = 'http://' . $_SERVER['HTTP_HOST'] . $uri_parts[0];


if (is_user_logged_in())
{
    $navbar_args = array
    (
        'theme_location' => 'top_basic', // menu slug from step 1
        'container' => false, // 'div' container will not be added
        'menu_class' => 'nav navbar-nav navbar-right', // <ul class="nav">
        'echo' => false,
    );
}
else
{
    $navbar_args = array
    (
        'theme_location' => 'top_anonymus', // menu slug from step 1
        'container' => false, // 'div' container will not be added
        'menu_class' => 'nav navbar-nav navbar-right', // <ul class="nav">
        'echo' => false,
    );
}


$top_menu = wp_nav_menu( $navbar_args );


?>


<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html>
<!--<![endif]-->
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<link rel='stylesheet' id='main-style'  href='<?php echo get_stylesheet_uri(); ?>' type='text/css' media='all' />

<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js"></script>



<!--

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

<link rel="stylesheet" href="<? print(get_template_directory_uri() . '/style/bootstrap.css'); ?>">
<link rel="stylesheet" href="<? print(get_template_directory_uri() . '/style/mdb.css'); ?>">

-->

<!-- Material Design fonts -->
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/icon?family=Material+Icons">

<!-- Bootstrap -->


<!-- Latest compiled and minified CSS & JS -->
<link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<script src="//code.jquery.com/jquery.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">

<!-- Bootstrap Material Design -->
<link rel="stylesheet" type="text/css" href="<? print(get_template_directory_uri() . '/style/bootstrap-material-design.css'); ?>">
<link rel="stylesheet" type="text/css" href="<? print(get_template_directory_uri() . '/style/ripples.min.css');?>">


<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.js"> </script>
<script src="https://code.angularjs.org/1.5.8/angular-resource.js"></script>
<script src="https://code.angularjs.org/1.5.8/angular-animate.js"></script>
<script src="https://code.angularjs.org/1.5.8/angular-cookies.min.js"></script>

<!--
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

-->

<!-- Charts and more -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.js"></script>
<script src="http://cdn.jsdelivr.net/angular.chartjs/latest/angular-chart.min.js"> </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-strap/2.3.9/angular-strap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-strap/2.3.9/angular-strap.tpl.js"></script>

<!-- scroll one page -->

<link rel="stylesheet" type="text/css" href="<? print(get_template_directory_uri() . '/style/jquery.fullPage.min.css'); ?>" />
<script type="text/javascript" src="<? print(get_template_directory_uri() .'/js/jquery.fullPage.min.js');?>" ></script>

<!-- custom css -->

<link rel='stylesheet' href="<? print(get_template_directory_uri() . '/style/main.css'); ?>" type="text/css" />

<? wp_head(); ?>




</head>
<body <? get_body_class(); ?>>

<?
if (!isset($luw))
{
	$luw = new luxtour_user_worker();
}
?>

<input type="hidden" id="api_key" value="<? print($luw->get_key()); ?>" />




<nav id="main-nav" class="navbar navbar-default navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
		<a class="navbar-brand" rel="home" href="#" title="Buy Sell Rent Everyting">
			<img style="max-height:64px; margin-top: -15px; margin-left: -15px;" src="<? print(get_template_directory_uri()); ?>/img/logo.png">
		</a>
        <!-- <a class="navbar-brand" href="/"><? #bloginfo( 'name' ); ?></a> -->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">


        <!-- I do not need form just right now

        <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
        -->

		<div class="nav navbar-nav navbar-right" >
			<li style="padding-right: 60px;">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">LOCALE</a>
				<ul id="langs-dropdown" class="dropdown-menu nav navbar-nav navbar-right">
					<div class="" style="width:100%; height: 24px; background-color: #009688; margin-top: -5px;"></div>
					<li><a href="<? print($current_uri); ?>?lang=en" style="font-size: 20px; width: 160px; color: rgba(0,0,0,0.87) !important;">English</a></li>
					<li><a href="<? print($current_uri); ?>?lang=uk" style="font-size: 20px; width: 160px; color: rgba(0,0,0,0.87) !important;">Ukranian</a></li>
					<li><a href="<? print($current_uri); ?>?lang=ru" style="font-size: 20px; width: 160px; color: rgba(0,0,0,0.87) !important;">Russian</a></li>
				</ul>
			</li>
		</div>

        <? if (!is_user_logged_in()): ?>

		<ul class="nav navbar-nav navbar-right">
          <li class="dropdown white-text" id="menuLogin">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">LOGIN</a>
            <div id="login-dropdown" class="dropdown-menu first-form">
				<div class="header" >
					<span>   </span>
					<img src="http://wp-test.in/wp-content/themes/luxtour-agents/img/login-ico.png" class="img-responsive center-block"  style=" position:relative; bottom: -10px;"/>
					<div class="white-text" style="font-weight: 500; text-align: center; position:relative; bottom: -10px;">ВХІД</div>
				</div>

				<div class="pisdushka"></div>
              <form name="loginform" class="form" role="form" method="post" action="http://wp-test.in/wp-login.php" accept-charset="UTF-8"   id="formLogin">
				  <div class="input-group">
				  	<span class="input-group-addon glyphicon glyphicon-envelope"></span>
				  	<input class="form-control" type="email" name="log" id="login-email" required>
				  </div>
				  <div class="input-group">
				  	<span class="input-group-addon glyphicon glyphicon-lock"></span>
				  	<input class="form-control" type="password" name="pwd" id="login-email" required>
				  </div>
				<div class="checkbox clear">
					<label class="main-text">
					<input name="rememberme" type="checkbox"> keep me logged-in
					</label>
				</div>
				<div class="form-group clear">
					<button type="submit" class="btn btn-default" style="color: #FFF !important;">Увійти</button>
				</div>
              </form>
				<div style="margin-top: 15px; text-align: center;">
					<a href="/wp-login.php?action=lostpassword">Забули пароль?</a>
				</div>
            </div>
          </li>
        </ul>

		<!-- User registration form -->
		<ul class="nav navbar-nav navbar-right">
          <li class="dropdown white-text" id="menuLogin">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">REGISTRATION</a>
            <div id="register-dropdown" class="dropdown-menu first-form">
				<div class="header" >
					<span>   </span>
					<img src="http://wp-test.in/wp-content/themes/luxtour-agents/img/land-form-header.png" class="img-responsive center-block"  style=" position:relative; bottom: -10px;"/>
					<div class="white-text" style="font-weight: 500; text-align: center; position:relative; bottom: -10px;">Регістрація</div>
				</div>

				<div class="pisdushka"></div>
              <form  method="post" action="<?print($self_url);?>" role="form">
				  <div class="input-group">
						<span class="input-group-addon glyphicon glyphicon-user"></span>
						<input type="text" name="fullname" class="form-control" id="back-fullname" placeholder="Oleg Timofeev" required />
					</div>
					<div class="input-group">
						<span class="input-group-addon glyphicon glyphicon-lock"></span>
						<input type="password" name="password" class="form-control" id="form1-pass" required />
					</div>
					<div class="input-group">
						<span class="input-group-addon glyphicon glyphicon-lock"></span>
						<input type="password" name="password_confirm" class="form-control" id="form1-pass" required />
					</div>
					<div class="input-group">
						<span class="input-group-addon glyphicon glyphicon-envelope"></span>
						<input type="email" name="email" class="form-control" id="back-email" placeholder="info@luxtour.online" required>
					</div>
				  <div class="checkbox clear">
					  <label style="color: rgba(0,0,0,0.87) !important;">
							<input type="checkbox" required> Agree with tems
						</label>
				  </div>

					<button type="submit" name="submit" value="submit" class="btn btn-default" style="color: #FFF !important;">Приєднатися </button>

				</form>
			</div>
			</li>
		</ul>

		<!--
        <ul class="nav navbar-nav navbar-right">

            <li >
                <a href="#" class="dropdown-toggle" data-toggle=""><b>Login</b> <span class="caret"></span></a>
                <ul id="login-dp" class="nav navbar-nav navbar-right" ng-show="down">
                    <li>
                        <div class="row">
                                <div class="col-md-12">
                                    <form name="loginform" class="form" role="form" method="post" action="http://wp-test.in/wp-login.php" accept-charset="UTF-8" id="login-nav">
                                            <div class="form-group">
                                                <label class="sr-only" for="email">Email address</label>
                                                <input name="log" type="email" class="form-control" id="email" placeholder="Email address" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="password">Password</label>
                                                <input name="pwd" type="password" class="form-control" id="password" placeholder="Password" required>
                                                <div class="help-block text-right"><a href="">Forget the password ?</a></div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                <input name="rememberme" type="checkbox"> keep me logged-in
                                                </label>
                                            </div>
                                    </form>
                                </div>
                                <div class="bottom text-center">
                                    New here ? <a href="http://wp-test.in/registration"><b>Join Us</b></a>
                                </div>
                        </div>
                    </li>

		    	</ul>
            </li>

        </ul>

		-->
        <? endif; ?>


        <? print($top_menu); ?>


    </div><!-- /.navbar-collapse -->
</nav> <!-- End navbar -->

<script>



</script>









