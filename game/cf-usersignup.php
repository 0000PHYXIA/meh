<?php
require_once getenv('SiteRoot').'config.asp';
require_once getenv('SiteRoot').'classes/class.content.php';
require_once getenv('SiteRoot').'classes/class.bbcodes.php';
require_once getenv('SiteRoot').'classes/class.data.php';
require_once getenv('SiteRoot').'addons/geoip/geoip.inc';
require_once getenv('SiteRoot').'addons/gamehandler.php';
// ** Fixed by Thalys ** //
$GeoIPDatabase = geoip_open('addons/geoip/GeoIP.dat', GEOIP_STANDARD);

$Client = new Handler(true);
    
header('Content-type: text/plain');
if (isset($_POST["strUsername"])) {
    $Client->connectDB();
    $sign['user'] = $Client->DBase('EscapeString', array( 0 => stripslashes($_POST["strUsername"]) ));
    $sign['pass'] = $Client->DBase('EscapeString', array( 0 => stripslashes($_POST["strPassword"]) ));
    $sign['pass'] = $Client->Initialize('UserToken', array( 0 => $sign['pass'], 1 => $sign['user'] ));
    $sign['uage'] = $Client->DBase('EscapeString', array( 0 => stripslashes($_POST["intAge"]) ));
    $sign['daob'] = $Client->DBase('EscapeString', array( 0 => stripslashes($_POST["strDOB"]) ));
    $sign['emal'] = $Client->DBase('EscapeString', array( 0 => stripslashes($_POST["strEmail"]) ));
    $sign['gend'] = $Client->DBase('EscapeString', array( 0 => stripslashes($_POST["strGender"]) ));
    $sign['caid'] = $Client->DBase('EscapeString', array( 0 => stripslashes($_POST["ClassID"]) ));
    $sign['eycc'] = $Client->DBase('EscapeString', array( 0 => stripslashes($_POST["intColorEye"]) ));
    $sign['sycc'] = $Client->DBase('EscapeString', array( 0 => stripslashes($_POST["intColorSkin"]) ));
    $sign['hycc'] = $Client->DBase('EscapeString', array( 0 => stripslashes($_POST["intColorHair"]) ));
    $sign['hair'] = $Client->DBase('EscapeString', array( 0 => stripslashes($_POST['HairID']) ));
	$Country = geoip_country_code_by_addr($GeoIPDatabase, $_SERVER['REMOTE_ADDR']);

    $sql = $Client->DBase('Query', array( 0 => "SELECT id FROM meh_users WHERE Username = '{$sign['user']}'" ));
    if ($sql->num_rows > 0)
        die("status=Taken&strReason=The username is already in use by another character.");
    else {

        switch ($sign['hair']) {
            /** MALE HAIR **/
            case 52:
                $hairname = 'Default';
                $hairfile = 'hair/M/Default.swf';
                break;
            case 55:
                $hairname = 'Goku1';
                $hairfile = 'hair/M/Goku1.swf';
                break;
            case 58:
                $hairname = 'Goku2';
                $hairfile = 'hair/M/Goku2.swf';
                break;
            case 64:
                $hairname = 'Normal2';
                $hairfile = 'hair/M/Normal2.swf';
                break;
            case 92:
                $hairname = 'Ponytail8';
                $hairfile = 'hair/M/Ponytail8.swf';
                break;
            
            /** FEMALE HAIR **/
            case 14:
                $hairname = 'Pig1Bangs1';
                $hairfile = 'hair/F/Pig1Bangs1.swf';
                break;
            case 18:
                $hairname = 'Pig2Bangs2';
                $hairfile = 'hair/F/Pig2Bangs2.swf';
                break;
            case 26:
                $hairname = 'Pony2Bangs2';
                $hairfile = 'hair/F/Pony2Bangs2.swf';
                break;
            case 83:
                $hairname = 'Bangs2Long';
                $hairfile = 'hair/F/Bangs2Long.swf';
                break;
            case 84:
                $hairname = 'Bangs3Long';
                $hairfile = 'hair/F/Bangs3Long.swf';
                break;
        }
	
        $extra = date('Y-m-d h:i:s', time() + (5 * 24 * 60 * 60));   
        $query = "INSERT INTO `meh_users` (`VIP`, `Username`, `Password`, `Access`, `ActivationFlag`, `Age`, `Gender`, `Email`, `Level`, `Gold`, `Coins`, `Exp`, `ColorHair`, `ColorSkin`, `ColorEye`, `ColorBase`, `ColorTrim`, `ColorAccessory`, `DateCreated`, `UpgradeExpire`, `UpgradeDays`, `BankSlots`, `HouseSlots`, `BagSlots`, `HairID`, `HairFile`, `HairName`, `Permamute`, `Quests`, `Settings`, `Achievement`, `LastArea`, `Country`, `GuildID`, `AchievementID`, `CurrentServer`) VALUES ('0', '{$sign['user']}', '{$sign['pass']}', '1', '5', '{$sign['uage']}', '{$sign['gend']}', '{$sign['emal']}', '1', '1000', '1500', '0', '{$sign['hycc']}', '{$sign['sycc']}', '{$sign['eycc']}', '0', '0', '0', '2011-05-23 21:02:33', '2011-05-23 21:02:33', '-1', '0', '20', '40', '{$sign['hair']}', '${hairfile}', '{$hairname}', '0', '00000000000000000000000000000000000000000000000000', '0', '0', '', 'US', '0', '', 'Offline');";
        $Client->DBase('Query', array( 0 => $query ));

        $newId = $Client->DBase('Query', array( 0 => "SELECT id FROM meh_users WHERE Username='{$sign['user']}'" ));
        $user = $newId->fetch_assoc();
        $userId = $user['id'];

        if ($newId->num_rows <= 0)
            die("status=Error&strReason=Could not create your character. Please contact InfinityArts staff as soon as possible!");
  		
        switch ($sign['caid']) {
            case 2: 
                $Client->DBase('Query', array( 0 => "INSERT INTO meh_users_items (itemid, userid, equipped, equipment, level) VALUES ('2', '$userId', '1', 'ar', '1')" ));
                break;
            case 4: 
                $Client->DBase('Query', array( 0 => "INSERT INTO meh_users_items (itemid, userid, equipped, equipment, level) VALUES ('3', '$userId', '1', 'ar', '1')" ));
                break;
            case 3: 
                $Client->DBase('Query', array( 0 => "INSERT INTO meh_users_items (itemid, userid, equipped, equipment, level) VALUES ('4', '$userId', '1', 'ar', '1')" ));
                break;
            case 5: 
                $Client->DBase('Query', array( 0 => "INSERT INTO meh_users_items (itemid, userid, equipped, equipment, level) VALUES ('5', '$userId', '1', 'ar', '1')" ));
                break;
        }

        $Client->DBase('Query', array( 0 => "INSERT INTO meh_users_items (itemid, userid, equipped, equipment, level) VALUES ('1', '$userId', '1', 'Weapon', '1')" ));
        $Client->DBase('Query', array( 0 => "INSERT INTO meh_users_friends (userid, friends) VALUES ({$userId}, '')" ));        

        echo "status=Success";
		
        $Client->HandleUser('Login', array( 0 => $Client, 1 => $_POST['strUsername'], 2 => $_POST['strPassword'] ));    
    }
} else
    die("status=Error&strReason=Invalid Input.");
?>