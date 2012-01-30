<?php

define('ga_email','');
define('ga_password','');
define('ga_profile_id','');

require '/home/matthew/public_html/gapi-1.3/gapi.class.php';

//Fun stuff for working with GAPI
class MattMap
{
	private $ga;
	private $dimensionsList = array();
	
	function __construct() 
	{
		$this->ga = new gapi(ga_email,ga_password);
	}
		
	//get a string of lat / longs from the GAPI
	public function GetLatLong()
	{
		$this->ga->requestReportData(
			ga_profile_id,
			array('city','latitude','longitude'),
			array('visitors'));
	
		foreach ($this->ga->getResults() as $result)
		{							
			$dimensionsList[] = $result->getDimensions();
		}
		
		return $dimensionsList;
	}
	
	public function GetLatLongJSON()
	{
		return json_encode($this->GetLatLong());
	}
	
	//getter
	public function GetMsg()
	{
		return $this->msg;
	}
}
?>