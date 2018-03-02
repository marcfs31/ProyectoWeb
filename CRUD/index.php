<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AngularJS Task Application</title>

    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
    
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body ng-app="App">

<div ng-controller="TaskController">

    <!-- Content Section -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>AngularJS, Mysql CRUD </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <button class="btn btn-success" data-toggle="modal" data-target="#add_new_task_modal">Add Task
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Tasks:</h3>
                <table ng-if="tasks.length > 0" class="table table-bordered table-responsive table-striped">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    <tr ng-repeat="task in tasks">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ task.name }}</td>
                        <td>{{ task.description }}</td>
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
    <!-- Modal - Add New Task -->
    <div class="modal fade" id="add_new_task_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Task</h4>
                </div>
                <div class="modal-body">

                    <ul class="alert alert-danger" ng-if="errors.length > 0">
                        <li ng-repeat="error in errors">
                            {{ error }}
                        </li>
                    </ul>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input ng-model="task.name" type="text" id="name" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea ng-model="task.description" class="form-control" name="description"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" ng-click="addTask()">Add Task</button>
                </div>
            </div>
        </div>
    </div>
    <!-- // Modal -->

    <!-- Modal - Update Task -->
    <div class="modal fade" id="modal_update_task" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Task Details</h4>
                </div>
                <div class="modal-body">

                    <ul class="alert alert-danger" ng-if="errors.length > 0">
                        <li ng-repeat="error in errors">
                            {{ error }}
                        </li>
                    </ul>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input ng-model="task_details.name" type="text" id="name" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea ng-model="task_details.description" class="form-control" name="description"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" ng-click="updateTask()">Save Changes</button>
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
</html>
