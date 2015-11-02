<?php
$app->post("/results/", function () use ($app, $con) {

	$app->response->headers->set("Content-Type", "text/plain");

	$body = $app->request->getBody();
	$data = json_decode($body);

	foreach ($data->questions as $question_id => $answer)
		$query = mysqli_query($con, "INSERT INTO results (users_id, exams_id, questions_id, answer) VALUES ('$data->user_id', '$data->exam_id', '$question_id', '$answer'); ");

	echo "success";

});
?>
