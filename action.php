<?php

include 'MailChimp.php';

use \DrewM\MailChimp\MailChimp;

$api_key = '56516173d185ea127682e1b0c7acb2ff-us9';
$list_id = '5af6a13ff5';

$MailChimp = new MailChimp($api_key);

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];



$result = $MailChimp->post("lists/$list_id/members", [
				'email_address' => $email,
                'merge_fields' => ['FNAME'=>$firstName, 'LNAME'=>$lastName],
				'status'        => 'subscribed',
			]);

if ($MailChimp->success()) {
	// print_r($result);	
    echo 'data is submitted or updated';
} else {
	echo $MailChimp->getLastError();
}

/*$subscriber_hash = MailChimp::subscriberHash($email);

$MailChimp->delete("lists/$list_id/members/$subscriber_hash");

echo 'deleted!!!!';*/

?>