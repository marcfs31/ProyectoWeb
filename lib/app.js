var app = angular.module('App', []);

app.controller('AddAccController', ['$scope', '$http', function ($scope, $http) {

    // List of acc
    $scope.accs = [];

    // acc Object
    $scope.acc = {};

    // acc Details
    $scope.acc_details = {};

    // Errors Array
    $scope.errors = [];

    // read records
    $scope.listAccs = function () {
        $http.get('script/list.php', {})
            .then(function success(e) {
                $scope.accs = e.data.accs;
            }, function error(e) {

            });
    };
    $scope.listAccs();

    // Add new acc
    $scope.addAcc = function () {
        $http.post('script/create.php', {
            acc: $scope.acc
        })
            .then(function success(e) {

                $scope.errors = [];

                $scope.accs.push(e.data.acc);

                var modal_element = angular.element('#add_new_acc_modal');
                modal_element.modal('hide');

            }, function error(e) {
                $scope.errors = e.data.errors;
            });
    };

    // open edit acc details popup
    $scope.edit = function (index) {
        $scope.acc_details = $scope.accs[index];
        var modal_element = angular.element('#modal_update_acc');
        modal_element.modal('show');
    };

    //Show password
    $scope.showPass = function () {
        $http.get('script/decrypt.php', {})
            .then(function success(e) {
                $scope.accs = e.data.accs;
            }, function error(e) {

            });
    };

    // update the acc
    $scope.updateAcc = function () {
        $http.post('script/update.php', {
            acc: $scope.acc_details
        })
            .then(function success(e) {

                $scope.errors = [];

                var modal_element = angular.element('#modal_update_acc');
                modal_element.modal('hide');

            }, function error(e) {
                $scope.errors = e.data.errors;
            });
    };

    // delete the acc
    $scope.delete = function (index) {

        var conf = confirm("Do you really want to delete the account?");

        if (conf == true) {
            $http.post('script/delete.php', {
                acc: $scope.accs[index]
            })
                .then(function success(e) {

                    $scope.errors = [];

                    $scope.accs.splice(index, 1);

                }, function error(e) {
                    $scope.errors = e.data.errors;
                });
        }
    };
}]);
