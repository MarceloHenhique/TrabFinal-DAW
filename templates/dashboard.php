
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