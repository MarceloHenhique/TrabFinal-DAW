<?php
require "config.php";

require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$con = ConnectionFactory::getConnection();

$app = new \Slim\Slim();

require "routes/gets.php";
require "routes/posts.php";
require "routes/puts.php";
require "routes/deletes.php";

/* generic route to solve templates folder */
$app->get("/.*", function () use ($app) {
	try {
		$url = str_replace(".", "", $app->request->getResourceUri());

		if ($url[strlen($url) - 1] == "/")
			$url = substr($url, 0, strlen($url) - 1);

		get_header();

		include_once "templates$url.php";

		get_footer();
	} catch (Exception $err) {
		$app->notFound();
	}
});

$app->run();
?>
