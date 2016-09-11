<?php
/**
 * Template Name: Registration template
 */

if(!session_id()) {
    session_start();
}

$login = "";
$name = "";
$second_name = "";

if (isset($_SESSION["name"]))
    $name = $_SESSION["name"];

if (isset($_SESSION["second_name"]))
    $second_name = $_SESSION["second_name"];

if (isset($_SESSION["login"]))
    $login = $_SESSION["login"];



if (is_user_logged_in())
{
    wp_redirect( $luxtour_redirect_url);
    exit();
}



get_header();


?>


<div class="jumbotron">
    <div class="container">
        <h1>This is jumbotron</h1>
        <p>And some content</p>
        <p>
            <a class="btn btn-primary btn-lg" href="http://wp-test.in/">button to blog</a>
        </p>
    </div>
</div> <!-- End of jumbotron -->


<? if (isset($_SESSION["reg_error"])): ?>
<div  class="container">

    <div class="panel panel-danger">
          <div class="panel-heading">
                <h3 class="panel-title">Some errors</h3>
          </div>
          <div class="panel-body">
            <?
                $error = $_SESSION["reg_error"];
                unset($_SESSION["reg_error"]);
                print($error);
            ?>
          </div>
    </div>

</div>
<? unset($_SESSION["reg_error"]); ?>
<? endif; ?>

<? if (isset($_SESSION["reg_error"])): ?>
<div  class="container">

    <div class="panel panel-success">
          <div class="panel-heading">
                <h3 class="panel-title">Registration success</h3>
          </div>
          <div class="panel-body">
                <? print($_SESSION["reg_success"]); ?>
          </div>
    </div>

</div>
<? unset($_SESSION["reg_success"]); ?>
<? endif; ?>


<div class="container"> <!-- Container -->

<?  ?>

<div class="row">


    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
        <form action="#" method="POST" role="form">
            <legend>Registration form</legend>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="form_email">Name</label>
                        <input name="name" type="text" class="form-control" id="form_name" placeholder="Name" required value="<? print($name); ?>" />
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="form_email">Second name</label>
                        <input name="second_name" type="text" class="form-control" id="form_second_name" placeholder="Second name" required value="<? print($second_name); ?>" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="form_email">Email</label>
                <input name="login" type="text" class="form-control" id="form_email" placeholder="Email" required value="<? print($login); ?>" />
            </div>

            <div class="form-group">
                <label for="form_password">Password</label>
                <input name="password" type="password" class="form-control" id="form_password" placeholder="Password" required />
            </div>

            <div class="form-group">
                <label for="form_password_c">Confirm password</label>
                <input name="confirm" type="password" class="form-control" id="form_password_c" placeholder="Password" required />
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-6 clearfix">

        <div class="list-group">
            <a href="#" class="list-group-item active">
                <h4 class="list-group-item-heading">List group item heading</h4>
                <p class="list-group-item-text">Content goes here</p>
            </a>
            <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading">List group item heading</h4>
                <p class="list-group-item-text">Content goes here</p>
            </a>

            <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading">List group item heading</h4>
                <p class="list-group-item-text">Content goes here</p>
            </a>
            <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading">List group item heading</h4>
                <p class="list-group-item-text">Content goes here</p>
            </a>
        </div>

    </div>


</div>

</div> <!-- End of container -->


<div class="container top-20 text-center">

    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>Cillum laboris nisi consectetur consectetur irure non Lorem ut dolore. Dolor labore veniam laboris non fugiat dolor duis tempor Lorem. Do sit ea amet cupidatat officia eiusmod magna consectetur incididunt excepteur in cillum anim.</p>
                </div>
            </div>
        </div>

        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>Cillum laboris nisi consectetur consectetur irure non Lorem ut dolore. Dolor labore veniam laboris non fugiat dolor duis tempor Lorem. Do sit ea amet cupidatat officia eiusmod magna consectetur incididunt excepteur in cillum anim.</p>
                </div>
            </div>
        </div>

        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>Cillum laboris nisi consectetur consectetur irure non Lorem ut dolore. Dolor labore veniam laboris non fugiat dolor duis tempor Lorem. Do sit ea amet cupidatat officia eiusmod magna consectetur incididunt excepteur in cillum anim.</p>
                </div>
            </div>
        </div>
    </div>

</div><!-- end of container -->





<? get_footer(); ?>
