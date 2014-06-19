<?php 
require('protected/Run.class.php');
class ReadPage
{
	public $url;

	public function Start(){
		$run = new Run();
		if($run->CanRun() === true){
			$this->Read();	
			$this->Work();
		}
	}

	public function GetUrl(){
		return $this->url;
	}

	private function Work(){
		echo $this->result;
	}

	private function Read(){
		try{
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_VERBOSE, true);
		  	curl_setopt($curl, CURLOPT_HEADER, true); 
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($curl, CURLOPT_URL, $this->url);
			$this->result = curl_exec($curl);
			return $this->result;
		}
		catch(Exception $ex){
			return $ex->getMessage();
		}
	}
}
?>