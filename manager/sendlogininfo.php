<?php
include('visitor-details.php');

$usermobile="<b>".$membername."</b>";

$mailtitle="Logged in Notification";

$mailreceiver=$memberemail;

$mailmessage="You logged into your ONET account from a device (".$user_data->get_device_name().") Operating System (".$user_data->get_os().") IP Address 
 (".$_SERVER['REMOTE_ADDR'].") at ".date("h:i:sa")." on ".date('M d, Y')."
If this login did not originate from you, please let us know by sending an email to support@onetng.com. 
Alternatively, you can call 09011851186 immediately. Thanks";

			
include 'Config/PHPMailer/send.php';

?>