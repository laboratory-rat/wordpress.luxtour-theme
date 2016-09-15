<?php
/**
 * Template Name: acount_template
 */
$self_url = get_site_url().'/account/';


if (!is_user_logged_in())
{
    wp_redirect( $luxtour_redirect_url);
    exit();
}

$errors = "";

if (isset($_POST['submit']))
{
	$submit = clear_input($_POST['submit']);

	if ($submit == "change-email" && isset($_POST['new-email']) && isset($_POST['password']))
	{
		$password = clear_input($_POST['password']);
		$new_email = clear_input($_POST['new-email']);

		$user = get_userdata(get_current_user_id());

		if (wp_check_password($password, $user->data->user_pass, $user->ID))
		{
			$user_id = wp_update_user( array( 'ID'=>$user->ID, 'user_email' => $new_email, 'user_login' => $new_email ) );

			if ( is_wp_error( $user_id ) )
			{
				$errors = "No such user";
			}
		}
		else
			$errors = "bad password";

	}

	elseif ($submit == "change-tel" && isset ($_POST['new-tel']) && isset($_POST['password']))
	{
		$tel = clear_input($_POST['new-tel']);
		$password = clear_input($_POST['password']);

		$user = get_userdata(get_current_user_id());

		if (wp_check_password($password, $user->data->user_pass, $user->ID))
		{
			$luw->change_tel($user->ID, $tel);
		}
		else
			$errors = "bad password";
	}

	elseif($submit == "change-password" && isset($_POST['old-pass']) && isset($_POST['new-pass']) && isset($_POST['repeat']))
	{
		$old_pass = clear_input($_POST['old-pass']);
		$new_pass = clear_input($_POST['new-pass']);
		$repeat = clear_input($_POST['repeat']);

		$user = get_userdata(get_current_user_id());

		if ($repeat === $new_pass && wp_check_password($old_pass, $user->data->user_pass, $user->ID))
		{
			wp_set_password($new_pass, $user->ID);
		}
		else
			$errors = "bad password";
	}
}

// Get user data
$data = $luw->get_user_data();



get_header();

$l->set_page("account");

?>

<? if ($errors != ""): ?>

<script>
	alert('<? echo $errors; ?>');
</script>

<? endif; ?>


<div class="container panel" style="margin-top: 79px; background-color: #FAFAFA; padding-bottom: 30px;
									box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
									-webkit-box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
									-moz-box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"
	 ng-app="accountApp" ng-controller="accountCtrl">

	<div class="row panel" style="height: 95px; background-color: #e0e0e0;
								  box-shadow: 0 2px 0px  rgba(0, 0, 0, 0.16), 0 2px 5px 1px rgba(0, 0, 0, 0.26);
								  -webkit-box-shadow: 0 2px 0px  rgba(0, 0, 0, 0.16), 0 2px 5px 1px rgba(0, 0, 0, 0.26);
								  -moz-box-shadow: 0 2px 0px  rgba(0, 0, 0, 0.16), 0 2px 5px 1px rgba(0, 0, 0, 0.26);">

		<div class="col-xs-12" style="
									    font-weight: 500;
										font-size: 24px;
										left: 210px;
										top: 55px;
										color: rgba(0,0,0,0.87);">
			<?echo $data['fullname']?>
		</div>

	</div>

	<div class="row" id="account_forms">

		<div class="col-xs-2">
			<img class="img-circle img-responsive" src="<?echo get_template_directory_uri();?>/img/account-ico.png" alt="land-man" style="width: 160px; margin-top: -100px; margin-left:15px;
																 box-shadow: 0 2px 0px  rgba(0, 0, 0, 0.16), 0 2px 5px 1px rgba(0, 0, 0, 0.26);
																 moz-box-shadow: 0 2px 0px  rgba(0, 0, 0, 0.16), 0 2px 5px 1px rgba(0, 0, 0, 0.26);
																 webkit-box-shadow: 0 2px 0px  rgba(0, 0, 0, 0.16), 0 2px 5px 1px rgba(0, 0, 0, 0.26);" />
		</div>

<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5" style="margin-top: 10px; margin-left: 27px;">


