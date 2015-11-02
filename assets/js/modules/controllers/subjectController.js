app.controller("subjectsController", ["$scope", "subjectService", function ($scope, subjectService) {
  this.subjects = [];
  this.topics   = {};

  $scope.the_subject = "0";

  var self = this;

  subjectService.getSubjects(function (response) {
    self.subjects = response;
  });
}]);
