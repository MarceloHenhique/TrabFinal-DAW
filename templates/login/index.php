<div ng-controller="loginController as fCtrl">
  <form novalidate ng-submit="fCtrl.update(user)">
    Login: <input type="text" ng-model="user.email" /><br />
    Password <input type="password" ng-model="user.pssw" /><br />
    <button type="submit" ng-click="fCtrl.log(user)" />Logar</button>
  </form>
</div>
