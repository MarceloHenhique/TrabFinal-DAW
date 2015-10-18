<!DOCTYPE html>
<html ng-app="enemApp">
<head>
	<title></title>

	<script src="../angular.min.js"></script>
	<script type="text/javascript">
	var app = angular.module("enemApp", []);

	app.factory("questionService", function ($http) {
		var questionService = (function () {
			return {
				list: [],
				getList: function () {
					var self = this;

					$http.get("../questoes/").success(function (response) {
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

		this.list = function () {
			return this.questionService.list;
		};

		this.fqnQuestion = function ($ngscope, opt) {
			return $ngscope["question"]["alternativa_" + opt];
		};
	}]);
	</script>
</head>
<body>
	<div ng-controller="questionController as questionCtrl">
		<div ng-repeat="question in questionCtrl.list()">
			<div>
				<p><strong>#{{ $index + 1 }}</strong> - {{ question.enunciado }}</p>

				<div ng-repeat="opt in ['a', 'b', 'c', 'd']">
					<input  id="{{ $parent.$index }}-{{ opt }}" type="radio" name="{{ $parent.$index }}" />
					<label for="{{ $parent.$index }}-{{ opt }}">{{ questionCtrl.fqnQuestion(this, opt) }}</label>
				</div>
			</div>
		</div>
	</div>
</body>
</html>