
<a href='index.php'>Back</a><br>
<?php
include ( "NexmoMessage.php" );

$from = $_POST['from'];

$numbers = $_POST['numbers'];
$message = $_POST['message'];

$numbersDATA = explode("\n", $numbers);
// var_dump($numbersDATA);
$phone_count = count($numbersDATA);

$credential_list = explode("\n", $_POST['accounts']);
$api_keys = [];

foreach ($credential_list as $key => $credential) {
	$key_scret = explode(":", $credential);			
	$api_keys[] = ['key' => $key_scret[0], 'secret' => $key_scret[1]];	        
}

$keys_count = count($api_keys);

$current_idx = 0;
$current_key_invalid = true;

$phone_idx = 0;
$max_attempts = $keys_count + $phone_count;
$attempts = 0;

while ($phone_idx <= $phone_count - 1)
{	
	
	if($current_key_invalid) {
		$nexmo_sms = new NexmoMessage($api_keys[$current_idx]['key'], $api_keys[$current_idx]['secret']);				
		$current_key_invalid = false;		
	}

	$info = $nexmo_sms->sendText( $numbersDATA[$phone_idx], $from, $message );
	// var_dump($info);
	if(is_array($info->messages)) {
		if($info->messages[0]->status == '0') {
			// echo $nexmo_sms->displayOverview($info);
			echo "<br> Sent message to " . $info->messages[0]->to . ". Balance is now " . $info->messages[0]->remainingbalance . PHP_EOL;
			$phone_idx++;			
		} elseif($info->messages[0]->errortext == "Quota Exceeded - rejected" || $info->messages[0]->errortext == "Bad Credentials") {
			echo $info->messages[0]->errortext . "<br>";				
			if($current_idx == $keys_count - 1) {
				echo "<br> All of your API keys are out of balance. There is no valid API key any more." . PHP_EOL;	
				break;			
			}
			$current_key_invalid = true;				
			$current_idx++;
		} else {
			echo $info->messages[0]->errortext . "<br>";			
			echo "Terminated<br>";
  			break;			
		}
		
	} else {
		echo "Terminated<br>";
  		break;		
	}

	if($attempts > $max_attempts) {		//this is for preventing infinite loop
		echo 'You reached to the max attempts limit.';
		die();
	}

	$attempts++;
}   

?>