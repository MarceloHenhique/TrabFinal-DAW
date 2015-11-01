app.factory("questionService", ["$http", function ($http) {
	var questionService = (function () {
		return {
			defaultErrorCallback: function (response) {
				document.write(response);
			},
			getList: function (callback) {
				$http.get("/question/").success(function (response) {
					callback(response);
				}).error(this.defaultErrorCallback);
			},
			sendAnswers: function (data, callback) {
				$http.post("/results/", data).success(function (response) {
					callback(response);
				}).error(this.defaultErrorCallback);
			}
		};
	})();

	return questionService;
}]);
