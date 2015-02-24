# Linkedin - post content on user's wall example

We'r using https://github.com/ashwinks/PHP-LinkedIn-SDK. All documentation is there. I have added example for posting content on user's wall.

## Usage

Open up `index.php` Init class with your app id and app secret
```php
	$li = new LinkedIn(
		array(
			'api_key' => 'YOUR_APP_KEY', 
			'api_secret' => 'YOUR_APP_SECRET', 
			'callback_url' => 'CALLBACK_URL_REGISTERED_WITH_APP'
		)
	);
```	
Make sure that your callback url matches your callback url registered with app. In our case, we are handling callback in same file. Thats pretty much it! Let me know if any queries.
