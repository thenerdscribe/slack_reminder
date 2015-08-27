<?php

require_once ('config.php');
require_once ('MysqliDb.php');

class reminders
{
	private $db;
	
	private $prefix = '';
	
	private $tables;
	
	private $users;

	public function __construct()
	{
		$this->db = new Mysqlidb(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		

		if (!$this->db) {
			die('database_error');
		}
		
		$this->db->setPrefix($this->prefix);
		

		$this->tables = array(
			'reminders' => array(
				'channel' => 'varchar(255) not null',
				'message' => 'varchar(255) not null',
				'last_ran' => 'int(6) not null',
				'snooze' => 'int(1) null'
			)
		);
		
		// echo $tables;
		
		// $this->users = array('Nate', 'Jerry');
		
		
		// $this->createTables();
	}
	
	public function createTables()
	{
		// echo '<pre>';
		foreach ($this->tables as $name => $fields) {
			// echo "$key <br>";
			// var_dump($value);
			
			$this->createTable($this->prefix.$name, $fields);
		}
		// echo '</pre>';
	}
	
	public function createTable($name, $fields)
	{
		// echo "Creating Table $name<br>";
		
		$query = "CREATE TABLE $name (id INT(9) UNSIGNED PRIMARY KEY AUTO_INCREMENT";
		
		foreach ($fields as $k => $v) {
			$query .= ", $k $v";
		}
		
		$query .= ')';

		$this->db->rawQuery($query);
		
	}
	
	public function addReminders($reminders)
	{
		foreach ($reminders as $reminder) {
			$this->addUser($reminder);
		}
	}
	
	public function addReminder($reminder)
	{
		$data = array($reminder);
		$id = $this->db->insert('reminders', $data);
		
		if ($id) {
			echo $reminder . ' has been added<br>';
		}
		else {
			echo $reminder . ' has not been added.<br>';
		}
	}
}
