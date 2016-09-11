<?php
/**
 * Template Name: login_template
 */

if (is_user_logged_in())
{
    wp_redirect( $luxtour_redirect_url);
    exit();
}

get_header();


?>




<div class="container">

<form name="loginform" id="loginform" method="POST" action="http://wp-test.in/wp-login.php" >
<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <p>Login</p>
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
        <input type="text" name="log" />
    </div>
</div>

<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <p>Password</p>
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
        <input type="password" name="pwd" />
    </div>
</div>
<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <p>Remember me</p>
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
        <input name="rememberme" type="checkbox" id="rememberme" value="forever">
    </div>
</div>
<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

    </div>
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
        <input type="submit" name="wp-submit" />
    </div>
</div>
<input type="hidden" value="http://wp-test.in/" name="redirect_to" />
</form>

</div> <!-- end of container -->





<? get_footer(); ?>
