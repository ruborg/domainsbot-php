#DomainsBot API - PHP Library

A PHP library for using DomainsBot Spinner API.


## Installation
[download the source code
(ZIP)](https://github.com/DomainsBot/domainsbot-php/zipball/master "domainsbot-php
source code") for `domainsbot-php` and place it your php web site directory

## Getting Started
Getting started with DomainsBot API couldn't be easier. Create a `DomainsbotApi`object and you're ready to go.
```php
require_once 'DomainsbotApi.php';
$client = new DomainsbotApi('YOUR-API-KEY'); // Copy and paste your API Key
$opts = array(
			  'tlds'=>'com,net,org',  //Set the tlds parameter
			  'pageSize' => '10' // Set the pageSize parameter
			  // For the complete list of possible parameters read the full documentation at http://developers.domainsbot.com
			);
			
echo $client->GetSuggestion("findnames",$opts ,true);
```




