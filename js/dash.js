var tour = angular.module("tourApp", ["chart.js", "mgcrea.ngStrap", "ngAnimate", "ngMaterial"]);

tour.run(function($rootScope)
{
	$rootScope.baseUrl = "http://wp-test.in";
})

tour.config(function($datepickerProvider) {
    angular.extend($datepickerProvider.defaults, {
        dateFormat: 'dd/MM/yyyy',
        startWeek: 1,
        onHide: "",
        autoclose: '1',
        placement: 'auto'
    });
})



tour.filter('dateToISO', function() {
  return function(input) {
    if (input == null)
        return "";

    return new Date(input).toISOString();
  };
});

tour.controller("tabCtrl", function($scope, $rootScope)
{
    $scope.emitEvents = function()
    {
        console.log("click");
        $rootScope.$emit('call_chartUpdate', '');
    }
});

tour.controller("tourController", function($scope, $rootScope, $http, $mdToast)
{
    $scope.name = "Oleg Timofeev";

    $scope.customers_count = 2;

    $scope.tours = null;

    $scope.selected_tour = null;
    $scope.selected_hotel = null;
    $scope.selected_apartments = null;

    $scope.date_from;
    $scope.date_until;
    $scope.days_count = 0;

    $scope.comment = "";

    $scope.customers =
    [
        {id:0, fullname:"", isChild: false, sex:"", passport: "", inn: "", tel: "", email: ""},
        {id:1, fullname:"", isChild: false, sex:"", passport: "", inn: "", tel: "", email: ""},
    ]
    // Get tours from db

    $http.get($rootScope.baseUrl+'/wp-json/luxtour_api/v1/tours').success(function(data, status, headers, config) {
        $scope.tours = data;
        console.log("success");
    }).error(function(data, status, headers, config) {
        $scope.tours = array({ title: "Error" });
        console.log("error");
    });

    $scope.ChangeCustomersCount = function()
    {
        if ($scope.customers_count == $scope.customers.length)
        {
            return;
        }
        else if ($scope.customers_count > $scope.customers.length)
        {
            while($scope.customers_count > $scope.customers.length)
            {
                var c_id = $scope.customers.length;

                $scope.customers.push({id:c_id, fullname: "", isChild: false, sex: "", passport: "", inn: "", tel: "", email: ""});
            }
        }
        else
        {
            while($scope.customers_count < $scope.customers.length)
            {
                $scope.customers.pop();
            }
        }
    }

    $scope.set_days_count = function(date_from, date_until) {
        if (date_from == undefined || date_until == undefined)
            return 0;

        var one_day = 1000 * 60 * 60 * 24;       // Convert both dates to milliseconds
        var date1_ms = date_from.getTime();
        var date2_ms = date_until.getTime();      // Calculate the difference in milliseconds
        var difference_ms = date2_ms - date1_ms; // Convert back to days and return

        $scope.days_count = Math.round(difference_ms / one_day) + 1;

        return $scope.days_count;
    }

    $scope.NumberToArray = function ($number)
    {
        return new Array($number);
    }





    $scope.ClearForm = function()
    {
        $scope.selected_apartments = null;
        $scope.selected_tour = null;
        $scope.selected_hotel = null;

        $scope.customers =
        [
            {id:0, fullname:"", isChild: false, sex: "", passport: "", inn: "", tel: "", email: ""},
            {id:1, fullname:"", isChild: false, sex: "", passport: "", inn: "", tel: "", email: ""},
        ];

        $scope.customers_count = 2;

        $scope.date_from = null;
        $scope.date_until = null;
        $scope.days_count = 0;

        $scope.comment = "";
    }

    // Confirm

    $scope.errors = {guests: false, tour: false, hotel: false, apartments: false, date_from: false, date_until: false, days_count: false, price: false, etc:new Array()};

    $scope.ConfirmForm = function()
    {
        var e = {guests: false, tour: false, hotel: false, apartments: false, date_from: false, date_until: false, days_count: false, price: false, etc: new Array()};

        if ($scope.customers_count < 1 || !angular.isNumber($scope.customers_count))
            e.guests = true;

        if ($scope.selected_tour == null || !angular.isObject($scope.selected_tour))
            e.tour = true;

        if ($scope.selected_hotel == null || !angular.isObject($scope.selected_hotel))
            e.hotel = true;

        if($scope.selected_apartments == null || !angular.isObject($scope.selected_apartments))
            e.apartments = true;

        if($scope.date_from == undefined || $scope.date_from == null)
            e.date_from = true;

        if($scope.date_until == undefined || $scope.date_until == null)
            e.date_until = true;

        if ($scope.days_count == undefined || $scope.days_count == null || $scope.days_count < 0)
            e.days_count = true;

        if ($scope.customers_count < 1)
        {
            $scope.errors = e;
            return;
        }

        $scope.customers.forEach(function(item, i, arr)
        {
            if (item.fullname == "" || item.sex == "" || (!item.isChild && (item.passport == "" || item.inn == "" || (item.email == "" && item.tel == "") ) ) )
            {
                e.etc.push("Customer № " + (i + 1) + " error.");
            }

        });

        $scope.errors = e;
    }

    $scope.isConfirm = function()
    {
        var e = $scope.errors;

        if (e.selected_tour || e.customers_count || e.selected_hotel || e.selected_apartments || e.date_from || e.date_until || e.days_count || e.etc.length > 0)
            return false;
        return true;
    }


    // Post data

    $scope.sendData = function()
    {
        var $data = new Object();
        $data.hotel = $scope.selected_hotel.id;
        $data.apartments = $scope.selected_apartments.id;
        $data.tour = $scope.selected_tour.id;
        $data.customers = $scope.customers;
        $data.date_from = $scope.date_from;
        $data.date_until = $scope.date_until;
        $data.api_key = angular.element('#api_key').val();
        $data.comment = $scope.comment;

        var $data_json = angular.toJson($data);

		console.log('tour -- ', $rootScope.baseUrl+'/wp-json/luxtour_api/v1/add_order/');

        $http.put($rootScope.baseUrl+'/wp-json/luxtour_api/v1/add_order/', $data_json)
        .then(function(response)
        {
            $scope.ClearForm();

			$rootScope.$emit('call_dataUpdate', '');

            $mdToast.show(
              $mdToast.simple()
                .textContent('Success! Order-id: ' + response.data)
                .hideDelay(5000)
            );
        },
        function(response)
        {
            alert('error');
        });
    }

    // Animations

    $scope.active_panel = "left";


    $scope.GetTMPGuest = function()
    {
        return "New";
    }

    $scope.IsTour = function()
    {
        if ($scope.selected_tour == null || $scope.selected_tour == undefined)
            return false;
        return true;
    }

    $scope.IsHotel = function()
    {
        if ($scope.selected_hotel == null || $scope.selected_hotel == undefined)
            return false;

        return true;
    }

    $scope.IsApartments =function()
    {
        if ($scope.selected_apartments == null || $scope.selected_apartments == undefined)
            return false;

        return true;
    }


    // Authors

    $scope.GetAuthors = function()
    {
        return [
        {Name: "Oleg T. A.", Role: "js, html, css, php"},
        {Name: "Oleg T. A.", Role: "js, html, css, php"}
        ]
    }
});


