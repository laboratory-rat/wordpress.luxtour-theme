<?php
/**
 * Template Name: landing_template
 */

// $l->set_page("landing");
// $l->_l("key");


/*
echo"landing";

$l->set_cookie();

echo "land - 2";

*/
// registration area;


$self_url = htmlspecialchars($_SERVER["PHP_SELF"]);

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["fullname"]) && 	!empty($_POST["password"]) && !empty($_POST["password_confirm"]) && !empty($_POST["email"]) && !empty($_POST["submit"]))
{
	$fullname = clear_input($_POST["fullname"]);
	$password = clear_input($_POST["password"]);
	$confirm = clear_input($_POST["password_confirm"]);
	$email = clear_input($_POST["email"]);
	$ip = "";

	if (!empty($_SERVER['HTTP_CLIENT_IP']))
	{
    	$ip = $_SERVER['HTTP_CLIENT_IP'];
	}
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	{
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	else
	{
    	$ip = $_SERVER['REMOTE_ADDR'];
	}

	$_SESSION['fullname'] = $fullname;
	$_SESSION['email'] = $email;

	if ($password === $confirm)
	{

		if (isset($luw) && method_exists($luw, 'add_new_user'))
		{
			$args = array
			(
				'fullname' => $fullname,
				'password' => $password,
				'email' => $email,
				'ip' => $ip,
			);

			$result = $luw->add_new_user($args);

		}
	}
	else
		$result = "bad passwords";
}




// end of registration area;


get_header();

 $l->set_page("landing");

// $l->set_page("landing");
// $l->_l("key");

if (isset($result) && $result != "")
	echo "<script>alert('$result')</script>";

?>
	<div ng-app="landing" ng-controller="landCtrl" id="fullpage">
		<div class="container-fluid section white-text" id="first-section">
			<div class="" style="position: absolute; top: 0px; height: 100%;">
				<div class="row" style="padding-top: 90px; height: 100%">
					<div class="col-xs-12 col-sm-12 col-md-9 col-lg-8" style=" padding-left: 46px;">
						<h1 class="page-head"><? print($l->_l('1-header'));?></h1> <span class="second-page-head">
        <? print($l->_l('1-text'));?>
        </span>
						<div class="row second-page-head">
							<div class="row" style="margin-top: 42px;">
								<div class="col-md-2 col-lg-1 col-lg-push-1 hide-sm hide-xs"> <img src="<? echo get_template_directory_uri(); ?>/img/land-checkbox.png" class="img-responsive center-block" /> </div>
								<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-lg-push-1" style="min-height: 40px; margin-top: 5px;">
									<? print($l->_l('1-list-1'));?>
								</div>
							</div>
							<div class="row" style="margin-top: 21px;">
								<div class="col-md-2 col-lg-1 col-lg-push-1 hide-sm hide-xs"> <img src="<? echo get_template_directory_uri(); ?>/img/land-checkbox.png" class="img-responsive center-block" /> </div>
								<div class="col-xs-12 col-sm-12 col-md-5 col-lg-6 col-lg-push-1" style="min-height: 40px; margin-top: 5px;">
									<? print($l->_l('1-list-2'));?>
								</div>
							</div>
							<div class="row" style="margin-top: 21px;">
								<div class="col-md-2 col-lg-1 col-lg-push-1 hide-sm hide-xs"> <img src="<? echo get_template_directory_uri(); ?>/img/land-checkbox.png" class="img-responsive center-block" /> </div>
								<div class="col-xs-12 col-sm-12 col-md-5 col-lg-6 col-lg-push-1" style="min-height: 40px; margin-top: 5px;">
									<? print($l->_l('1-list-3'));?>
								</div>
							</div>
						</div>
					</div>

					<!-- reg button -->

					<? if(!is_user_logged_in()): ?>

					<div class="col-xs-8 col-xs-push-4 col-md-12 col-sm-push-4 col-md-push-3 col-lg-push-0" style="position: absolute; bottom: 50px;"> <a href="#" class="btn btn-raised first-section-btn center-block" ng-click="formActive = !formActive"><? print($l->_l('1-btn'));?> </a> </div>

					<? endif; ?>

					<!-- end of reg button -->

				</div>



				<!-- registration form 1 -->

				<? if (!is_user_logged_in()): ?>

				<div class="row first-form" ng-hide="formActive == false">
					<div class="panel">
						<div class="header" >
						<span class="white-text" ng-click="formActive = !formActive" style="font-size: 22px; cursor: pointer;">x</span>
							<img src="<? echo get_template_directory_uri(); ?>/img/land-form-header.png" class="img-responsive center-block" />
							<div class="white-text" style="font-weight: 500; text-align: center;"><?$l->_l('reg-header');?></div>
						</div>

						<div class="pisdushka"></div>
						<form method="post" action="<?print($self_url);?>" role="form">
							<div class="input-group" style="">
								<span class="input-group-addon glyphicon glyphicon-user"></span>
								<input type="text" class="form-control" id="back-fullname" name="fullname" placeholder="Oleg Timofeev" required>
							</div>
							<div class="input-group">
								<span class="input-group-addon glyphicon glyphicon-lock"></span>
								<input name="password" type="password" class="form-control" id="form1-pass" required />
							</div>
							<div class="input-group">
								<span class="input-group-addon glyphicon glyphicon-lock"></span>
								<input name="password_confirm" type="password" class="form-control" id="form1-pass" required />
							</div>
							<div class="input-group">
								<span class="input-group-addon glyphicon glyphicon-envelope"></span>
								<input name="email" type="email" class="form-control" id="back-email" placeholder="info@luxtour.online" required>
							</div>
						  <div class="checkbox clear">
							  <label class="" style="color: rgba(0,0,0,0.87) !important;">
									<input type="checkbox" required> <?$l->_l('reg-terms');?>
						  		</label>
						  </div>

							<button name="submit" value="registration" type="submit" class="btn btn-default" style="color: #FFF !important;"><?$l->_l('reg-btn');?> </button>

						</form>
					</div>
				</div>

				<? endif; ?>

			</div>
		</div>



		<!-- second view -->
		<div class="continer-fluid section" id="second-section">
			<div style="position: absolute; top: 0px; height: 100%; width: 100%;">
				<div class="center-block" style="margin-top: 109px;">
					<center> <span style="
                color: #FEBA00;
                font-size: 41px;
                font-weight: 400;">
                <img src="<? echo get_template_directory_uri(); ?>/img/land-line-yello.png" />
                <? print($l->_l('2-header'));?>
                <img src="<? echo get_template_directory_uri(); ?>/img/land-line-yello.png" /></span> </center>
					<center style="    width: 75%;
    margin: 0 auto;"> <span style="
                display: block;
                margin-top: 25px;
                font-size: 20px;
                font-weight: 400;
				   " class="white-text"><? print($l->_l('2-text'));?>
			</span> </center>
				</div>
				<center>
					<div style="margin-top: 3%;"><img src="<? echo get_template_directory_uri(); ?>/img/land-line-white.png" class="img-responsive" /></div>
				</center>
				<div style="width:80%; margin:0 auto; margin-top: 5%">
					<div class="row text-18">
						<div class="col-xs-3 white-text">
							<center>
								<div><img src="<? echo get_template_directory_uri(); ?>/img/land-ico-1.png" class="img-responsive" style="    max-width: 119px; max-height: 119px;" /></div>
							</center>
							<div class="text-center" style="margin-top: 16px;">
								<? print($l->_l('2-list-1'));?>
							</div>
						</div>
						<div class="col-xs-3 white-text">
							<center>
								<div><img src="<? echo get_template_directory_uri(); ?>/img/land-ico-2.png" class="img-responsive" style="    max-width: 119px; max-height: 119px;" /></div>
							</center>
							<div class="text-center" style="margin-top: 16px;">
								<? print($l->_l('2-list-2'));?>
							</div>
						</div>
						<div class="col-xs-3 white-text">
							<center>
								<div><img src="<? echo get_template_directory_uri(); ?>/img/land-ico-3.png" class="img-responsive" style="    max-width: 119px; max-height: 119px;" /></div>
							</center>
							<div class="text-center" style="margin-top: 16px;">
								<? print($l->_l('2-list-3'));?>
							</div>
						</div>
						<div class="col-xs-3 white-text">
							<center>
								<div><img src="<? echo get_template_directory_uri(); ?>/img/land-ico-4.png" class="img-responsive" style="    max-width: 119px; max-height: 119px;" /></div>
							</center>
							<div class="text-center" style="margin-top: 16px;">
								<? print($l->_l('2-list-4'));?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

				<!-- third view -->
				<div class="continer-fluid section" id="third-section">
					<div style="position: absolute; top: 0px; height: 100%; width: 100%;" class="white-text">
						<div class="row" style="margin-left: 32px; margin-top: 100px;">
							<div class="col-xs-12 text-34">
								<? print($l->_l('3-header'));?>
							</div>
						</div>
						<div style="width: 55%; min-width: 700px; margin-top: 56px; margin-left: 73px; height: 100%;" class="text-17">
							<div class="row" style="margin-top: 10px;  min-height: 70px;">
								<div class="col-xs-2" style="min-width: 72px; min-height: 72px; height: 100%;"> <img src="<? echo get_template_directory_uri(); ?>/img/land-3-1.png" class="img-responsive" /> </div>
								<div class="col-xs-10" style="height: 100%;"> <span style="vertical-alin:middle;"><? print($l->_l('3-list-1'));?></span> </div>
							</div>
							<div class="row" style="margin-top: 10px;  min-height: 70px;">
								<div class="col-xs-2" style="min-width: 72px; min-height: 72px; height: 100%;"> <img src="<? echo get_template_directory_uri(); ?>/img/land-3-3.png" class="img-responsive" /> </div>
								<div class="col-xs-10">
									<? print($l->_l('3-list-2'));?>
								</div>
							</div>
							<div class="row" style="margin-top: 10px; min-height: 70px;">
								<div class="col-xs-2" style="min-width: 72px; min-height: 72px; height: 100%;"> <img src="<? echo get_template_directory_uri(); ?>/img/land-3-2.png" class="img-responsive" /> </div>
								<div class="col-xs-10">
									<? print($l->_l('3-list-3'));?>
								</div>
							</div>
							<div class="row" style="margin-top: 10px;  min-height: 70px;">
								<div class="col-xs-2" style="min-width: 72px; min-height: 72px; height: 100%;"> <img src="<? echo get_template_directory_uri(); ?>/img/land-3-4.png" class="img-responsive" /> </div>
								<div class="col-xs-10">
									<? print($l->_l('3-list-4'));?>
								</div>
							</div>
						</div>

						<!-- write form -->

						<div class="col-xs-8 col-xs-push-4 col-md-12 col-sm-push-4 col-md-push-3 col-lg-push-0" style="position: absolute; bottom: 50px;"> <a href="#" class="btn btn-raised first-section-btn center-block" style="width: 25%; height: 55px; color: #0277bd !important; background-color: #FFF !important; border-color: #0277bd !important; border-radius: 0px;" ng-click="formActiveSecond = !formActiveSecond"><?$l->_l('3-btn');?> </a> </div>

						<!-- form -->

						<!-- Write to us -->

						<div class="row first-form" ng-hide="formActiveSecond == false">
							<div class="panel">
								<div class="header" style="background-color:#0277bd" >
								<span class="white-text" ng-click="formActiveSecond = !formActiveSecond" style="font-size: 22px; cursor: pointer;">x</span>
									<div class="white-text" style="font-weight: 500; text-align: center;"><?$l->_l('m-3-header');?></div>
								</div>

								<div class="pisdushka-2"></div>
								<form>
									<div class="input-group" style="">
										<span class="input-group-addon glyphicon glyphicon-user" style="background-color: #0277bd;"></span>
										<input type="text" name="fullname" class="form-control" ng-model="letter.fullname" id="back-fullname" placeholder="Oleg Timofeev" required>
									</div>
									<div class="input-group">
										<span class="input-group-addon glyphicon glyphicon-envelope" style="background-color: #0277bd;"></span>
										<input type="email" ng-model="letter.email"  class="form-control" id="back-email" placeholder="info@luxtour.online" required>
									</div>
									<div class="input-group">
										<span class="input-group-addon glyphicon glyphicon-pencil" style="background-color: #0277bd;"></span>
										<textarea type="text" class="form-control" id="message-text" placeholder="" ng-model="letter.message" style="height:100px; padding-left: 10px;" required></textarea>
									</div>

									<button type="submit" class="btn btn-default" style="color: #FFF !important; background-color: #0277bd;" ng-click="writeUS()"><?$l->_l('m-3-btn');?> </button>
								</form>
							</div>
						</div>

						<!-- end form -->

					</div>
				</div>
				<!-- forth new -->
				<div class="container-fluid section" id="forth-section-back">
					<div class="" style="position: absolute; top: 0px; width: 100%; height: 100%;">
						<div class="row" style="margin-top: 7%">
							<div class="col-xs-12 text-center text-45 feba-text">
								<? print($l->_l('4-header'));?>
							</div>
							<div class="center-block col-xs-12 col-sm-8 col-md-6 col-lg-6" style="width: 100%; margin-top: 3%">
								<div style="width: 900px; margin: 0 auto;">
									<div class="block-center"> <img src="<? echo get_template_directory_uri(); ?>/img/ico-4-1.png" class="center-block img-responsive" /> <span style="display:block; padding-top: 20px; font-size: 18px; font-weight: bolder;"><? print($l->_l('4-list-1'));?></span> </div>
									<div class="block-center small-block-center hide-xs hide-sm"> <img src="<? echo get_template_directory_uri(); ?>/img/ico-4-s.png" class="center-block img-responsive " /> </div>
									<div class="block-center"> <img src="<? echo get_template_directory_uri(); ?>/img/ico-4-2.png" class="center-block img-responsive" /> <span style="display:block; padding-top: 20px; font-size: 18px; font-weight: bolder;"><? print($l->_l('4-list-2'));?></span> </div>
									<div class="block-center small-block-center hide-xs hide-sm"> <img src="<? echo get_template_directory_uri(); ?>/img/ico-4-s.png" class="center-block img-responsive" /> </div>
									<div class="block-center"> <img src="<? echo get_template_directory_uri(); ?>/img/ico-4-3.png" class="center-block img-responsive" /> <span style="display:block; padding-top: 20px; font-size: 18px; font-weight: bolder;"><? print($l->_l('4-list-3'));?></span> </div>
									<div class="block-center small-block-center hide-xs hide-sm"> <img src="<? echo get_template_directory_uri(); ?>/img/ico-4-s.png" class="center-block img-responsive" /> </div>
									<div class="block-center"> <img src="<? echo get_template_directory_uri(); ?>/img/ico-4-4.png" class="center-block img-responsive" /> <span style="display:block; padding-top: 20px;  font-size: 18px; font-weight: bolder;"><? print($l->_l('4-list-4'));?></span> </div>
								</div>
							</div>
						</div>
						<div class="row" style="position:absolute; bottom: 30px; width: 100%;">
							<div class="row text-center" style="margin-top: 60px;">
								<div class="col-xs-12" style="font-size: 52px; color: #FFF; font-weight: lighter;" > <? print($l->_l('4-text'));?></div>

								<!-- reg button 2 -->

								<? if (!is_user_logged_in()): ?>

								<div class="col-xs-12" style="margin-top: 30px;">
									<center>
										<a class="btn btn-raised" style="
                            width: 30%;
                            height: 65px;
                            text-align: center;
                            padding-top: 16px;
                            font-size: 22px;
                            background-color: rgba(0,0,0,0.1);
                            border: 3px solid white;
                            border-radius: 10px;
                            color: white;" ng-click="formActiveThird = true"> <b><? print($l->_l('4-btn'));?></b> </a>
									</center>
								</div>

								<? endif; ?>

							</div>
						</div>

						<!-- second reg form -->

						<? if (!is_user_logged_in()): ?>

						<div class="row first-form" ng-hide="formActiveThird == false">
					<div class="panel">
						<div class="header" >
						<span class="white-text" ng-click="formActiveThird = !formActiveThird" style="font-size: 22px; cursor: pointer;">x</span>
							<img src="<? echo get_template_directory_uri(); ?>/img/land-form-header.png" class="img-responsive center-block" />
							<div class="white-text" style="font-weight: 500; text-align: center;"><?$l->_l('reg-header');?></div>
						</div>

						<div class="pisdushka"></div>
						<form method="post" action="<?print($self_url);?>" role="form">
							<div class="input-group" style="">
								<span class="input-group-addon glyphicon glyphicon-user"></span>
								<input type="text" name="fullname"  class="form-control" id="back-fullname" placeholder="Oleg Timofeev" required>
							</div>
							<div class="input-group">
								<span class="input-group-addon glyphicon glyphicon-lock"></span>
								<input type="password" name="password" class="form-control" id="form1-pass" required/>
							</div>
							<div class="input-group">
								<span class="input-group-addon glyphicon glyphicon-lock"></span>
								<input type="password" name="password_confirm" class="form-control" id="form1-pass" required/>
							</div>
							<div class="input-group">
								<span class="input-group-addon glyphicon glyphicon-envelope"></span>
								<input type="email" name="email" class="form-control" id="back-email" placeholder="info@luxtour.online" required>
							</div>
						  <div class="checkbox clear">
							  <label class="" style="color: rgba(0,0,0,0.87) !important;">
									<input type="checkbox" ><?$l->_l('reg-terms');?>
						  		</label>
						  </div>

							<button type="submit" name="submit" value="submit" class="btn btn-default" style="color: #FFF !important;"><?$l->_l('reg-btn');?> </button>

						</form>
					</div>
				</div>

						<? endif; ?>

					</div>
				</div>
				<!-- forth view -->
				<!-- old version -->
				<div class="container-fluid section text-center" style="background-color: #0FF;" id="fifth-section">
					<div class="" style="position: absolute; top: 0px; width: 100%; height: 100%;">
						<div class="row" id="five-nav">
							<div class="col-xs-12"></div>
						</div>
						<div class="row" id="five-up">
							<div class="col-xs-12" id="map" style="width: 100%; height: 100%;"></div>
						</div>
						<div class="row white-text text-20" id="five-down">
							<div class="col-xs-6 col-sm-5 col-md-4 col-lg-3" style="position: absolute; bottom: 50px; text-align: left;"> <span class="text-34"><?$l->_l('5-contacts');?></span>
								<br /> <span><i class="glyphicon glyphicon-earphone"  area-hidden="true"></i> +3-800-000-00-00</span>
								<br /> <span><i class="glyphicon glyphicon-envelope"  area-hidden="true"></i> info@luxtour.online</span>
								<br /> <address>
					1355 Market Street, Suite 900<br>
					San Francisco, CA 94103<br>
				</address> </div>
							<div class="col-sm-4 col-sm-push-6 col-md-3 col-md-push-6">
								<div id="five-form">
						<div class="first-form">
							<div class="panel"  style="width: 100%; max-width: 600px; padding-top: 20px;">
								<div class="header" style="background-color:#0277bd; margin-top: -20px; padding-top: 25px;" >
									<div class="white-text" style="font-weight: 500; text-align: center;"><?$l->_l('m-5-header');?></div>
								</div>

								<div class="pisdushka-2"></div>
								<form style="margin-top: 0px;">
									<div class="input-group" style="">
										<span class="input-group-addon glyphicon glyphicon-user" style="background-color: #0277bd;"></span>
										<input ng-model="phone,fullname" type="text" class="form-control" id="back-fullname" placeholder="Oleg Timofeev" required>
									</div>
									<div class="input-group">
										<span class="input-group-addon glyphicon glyphicon-earphone" style="background-color: #0277bd;"></span>
										<input ng-model="phone.tel" type="tel" class="form-control" id="back-email" placeholder="+3 000 000 00 00" required>
									</div>

									<button ng-click="phone()" type="submit" class="btn btn-default" style="color: #FFF !important; background-color: #0277bd; margin-top: 20px;"><?$l->_l('m-5-btn');?> </button>
								</form>
							</div>
						</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<script>
					function initMap() {
						var lux = {
							lat: 49.8528505
							, lng: 24.041869
						};
						// Create a map object and specify the DOM element for display.
						var map = new google.maps.Map(document.getElementById('map'), {
							center: lux
							, scrollwheel: true
							, zoom: 12
						});
						// Create a marker and set its position.
						var marker = new google.maps.Marker({
							map: map
							, position: lux
							, title: 'Luxtour Online'
						, });
					}
				</script>
				<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxMgwnsBsuS-N0L8BjstR8BHkMnjFIcIw&callback=initMap">
				</script>
				<script type="text/javascript" src="<? echo get_template_directory_uri(); ?>/js/landing-parallax.js"></script>
				<? get_footer(); ?>


				<!-- Modal windows -->


		<!-- end modal -->
