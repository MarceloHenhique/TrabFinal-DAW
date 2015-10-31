app.controller("questionController", ["$scope", "$timeout", "questionService", function ($scope, $timeout, questionService) {
	this.questionService = questionService;
	this.current = 0;
	this.ans = [];
	this.end = false;

	this.list = function () {
		return this.questionService.list;
	};

	this.fqnQuestion = function ($ngscope, opt) {
		var the_statement = $ngscope["question"]["alternative_" + opt];

		if (the_statement == null || the_statement.length == 0)
			return false;

		return the_statement;
	};

	this.answer = function () {
			var _selector = sprintf("[name=in-question-%d]:checked", this.current),
			$child = $(_selector);

			if ($child.exists() == false)
				return alert("Please choose an option.");

			var _current = this.current;

			this.ans[_current] = $("[name=in-question-" + _current + "]:checked").val();

			this.current = -1;

			var self = this;
			$timeout(function () {
				//$scope.questionCtrl.current = _current + 1;
				self.current = _current + 1;

				if (self.current == self.questionService.list.length)
					self.processQuestions();
			}, 1000);

	};

	this.processQuestions = function () {
		var self = this;

		self.end = true;
		questionService.list.forEach(function (question, index) {
			if (question["answer"] == self.ans[index])
				console.log("Acerto.");
		});
	};

}]);
