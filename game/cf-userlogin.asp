<?php
error_reporting(0);
header("Content-Type: text/xml");

$sql['host'] = 'mysqlc';
$sql['user'] = 'root';
$sql['pass'] = '$Rafa1234';
$sql['name'] = 'meh';

$con = new mysqli($sql['host'], $sql['user'], $sql['pass'], $sql['name']);
if(isset($_POST['unm'])) {
	$username = $_POST['unm'];
	$password = gen_token($_POST['pwd'], $username);
	$success = false;
	$query = 'SELECT id,UpgradeExpire,ActivationFlag,Age,Access,Email,UpgradeDays FROM meh_users WHERE Username="'.$username.'" AND Password="'.$password.'" LIMIT 1';
	
	if ($stmt = $con->prepare($query)) { 
		$stmt->bind_param("ss", $username, $password); 
		//$stmt->bind_param("s", $username); 
		$stmt->execute(); 
		$stmt->bind_result($user_id, $UpgradeExpire, $ActivationFlag, $Age, $Access, $Email, $UpgradeDays); 
		if($stmt->fetch()) {
			$success = true;
			$upg_date = preg_replace('/\s+/', 'T', $UpgradeExpire); 
			$upg = ($UpgradeDays >= 0) ? 1 : 0;
			echo '<login bSuccess="1" userid="'.$user_id.'" iAccess="'.$Access.'" iUpg="'.$upg.'" iAge="'.$Age.'" sToken="'.$password.'" iUpgDays="'.$UpgradeDays.'" strEmail="'.$Email.'" bCCOnly="0"  dUpgExp="'.$upg_date.'" strCountryCode="EN" unm="'.$username.'">';			
		} else {
			echo '<login bSuccess="0" sMsg="The username and password you entered did not match. Please check the spelling and try again."/>';
		}
	}
	$stmt->close();
	if($success) {
		/** List Servers **/
		$server_list = $con->query("SELECT * FROM meh_servers LIMIT 10");
		while ($server = $server_list->fetch_assoc()) {
			echo '<servers sName="'. $server['Name'] .'" sIP="'. $server['IP'] .'" iCount="'. $server['Count'] .'" iMax="'. $server['Max'] .'" bOnline="'. $server['Online'] .'" iChat="'. $server['Chat'] .'" bUpg="'. $server['Upgrade'] .'" sLang="it" iPort="'. $server['Port'] .'"/>';
		}
		echo '</login>';
	}
	$con->close();
} else {
	echo '<login bSuccess="0" sMsg="Invalid Input"/>';
}
function gen_token($pass, $salt) {
	$salt = strtolower($salt);
	$str = hash("sha512", $pass.$salt);
	$len = strlen($salt);
	return strtoupper(substr($str, $len, 17));
}
?>