<?php
require "config.php";

require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$con = ConnectionFactory::getConnection();

$app = new \Slim\Slim();

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

$app->get("/stats/:examid/", function ($examid) use ($app, $con) {

	$app->response->headers->set("Content-Type", "text/plain");

	$handle = mysqli_query($con, "SELECT COUNT(*) AS Quantidade FROM exams
		INNER JOIN exams_has_questions ON exams.id = exams_has_questions.exams_id
    WHERE exams.id = $examid AND exams.users_id = 1;");

	$row = mysqli_fetch_array($handle);
	$count_total = $row["Quantidade"];

	$handle = mysqli_query($con, "SELECT COUNT(*) as Acertos FROM results
		INNER JOIN questions ON results.questions_id = questions.id
  	INNER JOIN topics ON questions.topics_id = topics.id
		WHERE results.answer = questions.answer AND results.users_id = 1 AND results.exams_id = $examid;");

	$row = mysqli_fetch_array($handle);
	$acertos = $row["Acertos"];

	printf("Questões totais: %d\nQuestões certas: %d\nTaxa de acerto: %.2f%%.", $count_total, $acertos, ($acertos * 100) / $count_total);

});

$app->get("/stats/:examid/:topicid/", function ($examid, $topicid) use ($app, $con) {

	$handle = mysqli_query($con, "SELECT COUNT(*) AS Quantidade FROM results
		INNER JOIN questions ON questions.id = results.questions_id
  	INNER JOIN topics ON topics.id = questions.topics_id
		WHERE questions.topics_id = $topicid AND results.users_id = 1 AND results.exams_id = $examid");

	$row = mysqli_fetch_array($handle);
	$count_total = $row["Quantidade"];

	$handle = mysqli_query($con, "SELECT subjects.name AS Materia, topics.description AS Topico, COUNT(*) AS Acertos FROM results
		INNER JOIN questions ON questions.id = results.questions_id
  	INNER JOIN topics ON topics.id = questions.topics_id
		INNER JOIN subjects ON subjects.id = topics.subjects_id
		WHERE questions.topics_id = $topicid AND results.answer = questions.answer AND results.users_id = 1 AND results.exams_id = $examid");

	$row = mysqli_fetch_array($handle);
	$acertos = $row["Acertos"];
	$materia = $row["Materia"];
	$topico  = $row["Topico"];

	printf("-- Acertos no tópico %s (Disciplina: %s) --\nQuestões totais: %d\nQuestões certas: %d\nTaxa de acerto: %.2f%%.", $topico, utf8_encode($materia), $count_total, $acertos, ($acertos * 100) / $count_total);

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
