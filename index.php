<?php
require "config.php";

require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

$app->get("/elber/", function () use ($app) {
	printf("Hello world.");
});

$app->get("/", function () use ($app) {
	get_header();

	require_once "templates/dashboard.php";

	get_footer();
});

$app->get("/question/", function () use ($app) {

	$con = mysqli_connect("localhost", "root", "", "enem");

	$query = mysqli_query($con, "SELECT questions.* FROM exams
		INNER JOIN exams_has_questions ON exams.id = exams_has_questions.exams_id
		INNER JOIN questions ON exams_has_questions.questions_id = questions.id
		WHERE exams.id = 1;");

	$questions = array();

	while ($row = mysqli_fetch_object($query)) {
		foreach ($row as $key => $value)
			if (is_string($value))
				$row->$key = utf8_encode($value);

		$questions[] = $row;
	}

	sleep(1);
	echo json_encode($questions);

})->name("hello");

$app->post("/results/", function () use ($app) {

	$con = mysqli_connect("localhost", "root", "", "enem");

	$query = mysqli_query("INSERT INTO results ()"); // should be continued

});

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
