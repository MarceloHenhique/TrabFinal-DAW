<?php

?>
<article role="complementary" class="row exams-create">
  <div class="col-xs-offset-2 col-xs-8" ng-controller="subjectsController as sbjCtrl">
    <form novalidate ng-submit="">
      <select ng-model="the_subject">
        <option value="0" disabled>-- SELECIONE --</option>
        <option value="{{ subject.id }}" ng-repeat="subject in sbjCtrl.subjects">{{ subject.nome }}</option>
      </select>
      <select ng-repeat="subject in sbjCtrl.subjects" ng-show="the_subject == subject.id" ng-model="sbjCtrl.topics[subject.id]" ng-attr-size="{{ subject.topicos.length }}" multiple>
        <option ng-value="{{ topic.id }}" ng-repeat="topic in subject.topicos">{{ topic.nome }}</option>
      </select>
      <input type="submit" value="Criar Simulado" />
    </form>
    {{ sbjCtrl.topics | json }}
  </div>
</article>
