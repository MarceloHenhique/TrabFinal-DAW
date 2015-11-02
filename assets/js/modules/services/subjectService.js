app.factory("subjectService", ["$http", function ($http) {
  var subjectService = (function () {
    return {
      getSubjects: function (callback) {
        $http.get("/subjects/").success(function (response) {
          callback(response);
        });
      }
    };
  })();

  return subjectService;
}]);
