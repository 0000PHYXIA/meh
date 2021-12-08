<?php
header("Content-Type: text/xml");

require_once getenv('SiteRoot').'config.asp';
require_once getenv('SiteRoot').'classes/class.content.php';
require_once getenv('SiteRoot').'classes/class.bbcodes.php';
require_once getenv('SiteRoot').'classes/class.data.php';
require_once getenv('SiteRoot').'addons/geoip/geoip.inc';
require_once getenv('SiteRoot').'addons/gamehandler.php';

$Client = new Handler(true);
$XML = new SimpleXMLElement('<login></login>');
$DOM = new DOMDocument();

if (isset($_POST['unm']) AND isset($_POST['pwd'])) {
    $Client->connectDB();
    $Username = $Client->DBase('EscapeString', array( 0 => $_POST['unm'] ));
    $Password = $Client->Initialize('UserToken', array( 0 => $_POST['pwd'], 1 => $Username ));
    $UpgDays = -1;
    $Country = 'TR';
	
    if ($stmt = $Client->DBase('Prepare', array( 0 => 'SELECT id, UpgradeExpire, ActivationFlag, Age, Access, Email, Country FROM `meh_users` WHERE Username=? AND Password=? LIMIT 1' ))) { 
        $stmt->bind_param("ss", $Username, $Password); 
        $stmt->execute(); 
        $stmt->bind_result($user_id, $UpgradeExpire, $ActivationFlag, $Age, $Access, $Email, $Country); 
        if ($stmt->fetch()) {
		    if ($Access == "-1") {
                $XML->addAttribute('bSuccess', '0');
                $XML->addAttribute('sMsg', 'Your account has been disabled.');
			} else {
                $datetime1 = new DateTime(date('Y-m-d h:i:s'));
                $datetime2 = new DateTime($UpgradeExpire);
                $interval = $datetime1->diff($datetime2);
                $UpgDays = $interval->format('%R%a');

                if ($UpgDays <= -0 AND $UpgDays != +0 OR $UpgDays == 0)
                    $UpgDays = -1;

                $XML->addAttribute('bSuccess', '1');
                $XML->addAttribute('userid', $user_id);
                $XML->addAttribute('iAccess', $Access);
                $XML->addAttribute('iUpg', $UpgDays >= 0 ? 1 : 0);
                //$XML->addAttribute('iAge', $Age);
				$XML->addAttribute('iAge', 17);
                $XML->addAttribute('sToken', $Password);
                $XML->addAttribute('dUpgExp', preg_replace('/\s+/', 'T', $UpgradeExpire));
                $XML->addAttribute('iUpgDays', $UpgDays);
                $XML->addAttribute('iSendEmail', $ActivationFlag);
                $XML->addAttribute('strEmail', $Email);
                $XML->addAttribute('bCCOnly', 0);
                $XML->addAttribute('strCountryCode', "".$_SERVER['HTTP_CF_IPCOUNTRY']."");
				//$XML->addAttribute('strCountryCode', "US");
			}
        } else { 
            $XML->addAttribute('bSuccess', '0');
            $XML->addAttribute('sMsg', 'The username and password you entered did not match. Please check the spelling and try again.');
        }
    } $stmt->close();

    $DOM->loadXML($XML->asXML());
    $DOM->getElementsByTagName('login');
    $DOC = $DOM->getElementsByTagName('login');
    foreach ($DOC as $ELEMENT) {
        if ($ELEMENT->getAttribute('bSuccess') == '1') {	        
            $Country = "".$_SERVER['HTTP_CF_IPCOUNTRY']."";
            $Client->DBase('Query', array( 0 => "UPDATE `meh_users` SET UpgradeDays='{$UpgDays}',Country='".$Country."',LastLogin=NOW() WHERE id='".$user_id."'" ));    
            $ServerList = $Client->DBase('Query', array( 0 => "SELECT * FROM meh_servers LIMIT 10" ));
            while ($server = $ServerList->fetch_assoc()) {
                $child = $XML->addChild('servers');
                $child->addAttribute('sName', $server['Name']);
                $child->addAttribute('sIP', $server['IP']);
                $child->addAttribute('sPort', 5588);
                $child->addAttribute('iCount', $server['Count']);
                $child->addAttribute('iMax', $server['Count'] >= $server['Max'] ? -1 : $server['Max']);
                $child->addAttribute('bOnline', $server['Online']);
                $child->addAttribute('iChat', $server['Chat']);
                $child->addAttribute('bUpg', $server['Upgrade']);
                $child->addAttribute('sLang', 'en');
            }
			
            $Client->HandleUser('Login', array( 1 => $_POST['unm'], 2 => $_POST['pwd'] ));  
            break;
        }
    }
} else {
    $XML->addAttribute('bSuccess', '0');
    $XML->addAttribute('sMsg', 'Invalid Input');
}

$XMLDOM = dom_import_simplexml($XML);
$XMLString = $XMLDOM->ownerDocument->saveXML($XMLDOM->ownerDocument->documentElement);

$Client->Output = $XMLString;
$Client->FlushContent(false);
?>