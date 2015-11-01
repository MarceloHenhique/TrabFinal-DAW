<?php
function get_header() {
	require_once "templates/includes/header.php";
}

function get_footer() {
	require_once "templates/includes/footer.php";
}

function root_dir() {
	return "http://$_SERVER[HTTP_HOST]/";
}

function validate_as_utf8($object) {
	foreach ($object as $key => $value)
		if (is_string($value))
			$object->$key = utf8_encode($value);
}
?>
