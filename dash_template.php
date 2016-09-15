<?php
/**
 * Template Name: dash_template
 */


get_header();

$l->set_page("dash");

// $l->set_page("landing");
// $l->_l("key");
?>
<div ng-app="tourApp">

<div class="container-fluid panel" id="work-area" style="height: 64px; margin-top: 64px;" ng-controller="tabCtrl">

    <ul class="nav nav-tabs" style="margin-bottom: 15px;" id="main-tabs-panel">
        <li class=""><a href="#history" data-toggle="tab"  >
            <span class="glyphicon glyphicon-blackboard" area-hidden="true"></span>
            <span class="hidden-xs hidden-sm"> <?$l->_l('nav-1');?></span>
        </a></li>
        <li class="active"><a href="#order" data-toggle="tab">
            <span class="glyphicon glyphicon-briefcase" area-hidden="true"></span>
            <span class="hidden-xs hidden-sm"> <?$l->_l('nav-2');?></span>
        </a></li>
        <li><a href="#news" data-toggle="tab">
            <span class="glyphicon glyphicon-bookmark" area-hidden="true"></span>
            <span class="hidden-xs hidden-sm"> <?$l->_l('nav-3');?></span>
        </a></li>
        <li style="border: 0px;" ng-click="emitEvents()"><a href="#stats" data-toggle="tab" >
            <span class="glyphicon glyphicon-signal" area-hidden="true"></span>
            <span class="hidden-xs hidden-sm"> <?$l->_l('nav-4');?></span>
        </a></li>
    </ul>

