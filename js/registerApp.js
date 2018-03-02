var angularTodo = angular.module('app', []);
function registerController($scope, $http) {
      $scope.rsJSON = [ ];
      // Ocultamos los divs de Alertas
      $scope.alertaLoginCorrecto = true;
      $scope.alertaLoginError    = true;
      // obtenemos el evento submit del formulario ng-submit="entrar()"
      $scope.register = function() {
        consultarUsuario($http,$scope);
      };
 }
  function consultarUsuario($http,$scope){
    $http.post('login.php',{ username : $scope.txtUsuario , contrasena : $scope.txtContrasena })
        .success(function(data) {
           // si no existe el usuario nos muestre un alerta de error
           if (typeof(data.usuario) == "undefined"){
             $scope.alertaLoginError = false;
             $scope.alertaLoginCorrecto = true;
             $scope.txtUsuario    = '';
             $scope.txtContrasena = '';
           }else{
             // si existe ya la hicimos y que nos ponga un mensaje de bienvenida
             $scope.rsJSON = data.usuario;
             $scope.alertaLoginCorrecto = false;
             $scope.alertaLoginError = true;
           }
        })
        .error(function(data) {
            console.log('Error: ' + data);
        });

  }
