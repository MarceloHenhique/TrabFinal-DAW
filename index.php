<?php
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

$app->get('/consume(/)', function () use ($app) {
	echo file_get_contents("consume.php");
});

$app->get('/questoes/', function () use ($app) {
	$app->redirect($app->urlFor("hello"));
});

$app->get('/realpath/', function () {

	$con = mysqli_connect("localhost", "root", "", "enem");

	$query = mysqli_query($con, "SELECT * FROM myTable LIMIT 0,10");

	$questions = array();

	while ($row = mysqli_fetch_object($query))
		$questions[] = $row;

	echo json_encode($questions);

})->name("hello");

$app->run();
?>