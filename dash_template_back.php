<?php
/**
 * Template Name: dash_template
 */

get_header();
?>

<div id="header-back">
    <div class='containder-fluid'>
        <div class="row">
            <div class="col-xs-2 col-xs-push-1">

            </div>
            <div class="col-xs-5">

            </div>
            <div class="col-xs-4">

            </div>
        </div>
    </div>
</div>
<div id="main-work-area" class="card container" ng-app="work_app">

    <img id="photo" src="http://placehold.it/96x96/cccccc" class='img-fluid img-circle' />




<!-- Nav tabs -->
<ul class="nav nav-tabs tabs-3 indigo" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#panel5" role="tab"><i class="fa fa-user"></i> Profile</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#panel6" role="tab"><i class="fa fa-heart"></i> Follow</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fa fa-envelope"></i> Mail</a>
    </li>
</ul>

<!-- Tab panels -->
<div class="tab-content">

    <!--Panel 1-->
    <div class="tab-pane fade in active" id="panel5" role="tabpanel">
        <br>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione porro voluptate odit minima.</p>

    </div>
    <!--/.Panel 1-->

    <!--Panel 2-->
    <div class="tab-pane fade" id="panel6" role="tabpanel">
        <br>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione porro voluptate odit minima.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione porro voluptate odit minima.</p>

    </div>
    <!--/.Panel 2-->

    <!--Panel 3-->
    <div class="tab-pane fade" id="panel7" role="tabpanel">
        <br>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione porro voluptate odit minima.</p>

    </div>
    <!--/.Panel 3-->

