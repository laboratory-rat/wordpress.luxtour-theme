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

get_header();

 $l->set_page("landing");

// $l->set_page("landing");
// $l->_l("key");

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
								<div class="col-md-2 col-lg-1 col-lg-push-1 hide-sm hide-xs"> <img src="http://wp-test.in/wp-content/themes/luxtour-agents/img/land-checkbox.png" class="img-responsive center-block" /> </div>
								<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-lg-push-1" style="min-height: 40px; margin-top: 5px;">
									<? print($l->_l('1-list-1'));?>
								</div>
							</div>
							<div class="row" style="margin-top: 21px;">
								<div class="col-md-2 col-lg-1 col-lg-push-1 hide-sm hide-xs"> <img src="http://wp-test.in/wp-content/themes/luxtour-agents/img/land-checkbox.png" class="img-responsive center-block" /> </div>
								<div class="col-xs-12 col-sm-12 col-md-5 col-lg-6 col-lg-push-1" style="min-height: 40px; margin-top: 5px;">
									<? print($l->_l('1-list-2'));?>
								</div>
							</div>
							<div class="row" style="margin-top: 21px;">
								<div class="col-md-2 col-lg-1 col-lg-push-1 hide-sm hide-xs"> <img src="http://wp-test.in/wp-content/themes/luxtour-agents/img/land-checkbox.png" class="img-responsive center-block" /> </div>
								<div class="col-xs-12 col-sm-12 col-md-5 col-lg-6 col-lg-push-1" style="min-height: 40px; margin-top: 5px;">
									<? print($l->_l('1-list-3'));?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-8 col-xs-push-4 col-md-12 col-sm-push-4 col-md-push-3 col-lg-push-0" style="position: absolute; bottom: 50px;"> <a href="#" class="btn btn-raised first-section-btn center-block" ng-click="formActive = !formActive"><? print($l->_l('1-btn'));?> </a> </div>
				</div>





				<div class="row first-form" ng-hide="formActive == false">
					<div class="panel">
						<div class="header" >
						<span class="white-text" ng-click="formActive = !formActive" style="font-size: 22px; cursor: pointer;">x</span>
							<img src="http://wp-test.in/wp-content/themes/luxtour-agents/img/land-form-header.png" class="img-responsive center-block" />
							<div class="white-text" style="font-weight: 500; text-align: center;">РЕГІСТРАЦІЯ</div>
						</div>

						<div class="pisdushka"></div>
						<form>
							<div class="input-group" style="">
								<span class="input-group-addon glyphicon glyphicon-user"></span>
								<input type="text" class="form-control" id="back-fullname" placeholder="Oleg Timofeev">
							</div>
							<div class="input-group">
								<span class="input-group-addon glyphicon glyphicon-lock"></span>
								<input type="password" class="form-control" id="form1-pass" />
							</div>
							<div class="input-group">
								<span class="input-group-addon glyphicon glyphicon-lock"></span>
								<input type="password" class="form-control" id="form1-pass" />
							</div>
							<div class="input-group">
								<span class="input-group-addon glyphicon glyphicon-envelope"></span>
								<input type="email" class="form-control" id="back-email" placeholder="info@luxtour.online">
							</div>
						  <div class="checkbox clear">
							  <label class="">
									<input type="checkbox"> Agree with tems
						  		</label>
						  </div>

							<button type="submit" class="btn btn-default">Приєднатися </button>

						</form>
					</div>
				</div>


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
                <img src="http://wp-test.in/wp-content/themes/luxtour-agents/img/land-line-yello.png" />
                <? print($l->_l('2-header'));?>
                <img src="http://wp-test.in/wp-content/themes/luxtour-agents/img/land-line-yello.png" /></span> </center>
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
					<div style="margin-top: 3%;"><img src="http://wp-test.in/wp-content/themes/luxtour-agents/img/land-line-white.png" class="img-responsive" /></div>
				</center>
				<div style="width:80%; margin:0 auto; margin-top: 5%">
					<div class="row text-18">
						<div class="col-xs-3 white-text">
							<center>
								<div><img src="http://wp-test.in/wp-content/themes/luxtour-agents/img/land-ico-1.png" class="img-responsive" style="    max-width: 119px; max-height: 119px;" /></div>
							</center>
							<div class="text-center" style="margin-top: 16px;">
								<? print($l->_l('2-list-1'));?>
							</div>
						</div>
						<div class="col-xs-3 white-text">
							<center>
								<div><img src="http://wp-test.in/wp-content/themes/luxtour-agents/img/land-ico-2.png" class="img-responsive" style="    max-width: 119px; max-height: 119px;" /></div>
							</center>
							<div class="text-center" style="margin-top: 16px;">
								<? print($l->_l('2-list-2'));?>
							</div>
						</div>
						<div class="col-xs-3 white-text">
							<center>
								<div><img src="http://wp-test.in/wp-content/themes/luxtour-agents/img/land-ico-3.png" class="img-responsive" style="    max-width: 119px; max-height: 119px;" /></div>
							</center>
							<div class="text-center" style="margin-top: 16px;">
								<? print($l->_l('2-list-3'));?>
							</div>
						</div>
						<div class="col-xs-3 white-text">
							<center>
								<div><img src="http://wp-test.in/wp-content/themes/luxtour-agents/img/land-ico-4.png" class="img-responsive" style="    max-width: 119px; max-height: 119px;" /></div>
							</center>
							<div class="text-center" style="margin-top: 16px;">
								<? print($l->_l('2-list-4'));?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<? if (isset($_SESSION["reg_success"])): ?>
			<div class="container">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title">Success!</h3> </div>
					<div class="panel-body">
						<?
                $message = $_SESSION["reg_success"];
                unset($_SESSION["reg_success"]);
                print($message);
            ?>
					</div>
				</div>
			</div>
			<? endif; ?>
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
								<div class="col-xs-2" style="min-width: 72px; min-height: 72px; height: 100%;"> <img src="http://wp-test.in/wp-content/themes/luxtour-agents/img/land-3-1.png" class="img-responsive" /> </div>
								<div class="col-xs-10" style="height: 100%;"> <span style="vertical-alin:middle;"><? print($l->_l('3-list-1'));?></span> </div>
							</div>
							<div class="row" style="margin-top: 10px;  min-height: 70px;">
								<div class="col-xs-2" style="min-width: 72px; min-height: 72px; height: 100%;"> <img src="http://wp-test.in/wp-content/themes/luxtour-agents/img/land-3-3.png" class="img-responsive" /> </div>
								<div class="col-xs-10">
									<? print($l->_l('3-list-2'));?>
								</div>
							</div>
							<div class="row" style="margin-top: 10px; min-height: 70px;">
								<div class="col-xs-2" style="min-width: 72px; min-height: 72px; height: 100%;"> <img src="http://wp-test.in/wp-content/themes/luxtour-agents/img/land-3-2.png" class="img-responsive" /> </div>
								<div class="col-xs-10">
									<? print($l->_l('3-list-3'));?>
								</div>
							</div>
							<div class="row" style="margin-top: 10px;  min-height: 70px;">
								<div class="col-xs-2" style="min-width: 72px; min-height: 72px; height: 100%;"> <img src="http://wp-test.in/wp-content/themes/luxtour-agents/img/land-3-4.png" class="img-responsive" /> </div>
								<div class="col-xs-10">
									<? print($l->_l('3-list-4'));?>
								</div>
							</div>
						</div>
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
									<div class="block-center"> <img src="http://wp-test.in/wp-content/themes/luxtour-agents/img/ico-4-1.png" class="center-block img-responsive" /> <span style="display:block; padding-top: 20px;"><b><? print($l->_l('4-list-1'));?></b></span> </div>
									<div class="block-center small-block-center hide-xs hide-sm"> <img src="http://wp-test.in/wp-content/themes/luxtour-agents/img/ico-4-s.png" class="center-block img-responsive " /> </div>
									<div class="block-center"> <img src="http://wp-test.in/wp-content/themes/luxtour-agents/img/ico-4-2.png" class="center-block img-responsive" /> <span style="display:block; padding-top: 20px;"><b><? print($l->_l('4-list-2'));?></b></span> </div>
									<div class="block-center small-block-center hide-xs hide-sm"> <img src="http://wp-test.in/wp-content/themes/luxtour-agents/img/ico-4-s.png" class="center-block img-responsive" /> </div>
									<div class="block-center"> <img src="http://wp-test.in/wp-content/themes/luxtour-agents/img/ico-4-3.png" class="center-block img-responsive" /> <span style="display:block; padding-top: 20px;"><b><? print($l->_l('4-list-3'));?></b></span> </div>
									<div class="block-center small-block-center hide-xs hide-sm"> <img src="http://wp-test.in/wp-content/themes/luxtour-agents/img/ico-4-s.png" class="center-block img-responsive" /> </div>
									<div class="block-center"> <img src="http://wp-test.in/wp-content/themes/luxtour-agents/img/ico-4-4.png" class="center-block img-responsive" /> <span style="display:block; padding-top: 20px;"><b><? print($l->_l('4-list-4'));?></b></span> </div>
								</div>
							</div>
						</div>
						<div class="row" style="position:absolute; bottom: 0px; width: 100%;">
							<div class="row text-center" style="margin-top: 60px;">
								<div class="col-xs-12" style="font-size: 63px; color: #FFF;"> <b><? print($l->_l('4-text'));?></b> </div>
								<div class="col-xs-12" style="margin-top: 30px;">
									<center>
										<a class="btn btn-raised" style="
                            width: 35%;
                            height: 70px;
                            text-align: center;
                            padding-top: 18px;
                            font-size: 22px;
                            background-color: rgba(0,0,0,0.1);
                            border: 3px solid white;
                            border-radius: 10px;
                            color: white;"> <b><? print($l->_l('4-btn'));?></b> </a>
									</center>
								</div>
							</div>
						</div>
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
							<div class="col-xs-6 col-sm-5 col-md-4 col-lg-3" style="position: absolute; bottom: 50px; text-align: left;"> <span class="text-34">Контакти</span>
								<br /> <span><i class="glyphicon glyphicon-earphone"  area-hidden="true"></i> +3-800-000-00-00</span>
								<br /> <span><i class="glyphicon glyphicon-envelope"  area-hidden="true"></i> info@luxtour.online</span>
								<br /> <address>
					1355 Market Street, Suite 900<br>
					San Francisco, CA 94103<br>
				</address> </div>
							<div class="col-sm-4 col-sm-push-6 col-md-3 col-md-push-6">
								<div id="five-form">
									<form>
										<div class="form-group">
											<label for="back-fullname">Full name</label>
											<input type="text" class="form-control" id="back-fullname" placeholder="Oleg Timofeev"> </div>
										<div class="form-group">
											<label for="back-email">Email</label>
											<input type="email" class="form-control" id="back-email" placeholder="info@luxtour.online"> </div>


										<button type="submit" class="btn btn-default">Submit</button>
									</form>
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
				<script type="text/javascript" src="http://wp-test.in/wp-content/themes/luxtour-agents/js/landing-parallax.js"></script>
				<? get_footer(); ?>


				<!-- Modal windows -->


		<!-- end modal -->
