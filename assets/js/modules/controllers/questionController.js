app.controller("questionController", ["$scope", "$timeout", "questionService", function ($scope, $timeout, questionService) {
	this.current = 0;
	this.ans = this.list = [];
	this.end = false;

	var self = this;

	this.validateQuestion = function ($ngscope, opt) {
		var the_statement = $ngscope["question"]["alternative_" + opt];

		if (the_statement == null || the_statement.length == 0)
			return false;

		return the_statement;
	};

	this.answer = function () {
			var _selector = sprintf("[name=in-question-%d]:checked", this.current);
			var $child 		= $(_selector);

			if ($child.exists() == false)
				return alert("Please choose an option.");

			var _current = this.current;

			this.ans[_current] = $child.val();
			this.current = -1;

			$timeout(function () {
				self.current = _current + 1;

				if (self.current == self.list.length)
					self.processQuestions();
			}, 1000);

	};

	this.processQuestions = function () {
		self.end = true;
		self.list.forEach(function (question, index) {
			if (question["answer"] == self.ans[index])
				console.log("Acerto.");
		});

		var _Data = {
			"user_id": 1,
			"exam_id": 11,
			"questions": {}
		};

		self.list.forEach(function (question, index) {
			var _obj = {};
			_obj[question["id"]] = self.ans[index];

			angular.extend(_Data.questions, _obj);
		});

		questionService.sendAnswers(_Data, function (response) {
			alert(response);
		});
	};

	questionService.getList(function (response) {
		self.ready = true;
		self.list  = response;
	});

}]);
