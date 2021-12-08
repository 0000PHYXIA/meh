<?php
/**
  * Game Title Content Management System - Class Core
  * @Author Schneider Dark
  * @Developer "Developer Name"
  *
  * DEVELOPER PLEASE NOTE
  * You may edit and/or improve it any further it as long as you do not remove the original author name.
**/

class Core {
    var $UserData = null;
    var $CurrentDate;

    function Core() {
        session_start();

        if (isset($_SESSION['udata'])) {
            $this->UserData = $_SESSION['udata'];
            $this->UserData['Login'] = true;
        } else {
            $this->UserData = array();
            $this->UserData['Login'] = false;
        }
		
        $this->UserData['Address'] = trim(isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
        $this->UserData['Location'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    }

    function Validate($type, $params) {
        switch (strtoupper($type)) {
            case 'USERDATA':
                if ($params[0] != null) {
                    $sql = $params[0]->MySQLi('Query', array( 0 => "SELECT * FROM `meh_users` WHERE password='{$this->UserData['Password']}'" ));
                    if ($sql->num_rows > 0)
			            $this->UserData = $sql->fetch_assoc();
                    else {
                        $this->__destroySession();
                        $this->UserData = null;						
                        return false;
                    }
                }

                return true;
                break;
            case 'USEREMAIL':
                return eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $params[0]);
                break;
            case 'REBIRTH':
                $sql = $params[1]->MySQLi('Query', array( 0 => "SELECT * FROM `meh_users` WHERE id=" . $params[0] ));
                $params[3] = isset($params[3]) ? (int) $params[1]->MySQLi('EscapeString', array( 0 => $params[3] )) : $this->UserData['id'];
                if ($sql->num_rows > 0) {
                    $objRebirth = $sql->fetch_object();

                     /** REBIRTH (This is Broken) **/
					
                    $params[1]->MySQLi('Query',  array( 0 => "UPDATE `meh_users` SET Level='5' WHERE id=" . $params[0] ));
                    $params[1]->MySQLi('Query',  array( 0 => "UPDATE `meh_users` SET Rebirth=Rebirth+1 WHERE id=" . $params[0] ));
					$params[1]->MySQLi('Query',  array( 0 => "UPDATE `meh_users` SET Coins=Coins+1000 WHERE id=" . $params[0] ));
					$params[1]->MySQLi('Query',  array( 0 => "UPDATE `meh_users` SET BagSpace=BagSpace+10 WHERE id=" . $params[0] ));
					$params[1]->MySQLi('Query',  array( 0 => "UPDATE `meh_users` SET Gold=Gold+500000 WHERE id=" . $params[0] ));
					$params[1]->MySQLi('Query',  array( 0 => "UPDATE `meh_users` SET DailyRewards=DailyRewards+1 WHERE id=" . $params[0] ));
                }
                break;
        }
    }
	
    function HandleUser($type, $params = array()) {
        switch (strtoupper($type)) {
            case 'LOGIN':
                $token = $this->Initialize('UserToken', array( 0 => $params[2], 1 => $params[1] ));
                $sql = $params[0]->MySQLi('Query', array( 0 => "SELECT * FROM `meh_users` WHERE password='{$token}'" ));
                if ($sql->num_rows > 0) {
                    $_SESSION['udata'] = $sql->fetch_assoc();
                    return json_encode(array('output' => 'success'));
                } else {
                    $this->DestroySessions();
                    $params[0]->SendResponse('Invalid Credentials', 2);
                    return json_encode(array('output' => 'failure'));
                }
                break;
        }
    }

    function Initialize($type, $params = array()) {
        switch (strtoupper($type)) {
            case 'USERDATA':
                $this->UserData = $params[0];
                break;
            case 'USERTOKEN':
                $params[1] = strtolower($params[1]);
                $str = hash("sha512", $params[0] . $params[1]);
                $len = strlen($params[1]);

                return strtoupper(substr($str, $len, 17));
                break;
            case 'USERITEMS':
                $ii = (int) 0;
                $xx = (int) 0;
                $strItem = null;
                $yey = null;

                $result = $params[1]->MySQLi('Query', array( 0 => "SELECT itemid FROM meh_users_items WHERE userid = {$params[0]} AND equipment IN ('co','ar','pe','he','ba','Weapon')" ));        
                while ($data = $result->fetch_assoc()) {
                    if ($ii == 0) {
                        $strItem .= $data['itemid'];
                        $ii++;
                    } else 
                        $strItem .= "," . $data['itemid'];
                }
                
                $result = $params[1]->MySQLi('Query', array( 0 => "SELECT id, ES, Name, Upg, Coins, Type, File, Link FROM meh_items WHERE id IN ($strItem) ORDER BY ES ASC" ));
                while ($data = $result->fetch_assoc()) {
                    $subresult = $params[1]->MySQLi('Query', array( 0 => "SELECT equipped, quantity FROM meh_users_items WHERE userid = {$params[0]} AND itemid = {$data['id']}" ));
                    $subdata = $subresult->fetch_assoc();

                    $yey[$xx]['id'] = $data['id'];
                    $yey[$xx]['es'] = $data['ES'];
                    $yey[$xx]['name'] = $data['Name'];
                    $yey[$xx]['rank'] = $data['ES'] == "ar" ? $this->Initialize('UserRank', array( 0 => $subdata['quantity'])) : null;
                    $yey[$xx]['upgr'] = $data['Upg'];
                    $yey[$xx]['coin'] = $data['Coins'];
                    $yey[$xx]['file'] = $data['File'];
                    $yey[$xx]['link'] = $data['Link'];    
                    $yey[$xx]['type'] = strtolower($data['Type']);
                    $yey[$xx]['equipped'] = $subdata['equipped'] == 1 ? true : false;					
                    $xx++;
                } return $yey;
                break;
            case 'USERRANK':
                for ($a = 1; $a < 10; $a++) {
                    $rankExp = (pow(($a + 1), 3) * 100);
                    if ($a > 1)
                        $arrRanks[$a]=($rankExp + $arrRanks[($a - 1)]);
                    else
                        $arrRanks[$a]=($rankExp + 100);            
                }
            
                for ($i = 1; $i < 10; $i++) {
                    if ($arrRanks[$i] >= $params[0]) {
                        if ($params[0] == 302500) return 10;
                        return $i;
                    }
                } return -1;
                break;
            case 'USERINVENTORY':
                $items = $params[0];
				
                $weps = null;
                $armr = null;
                $class = null;

                $equipped = array();
                $equipped['helm'] = array();
                $equipped['pet'] = array();
                $equipped['cape'] = array();
                $equipped['armor'] = array();
                $equipped['class'] = array();
                $equipped['weapon'] = array();

                $equipped['cape']['name'] = null;
                $equipped['helm']['name'] = null;
                $equipped['pet']['name'] = null;
                $equipped['armor']['name'] = null;
                $equipped['class']['name'] = null;
                $equipped['weapon']['name'] = null;

                $equipped['helm']['file'] = 'none';
                $equipped['helm']['link'] = 'none';
                $equipped['pet']['file'] = 'none';
                $equipped['pet']['link'] = 'none';
                $equipped['cape']['file'] = 'none';
                $equipped['cape']['link'] = 'none';

                for ($ii = 0; $ii < count($items); $ii++) {
                    if ($items[$ii]['coin'] > 0)
                        $class = 'acItem';
                    else if ($items[$ii]['upgr'] > 0)
                        $class = 'memItem';
                    else
                        $class = 'normItem';
                    
                    if ($items[$ii]['equipped'] == true) {
                        switch (strtolower($items[$ii]['es'])) {
                            case 'ar':
                                if (isset($equipped['class']['true'])) break;
                                $equipped['armor']['name'] = $items[$ii]['name'];
                                $equipped['class']['name'] = $items[$ii]['name'];
                                $equipped['class']['file'] = $items[$ii]['file'];
                                $equipped['class']['link'] = $items[$ii]['link'];
                                break;
                            case 'co':
                                $equipped['armor']['name'] = $items[$ii]['name'];
                                $equipped['class']['file'] = $items[$ii]['file'];
                                $equipped['class']['link'] = $items[$ii]['link'];
                                $equipped['class']['true'] = true;    
                                break;
                            case 'weapon':
                                $equipped['weapon']['name'] = $items[$ii]['name'];
                                $equipped['weapon']['file'] = $items[$ii]['file'];
                                $equipped['weapon']['link'] = $items[$ii]['link'];
                                $equipped['weapon']['type'] = $items[$ii]['type'];								
                                break;
                            case 'ba':
                                $equipped['cape']['name'] = $items[$ii]['name'];
                                $equipped['cape']['file'] = $items[$ii]['file'];
                                $equipped['cape']['link'] = $items[$ii]['link'];                    
                                break;
                            case 'pe':
                                $equipped['pet']['name'] = $items[$ii]['name'];
                                $equipped['pet']['file'] = $items[$ii]['file'];
                                $equipped['pet']['link'] = $items[$ii]['link'];                    
                                break;
                            case 'he':
                                $equipped['helm']['name'] = $items[$ii]['name'];
                                $equipped['helm']['file'] = $items[$ii]['file'];
                                $equipped['helm']['link'] = $items[$ii]['link'];                    
                                break;
                        }
                    }
            
                    $class .= ' ' . $items[$ii]['type'];
                    if ($items[$ii]['type'] == "class" )        
                        $armr .= "<span class=\"item-row $class\"><a href=\"http://google.com/search:site/a/p/q/{$items[$ii]['name']}\">{$items[$ii]['name']} (Rank {$items[$ii]['rank']})</a></span>\n";
                    else if ($items[$ii]['type'] == "armor" )        
                        $armr .= "<span class=\"item-row $class\"><a href=\"http://google.com/search:site/a/p/q/{$items[$ii]['name']}\">{$items[$ii]['name']}</a></span>\n";
                    else
                        $weps .= "<span class=\"item-row $class\"><a href=\"http://google.com/search:site/a/p/q/{$items[$ii]['name']}\">{$items[$ii]['name']}</a></span>\n";
                
                }
				
                $params[1]->SITE->PROFILEADDON .= "&strClassName={$equipped['class']['name']}&strClassFile={$equipped['class']['file']}&strClassLink={$equipped['class']['link']}&strArmorName={$equipped['armor']['name']}&strWeaponFile={$equipped['weapon']['file']}&strWeaponLink={$equipped['weapon']['link']}&strWeaponType={$equipped['weapon']['type']}&strWeaponName={$equipped['weapon']['name']}&strCapeFile={$equipped['cape']['file']}&strCapeLink={$equipped['cape']['link']}&strCapeName={$equipped['cape']['name']}&strHelmFile={$equipped['helm']['file']}&strHelmLink={$equipped['helm']['link']}&strHelmName={$equipped['helm']['name']}&strPetFile={$equipped['pet']['file']}&strPetLink={$equipped['pet']['link']}&strPetName={$equipped['pet']['name']}&bgindex=B";
                return '<p class="left"><span class="subheaderBlack">Items</span><br /><br />' . $weps . '</p><p class="right"><span class="subheaderBlack">Armors</span><br /><br />'.$armr.'</p>'; 
                break;
            case 'USERACHIEVEMENTS':
                $Achievements = null;
			
                $result[0] = $params[1]->MySQLi('Query', array( 0 => "SELECT * FROM `meh_achievements` ORDER BY `id` ASC" ));				
                $result[1] = $params[1]->MySQLi('Query', array( 0 => "SELECT `AchievementID` FROM `meh_users` WHERE Username='{$params[0]}'" ));              
                $data[1] = $result[1]->fetch_assoc();

                while ($data[0] = $result[0]->fetch_assoc()) {				
                    if (strpos($data[1]['AchievementID'], $data[0]['id']) !== false) {
                        $Achievements .= 
                            "<a href='#'><img width='65' height='56' src='../images/badges/{$data[0]['Badge']}' /><span>
                            <strong>{$data[0]['Name']}</strong><br />{$data[0]['Description']}</span>
                            </a>";
                    }
                }

                return ($Achievements != null ?
                    "
                    <div class='achievements'>
                        {$Achievements}<br />
                    </div><br />" : null);
                break;
            default:
                return null;
                break;
        }
    }

    function DestroySessions() {
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
    }
}
?>