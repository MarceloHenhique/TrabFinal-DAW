app = angular.module("enemApp", ["ngAnimate", "angular-loading-bar"]);

$.fn.exists = function () {
	return this.length > 0;
}

$(function () {
	console.log("Ready");
});
