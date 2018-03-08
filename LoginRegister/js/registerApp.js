var angularLoginRegister = angular.module('app', []);
function registerController($scope, $http) {
      $scope.rsJSON = [ ];
      // Ocultamos los divs de Alertas
      $scope.correctLogin = true;
      $scope.errorLogin    = true;
      // obtenemos el evento submit del formulario ng-submit="entrar()"
      $scope.register = function() {
        checkUser($http,$scope);
      };
 }
  function checkUser($http,$scope){
    $http.post('login.php',{ username : $scope.txtUser , password : $scope.txtPasswd })
        .success(function(data) {
           // si no existe el usuario nos muestre un alerta de error
           if (typeof(data.user) == "undefined"){
             $scope.errorLogin = false;
             $scope.correctLogin = true;
             $scope.txtUser    = '';
             $scope.txtPasswd = '';
           }else{
             // si existe ya la hicimos y que nos ponga un mensaje de bienvenida
             $scope.rsJSON = data.user;
             $scope.correctLogin = false;
             $scope.errorLogin = true;
           }
        })
        .error(function(data) {
            console.log('Error: ' + data);
        });

  }
