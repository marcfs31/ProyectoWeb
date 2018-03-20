<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kram password manager</title>

    <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>

    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body ng-app="App">

<div ng-controller="AddAccController">

    <!-- Content Section -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>KRAM</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#add_new_acc_modal">Add account</button>
                </div>
                <div class="pull-right">
                    <button class="btn btn-primary" onclick="location.href='index.html'">Logout</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Accounts</h3>
                <table ng-if="accs.length > 0" class="table table-bordered table-responsive table-striped">
                    <tr>
                        <th>No</th>
                        <th>Account name</th>
                        <th>Account description</th>
                        <th>Account username</th>
                        <th>Account password</th>
                        <th>Action</th>
                    </tr>
                    <tr ng-repeat="acc in accs">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ acc.acc_name }}</td>
                        <td>{{ acc.acc_desc }}</td>
                        <td>{{ acc.acc_user }}</td>
                        <td>
                            <span ng-show="toggle">{{acc.acc_passwd}}</span>
	                        <button id="toggleMessage" class="btn btn-primary btn-xs" ng-click="toggle=!toggle">
                                {{toggle ? 'Hide' : 'Show'}}
                            </button>
                        </td>
                        <td>
                            <button ng-click="edit($index)"  class="btn btn-primary btn-xs">Edit</button>
                            <button ng-click="delete($index)" class="btn btn-danger btn-xs">Delete</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!-- /Content Section -->

    <!-- Bootstrap Modals -->
    <!-- Modal - Add New acc -->
    <div class="modal fade" id="add_new_acc_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add account</h4>
                </div>
                <div class="modal-body">

                    <ul class="alert alert-danger" ng-if="errors.length > 0">
                        <li ng-repeat="error in errors">
                            {{ error }}
                        </li>
                    </ul>

                    <div class="form-group">
                        <label for="acc_name">Account name</label>
                        <input ng-model="acc.acc_name" type="text" id="acc_name" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="acc_desc">Account description</label>
                        <textarea ng-model="acc.acc_desc" class="form-control" name="acc_desc"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="acc_user">Account username</label>
                        <input ng-model="acc.acc_user" type="text" id="acc_user" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="acc_passwd">Account password</label>
                        <input ng-model="acc.acc_passwd" type="password" id="acc_passwd" class="form-control"/>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" ng-click="addAcc()">Add Account</button>
                </div>
            </div>
        </div>
    </div>
    <!-- // Modal -->

    <!-- Modal - Update acc -->
    <div class="modal fade" id="modal_update_acc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Account details</h4>
                </div>
                <div class="modal-body">

                    <ul class="alert alert-danger" ng-if="errors.length > 0">
                        <li ng-repeat="error in errors">
                            {{ error }}
                        </li>
                    </ul>

                    <div class="form-group">
                        <label for="acc_name">Account name</label>
                        <input ng-model="acc_details.acc_name" type="text" id="acc_name1" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="acc_desc">Account description</label>
                        <textarea ng-model="acc_details.acc_desc" class="form-control" name="acc_desc"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="acc_user">Account username</label>
                        <input ng-model="acc_details.acc_user" type="text" id="acc_user1" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="acc_passwd">Account password</label>
                        <input ng-model="acc_details.acc_passwd" type="password" id="acc_passwd1" class="form-control"/>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" ng-click="updateAcc()">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- // Modal -->
</div>

<!-- Jquery JS file -->
<script type="text/javascript" src="lib/jquery-1.11.3.min.js"></script>

<!-- AngularJS file -->
<script type="text/javascript" src="lib/angular.min.js"></script>

<!-- Bootstrap JS file -->
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

<!-- Custom JS file -->
<script type="text/javascript" src="lib/app.js"></script>
</body>
<a id="github" target="_blank" href="https://github.com/marcfs31/ProyectoWeb">
<img src="img/github.png" alt="Go to my github">
</a>
</html>
