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


<div class="container panel" style="margin-top: 79px; background-color: #FAFAFA; padding-bottom: 30px;
									box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
									-webkit-box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
									-moz-box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"
	 ng-app="accountApp" ng-controller="accountCtrl">

	<div class="row panel" style="height: 95px; background-color: #e0e0e0;
								  box-shadow: 0 2px 0px  rgba(0, 0, 0, 0.16), 0 2px 5px 1px rgba(0, 0, 0, 0.26);
								  -webkit-box-shadow: 0 2px 0px  rgba(0, 0, 0, 0.16), 0 2px 5px 1px rgba(0, 0, 0, 0.26);
								  -moz-box-shadow: 0 2px 0px  rgba(0, 0, 0, 0.16), 0 2px 5px 1px rgba(0, 0, 0, 0.26);">

		<div class="col-xs-12">

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
			<div class="row  animate-show" ng-show="!passFormActive">
				<div class="col-xs-12 collapse-element account-card" >
					<div class="row ">
						<div class="col-xs-3">
							Password
						</div>
						<div class="col-xs-7 main-text">
							XYU
						</div>
						<div class="col-xs-2">
							<a ng-click="passFormActive = !passFormActive" href="#">Change</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row animate-show" ng-show="passFormActive">
				<div class="col-xs-12">
					<div class="row" >
						<form name="change_email" method="POST" action="">
						<div class="col-xs-12 collapse-element no-borders">
							<div class="form-group">
								<label class="control-label" for="old_email">Old password</label>
								<input class="form-control" type="email" name="old_email" id="old_email" required />
							</div>
						</div>
						<div class="col-xs-12 collapse-element no-borders">
							<div class="form-group">
								<label class="control-label" for="new_email">New Password</label>
								<input class="form-control" type="email" name="new_email" id="new_email" required />
							</div>
						</div>
						<div class="col-xs-12 collapse-element no-borders ">
							<div class="form-group">
								<label class="control-label" for="password">Repeate</label>
								<input class="form-control" type="password" name="password" id="password" required />
							</div>
						</div>
						<div class="col-xs-12 collapse-element no-borders " style="margin-top: 20px;">
							<button class="btn" type="submit" style="width:50%;">Change</button>
							<a href="#" class="btn" ng-click="passFormActive = !passFormActive" style="margin-left: 10%;">Back</a>


						</div>
						</form>
				</div>
				</div>
			</div>

			<div class="row  animate-show" ng-show="!emailFormActive">
				<div class="col-xs-12 collapse-element account-card" >
					<div class="row ">
						<div class="col-xs-3">
							Email
						</div>
						<div class="col-xs-7 main-text">
							Current email
						</div>
						<div class="col-xs-2">
							<a ng-click="emailFormActive = !emailFormActive" href="#">Change</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row animate-show" ng-show="emailFormActive">
				<div class="col-xs-12">
					<div class="row" >
						<form name="change_email" method="POST" action="">
						<div class="col-xs-12 collapse-element">
							<div class="form-group">
								<label class="control-label" for="old_email">Old email</label>
								<input class="form-control" type="email" name="old_email" id="old_email" required />
							</div>
						</div>
						<div class="col-xs-12 collapse-element">
							<div class="form-group">
								<label class="control-label" for="new_email">New email</label>
								<input class="form-control" type="email" name="new_email" id="new_email" required />
							</div>
						</div>
						<div class="col-xs-12 collapse-element ">
							<div class="form-group">
								<label class="control-label" for="password">Password</label>
								<input class="form-control" type="password" name="password" id="password" required />
							</div>
						</div>
						<div class="col-xs-12 collapse-element " style="margin-top: 20px;">
							<button class="btn" type="submit" style="width:50%;">Change</button>
							<a href="#" class="btn" ng-click="emailFormActive = !emailFormActive" style="margin-left: 10%;">Back</a>


						</div>
						</form>
				</div>
				</div>
			</div>

			<div class="row  animate-show" ng-show="!telFormActive">
				<div class="col-xs-12 collapse-element account-card" >
					<div class="row ">
						<div class="col-xs-3">
							Tel
						</div>
						<div class="col-xs-7 main-text">
							Current tel
						</div>
						<div class="col-xs-2">
							<a ng-click="telFormActive = !telFormActive" href="#">Change</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row animate-show" ng-show="telFormActive">
				<div class="col-xs-12">
					<div class="row" >
						<form name="change_email" method="POST" action="">
						<div class="col-xs-12 collapse-element">
							<div class="form-group">
								<label class="control-label" for="old_email">Old tel</label>
								<input class="form-control" type="email" name="old_email" id="old_email" required />
							</div>
						</div>
						<div class="col-xs-12 collapse-element">
							<div class="form-group">
								<label class="control-label" for="new_email">New tel</label>
								<input class="form-control" type="email" name="new_email" id="new_email" required />
							</div>
						</div>
						<div class="col-xs-12 collapse-element ">
							<div class="form-group">
								<label class="control-label" for="password">Password</label>
								<input class="form-control" type="password" name="password" id="password" required />
							</div>
						</div>
						<div class="col-xs-12 collapse-element " style="margin-top: 20px;">
							<button class="btn" type="submit" style="width:50%;">Change</button>
							<a href="#" class="btn" ng-click="telFormActive = !telFormActive" style="margin-left: 10%;">Back</a>


						</div>
						</form>
				</div>
				</div>
			</div>

			<div class="row  animate-show" ng-show="!apiFormActive">
				<div class="col-xs-12 collapse-element account-card collapse-bottom-border" >
					<div class="row ">
						<div class="col-xs-3">
							API
						</div>
						<div class="col-xs-7 main-text">
							Current api
						</div>
						<div class="col-xs-2">
							<a ng-click="apiFormActive = !apiFormActive" href="#">Change</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row animate-show" ng-show="apiFormActive">
				<div class="col-xs-12">
					<div class="row" >
						<form name="change_email" method="POST" action="">
						<div class="col-xs-12 collapse-element">
							<div class="form-group">
								<label class="control-label" for="old_email">Old email</label>
								<input class="form-control" type="email" name="old_email" id="old_email" required />
							</div>
						</div>
						<div class="col-xs-12 collapse-element">
							<div class="form-group">
								<label class="control-label" for="new_email">New email</label>
								<input class="form-control" type="email" name="new_email" id="new_email" required />
							</div>
						</div>
						<div class="col-xs-12 collapse-element ">
							<div class="form-group">
								<label class="control-label" for="password">Password</label>
								<input class="form-control" type="password" name="password" id="password" required />
							</div>
						</div>
						<div class="col-xs-12 collapse-element " style="margin-top: 20px;">
							<button class="btn" type="submit" style="width:50%;">Change</button>
							<a href="#" class="btn" ng-click="apiFormActive = !apiFormActive" style="margin-left: 10%;">Back</a>


						</div>
						</form>
				</div>
				</div>
			</div>


			<div class="row" id="acount-footer">
				<div class="col-xs-12 ">КОНТАКТИ</div>
				<div class="col-xs-12">Контакти</div>
				<div class="col-xs-12 ">Контакти</div>

				<div class="col-xs-12 ">Контакти</div>


			</div>

		</div>

		<div class="col-xs-3 col-xs-push-1" style="margin-left: 15px; text-align: center; margin-top: -10px;">
			<span style="font-size: 16px; font-weight: bolder;">Форма договору з клієнтом</span><br />
			<a href="#" alt="doc" style="padding-top: 15px; display: block;">
				<img src="<?echo get_template_directory_uri();?>/img/doc.png" />
			</a>
		</div>
	</div>


</div>



<script src="<?echo get_template_directory_uri();?>/js/account.js"> </script>



<? get_footer(); ?>
