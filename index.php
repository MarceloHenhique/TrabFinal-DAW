<?php
require "config.php";

require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$con = ConnectionFactory::getConnection();

$app = new \Slim\Slim();

$app->get("/elber/", function () use ($app) {
	printf("Hello world.");
});

$app->get("/", function () use ($app) {
	get_header();

	require_once "templates/dashboard.php";

	get_footer();
});

$app->get("/question/", function () use ($app, $con) {

	$app->response->headers->set("Content-Type", "application/json");

	$query = mysqli_query($con, "SELECT questions.* FROM exams
		INNER JOIN exams_has_questions ON exams.id = exams_has_questions.exams_id
		INNER JOIN questions ON exams_has_questions.questions_id = questions.id
		WHERE exams.id = 1;");

	$questions = array();

	while ($row = mysqli_fetch_object($query)) {
		validate_as_utf8($row);
		$questions[] = $row;
	}

	/* just for loading-bar purposes */
	sleep(1);

	echo json_encode($questions);

})->name("hello");

$app->post("/results/", function () use ($app, $con) {

	$app->response->headers->set("Content-Type", "text/plain");

	$body = $app->request->getBody();
	$data = json_decode($body);

	foreach ($data->questions as $question_id => $answer)
		$query = mysqli_query($con, "INSERT INTO results (users_id, exams_id, questions_id, answer) VALUES ('$data->user_id', '$data->exam_id', '$question_id', '$answer'); ");

	echo "success";

});

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
