<div ng-controller="loginController as fCtrl">
  <form novalidate ng-submit="fCtrl.update(user)">
    Login: <input type="text" ng-model="user.login" /><br />
    Password <input type="password" ng-model="user.pssw" /><br />
    <button type="submit" ng-click="fCtrl.log(user)" />Logar</button>

    <h1> {{ result }} </h1> 
  </form>
</div>
