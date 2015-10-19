app.controller("questionController", ["$scope", "questionService", function ($scope, questionService) {
	this.questionService = questionService;
	this.current = 0;
	this.ans = [];
	this.end = false;

	this.list = function () {
		return this.questionService.list;
	};

	this.fqnQuestion = function ($ngscope, opt) {
		return $ngscope["question"]["alternativa_" + opt];
	};
	
	this.answer = function () {
		with (this) {
			var _selector = sprintf("[name=in-question-%d]:checked", current),
			$child = $(_selector);

			if ($child.exists() == false)
				return alert("Please choose an option.");

			var _current = current;

			ans[_current] = $("[name=in-question-" + _current + "]:checked").val();

			current++;
			
			if (current == questionService.list.length)
				processQuestions();
		}
	};

	this.processQuestions = function () {
		this.end = true;
		with (this) {
			questionService.list.forEach(function (question, index) {
				if (question["resposta"] == ans[index])
					console.log("Acerto.");
			});
		}
	};
}]);