<?php 
session_start();


	function error()
	{	
		if(isset($_SESSION["errormessage"]))
		{
			$Output = "<div class=\"alert alert-danger\">" ;
    		$Output .= $_SESSION["errormessage"];
    		$Output .= "</div>";
    		$_SESSION["errormessage"] = null;
    		return $Output;
		}
	}

	function success()
	{
		if(isset($_SESSION["successmessage"]))
		{
			$Output = "<div class=\"alert alert-success\">" ;
    		$Output .= $_SESSION["successmessage"];
    		$Output .= "</div>";
    		$_SESSION["successmessage"] = null;
    		return $Output;
		}
	}



 ?>