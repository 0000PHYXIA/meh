<?php
/**
  * Game Title Content Management System - Profile | Character Page
  * @Author Schneider Dark
  * @Developer "Developer Name"
  *
  * DEVELOPER PLEASE NOTE
  * You may edit and/or improve it any further it as long as you do not remove the original author name.
**/

/** READ CONFIGURATIONS **/
require '../config.inc2.php';

/** DEFINES NEEDED CLASSES **/
DefineClass('Handler');
DefineClass('Content');
DefineClass('Core');

/** INITIALIZES CLASSES **/
$handler = new ErrorHandler();
$profile = new SchneiderDarkCMS();
$advcore = new Core();

/** CONFIGURES MYSQL DATA **/
$MySQL = new stdClass();
$MySQL->HOST = MYSQL_HOST; 
$MySQL->USER = MYSQL_USER;
$MySQL->PASS = MYSQL_PASS;
$MySQL->DATA = MYSQL_DATA;
$profile->MYSQL = $MySQL;

/** INITIALIZES CMS **/
$profile->Initialize('Connection');
$profile->Initialize('Settings');
$profile->Initialize('UsersOnline');

/** INITIALIZES CMS USER DATA **/
$profile->USER->LOGGEDIN = $advcore->UserData['Login'];
$profile->USER->CURRENTURL = $advcore->UserData['Location'];

/** INITIALIZES CMS CONTENT **/
$profile->SITE->DESCRIPTION = 'Character Profile Page';
$profile->SITE->TEMPLATE = 'gameplay.cp';
$profile->SITE->CONTENT = $profile->GetCMSTEmplate('profile');

/** RETRIEVES AND ESCAPES CHARACTER NAME **/
$USERNAME = $profile->MySQLi('EscapeString', array( 0 => $_GET['u'] ));

/** INITIALIZES CHARACTER DATA **/
$MYSQL_QUERY = $profile->MySQLi('Query', array( 0 => "SELECT * FROM meh_users WHERE Username = '$USERNAME'" ));
if ($MYSQL_QUERY->num_rows < 1) { print('The Character your searching for was not found!'); exit(); }
$USER_DATA = $MYSQL_QUERY->fetch_assoc();
$profile->SITE->PROFILEADDON = '&intColorHair=' . $USER_DATA['ColorHair'] . '&intColorSkin=' . $USER_DATA['ColorSkin'] . '&intColorEye=' . $USER_DATA['ColorEye'] . '&intColorTrim=' . $USER_DATA['ColorTrim'] . '&intColorBase=' . $USER_DATA['ColorBase'] . '&intColorAccessory=' . $USER_DATA['ColorAccessory'] . '&ia1=8192&strGender=' . $USER_DATA['Gender'] . '&strHairFile=' . $USER_DATA['HairFile'] . '&strHairName=' . $USER_DATA['HairName'] . '&strName=' . $USER_DATA['Username'] . '&intLevel=' . $USER_DATA['Level'];

/** INITIALIZES CHARACTER PROFILE **/
$profile->SITE->PROFILEINVENTORY = $advcore->Initialize('UserInventory', array( 0 => $advcore->Initialize('UserItems', array( 0 => $USER_DATA['id'], 1 => $profile )), 1 => $profile ));
$profile->SITE->PROFILEPAGE = $profile->GetCMSTEmplate('profile.sub');
$profile->SITE->PROFILEACHIEVEMENTS = $advcore->Initialize('UserAchievements', array( 0 => $USER_DATA['Username'], 1 => $profile ));

/** PRINT OUTPUT **/
if (isset($_POST['newdata'])) print json_encode(array('output' => $profile->USERSONLINE)); 
else print ($profile->FlushContent());
?>