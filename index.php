<?php 

require "LinkedIn/LinkedIn.php"; // linkedin SDK

/**
 * Init class with config params
 * @var LinkedIn
 */
$li = new LinkedIn(
	array(
		'api_key' => 'YOUR_APP_KEY', 
		'api_secret' => 'YOUR_APP_SECRET', 
		'callback_url' => 'CALLBACK_URL_REGISTERED_WITH_APP'
	)
);

/**
 * If there is a code in callback, exchange it with access token otherwise show connect with linkedin button
 */
if(isset($_REQUEST['code'])) {

	/** Get Access Token */
	$token = $li->getAccessToken($_REQUEST['code']);
	
	/** Prepare content to be share */
	$content = array(		
						"title" => "Agile",
			            "description" => "Agile description",
			            "submitted_url" => "https://www.agileinfoways.com"
				    
				);

	/** Post on user's wall */
	$result = $li->post("people/~/shares", array(
												"comment"=>"Check agile agileinfoways.com! http://agileinfoways.com",
												"content"=> $content,
												"visibility" => array("code" => "anyone")
											)
									);
	
	echo "Shared!";

} else {

	/**
	 * Redirect to login url
	 */
	$loginUrl = $li->getLoginUrl(array(
						LinkedIn::SCOPE_WRITE_SHARE,
						LinkedIn::SCOPE_READ_WRTIE_UPDATES
					)
				);

	echo "<a href='$loginUrl'>Login And Share Content</a>";
}

?>