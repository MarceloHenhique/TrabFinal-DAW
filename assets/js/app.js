app = angular.module("enemApp", []);

$.fn.exists = function () {
	return this.length > 0;
}

$(function () {
	$("main").show();
});