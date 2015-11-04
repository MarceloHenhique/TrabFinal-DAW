<div ng-controller="loginController as fCtrl">
  <form novalidate name="loginForm" ng-submit="">
    <p>Login:<br />
      <input type="text" name="login" ng-model="login" ng-init="login=''" required/>
      <span style="color:red" ng-show="loginForm.login.$dirty && loginForm.login.$invalid">
      <span ng-show="loginForm.login.$error.required">Username is required.</span>
    </p>
    <p> Password:<br />
      <input type="password" name="pssw" ng-model="pssw" ng-init="pssw=''" required/>
      <span style="color:red" ng-show="loginForm.pssw.$dirty && loginForm.pssw.$invalid">
      <span ng-show="loginForm.pssw.$error.required">Username is required.</span>
    </p>
    <button type="submit" ng-disabled="login.length == 0 || pssw.length == 0" ng-click="fCtrl.log(user)" />Logar</button>
    <br />
    <h1> {{ login.length }} </h1>
    <h1> {{ result }} </h1>
  </form>
</div>