</div>
</div>
<!--
</div>

    <div class="row">
        <div class="col-xs-3 col-sm-12 col-md-12 col-lg-12 m-b-r">

            <ul class="nav nav-pills nav-justified">
                <li><a data-toggle="pill" href="#home">Home</a></li>
                <li class="active"><a data-toggle="pill" href="#menu1">Menu 1</a></li>
                <li><a data-toggle="pill" href="#menu2">Menu 2</a></li>
                <li><a data-toggle="pill" href="#menu3">Menu 3</a></li>
            </ul>


        </div>

        <div class="col-xs-9 col-sm-12 col-md-12 col-lg-12 top-20">
            <div class="tab-content">
                <div id="home" class="tab-pane fade" > <!-- Main user tab Charts area -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" ng-controller="chart1-ctrl">
                            <canvas id="line" class="chart chart-line ng-isolate-scope" chart-data="data"
                                chart-labels="labels" chart-series="series" chart-options="options"
                                chart-dataset-override="datasetOverride" chart-click="onClick"

                            </canvas>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" ng-controller="chart2-ctrl" >
                            <canvas id="doughnut" class="chart chart-doughnut"
                            chart-data="data" chart-labels="labels">
                            </canvas>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" ng-controller="chart3-ctrl">
                            <canvas id="bar" class="chart chart-bar"
                                chart-data="data" chart-labels="labels" chart-series="series" >
                            </canvas>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" ng-controller="chart4-ctrl">
                            <canvas id="base" class="chart-horizontal-bar"
                                chart-data="data" chart-labels="labels" >
                            </canvas>
                        </div>
                    </div>
                </div>
                <div id="menu1" class="tab-pane fade in active" >
                 <!-- Order tab -->
                    <div class="row" ng-controller="tabs">

                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                            <ul class="nav nav-pills nav-stacked" >
                               <li ng-repeat="tour in tours"><a href="#{{tour.id}}" data-toggle="tab" ng-click="set_selected_tour(tour)" >{{tour.title}}</a></li>
                            </ul>
                        </div>

                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 col-md-push-1 col-lg-push-1 tab-content">
                            <div ng-repeat="tour in tours" class="tab-pane fade" id="{{tour.id}}">
                                <div class="row">
                                <div class="col-xs-12">
                                    <div class="page-header">
                                        <h1>{{tour.title}} <small>{{tour.description}}</small></h1>
                                    </div>
                                </div>
                                </div>
                                <form>

                                <div class="row"> <!-- customers count -->
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="form_count">Guests count:</label>
                                            <input min="1" ng-model="customers_count" type="number" name="form_count" class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <div data-ng-repeat="i in getCustomersNumber(customers_count) track by $index"> <!-- for each customers -->
                                    <hr />
                                    <div class="row"> <!-- Name -->
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <label for="form_fullname">Full name:</label>
                                                <input type="text" class="form-control" name="form_fullname" id="form_fullname_{{i}}" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"> <!-- passport and inn -->
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="form_passport">Passport:</label>
                                                <input type="text" class="form-control" name="form_passport" id="form_passport_{{i}}" required/>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="form_passport">INN:</label>
                                                <input type="text" class="form-control" name="form_inn" id="form_inn_{{i}}" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"> <!-- phone and email -->
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="form_email">Email:</label>
                                                <input type="email" class="form-control" name="form_email" id="form_email_{{i}}" required/>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="form_phone">Phone number:</label>
                                                <input type="tel" class="form-control" name="form_phone" id="form_phone_{{i}}" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="row"> <!-- Hotel and apartments -->

                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label for="form_hotel">Hotel:</label>
                                                <select name="form_hotel" class="form-control" ng-options="h.title for h in selected_tour.hotels"
                                                    ng-model="selected_hotel" ng-change="update_hotel(h)" required></select>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label for="form_apartments">Apartments:</label>
                                                <select name="form_apartments" ng-model="selected_apartments" ng-options="a.title disable when a.active == 'disabled'
                                                for a in selected_hotel.apartments"  class="form-control" required></select>
                                            </div>
                                        </div>


                                </div>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <form class="inline-form">
                                                <div class="form-group">
                                                <label class="control-label"><i class="fa fa-calendar"></i> <i class="fa fa-arrows-h"></i> <i class="fa fa-calendar"></i> Date range</label>
                                                <input type="text"  data-min-date="today" class="form-control" ng-model="fromDate" data-max-date="{{untilDate}}" placeholder="From" bs-datepicker>
                                                </div>

                                                <div class="form-group">
                                                <input type="text" class="form-control" ng-model="untilDate" data-min-date="{{fromDate}}" placeholder="Until" bs-datepicker>
                                                </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="row"> <!-- Price and count -->
                                    <div class="col-xs-6">
                                        <spar>Total days: {{set_days_count(date_from, date_until)}}</span>
                                    </div>

                                    <div class="col-xs-6">
                                        <spar><h1>Total price: {{selected_apartments.price * customers_count * days_count / 7 | number : 2}}</h1></span>
                                    </div>
                                </div>

                                </form>

                            </div>
                        </div>
                    </div>




                </div>
                <div id="menu2" class="tab-pane fade">
                    <div class="row top-20">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-8 col-lg-9">
                                    <p>Incididunt aute in deserunt consequat voluptate commodo dolore enim. </p>
                                </div> <!-- end of col -->


                                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                                    <button type="button" class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Star
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Star
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Star
                                    </button>
                                </div> <!-- end of col -->
                            </div> <!-- end or row -->
                            <div class="row top-5">
                                <div class="col-xs-6 col-sm-6 col-md-8 col-lg-9">
                                    <p>Eu eu incididunt ex aliquip dolor aute ullamco incididunt Lorem.
                                    Tempor proident nulla ipsum non cupidatat minim tempor proident sint nisi amet laboris ullamco.
                                    Est consequat ea amet dolore sit excepteur proident.</p>
                                </div> <!-- end of col -->
                            </div> <!-- end or row -->
                        </div> <!-- end of col -->
                    </div> <!-- end or row -->

                    <div class="row top-20">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-8 col-lg-9">
                                    <p>Incididunt aute in deserunt consequat voluptate commodo dolore enim. </p>
                                </div> <!-- end of col -->


                                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                                    <button type="button" class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Star
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Star
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Star
                                    </button>
                                </div> <!-- end of col -->
                            </div> <!-- end or row -->
                            <div class="row top-5">
                                <div class="col-xs-6 col-sm-6 col-md-8 col-lg-9">
                                    <p>Eu eu incididunt ex aliquip dolor aute ullamco incididunt Lorem.
                                    Tempor proident nulla ipsum non cupidatat minim tempor proident sint nisi amet laboris ullamco.
                                    Est consequat ea amet dolore sit excepteur proident.</p>
                                </div> <!-- end of col -->
                            </div> <!-- end or row -->
                        </div> <!-- end of col -->
                    </div> <!-- end or row -->

                    <div class="row top-20">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-8 col-lg-9">
                                    <p>Incididunt aute in deserunt consequat voluptate commodo dolore enim. </p>
                                </div> <!-- end of col -->


                                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                                    <button type="button" class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Star
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Star
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Star
                                    </button>
                                </div> <!-- end of col -->
                            </div> <!-- end or row -->
                            <div class="row top-5">
                                <div class="col-xs-6 col-sm-6 col-md-8 col-lg-9">
                                    <p>Eu eu incididunt ex aliquip dolor aute ullamco incididunt Lorem.
                                    Tempor proident nulla ipsum non cupidatat minim tempor proident sint nisi amet laboris ullamco.
                                    Est consequat ea amet dolore sit excepteur proident.</p>
                                </div> <!-- end of col -->
                            </div> <!-- end or row -->
                        </div> <!-- end of col -->
                    </div> <!-- end or row -->

                    <div class="row top-20">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-8 col-lg-9">
                                    <p>Incididunt aute in deserunt consequat voluptate commodo dolore enim. </p>
                                </div> <!-- end of col -->


                                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                                    <button type="button" class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Star
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Star
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Star
                                    </button>
                                </div> <!-- end of col -->
                            </div> <!-- end or row -->
                            <div class="row top-5">
                                <div class="col-xs-6 col-sm-6 col-md-8 col-lg-9">
                                    <p>Eu eu incididunt ex aliquip dolor aute ullamco incididunt Lorem.
                                    Tempor proident nulla ipsum non cupidatat minim tempor proident sint nisi amet laboris ullamco.
                                    Est consequat ea amet dolore sit excepteur proident.</p>
                                </div> <!-- end of col -->
                            </div> <!-- end or row -->
                        </div> <!-- end of col -->
                    </div> <!-- end or row -->
                </div>
                <div id="menu3" class="tab-pane fade">
                    <h3>Menu 3</h3>
                    <p>Some content in menu 3.</p>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
-->
<?
get_footer();
?>

<!-- Scripts area -->

