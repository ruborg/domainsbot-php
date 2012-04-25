<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);

class DomainsbotApi
{
	
	public function __construct($token)
	{
		$this->urlToPost = 'http://xml.domainsbot.com/xmlservices/spinner.aspx?';
		$this->token = $token;
	}
    
    public function GetSuggestion ($key, array $params = array(), $getJSON = true)
    {
	
	// Post string to DomainBot api, Build the request string from global variables
	$requestString = $this->urlToPost . "q=".$key;
	
	foreach ($params as $k => $value) {
	    $requestString .= "&". $k . "=" . $value;
	}
	
	$requestString .= "&auth-token=" . $this->token;
	
	if( $getJSON)
		return json_decode($this->SendRequest($requestString));
	else
		return $this->SendRequest($requestString);
		
    }
    
    public function GetSuggestionRawUrl ($rawUrl, $getJSON = true)
    {
	$requestString = $this->urlToPost .$rawUrl . "&auth-token=" . $this->token;
	
	if( $getJSON)
		return json_decode($this->SendRequest($requestString));
	else
		return $this->SendRequest($requestString);
    }  
    
    private function SendRequest ($url)
    {
		try // Try Block
		{
			
						
			$opts = array(
			  'http'=>array(
			    'method'=>"GET"
			  )
			);
			
			$context = stream_context_create($opts);   

			$fp = fopen($url, 'r', false, $context);
			$contents = stream_get_contents($fp);
			fclose($fp);
			
			
			// Print the final result
			return $contents;
		}
		catch(Exception $e) // Catch the exception thrown by catch block
		{
			// Print the proper error message
			$errorMessage = $e->getMessage();
			printo_stderr($errorMessage);
			throw $e;
		}
    }
}

?>