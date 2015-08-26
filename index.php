<!DOCTYPE html>

<?php

	$officePeeps = array(
		'Rigo' => array(
			'name' => 'Rigo',
			'team' => 'Customer Service'
			),
		'Ryan' => array(
			'name' => 'Ryan',
			'team' => 'Creative'
			),
		'Nate' => array(
			'name' => 'Nate',
			'team' => 'Creative'
			),
		'Chris' => array(
			'name' => 'Chris',
			'team' => 'Customer Service'
			)
		 );

	$messageQueue = array(
		array(
			'channel' => '#general',
			'message' => 'Hello world',
			'frequency' => 'daily',
			'time' => '9'
			),
		array(
			'channel' => '@ryan-morton',
			'message' => 'Hello world',
			'frequency' => 'hourly',
			'time' => '1'
			)
		);


?>

<h1>Team Member Array</h1>

<?php foreach ($officePeeps as $name): ?>
	<h2><?php echo $name['name'];?></h2>
	<h3><?php echo $name['team'];?></h3>
<?php endforeach; ?>

<?php foreach ($messageQueue as $queue) {
	foreach ( $queue as $key => $value) {
		# code...
		echo $key;
		echo $value;
	}
	# code...
};

?>

