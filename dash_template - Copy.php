<?php
/**
 * Template Name: dash_template
 */

get_header();
?>


<div class="container-fluid" id="image-wall">

</div><!-- nav-justified -->

<div class="container panel" id="work-area" style="height: 96px;">


    <ul class="nav nav-tabs" style="margin-bottom: 15px;" id="main-tabs-panel">
        <li class=""><a href="#statistic" data-toggle="tab">Home</a></li>
        <li class="active"><a href="#order" data-toggle="tab">Profile</a></li>
        <li><a href="#more" data-toggle="tab">More</a></li>
        <li><a href="#moreToo" data-toggle="tab">More Too </a></li>
    </ul>
</div>
<div class="container"  ng-app="tourApp">
    <div id="myTabContent" class="tab-content">
    <div class="tab-pane fade" id="statistic">
        <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
    </div>

    <div class="tab-pane fade in active" id="order" ng-controller="tourController"> <!-- order tab -->

    <!-- Help text -->

    <center ><h1>Оформити тур</h1></center>
    <center>заповните форму для замовлення тура</center>
    <!-- end help text -->


        <div class="row">
        
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
                <!-- -->
                <div class="panel padding-24" ng-click="ActivatePanel()">

                <center class="main-text"><h4>Форми для гостей</h4></center>

                <!-- -->
                <!-- count guests -->


                <div class="form-group label-floating margin-top-72">
                    <label class="control-label" for="form-count">Кількість гостей</label>
                    <input class="form-control pull-margin-top" value="2" id="form-count" type="number" name="form_customers_count" ng-model="customers_count" min="1" ng-change="ChangeCustomersCount()">
                </div><!-- end peron passport -->
                <!-- end count -->

                <ul class="nav nav-tabs" style="margin-bottom: 15px; margin-top: 16px;" id="person-tabs-panel"> <!-- person tabs -->
                    <!-- <li  ng-repeat="i in NumberToArray(customers_count) track by $index"><a href="#person-{{i}}" data-toggle="tab">name</a></li> -->
                    <li ng-class="{active: $first}" ng-repeat="cust in customers">
                        <a href="#{{ cust.id }}" data-toggle="tab">{{cust.fullname == '' ? cust.id : cust.fullname | limitTo:10}}</a>
                    </li>
                </ul>
                <div  id="person-tab-content" class="tab-content">
                    <div ng-repeat="cust in customers" class="tab-pane fade" ng-class="{active: $first, in:$first}" id="{{ cust.id }}">
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="form-fullname" >ПІБ</label>
                                    <input class="form-control" id="form-fullname" type="text" ng-model="cust.fullname">
                                </div><!-- end peron fio -->

                            </div>
                            <div class="col-xs-4">
                                <div class="form-group label-floating">
                                  <div class="checkbox">
                                  <label>
                                    Це дитина <input type="checkbox" ng-model="cust.isChild"> 
                                  </label>
                                  </div>
                                </div><!-- end peron fio -->
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="form-passport">Passport</label>
                                    <input class="form-control" id="form-passport" type="text" ng-model="cust.passport" ng-disabled="cust.isChild">
                                </div><!-- end peron passport -->
                            </div><!-- end col -->
                            <div class="col-xs-12 col-sm-12 col-md-6 col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="form-inn">INN</label>
                                    <input class="form-control" id="form-inn" type="text" ng-model="cust.inn" ng-disabled="cust.isChild">
                                </div><!-- end peron passport -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="form-phone">Мобільний номер</label>
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
            
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                <!-- -->                
                <div class="panel padding-24">
                <center class="main-text" ><h4 >Готельна форма</h4></center>

                <div class="input-group">
                    <label for="form_select_tour" class="main-text text-16 control-label">Тури</label>
                    <select id="form_select_tour" class="form-control pull-margin-top" name="form_select_tour"
                         ng-model="selected_tour" ng-options="tour as tour.title for tour in tours" required>
                    </select>
                    <span class="input-group-addon" ><i class="material-icons">keyboard_arrow_down</i></span>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="form_select_hotel" class="main-text text-16 control-label">Готелі</label>
                        <select id="form_select_hotel" class="form-control pull-margin-top" name="form_select_hotel" 
                        ng-options="hotel as hotel.title for hotel in selected_tour.hotels" ng-model="selected_hotel" required>  
                        </select>
                    </div> <!-- end of col -->
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="form_select_apartments" class="main-text control-label text-16">Апартаменти</label>
                        <select id="form_select_apartments" class="form-control pull-margin-top" name="form_select_apartments" 
                        ng-options="apartments as apartments.title  disable when apartments.active == 'disabled' for apartments in selected_hotel.apartments" ng-model="selected_apartments"  required> 
                        </select>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->

                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <input type="text"  data-min-date="today" class="form-control" ng-model="date_from" data-max-date="{{date_until}}" placeholder="From" bs-datepicker>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <input type="text" class="form-control" ng-model="date_until" data-min-date="{{date_from}}" placeholder="Until" bs-datepicker>   
                    </div>
                </div>

                <div class="row margin-top-40">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-6">
                        Total days: {{set_days_count(date_from, date_until)}}
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-6">
                        Total price: {{selected_apartments.price * customers_count * days_count / 7 | number : 2}} <br />



                    </div>
                </div>
                <div class="row margin-top-40">
                    <div class="col-xs-4">
                        <center><a data-toggle="modal" data-target="#dialog-clear" class="btn btn-danger btn-lg">Clear</a></center>
                    </div>
                    <div class="col-xs-8">
                        <center><a data-toggle="modal" data-target="#dialog-confirm" class="btn btn-success btn-lg">Confirm</a></center>
                    </div>
                </div>

                <!-- Modal windows -->

                <div id="dialog-clear" class="modal fade" tabindex="-1" style="display:none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                <h4>Очстити фому?</h4>
                            </div>
                            <div class="modal-body">
                                <p>Це призведе до повної очистки форми з неможливістю повернення данних.</p>      
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Dismiss</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal" ng-click="ClearForm()">Clear</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="dialog-confirm" class="modal fade" tabindex="-1" style="display:none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                <h4>Підтвердження</h4>
                            </div>
                            <div class="modal-body">
                                <p>Кількість людей: {{customers_count}}</p>
                                <p>Обраний тур: {{selected_tour.title}}</p>
                                <p>Готель: {{selected_hotel.title}}</p>
                                <p>Апартаменти: {{selected_apartments.title}}</p>
                                <p>Дата виїзду: {{date_from | date:'yyyy-MM-dd'}}</p>
                                <p>Дата приїзду: {{date_until | date:'yyyy-MM-dd'}}</p>
                                <p>Всього днів: {{set_days_count(date_from, date_until)}}</p>

                                <p>До оплати: {{selected_apartments.price * customers_count * days_count / 7 | number : 2}}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Dismiss</button>
                                <button type="button" class="btn btn-success btn-lg" data-dismiss="modal" ng-click="Confirm()">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal widnows -->

            </div>

            </div><!-- end col -->

        </div> <!-- end of row -->

        <!-- hotel and tour info -->

        <div class="row padding-24 text-center">
            <dv class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <h2>Tour info</h2>
                {{selected_tour.description}}
            </dv>

            <dv class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <h2>hotel info</h2>
                {{selected_hotel.description}}
            </dv>

            <dv class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <h2>Apartments info</h2>
                {{selected_apartments.description}}
            </dv>
        </div>



    </div><!-- end of order tab -->
    <div class="tab-pane fade" id="more">
        <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</p>
    </div>
    <div class="tab-pane fade" id="moreToo">
        <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater.</p>
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



<!-- end modal dialogs -->

<?
get_footer();
?>

<!-- Scripts area -->