tour.controller('newsCtrl', function($scope, $rootScope, $http)
{
    $scope.posts_data = [];

    $scope.start_page = 0;
    $scope.page_count = 4;

    $scope.update_news = function()
    {
		$scope.lang = angular.element('#current_lang').val();

		console.log($rootScope.baseUrl+'/wp-json/luxtour_api/v1/news/'+$scope.page_count + '/' + $scope.start_page + '/' +$scope.lang);

        $http.get($rootScope.baseUrl+'/wp-json/luxtour_api/v1/news/'+$scope.page_count + '/' + $scope.start_page + '/' +$scope.lang).success(function(data, status, headers, config) {
            data.forEach(function(post)
            {
                $scope.posts_data.push(post);
            });
        });
    };

    $scope.update_news();

    $scope.load_more = function()
    {
        $scope.start_page += $scope.page_count;
        $scope.update_news();
    }

});

tour.controller("statCtrl", function($scope, $rootScope, $http)
{
    $scope.orders = null;
    $scope.api_key = -1;


    angular.element(document).ready(function () {
        $scope.updateData();

	   $rootScope.$on('call_dataUpdate', function(event, args) {
			$scope.updateData();
        });
    });

    $scope.updateData = function()
    {
        $scope.api_key =angular.element('#api_key').val();

        $http.get($rootScope.baseUrl+'/wp-json/luxtour_api/v1/get_stats/' + $scope.api_key).success(function(data, status, headers, config) {
            $scope.orders = data;
            console.log("get stats");
        }).error(function(data, status, headers, config) {
            $scope.orders = array({ title: "Error" });
            console.log("error");
        });

    }
});

