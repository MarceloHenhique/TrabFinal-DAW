app = angular.module("enemApp", ["ngAnimate"]);

$.fn.exists = function () {
	return this.length > 0;
}

$(function () {
	$("main").slideDown(1000);
});