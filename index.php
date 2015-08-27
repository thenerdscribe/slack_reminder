<!DOCTYPE html>

<head>
1
<meta name="viewport" content="width=device-width initial-scale=1">

</head>

<?php
	require_once ('reminder_class.php');

	$reminders = new reminders();

	$reminders->addReminder(array(
			'channel' => '#general',
			'message' => 'Hello fucking world',
			'last_ran' => '092515',
			'snooze' => '1'
		));

?>