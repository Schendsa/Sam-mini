<?php

$feedback_positive = session::get('feedback_positive');
$feedback_negative = session::get('feedback_negative');

if(isset($feedback_positive)) {
	foreach ($feedback_positive as $feedback) {
		echo '<div class="feedback succes">' . $feedback . '</div>';
	}
}

if(isset($feedback_negative)) {
	foreach ($feedback_negative as $feedback) {
		echo '<div class="feedback error">' . $feedback . '</div>';
	}
}