</div>
<div class="container">
    <div id="myTabContent" class="tab-content" ng-controller="statCtrl">

    <div class="tab-pane fade" id="history">

        <center ><h1><?$l->_l('1-header');?></h1></center>

        <div class="container panel order-table" style="margin-top: 25px;">
            <table class="table table-hover">
                  <thead>
                        <tr>
                            <th>#</th>
                            <th><?$l->_l('1-t-1');?></th>
                            <th><?$l->_l('1-t-2');?></th>
                            <th><?$l->_l('1-t-3');?></th>
                            <th><?$l->_l('1-t-4');?></th>
                            <th><?$l->_l('1-t-5');?></th>
                            <th><?$l->_l('1-t-6');?></th>
                            <th><?$l->_l('1-t-7');?></th>
                            <th><?$l->_l('1-t-8');?></th>
                            <th><?$l->_l('1-t-9');?></th>
                        </tr>

                      </thead>
                      <tbody>
                          <tr ng-repeat-start="order in orders" ng-class="{info: order.status == 'in_process', danger: order.status == 'cancelled', success: order.status == 'success'}" ng-click="order.expanded = !order.expanded" >
                            <th>{{order.id}}</th>
                            <td>{{order.tour}}</td>
                            <td>{{order.hotel}}</td>
                            <td>{{order.apartments}}</td>
                            <td>{{order.date_from}}</td>
                            <td>{{order.date_until}}</td>
                            <td>{{order.customers_count}}</td>
                            <td>{{order.date_create | dateToISO | date:'MM/dd HH:mm'}}</td>
                            <td>{{order.date_confirm | dateToISO | date:'MM/dd HH:mm'}}</td>
                            <td>{{order.total_price}}</td>
                          </tr>
                          <tr ng-repeat-end ng-show="order.expanded" class="expand-table stop-hover">
                              <td colspan="10">
                              <table class="table">
                                <thead>
                                    <tr>
                                        <th><?$l->_l('2-l-ph-fullname');?></th>
                                        <th><?$l->_l('2-l-ph-passport');?></th>
                                        <th><?$l->_l('2-l-ph-number');?></th>
                                        <th><?$l->_l('2-l-ph-email');?></th>
                                        <th><?$l->_l('2-l-ph-tel');?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="customer in order.customers">
                                        <td>{{customer.fullname}}</td>
                                        <td>{{customer.passport}}</td>
                                        <td>{{customer.inn}}</td>
                                        <td>{{customer.email}}</td>
                                        <td>{{customer.tel}}</td>
                                    </tr>
                                </tbody>
                              </table>
                              </td>
                          </tr  >

                      </tbody>
            </table>
        </div>
    </div>

    <div class="tab-pane fade in active" id="order"  ng-controller="tourController"> <!-- order tab -->

    <!-- Help text -->

    <center ><h1><?$l->_l('2-header');?></h1></center>
    <center><?$l->_l('2-header-2');?></center>
    <!-- end help text -->


        <div class="row" style="margin-top: 25px;">

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
                <!-- -->
                <div class="padding-24 panel anim_panel_form" ng-class="{active: active_panel == 'left'}" ng-click="active_panel = 'left'"
                style="min-height: 630px;">

                <center class="main-text text-weight-400"><h3><?$l->_l('2-l-header');?></h3></center>

                <!-- -->
                <!-- count guests -->


                <div class="form-group label-floating margin-top-72">
                    <label class="control-label main-text text-16" for="form-count"><?$l->_l('2-l-g-c');?></label>
                    <input class="form-control pull-margin-top" value="2" id="form-count" type="number" name="form_customers_count" ng-model="customers_count" min="1" ng-change="ChangeCustomersCount()">
                </div><!-- end peron passport -->
                <!-- end count -->

                <ul class="nav nav-tabs" style="margin-bottom: 15px; margin-top: 16px;" id="person-tabs-panel"> <!-- person tabs -->
                    <!-- <li  ng-repeat="i in NumberToArray(customers_count) track by $index"><a href="#person-{{i}}" data-toggle="tab">name</a></li> -->
                    <li ng-class="{active: $first}" ng-repeat="cust in customers">
                        <a href="#{{ cust.id }}" data-toggle="tab">{{cust.fullname == '' ? GetTMPGuest() : cust.fullname | limitTo:10}}</a>
                    </li>
                </ul>
                <div  id="person-tab-content" class="tab-content">
                    <div ng-repeat="cust in customers" class="tab-pane fade" ng-class="{active: $first, in:$first}" id="{{ cust.id }}">
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="form-fullname" ><?$l->_l('2-l-ph-fullname');?></label>
                                    <input class="form-control" id="form-fullname" type="text" ng-model="cust.fullname">
                                </div><!-- end peron fio -->

                            </div>
                            <div class="col-xs-4">
                                <div class="form-group label-floating">
                                  <div class="checkbox">
                                  <label class="">
                                    <?$l->_l('2-l-ph-child');?> <input type="checkbox" ng-model="cust.isChild">
                                  </label>
                                  </div>
                                </div><!-- end peron fio -->
                            </div>
                        </div>

                        <div class="row" >
                            <div class="col-xs-12" style="margin-top: -25px">
                                <div class="input-group form-group">
                                <label class="control-label main-text text-weight-400 text-16" for="form_sex"><?$l->_l('2-l-ph-sex');?></label>
                                <select class="form-control" id="form_sex" ng-model="cust.sex">
                                    <option value="men"><?$l->_l('2-men');?></option>
                                    <option value="women"><?$l->_l('2-women');?></option>
                                </select>
                                <span class="input-group-addon" ><i class="material-icons">keyboard_arrow_down</i></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="form-passport"><?$l->_l('2-l-ph-passport');?></label>
                                    <input class="form-control" id="form-passport" type="text" ng-model="cust.passport" ng-disabled="cust.isChild">
                                </div><!-- end peron passport -->
                            </div><!-- end col -->
                            <div class="col-xs-12 col-sm-12 col-md-6 col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="form-inn"><?$l->_l('2-l-ph-number');?></label>
                                    <input class="form-control" id="form-inn" type="text" ng-model="cust.inn" ng-disabled="cust.isChild">
                                </div><!-- end peron passport -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="form-phone"><?$l->_l('2-l-ph-tel');?></label>
                                    <input class="form-control" id="form-phone" type="tel" ng-model="cust.tel" ng-disabled="cust.isChild">
                                </div><!-- end peron passport -->
                            </div><!-- end col -->
                            <div class="col-xs-12 col-sm-12 col-md-6 col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="form-email">Email</label>
                                    <input class="form-control" id="form-email" type="email" ng-model="cust.email" ng-disabled="cust.isChild">
                                </div><!-- end peron passport -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                    </div><!-- end preson content -->
                </div><!-- end of tab content -->
            </div><!-- end col -->
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >

                <!-- -->
                <div class="padding-24 panel anim_panel_form" ng-class="{active: active_panel == 'right'}" ng-click="active_panel = 'right'" style="min-height: 630px;">
                <center class="main-text text-weight-400" ><h3><?$l->_l('2-r-header');?></h3></center>

                <div class="input-group">
                    <label for="form_select_tour" class="main-text text-16 control-label"><?$l->_l('2-r-ph-tour');?></label>
                    <select id="form_select_tour" class="form-control pull-margin-top" name="form_select_tour"
                         ng-model="selected_tour" ng-options="tour as tour.title for tour in tours" required>
                    </select>
                    <span class="input-group-addon" ><i class="material-icons">keyboard_arrow_down</i></span>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="input-group">
                        <label for="form_select_hotel" class="main-text text-16 control-label"><?$l->_l('2-r-ph-hotel');?></label>
                        <select id="form_select_hotel" class="form-control pull-margin-top" name="form_select_hotel"
                        ng-options="hotel as hotel.title for hotel in selected_tour.hotels" ng-model="selected_hotel" required>
                        </select>
                        <span class="input-group-addon" ><i class="material-icons">keyboard_arrow_down</i></span>
                        </div>
                    </div> <!-- end of col -->
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="input-group">
                        <label for="form_select_apartments" class="main-text control-label text-16"><?$l->_l('2-r-ph-apart');?></label>
                        <select id="form_select_apartments" class="form-control pull-margin-top" name="form_select_apartments"
                        ng-options="apartments as apartments.title  disable when apartments.active == 'disabled' for apartments in selected_hotel.apartments" ng-model="selected_apartments"  required>
                        </select>
                        <span class="input-group-addon" ><i class="material-icons">keyboard_arrow_down</i></span>
                        </div>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->

                <div class="row">
                    <div class="col-xs-12">
                        <span class="main-text text-weight-400 text-16"><?$l->_l('2-r-ph-date');?></span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <input type="text"  data-min-date="today" class="form-control" ng-model="date_from" data-max-date="{{date_until}}" placeholder="<?$l->_l('2-r-ph-from');?>" bs-datepicker>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <input type="text" class="form-control" ng-model="date_until" data-min-date="{{date_from}}" placeholder="<?$l->_l('2-r-ph-until');?>" bs-datepicker>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <label for="form_comment" class="main-text control-label text-16"><?$l->_l('2-r-ph-comment');?></label>
                    </div>
                    <div class="col-xs-12">
                        <textarea type="text" name="form_comment" id="form_comment" ng-model="comment" ></textarea>
                    </div>
                </div>

                <div class="row margin-top-40">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-6 main-text text-16 text-weight-400">
                        <?$l->_l('2-r-ph-days');?>: {{set_days_count(date_from, date_until)}}
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-6 main-text text-16 text-weight-600">
                       <?$l->_l('2-r-ph-price');?>: {{selected_apartments.price * customers_count * days_count / 7 | number : 2}} <br />



                    </div>
                </div>
                <div class="row " style="margin-top: 60px;">
                    <div class="col-xs-4">
                        <center><a data-toggle="modal" data-target="#dialog-clear" class="btn btn-danger btn-lg"><?$l->_l('2-r-btn-clear');?></a></center>
                    </div>
                    <div class="col-xs-8">
                        <center><a data-toggle="modal" data-target="#dialog-confirm" ng-click="ConfirmForm()" class="btn btn-success btn-lg"><?$l->_l('2-r-btn-confirm');?></a></center>
                    </div>
                </div>



            </div>

            </div><!-- end col -->

        </div> <!-- end of row -->
        <!-- hotel and tour info -->

        <div class="row top-20">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" >
                <div class="panel panel-info move-up" ng-show="IsTour()">
                    <div class="panel-heading"><?$l->_l('2-tour-info');?></div>
                    <div class="panel-body">
                        {{selected_tour.description}}
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="panel panel-info move-up" ng-show="IsHotel()">
                    <div class="panel-heading"><?$l->_l('2-hotel-info');?></div>
                    <div class="panel-body">
                        {{selected_hotel.description}}
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4  move-up" ng-show="IsApartments()">
                <div class="panel panel-info">
                    <div class="panel-heading"><?$l->_l('2-apart-info');?></div>
                    <div class="panel-body">
                        {{selected_apartments.description}}
                    </div>
                </div>
            </div>
        </div>

                <!-- Modal windows -->

                <div id="dialog-clear" class="modal fade" tabindex="-1" style="display:none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                <h4><?$l->_l('m-clear-title');?></h4>
                            </div>
                            <div class="modal-body">
                                <p><?$l->_l('m-clear-text');?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><?$l->_l('m-clear-no');?></button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal" ng-click="ClearForm()"><?$l->_l('m-clear-yes');?></button>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="dialog-confirm" class="modal fade" tabindex="-1" style="display:none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                <h4><?$l->_l('m-confirm-title');?></h4>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped">
                                  <tbody>
                                    <tr ng-class="{'danger': errors.customers_count == true}">
                                      <th scope="row"><?$l->_l('m-confirm-count');?></th>
                                      <td>{{customers_count}}</td>
                                    </tr>
                                    <tr ng-class="{'danger': errors.tour == true}">
                                      <th scope="row"><?$l->_l('m-confirm-tour');?></th>
                                      <td>{{selected_tour.title}}</td>
                                    </tr>
                                    <tr ng-class="{'danger': errors.hotel == true}">
                                      <th scope="row"><?$l->_l('m-confirm-hotel');?></th>
                                      <td>{{selected_hotel.title}}</td>
                                    </tr>
                                    <tr ng-class="{'danger': errors.hotel == true}">
                                      <th scope="row"><?$l->_l('m-confirm-apart');?></th>
                                      <td>{{selected_apartments.title}}</td>
                                    </tr>
                                    <tr ng-class="{'danger': errors.date_from == true}">
                                      <th scope="row"><?$l->_l('m-confirm-from');?></th>
                                      <td>{{date_from | date:'yyyy-MM-dd'}}</td>
                                    </tr>
                                    <tr ng-class="{'danger': errors.date_until == true}">
                                      <th scope="row"><?$l->_l('m-confirm-until');?></th>
                                      <td>{{date_until | date:'yyyy-MM-dd'}}</td>
                                    </tr>
                                    <tr ng-class="{'danger': errors.days_count == true}">
                                      <th scope="row"><?$l->_l('m-confirm-days');?></th>
                                      <td>{{set_days_count(date_from, date_until)}}</td>
                                    </tr>
                                    <tr>
                                      <th scope="row"><?$l->_l('2-r-ph-price');?></th>
                                      <td>{{selected_apartments.price * customers_count * days_count / 7 | number : 2}}</td>
                                    </tr>
                                  </tbody>
                                </table>
                                 <div class="alert alert-dismissible alert-warning"  ng-show="errors.etc.length != 0">
                                  <h4><?$l->_l('m-confirm-error');?></h4>

                                  <p ng-repeat="error in errors.etc">{{error}}</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><?$l->_l('m-confirm-no');?></button>
                                <button type="button" class="btn btn-success btn-lg" ng-disabled="!isConfirm()" data-dismiss="modal" ng-click="sendData()"><?$l->_l('m-confirm-yes');?></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal widnows -->

    </div><!-- end of order tab -->


    <div class="tab-pane fade" id="news" ng-controller="newsCtrl">
            <center ><h1><?$l->_l('3-header');?></h1></center>

            <div class="container" style="margin-top: 25px;">


                <div class = "row">
                    <div class="col-sm-12 col-md-6 news-post" ng-repeat="post in posts_data">
                        <div class="panel padding-16"  style="margin-left:4px; margin-right: 4px;">
                        <div class="page-header"><h2>{{post.post_title}}</h2></div>
                        <div class="post-content">
                        {{post.post_content}}
                        </div>
                        </div>
                    </div>
                </div>
                <div class = "row">
					<img src = "<?echo get_template_directory_uri();?>/img/news_element.png" alt="more_news"  style="width: 50px;" class="img-circle center-block" ng-click="load_more();"/>
                </div>
            </div>

    </div>

    <div class="tab-pane fade" id="stats" ng-controller="chartCtrl">
            <center style="font-size: 36px;"><?$l->_l('4-header');?></center>

            <div class="container" style="margin-top: 15px">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="togglebutton" style="text-align: right;">
                          <label>
                            <span ng-class="{toggle_active: chart_id == 0}"><?$l->_l('4-general');?></span> <input style="margin-left: 20px;" type="checkbox" ng-click="chart_id == 0 ? chart_id = agent_id : chart_id = 0; updateCharts()"> <span ng-class="{toggle_active: chart_id != 0}"><?$l->_l('4-only-own');?></span>
                          </label>
							<!--
                          <label for="date_select">Час</label>
                          <select model="date" ng-click="updateCharts();">
                            <option value="0">За весь час</option>
                            <option value="30">За місяць</option>
                            <option value="7">За тиждень</option>
                          </select>

							-->
                        </div>
                    </div>

                </div>
                <div class="row ">
					<div class="col-xs-12 main-text text-24" style="margin-bottom: 15px;">
						<?$l->_l('4-orders');?>
					</div>
                    <div class="col-xs-12 " style="height: 400px; margin-bottom: 30px;">
                        <canvas id="orders_chart" class="chart chart-line panel" chart-data="orders_chart.data"
                        chart-labels="orders_chart.labels" chart-series="orders_chart.series" chart-options="orders_chart.options"
								style="height: 400px; width: 100%;">

                        </canvas>
                    </div>

                    <div class="col-sm-12 col-md-6 " >
						<span class="text-24 main-text" style="margin-bottom: 15px; display: block;"><?$l->_l('4-tour');?></span>
                        <canvas id="bar" class="chart chart-bar panel"
                            chart-data="tour_chart.data" chart-labels="tour_chart.labels" style="max-height: 500px;">
                        </canvas>
                    </div>

                    <div class="col-sm-12 col-md-6">
						<span class="text-24 main-text" style="margin-bottom: 15px; display: block;"><?$l->_l('4-hotel');?></span>
                        <canvas id="hotels_chart" class="chart chart-bar panel"
                            chart-data="hotels_chart.data" chart-labels="hotels_chart.labels"  style="max-height: 500px;">
                        </canvas>
                    </div>
					<div class="col-sm-12 col-md-4" style="">
						<span class="text-24 main-text" style="margin-bottom: 15px; display: block;"><?$l->_l('4-sex');?></span>
                        <canvas id="sex_stats" class="chart chart-doughnut panel"
                            chart-data="sex_chart.data" chart-labels="sex_chart.labels"  style="max-height: 500px;">
                        </canvas>
                    </div>
                    <div class="col-sm-12 col-md-8">
						<span class="text-24 main-text" style="margin-bottom: 15px; display: block;"><?$l->_l('4-apart');?></span>
                        <canvas id="apartments_chart" class="chart chart-bar panel"
                            chart-data="apartments_chart.data" chart-labels="apartments_chart.labels"  style="max-height: 500px;">
                        </canvas>
                    </div>
                </div>
            </div>

    </div>
    </div>

</div> <!-- end panel -->


<!-- modal dialogs -->

<div class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body…</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

</div>

<!-- end modal dialogs -->

<?
get_footer();
?>

<!-- Scripts area -->

