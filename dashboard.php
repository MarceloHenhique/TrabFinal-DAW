<!DOCTYPE html>
<html ng-app="enemApp">
<head>
	<title></title>

	<meta charset="utf-8" />

	<!--
		Google Fonts		
	-->
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,500italic,500,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" type="text/css" href="assets/vendor/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/vendor/css/reset.css" />

	<link rel="stylesheet" type="text/css" href="assets/css/dash.css" />

	<script src="assets/vendor/js/angular.min.js"></script>
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
	<script src="build/js/app.min.js"></script>
</body>
</html>