tour.config(['ChartJsProvider', function(ChartJsProvider) {
    // Configure all charts
    ChartJsProvider.setOptions({
        chartColors: ['#803690', '#00ADF9', '#DCDCDC', '#46BFBD', '#FDB45C', '#949FB1', '#4D5360'],
        responsive: true,
		maintainAspectRatio: false
    });
}]);

tour.controller("chartCtrl", function($scope, $rootScope, $http, $interval, $location)
{
    $scope.chart_id = 0;
    $scope.max_count = 0;

    $scope.date = 0;



    $scope.orders_chart = {
        labels : [],
        data : [],

    };

    $scope.sex_chart =
    {
        data: [],
        labels: ["men", "women"],
    };

    $scope.tour_chart = {data: [], labels: []};
    $scope.hotels_chart = {data: [], labels: []};
    $scope.apartments_chart = {data: [], labels: []};


    $scope.updateCharts = function()
    {
        //orders

        $http.get($rootScope.baseUrl+'/wp-json/luxtour_api/v1/statistics/orders/'+$scope.date+'/' + $scope.chart_id).success(function(data, status, headers, config) {

            // Load orders chart

            $scope.orders_chart.labels = new Array();
            $scope.orders_chart.data = new Array();

            data.forEach(function(item, i, arr)
            {
                $scope.orders_chart.data.push(item.count);
                $scope.orders_chart.labels.push(item.date);
            });
            //console.log($scope.orders_chart);

        });



        $http.get($rootScope.baseUrl+'/wp-json/luxtour_api/v1/statistics/sex/'+$scope.date+'/' + $scope.chart_id).success(function(data, status, headers, config){

            $scope.sex_chart.data = new Array();

            $scope.sex_chart.data.push(data.men);
            $scope.sex_chart.data.push(data.all - data.men);


        });



        $http.get($rootScope.baseUrl+'/wp-json/luxtour_api/v1/statistics/tours/0/' + $scope.chart_id).success(function(data, status, headers, config){
            $scope.tour_chart.data = new Array();
            $scope.tour_chart.labels = new Array();

            data.forEach(function(item)
            {
                $scope.tour_chart.data.push(item.count);
                $scope.tour_chart.labels.push(item.title);
            });


        });


        $http.get($rootScope.baseUrl+'/wp-json/luxtour_api/v1/statistics/hotels/0/' + $scope.chart_id).success(function(data, status, headers, config){
            $scope.hotels_chart.data = new Array();
            $scope.hotels_chart.labels = new Array();

            data.forEach(function(item)
            {
                $scope.hotels_chart.data.push(item.count);
                $scope.hotels_chart.labels.push(item.title);
            });


        });


        // apartments


        $http.get($rootScope.baseUrl+'/wp-json/luxtour_api/v1/statistics/apartments/0/' + $scope.chart_id).success(function(data, status, headers, config){
            $scope.apartments_chart.data = new Array();
            $scope.apartments_chart.labels = new Array();

            data.forEach(function(item)
            {
                $scope.apartments_chart.data.push(item.count);
                $scope.apartments_chart.labels.push((item.apartments_title + " (" + item.hotel_title + ")"));
            });


        });
    };



    $scope.isUpdated = false;

    // update on start
    angular.element(document).ready(function () {
    //    $scope.updateCharts();
       $rootScope.$on('call_chartUpdate', function(event, args) {
            if(!$scope.isUpdated)
            {
                $scope.updateCharts();
                $scope.isUpdated = true;
            }
        });
    });


});



