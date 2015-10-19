app.factory("questionService", function ($http) {
	var questionService = (function () {
		return {
			list: [],
			getList: function () {
				var self = this;

				$http.get("/question/").success(function (response) {
					self.list = response;
				});

				return self;
			},
			__init: function () {
				this.getList();
				return this;
			}
		}
	})();

	return questionService.__init();
});