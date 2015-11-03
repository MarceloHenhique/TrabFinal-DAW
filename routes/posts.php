<?php

$app->post("/caduser/", function() use ($app, $con) {
	$app->response->headers->set("Content-Type", "text/plain");

	$body = $app->request->getBody();
	$data = json_decode($body);

	$query = mysqli_query($con, "INSERT INTO users (id, login, password, email, firstname, lastname, telephone, birthdate, cpf, rank) VALUES (
		'$data->user_id', '$data->login', '$data->pssw', '$data->email', '$data->fname', '$data->lname', '$data->tel', '$data->birthdate', '$data->cpf', '$data->rank'
	)");

	if(query == false) {
		die("Ops: " . mysqli_error($con));
	}

	echo "success" ;
});


$app->post("/results/", function () use ($app, $con) {
	$app->response->headers->set("Content-Type", "text/plain");

	$body = $app->request->getBody();
	$data = json_decode($body);

	foreach ($data->questions as $question_id => $answer) {
		$query = mysqli_query($con, "INSERT INTO results (users_id, exams_id, questions_id, answer) VALUES ('$data->user_id', '$data->exam_id', '$question_id', '$answer'); ");
		if ($query == false) {
			die("Fatal error: " . mysqli_error($con));
		}
	}

	echo "success";
});

$app->post("/exams/create/", function () use ($app, $con, $user) {
	$app->response->headers->set("Content-Type", "text/plain");

	$body = $app->request->getBody();
	$data = json_decode($body);

	$userid = $user->getId();

	$handle = mysqli_query($con, "INSERT INTO exams (id, users_id) VALUES ('', '$userid')");
	$examid = mysqli_insert_id($con);

	foreach ($data as $materia => $topicos) {
		foreach ($topicos as $topico) {
			$handle = mysqli_query($con, "SELECT * FROM questions WHERE topics_id = $topico");

			if (mysqli_num_rows($handle) == 0) {
				echo "There's no question for topic. $topico";
				continue;
			}

			echo "Found " . mysqli_num_rows($handle) . " in topic: $topico\n";

			// for each question in the topic
			while ($row = mysqli_fetch_array($handle)) {
				$the_question_id = $row["id"];
				echo "questions_id $the_question_id\n";

				$query = mysqli_query($con, "INSERT INTO exams_has_questions (exams_id, questions_id) VALUES ('$examid', '$the_question_id') ");

				if ($query == false)
					die("Fatal error.");
			}
		}
	}

	echo "success=$examid";
});
?>
