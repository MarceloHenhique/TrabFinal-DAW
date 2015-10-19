<!DOCTYPE html>
<html ng-app="enemApp">
<head>
	<title></title>

	<!--
		Google Fonts		
	-->
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,500italic,500,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" type="text/css" href="assets/vendor/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/vendor/css/reset.css" />

	<link rel="stylesheet" type="text/css" href="assets/css/dash.css" />

	<script src="assets/vendor/js/angular.min.js"></script>
	<script type="text/javascript">
	var app = angular.module("enemApp", []);

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
	</script>
</head>
<body>
	<main role="main" class="container-fluid">
		<div class="row">
			<div class="col-xs-offset-3 col-xs-6" ng-controller="questionController as questionCtrl">
				<div ng-show="questionCtrl.end || questionCtrl.current == $index" ng-repeat="question in questionCtrl.list()" id="question-{{ $index }}">
					<div>
						<p><strong>#{{ $index + 1 }}</strong> - {{ question.enunciado }}</p>

						<div ng-repeat="opt in ['a', 'b', 'c', 'd']">
							<input value="{{ opt }}" id="{{ $parent.$index }}-{{ opt }}" type="radio" name="in-question-{{ $parent.$index }}" />
							<label for="{{ $parent.$index }}-{{ opt }}">{{ questionCtrl.fqnQuestion(this, opt) }}</label>
						</div>
					</div>
					<button ng-click="questionCtrl.answer()">Responder</button>
					<div ng-show="questionCtrl.end">
						<span class="success" ng-if="questionCtrl.ans[$index] == question.resposta">
							Você acertou.
						</span>
						<span class="error" ng-if="questionCtrl.ans[$index] != question.resposta">
							Você errou. Resposta: {{ question.resposta }}
						</span>
					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="http://code.jquery.com/jquery-latest.min.js"></script>

	<script src="assets/vendor/js/sprintf.js"></script>
	<script src="assets/js/app.js"></script>
</body>
</html>