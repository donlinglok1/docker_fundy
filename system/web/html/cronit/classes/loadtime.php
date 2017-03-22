<?php
class LoadTime {
	private $time_start = 0;
	private $time_end = 0;
	private $time = 0;
	public function __construct() {
		$this->time_start = microtime ( true );
	}
	public function __destruct() {
		$this->time_end = microtime ( true );
		$this->time = $this->time_end - $this->time_start;
		echo "Loaded in $this->time seconds\n";
	}
}
?>