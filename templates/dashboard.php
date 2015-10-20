<main role="main" class="container-fluid hidden">
	<article role="complementary" class="row questions" ng-controller="questionController as questionCtrl">
		<div class="col-xs-offset-3 col-xs-6 container-questions animate-hide" ng-show="questionCtrl.questionService.ready == true">
			<div class="single-question animate-hide" ng-show="questionCtrl.end || questionCtrl.current == $index" ng-repeat="question in questionCtrl.list()" id="question-{{ $index }}">
				<div>
					<h1><strong>#{{ $index + 1 }}</strong> - {{ question.enunciado }}</h1>

					<div class="options" ng-repeat="opt in ['a', 'b', 'c', 'd']">
						<input value="{{ opt }}" id="{{ $parent.$index }}-{{ opt }}" type="radio" name="in-question-{{ $parent.$index }}" ng-disabled="questionCtrl.end" />
						<label data-letter="{{ opt }}" for="{{ $parent.$index }}-{{ opt }}">{{ questionCtrl.fqnQuestion(this, opt) }}</label>
					</div>
				</div>
				<button ng-hide="questionCtrl.end" ng-click="questionCtrl.answer()">Responder</button>
				<div class="results" ng-show="questionCtrl.end">
					<span class="success" ng-if="questionCtrl.ans[$index] == question.resposta">
						Você acertou.
					</span>
					<span class="error" ng-if="questionCtrl.ans[$index] != question.resposta">
						Você errou. Resposta: {{ question.resposta }}
					</span>
				</div>
			</div>
		</div>
	</article>
</main>