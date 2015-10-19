<?php
require "config.php";

require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

$app->get("/", function () use ($app) {
	get_header();

	require_once "templates/dashboard.php";

	get_footer();
});

$app->get("/question/", function () {

	$con = mysqli_connect("localhost", "root", "", "enem");

	$query = mysqli_query($con, "SELECT * FROM myTable LIMIT 0,3");

	$questions = array();

	while ($row = mysqli_fetch_object($query))
		$questions[] = $row;

	echo json_encode($questions);

})->name("hello");

$app->run();
?>