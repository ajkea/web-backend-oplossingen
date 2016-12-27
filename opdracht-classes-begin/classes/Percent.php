<?php
class Percent{
	public $absolute;
	public $relative;
	public $hundred;
	public $nominal;

	public function __construct($new,$unit){
		$this->absolute = $this->nummerAfronden($new/$unit);
		$this->relative = $this->nummerAfronden($this->absolute -1);
		$this->hundred = $this->nummerAfronden($this->relative * 100);
	if($this->absolute > 1){
		$this->nominal = "positive";
		}
	elseif ($this->absolute = 1){
		$this->nominal = "status-quo";

	}
	elseif ($this->absolute < 1) {
			$this->nominal = "negative";
	}
	}

	public function nummerAfronden($getal){
		return number_format($getal,2);
	}
}
?>