<div class="row account-animation">
	<div class="col-xs-12 collapse-element account-card">
		<div class="col-xs-3" style="padding-left: 1px;"><?$l->_l('pass');?></div>
		<div class="col-xs-7"></div>
		<div class="col-xs-2"> <a ng-click="passFormActive = !passFormActive" href="#"><?$l->_l('btn-change');?></a> </div>
	</div>
	<div class="col-xs-12 account-collapse" ng-show="passFormActive" style="padding-left: 0px;">
		<form class='account-form' action="<?echo $self_url; ?>" method="POST">
			<div class="form-group">
				<label class="col-xs-3" style="padding-left: 1px;" for="old-pass"><?$l->_l('pass-old');?></label>
				<div class="col-xs-7">
					<input class="form-control" name="old-pass" id="old-pass" type="password" required /> </div>
			</div>
			<div class="form-group">
				<label class="col-xs-3" for="new-pass" style="margin-top:15px; padding-left: 1px;" ><?$l->_l('pass-new');?></label>
				<div class="col-xs-7">
					<input class="form-control" name="new-pass" id="new-pass" type="password" style="margin-top:15px;" required /> </div>
			</div>
			<div class="form-group">
				<label class="col-xs-3" for="repeat" style="margin-top:15px; padding-left: 1px;"><?$l->_l('pass-repeat');?></label>
				<div class="col-xs-7">
					<input class="form-control" name="repeat" id="repeat" type="password" style="margin-top:15px;" required /> </div>
			</div>

		  <button type="submit" name="submit" value="change-password" class="btn btn-primary col-xs-3 col-xs-push-3" style="margin-left: 15px; margin-top: 15px; background-color: #009688 !important; color: #FFF !important; width: 120px; height: 30px; font-size: 12px;"><?$l->_l('btn-submit');?></button>
		</form>
	</div>

	<div class="col-xs-12 collapse-element account-card">
		<div class="col-xs-3" style="padding-left: 1px;"><?$l->_l('email');?></div>
		<div class="col-xs-7"><? echo $data['email'];?></div>
		<div class="col-xs-2"> <a ng-click="emailFormActive = !emailFormActive" href="#"><?$l->_l('btn-change');?></a> </div>
	</div>
	<div class="col-xs-12 account-collapse" ng-show="emailFormActive" style="padding-left: 0px;">
		<form class='account-form' name="change-email-form"  action="<?echo $self_url; ?>" method="POST">
			<div class="form-group">
				<label class="col-xs-3" for="new-email" style="margin-top:15px; padding-left: 1px;" ><?$l->_l('email-new');?></label>
				<div class="col-xs-7">
					<input class="form-control" name="new-email" id="new-email" type="email" style="margin-top:15px;" required /> </div>
			</div>
			<div class="form-group">
				<label class="col-xs-3" for="password" style="margin-top:15px; padding-left: 1px;"><?$l->_l('pass');?></label>
				<div class="col-xs-7">
					<input class="form-control" name="password" id="password" type="password" style="margin-top:15px;" required /> </div>
			</div>

		  <button type="submit" value="change-email" name="submit"  class="btn btn-primary col-xs-3 col-xs-push-3" style="margin-left: 15px; margin-top: 15px; background-color: #009688 !important; color: #FFF !important; width: 120px; height: 30px; font-size: 12px;"><?$l->_l('btn-submit');?></button>
		</form>
	</div>

	<div class="col-xs-12 collapse-element account-card">
		<div class="col-xs-3" style="padding-left: 1px;"><?$l->_l('tel');?></div>
		<div class="col-xs-7"><? echo $data['tel']?></div>
		<div class="col-xs-2"> <a ng-click="telFormActive = !telFormActive" href="#"><?$l->_l('btn-change');?></a> </div>
	</div>
	<div class="col-xs-12 account-collapse " ng-show="telFormActive" style="padding-left: 0px;">
		<form class='account-form'  action="<?echo $self_url; ?>" method="POST">
			<div class="form-group">
				<label class="col-xs-3" for="new-tel" style="margin-top:15px; padding-left: 1px;" ><?$l->_l('tel-new');?></label>
				<div class="col-xs-7">
					<input class="form-control" name="new-tel" id="new-tel" type="tel" style="margin-top:15px;" required /> </div>
			</div>
			<div class="form-group">
				<label class="col-xs-3" for="password" style="margin-top:15px; padding-left: 1px;"><?$l->_l('pass');?></label>
				<div class="col-xs-7">
					<input class="form-control" name="password" id="password" type="password" style="margin-top:15px;" required /> </div>
			</div>

		  <button type="submit" value="change-tel" name="submit" class="btn btn-primary col-xs-3 col-xs-push-3" style="margin-left: 15px; margin-top: 15px; background-color: #009688 !important; color: #FFF !important; width: 120px; height: 30px; font-size: 12px;"><?$l->_l('btn-submit');?></button>
		</form>
	</div>
	<div class="col-xs-12 collapse-element account-card account-bottom-border">
		<div class="col-xs-3" style="padding-left: 1px;">API key</div>
		<div class="col-xs-7"><?echo substr($data['key'], 0, 15);?>...</div>
		<div class="col-xs-2" > <a  href="" clipboard text="api">Copy</a> </div>
		<input type="hidden" value="<?echo $data['key']; ?>" id="api-key" />
	</div>
</div>

			<div class="row" id="acount-footer">
				<div class="col-xs-12 "><?$l->_l('contacts');?></div>
				<div class="col-xs-12">Контакти</div>
				<div class="col-xs-12 ">Контакти</div>

				<div class="col-xs-12 ">Контакти</div>


			</div>

		</div>

		<div class="col-xs-3 col-xs-push-1" style="margin-left: 15px; text-align: center; margin-top: -10px;">
			<span style="font-size: 16px; font-weight: bolder;"><?$l->_l('form');?></span><br />
			<a href="#" alt="doc" style="padding-top: 15px; display: block;">
				<img src="<?echo get_template_directory_uri();?>/img/doc.png" />
			</a>
		</div>
	</div>


</div>


<script src="<?echo get_template_directory_uri();?>/js/account.js"> </script>



<? get_footer(); ?>
