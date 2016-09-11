var tour = angular.module("tourApp", ["chart.js", "mgcrea.ngStrap"]);

tour.config(function($datepickerProvider) {
    angular.extend($datepickerProvider.defaults, {
        dateFormat: 'dd/MM/yyyy',
        startWeek: 1,
        onHide: "",
        autoclose: '1',
        placement: 'auto'
    });
})

tour.controller("tourController", function($scope, $http)
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


    $scope.customers =
    [
        {id:0, fullname:"", isChild: false, passport: "", inn: "", tel: "", email: ""},
        {id:1, fullname:"", isChild: false, passport: "", inn: "", tel: "", email: ""},
    ]
    // Get tours from db

    $http.get('http://wp-test.in/wp-json/luxtour_api/v1/tours').success(function(data, status, headers, config) {
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

                $scope.customers.push({id:c_id, fullname: "", isChild: false, passport: "", inn: "", tel: "", email: ""});
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

    $scope.GetAuthors = function()
    {
        return [
        {Name: "Oleg T. A.", Role: "js, html, css, php"},
        {Name: "Oleg T. A.", Role: "js, html, css, php"}
        ]
    }

    $scope.ConfirmForm = function()
    {
        var errors = new Array();

        return;
    }

    $scope.ClearForm = function()
    {
        console.log("Ololo");

        $scope.selected_apartments = null;
        $scope.selected_tour = null;
        $scope.selected_hotel = null;

        $scope.customers =
        [
            {id:0, fullname:"", isChild: false, passport: "", inn: "", tel: "", email: ""},
            {id:1, fullname:"", isChild: false, passport: "", inn: "", tel: "", email: ""},
        ];

        $scope.customers_count = 2;

        $scope.date_from = null;
        $scope.date_until = null;
        $scope.days_count = 0;
    }

    $scope.active_panel = "left";

    $scope.ActivatePanel = function($panel)
    {
        $scope.active_panel = $panel;
    }


    $scope.GetTMPGuest = function()
    {
        return "Гість";
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
});

var app = angular.module("work_app", ["chart.js", "mgcrea.ngStrap"]);

app.filter('split', function() {
    return function(input, splitChar, splitIndex) {
        // do some bounds checking here to ensure it has that index
        if (input == null)
            return;

        return input.split(splitChar)[splitIndex];
    }
});

app.config(function($datepickerProvider) {
    angular.extend($datepickerProvider.defaults, {
        dateFormat: 'dd/MM/yyyy',
        startWeek: 1,
        onHide: "update_total_days",
        autoclose: '1',
    });
})



app.controller("tabs", function($scope, $http) {
    $scope.tours = null;
    $scope.current_tour = null;
    $scope.customers_count = 2;

    $scope.total_days = 0;

    $scope.fromDate;
    $scope.untilDate;

    $scope.selected_tour = null;
    $scope.selected_hotel = null;
    $scope.selected_apartments = null;

    $scope.set_days_count = function(fromDate, untilDate) {
        if (fromDate == undefined || untilDate == undefined)
            return 0;

        var one_day = 1000 * 60 * 60 * 24; // Convert both dates to milliseconds
        var date1_ms = fromDate.getTime();
        var date2_ms = untilDate.getTime(); // Calculate the difference in milliseconds
        var difference_ms = date2_ms - date1_ms; // Convert back to days and return

        $scope.total_days = Math.round(difference_ms / one_day) + 1;

        return $scope.total_days;

        //return value * 2;
    }

    $scope.get_total_price = function() {
        $count = 0;

        if ($scope.selected_apartments != null)
            $count = Math.round($scope.selected_apartments.price * $scope.customers_count * $scope.total_days / 7)

        return $count;
    }

    $scope.set_selected_tour = function($tour) {
        $scope.selected_tour = $tour;
    }

    $scope.getCustomersNumber = function($count) {
        return new Array($count);
    }

    $http.get('http://wp-test.in/wp-json/luxtour_api/v1/tours').success(function(data, status, headers, config) {
        $scope.tours = data;
        console.log("success");
    }).error(function(data, status, headers, config) {
        $scope.tours = array({ title: "Error" });
        console.log("error");
    });
});

app.config(['ChartJsProvider', function(ChartJsProvider) {
    // Configure all charts
    ChartJsProvider.setOptions({
        chartColors: ['#803690', '#00ADF9', '#DCDCDC', '#46BFBD', '#FDB45C', '#949FB1', '#4D5360'],
        responsive: true
    });
    // Configure all line charts
    ChartJsProvider.setOptions('line', {
        showLines: true
    });
}]);




app.controller("chart1-ctrl", function($scope) {

    $scope.labels = ["January", "February", "March", "April", "May", "June", "July"];
    $scope.series = ['Series A', 'Series B'];
    $scope.data = [
        [65, 59, 80, 81, 56, 55, 40],
        [28, 48, 40, 19, 86, 27, 90]
    ];
    $scope.onClick = function(points, evt) {
        console.log(points, evt);
    };
    $scope.datasetOverride = [{ yAxisID: 'y-axis-1' }, { yAxisID: 'y-axis-2' }];
    $scope.options = {
        scales: {
            yAxes: [{
                id: 'y-axis-1',
                type: 'linear',
                display: true,
                position: 'left'
            }, {
                id: 'y-axis-2',
                type: 'linear',
                display: true,
                position: 'right'
            }]
        }
    };
});

app.controller("chart2-ctrl", function($scope) {
    $scope.labels = ["Download Sales", "In-Store Sales", "Mail-Order Sales"];
    $scope.data = [300, 500, 100];
});

app.controller("chart3-ctrl", function($scope) {
    $scope.labels = ["Download Sales", "In-Store Sales", "Mail-Order Sales"];
    $scope.data = [300, 500, 100];
});

app.controller("chart4-ctrl",
    function($scope) {
        $scope.labels = ['25.08.2016', '26.08.2016', '27.08.2016', '28.08.2016', '29.08.2016', '30.08.2016', '31.08.2016'];
        $scope.series = ['Series A', 'Series B'];

        $scope.data = [
            [65, 59, 80, 81, 56, 55, 40],
            [28, 48, 40, 19, 86, 27, 90]
        ];
    });

function get_day_diff(date1, date2) {
    console.log("I am here");

    if (undefined == date1 || undefined == date2)
        return 0;

    console.log("and now here");


}
