<?php
/**
 * Template Name: acount_template
 */

if (!is_user_logged_in())
{
    wp_redirect( $luxtour_redirect_url);
    exit();
}

get_header(); ?>


<div class="container" style="margin-top: 50px; ">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="panel padding-24">
                <div class="row">
                    <div class="col-xs-12">
                        <center><p>Info</p></center>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        Email
                    </div>
                    <div class="col-xs-8">oleg.timofeev20@gmail.com</div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        Fullname
                    </div>
                    <div class="col-xs-8">Oleg Alekseevich Timofeev</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="panel padding-24">
            <center><h2>Change email</h2></center>
            <form>
              <div class="form-group">
                <label for="form_email">Old email address:</label>
                <input type="email" class="form-control" id="form_email" required>
              </div>
              <div class="form-group">
                <label for="form_new_email">New email address:</label>
                <input type="email" class="form-control" id="form_new_email" required>
              </div>
              <div class="form-group">
                <label for="form_password">Password</label>
                <input type="password" class="form-control" id="form_password" required>
              </div>
              <button type="submit" class="btn btn-default">Change</button>
            </form>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="panel padding-24">
            <center><h2>Change password</h2></center>
            <form>
              <div class="form-group">
                <label for="form_old_password">Old password:</label>
                <input type="password" class="form-control" id="form_old_password" required>
              </div>
              <div class="form-group">
                <label for="form_new_password">New password:</label>
                <input type="password" class="form-control" id="form_new_password" required>
              </div>
              <div class="form-group">
                <label for="form_new_password_repeat">Repeat new password</label>
                <input type="password" class="form-control" id="form_new_password_repeat" required>
              </div>
              <button type="submit" class="btn btn-default">Change</button>
            </form>
            </div>
        </div>
    </div>
</div>







<? get_footer(); ?>
