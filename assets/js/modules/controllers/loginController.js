app.controller('loginController', ['$scope', function($scope) {
    this.master = [];

    this.update = function(user) {
      this.master.push(angular.copy(user));
    };

    this.reset = function() {
      $scope.user = {};
    };

    this.log = function(user) {
      $http.post("/user/" + user.login + "/" + user.pssw, data).success(function (response) {
        alert("Esse usuario existe");
      }).error(this.defaultErrorCallback);
    }

    this.reset();
  }]);
