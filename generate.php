<?php
require_once 'participants.php';

// Check whether the name submitted is in the array of names.
if (in_array(strtolower($_POST['name']), NAMES)) {
	$name = $_POST['name'];
	require_once 'certificate.php';
} else {
	header('Location: index.php?error=name-not-found');
}