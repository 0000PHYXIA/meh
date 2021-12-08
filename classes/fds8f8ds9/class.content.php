<?php
/**
  * Game Title Content Management System - Class Content
  * @Author Schneider Dark
  * @Developer "Developer Name"
  *
  * DEVELOPER PLEASE NOTE
  * You may edit and/or improve it any further it as long as you do not remove the original author name.
**/

class SchneiderDarkCMS extends mysqli {
    /** PARENT CLASS VARIABLES **/
    var $CON = false;
    var $SQL = null;
   
    /** CONTENT VARIABLES **/
    var $MENU = array();
    var $SERVERMSG;

    /** OBJECT ORIENTED VARIABLES **/
    var $SITE;
    var $GUILD;
    var $MYSQL;
    var $TOP100;
    var $USER;
    var $ADDONS;
    var $PAYPAL;

    /** MISC VARIABLES **/
    var $SHOWOPTIONS = false;	
    var $USERSONLINE = 0;
    var $SERVERSONLINE = 0;
    var $EXPLORABLEMAPS = null;
    var $MYGUILDS = null;
    var $GUILDS = null;

    /** CONSTRUCTOR **/
    function SchneiderDarkCMS() {
        $this->SITE = new stdClass();
        $this->GUILD = new stdClass();
        $this->MYSQL = new stdClass();
        $this->TOP100 = new stdClass();
        $this->USER = new stdClass();
        $this->ADDONS = new stdClass();
        $this->PAYPAL = new stdClass();

        $this->SITE->TITLE = SERVER_NAME;
        $this->SITE->DESCRIPTION = SERVER_DESCRIPTION;

        $this->SITE->DEBUG = new stdClass();
        $this->SITE->DEBUG->MODE = CMS_DEBUG_MODE;
        $this->SITE->DEBUG->MESSAGE = null;
        $this->SITE->DEBUG->TIMESTART = $this->Initialize('MicroTime');

        $this->SITE->TEMPLATE = 'SchneiderDark';
        $this->SITE->CURRENTFILE = null;
        $this->SITE->SHOWOPTIONS = null;
        $this->SITE->BACKGROUND = null;
        $this->SITE->SUBTITLE = null;
        $this->SITE->FACEBOOK = null;
        $this->SITE->SWFFILE = null;
        $this->SITE->SWFWIDTH = null;
        $this->SITE->SWFHEIGHT = null;
        $this->SITE->PROFILEPAGE = null;
        $this->SITE->PROFILEINVENTORY = null;
        $this->SITE->PROFILEACHIEVEMENTS = null;
        $this->SITE->PROFILEADDON = null;
        $this->SITE->JSCRIPTS = null;
        $this->SITE->CONTENT = null;

        $this->TOP100->LIST = null;
        $this->TOP100->WINNER = null;

        $this->GUILD->Options = null;
        $this->GUILD->OptionsTitle = null;
        $this->GUILD->Name = null;
        $this->GUILD->FounderName = null;
        $this->GUILD->Description = null;
        $this->GUILD->TotalMembers = null;
        $this->GUILD->PendingMembers = null;
        $this->GUILD->DateCreated = null;
        $this->GUILD->MemberList = null;
        $this->GUILD->PendingList = null;

        $this->ADDONS->REG1 = null;
        $this->ADDONS->REG2 = null;

        $this->USER->LOGGEDIN = null;
        $this->USER->NAME = null;
        $this->USER->EMAIL = null;
        $this->USER->EMAILSTATUS = null;
        $this->USER->EMAILSTATUSCOLOR = null;
        $this->USER->ACCESSSTATUSCOLOR = null;
        $this->USER->DATECREATED = null;
        $this->USER->LASTACCESS = null;
        $this->USER->ACCESS = null;
        $this->USER->UPGEXPIRE = null;
        $this->USER->UPGMESSAGE = null;	
        $this->USER->SESSION = null;
        $this->USER->CURRENTURL = null;
	
        $this->PAYPAL->SERVER = null;
        $this->PAYPAL->EMAIL = null;
        $this->PAYPAL->LANG = null;
        $this->PAYPAL->CCODE = null;
        $this->PAYPAL->SURL = null;
        $this->PAYPAL->CURL = null;
        $this->PAYPAL->RMETHOD = null;
		
        $this->MYSQL->TOTALQUERY = 0;
    }

    /** ON-EXIT (DESTRUCTOR) **/
    function __destruct() {
        if ($this->CON)
            parent::close();
    }
	
    /** MYSQL IMPROVED EXTENSION (PARENT CLASS) **/
    function MySQLi($type, $params = array()) {
        if (!$this->CON)
            UrgentMessage('No available MySQLi connection', __LINE__, __FILE__);
			
        switch (strtoupper($type)) {
            case 'QUERY':
                if ($Query = parent::query($params[0])) {
                    $this->MYSQL->TOTALQUERY++;
                    return $Query;
                } else
                    UrgentMessage('MySQLi failed to query: ' . $params[0], __LINE__, __FILE__);
                break;
            case 'PREPARE':
                if ($Query = parent::prepare($params[0])) {
                    $this->MYSQL->TOTALQUERY++;
                    return $Query;
                } else
                    UrgentMessage('MySQLi failed to prepare: ' . $params[0], __LINE__, __FILE__);
                break;
            case 'ESCAPESTRING':                
                if ($Escape = parent::real_escape_string($params[0]))
                    return $Escape;
                else
                    UrgentMessage('MySQLi failed to escape: ' . $params[0], __LINE__, __FILE__);                
                break;
        }
    }

    /** HANDLES INITIALIZATIONS **/
    function Initialize($type, $params = null) {
        switch ($type) {
            case 'Connection':
                parent::__construct($this->MYSQL->HOST, $this->MYSQL->USER, $this->MYSQL->PASS, $this->MYSQL->DATA);
                if (mysqli_connect_error())
                    $this->__parseError(mysqli_connect_errno(), mysqli_connect_error());
                else
                    $this->CON = true;

                break;
            case 'MicroTime':
                list($usec, $sec) = explode(" ", microtime());
                return ((float) $usec + (float) $sec);
                break;
                $params[0] = preg_replace("!/\*[^*]*\*+([^/][^*]*\*+)*/!", "", $params[0]);
            case 'Compress':
	            break;
            case 'MemoryUsage':
                $memory = memory_get_usage(true);
                return $memory < 1024 ? $memory . 'B' : ($memory < 1048576 ? round($memory / 1024,2) . 'KB' : round($memory / 1048576,2) . 'MB');
                break;
            case 'UsersOnline':
                $rs = $this->MySQLi('Query',  array( 0 => "SELECT SUM(Count) AS `TOTAL` FROM `meh_servers`" ));
                if ($obj = $rs->fetch_object()) $this->USERSONLINE = $obj->TOTAL;                     
                break;
            case 'ServersOnline':
                $rs = $this->MySQLi('Query', array( 0 => "SELECT SUM(Online) AS `TOTAL` FROM `meh_servers`" ));
                if ($obj = $rs->fetch_object()) $this->SERVERSONLINE = $obj->TOTAL;                              
                break;
            case 'Top100Characters':
                $rs = $this->MySQLi('Query', array( 0 => "SELECT Username, Gold, Coins, Level, Exp FROM `meh_users` WHERE access < 60 ORDER BY `Level` DESC, `Exp` DESC LIMIT 100" ));
                $c = (int) 0;
                while ($obj = $rs->fetch_object()) {
                    $c++; $this->TOP100->WINNER = (trim($this->TOP100->WINNER != '' ? $this->TOP100->WINNER : $obj->Username));
                    $this->TOP100->LIST .= '
					    <tr>
                            <td><b style="color: #669;">' . $c . '.</b></td>
                            <td><a href="playme/profile.php?u=' . $obj->Username . '"><b style="color: #669; text-decoration:underline;">' . $obj->Username . '</b></a></h5></td>
							 <td>' . $obj->Gold . '</td>
							  <td>' . $obj->Coins . '</td>
                            <td>' . $obj->Level . '</td>
                            <td>' . $obj->Exp . '</td>
                        </tr>
                <li class="one-third column">
                <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="300" height="231">
                <param name="movie" value="face.swf?ver=2" />
                <param name="quality" value="high" />
                <param name="wmode" value="transparent" />
                <embed src="face.swf?ver=2" width="300" height="231" quality="high" wmode="transparent"  pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" flashvars=""></embed>
                </object><h3>
                <img src="../templates/images/trophy-silver-icon.png" style="margin: -3px 5px;">
                '.$obj->Username.'
                <p><a href="/playme/profile.php?u='.$obj->Username.'">[View character profile page]</a></p>
                </h3>
                </li>';
                }				
                break;
            case 'Guilds':
                $rs = $this->MySQLi('Query', array( 0 => "SELECT * FROM `meh_guilds` ORDER BY `GuildName` ASC" ));
                $c = (int) 0;
        
                while ($GUILD = $rs->fetch_object()) {
                    $sqlFounder = $this->MySQLi('Query', array( 0 => "SELECT Username FROM `meh_users` WHERE id={$GUILD->Founder}" ));
                    $objFounder = $sqlFounder->fetch_object();

                    $guild['founder'] = $objFounder->Username;
                    $guild['members'] = 0;
                    $guild['status'] = null;
                    $guild['status_temp'] = null;
			
                    $data['line'] = explode(",", $GUILD->Members);
			
                    switch ($GUILD->Type) {
                        case 0:
                            $guild['status'] = '<font style="color: red;">Closed</font>';
                            break;
                        case 1:
                            $guild['status'] = '<font style="color: green;">Open</font>';
                            break;
                    }

                    for ($i = 0; $i < $count = count($data['line']); $i++) {
                        if (strlen($data['line'][$i]) < 1) continue;
                        $guild['members']++;
                        if ($data['line'][$i] == $params[0]->UserData['id']) {
                            $temp = "<td><a href='playme/profile.php?u={$guild['founder']}'><h5 style=\"color: #669; text-decoration:underline;\">{$guild['founder']}<h5></a></td>";
							$temp .= "<td>{$GUILD->Name}</td>";
                            $temp .= "<td>{$guild['members']} Members</td>";          
                            $temp .= "<td>{$guild['status_temp']}</td>";
                            $this->MYGUILDS .= "<tr>{$temp}</tr>";
                        }
                    }

                    $temp = "<td><a href='playme/profile.php?u={$guild['founder']}'><p style=\"color: #669; text-decoration:underline;\">{$guild['founder']}</p></a></td>";
                    $temp .="<td><p>{$GUILD->Name}</p></td>";
                    $temp .= "<td>{$guild['members']} Members</td>";
                    $temp .= "<td>{$guild['status']}</td>";
                    $this->GUILDS .= "<tr>{$temp}</tr>";
                }

                $this->MYGUILDS = $this->MYGUILDS == null ? '<tr><td colspan="4">You have no guilds.</td></tr>' : '<tr>' . $this->MYGUILDS . '</tr>';
                break;
            case 'News':
                if ($params == null OR !class_exists('BBCodes'))
                    UrgentMessage('No BBCodes Class Found!', __LINE__, __FILE__);

                $rs = $this->MySQLi('Query', array( 0 => "SELECT * FROM `cms_news` ORDER BY `id` DESC" ));
                while ($obj = $rs->fetch_object()) {
                    /** HANDLES USER AVATAR **/
                    $Avatar['Clean'] = 'images/avatars/noAvatar.png';				
					if (file_exists($Avatar['Clean'])) {
                        $Avatar['Clean'] = 'images/avatars/' . trim($obj->Author) . '.png';
                        list($Avatar['Width'], $Avatar['Height']) = getimagesize($Avatar['Clean']);
                        $Avatar['Width'] = $Avatar['Width'] > 200 ? 200 : $Avatar['Width'];
                    }
                    $Avatar['HTML'] = '<img src="' . $Avatar['Clean'] . '" width="' . $Avatar['Width'] . '" height="' . $Avatar['Height'] . '" alt="SAO!" >';

                    /** PARSES BBCODES **/
                    $obj->Content = $params[0]->Format($obj->Content);

                    /** PARSES NEWS **/
                    $this->SITE->CONTENT .= '
					<tr  align="center">
                            <td>
                                <center><br><a href="playme/profile.php?u=' . $this->Compress('String', $obj->Author) . '">' . $Avatar['HTML'] . '</a></center>
                                <center><p>' . $this->Compress('String', $obj->Date) . '</p></center>
                            </td>
                            <td>
                                <h1 class="title">' . $this->Compress('String', $obj->Title) . '<span class="line"></span></h1>
                                <br>' . $this->Compress('String', $obj->Content) . '
	                        </td>
                    </tr>';						
                }

                /** FINAL NEWS OUTPUT **/
                $this->SITE->CONTENT = '
                      <div id="slider">
                    <div class="container clearfix">
                  <div class="sixteen columns">
                <div class="flex-container">
	          <div class="flexslider">
		    <ul class="slides">
		  <li>
			<a href="#"><img src="templates/images/img/sliders/1.jpg" alt="SAO!"></a>
		  </li>
          <li>
			<a href="#"><img src="templates/images/img/sliders/2.jpg" alt="SAO!"></a>
		  </li>
		  <li>
			<a href="#"><img src="templates/images/img/sliders/3.jpg" alt="SAO!"></a>
		  </li>
          <li>
			<a href="#"><img src="templates/images/img/sliders/4.jpg" alt="SAO!"></a>
		  </li>
          <li>
			<a href="#"><img src="templates/images/img/sliders/5.jpg" alt="SAO!"></a>
		  </li>
          <li>
			<a href="#"><img src="templates/images/img/sliders/6.jpg" alt="SAO!"></a>
		  </li>
		    </ul>
	          </div>
                </div>
                  </div>
                    </div>
                      </div>
            <tr border="0" align="left" cellpadding="0" cellspacing="0" id="fadeobj" style="display:none;">
                <td colspan="2" align="left"><h1 class="title">Welcome to Project Untitled!<span class="line"></span></h1>
              <p>A free, fully animated, massively multiplayer online role playing game (MMORPG) that is updated weekly with new adventures! Battle dragons and other monsters online with friends... Project Untitled is built in flash so it plays using your web browser without any software to download!</p><br><br><br>
			<table>
                </td>
            </tr></td></tr>' . $this->SITE->CONTENT . '</table>';
                break;
        }
    }
	
    /** COMPRESS DATA **/
    function Compress($type, $data) {
        switch (strtoupper($type)) {
            case 'STRING':
                $data = preg_replace("!/\*[^*]*\*+([^/][^*]*\*+)*/!", "", $data);
                $data = str_replace(array("\r\n", "\r", "\n", "\t", "  ", "    ", "    "), "", $data);
                $data = str_replace("//-->", "\n//-->", str_replace("<!--", "<!--\r", $data));
                return trim($data);
                break;
        }
    }

    /** RETRIEVE DEFINED CONTENT TEMPLATE **/
    function GetCMSTemplate($temp) {
        $template = CMS_FILE_PATH . "templates/template.{$temp}.php";

        if (!file_exists($template))
            die('Template not found: ' . $template);        
	
        $data[0][0] = fopen($template, "r");
        $data[0][1] = fread($data[0][0], filesize($template));
        fclose($data[0][0]);

        return $data[0][1];
    }

    /** SEND RESPONSE TO THE CLIENT **/
    function SendResponse($message, $type = 1, $bbcodes = null, $width = null) {
        $width = $width == null ? null : ' style="width:' . $width . 'px"';
        $message = $bbcodes == null ? $message : $bbcodes->Format($message);
        switch ($type) {
            case 1:
                //success
                $this->SERVERMSG .= '<p class="success"' . $width . '>' . $message . '</p>';
                break;
            case 2:
                //error
                $this->SERVERMSG .= '<p class="error"' . $width . '>' . $message . '</p>';
                break;
            case 3:
                //info
                $this->SERVERMSG .= '<p class="info"' . $width . '>' . $message . '</p>';
                break;
            case 4:
                //notice
                $this->SERVERMSG .= '<p class="notice"' . $width . '>' . $message . '</p>';
                break;
            default:
                //undefined
                $this->SERVERMSG .= $message;
                break;
        }
    }
   
    /** FLUSH FINAL OUTPUT **/
    function FlushContent($EnableTemplate = true) {
        /** INITIALIZES CMS TEMPLATE **/
        $data = $EnableTemplate ? $this->GetCMSTemplate($this->SITE->TEMPLATE) : '{SITE_CONTENT}';

        /** INITIALIZE TEMPLATE VARIABLES **/
        $data = str_replace("{SITE_TITLE}", $this->SITE->TITLE, $data);
        $data = str_replace("{SITE_DESCRIPTION}", $this->SITE->DESCRIPTION, $data);
        $data = str_replace("{SITE_BACKGROUND}", $this->SITE->BACKGROUND, $data);
        $data = str_replace("{SITE_CONTENT}", $this->SITE->CONTENT, $data);
        $data = str_replace("{SITE_SUBTITLE}", $this->SITE->SUBTITLE, $data);
        $data = str_replace("{SITE_RIGHTCLICK_DISABLER}", $this->GetCMSTemplate('rightclickdisabler'), $data);
        $data = str_replace("{SITE_ACCOUNT_SETTINGS}", $this->USER->LOGGEDIN ? '
		  <li><a href="#" id="menu_account">Account</a>
            <ul>
            <li><a href="{SITE_CMS_ROOT}manage.php">Account Overview</a></li>
            <li><a href="{SITE_CMS_ROOT}manage.php?changeemail">Change Email</a></li>
            <li><a href="{SITE_CMS_ROOT}manage.php?changepassword">Change Password</a></li>
            <li><a href="{SITE_CMS_ROOT}manage.php?logout">Logout</a></li>
			</ul>
          </li>' 
            : '
          <li><a href="/home.php" id="menu_account">Home!</a>
          <li><a href="/play.php" id="menu_account">Game</a>
          </li>', $data);
        $data = str_replace("{SITE_FACEBOOK}", $this->SITE->FACEBOOK, $data);
        $data = str_replace("{SITE_CUSTOM_SCRIPTS}", $this->SITE->JSCRIPTS, $data);
        $data = str_replace("{SITE_SWF_FILE}", $this->SITE->SWFFILE, $data);
        $data = str_replace("{SITE_SWF_WIDTH}", $this->SITE->SWFWIDTH, $data);
        $data = str_replace("{SITE_SWF_HEIGHT}", $this->SITE->SWFHEIGHT, $data);
        $data = str_replace("{SITE_PROFILE_PAGE}", $this->SITE->PROFILEPAGE, $data);
        $data = str_replace("{SITE_PROFILE_INVENTORY}", $this->SITE->PROFILEINVENTORY, $data);
        $data = str_replace("{SITE_PROFILE_ACHIEVEMENTS}", $this->SITE->PROFILEACHIEVEMENTS, $data);
        $data = str_replace("{SITE_PROFILE_ADDON}", $this->SITE->PROFILEADDON, $data);
        $data = str_replace("{SITE_CMS_ROOT}", CMS_ROOT, $data);
        $data = str_replace("{SITE_CMS_FILE}", $_SERVER['REQUEST_URI'], $data);
        $data = str_replace("{REGISTER_ADDON_1}", $this->ADDONS->REG1, $data);
        $data = str_replace("{REGISTER_ADDON_2}", $this->ADDONS->REG2, $data);
        $data = str_replace("{SERVER_NAME}", SERVER_NAME, $data);
        $data = str_replace("{SERVER_DESCRIPTION}", SERVER_DESCRIPTION, $data);
        $data = str_replace("{SERVER_FACEBOOK}", SERVER_FACEBOOK, $data);
        $data = str_replace("{SERVER_USERSONLINE}", $this->USERSONLINE, $data);
        $data = str_replace("{SERVER_SERVERSONLINE}", $this->SERVERSONLINE, $data);
        $data = str_replace("{SERVER_TOP100_LIST}", $this->TOP100->LIST, $data);
        $data = str_replace("{SERVER_TOP100_WINNER}", $this->TOP100->WINNER, $data);
        $data = str_replace("{SERVER_MYGUILDS}", $this->MYGUILDS, $data);
        $data = str_replace("{SERVER_GUILDS}", $this->GUILDS, $data);
        $data = str_replace("{SERVER_GUILD_OPTIONS}", $this->GUILD->Options == null ? null : $this->GUILD->Options, $data);
        $data = str_replace("{SERVER_GUILD_OPTIONSTITLE}", $this->GUILD->OptionsTitle == null ? null : '
            <span>
                ' . $this->GUILD->OptionsTitle . '<br />
            </span>&nbsp;', $data);

        $data = str_replace("{SERVER_MESSAGE}", $this->SERVERMSG, $data);
        $data = str_replace("{SERVER_OWNER_NAME}", SERVER_OWNER_NAME, $data);
        $data = str_replace("{SERVER_OWNER_EMAIL}", SERVER_OWNER_EMAIL, $data);
        $data = str_replace("{SERVER_PAYPAL_URL}", $this->PAYPAL->SERVER, $data);
        $data = str_replace("{SERVER_PAYPAL_BUSINESS}", $this->PAYPAL->EMAIL, $data);
        $data = str_replace("{SERVER_PAYPAL_LANGUAGE}", $this->PAYPAL->LANG, $data);
        $data = str_replace("{SERVER_PAYPAL_CURRENCY_CODE}", $this->PAYPAL->CCODE, $data);
        $data = str_replace("{SERVER_PAYPAL_URL_SUCCESS}", $this->PAYPAL->SURL, $data);
        $data = str_replace("{SERVER_PAYPAL_URL_CANCEL}", $this->PAYPAL->CURL, $data);
        $data = str_replace("{SERVER_PAYPAL_RETURN_METHOD}", $this->PAYPAL->RMETHOD, $data);
        $data = str_replace("{UDATA_NAME}", $this->USER->NAME, $data);
        $data = str_replace("{UDATA_EMAIL}", $this->USER->EMAIL, $data);
        $data = str_replace("{UDATA_EMAIL_STATUS}", $this->USER->EMAILSTATUS, $data);
        $data = str_replace("{UDATA_EMAIL_STATUS_COLOR}", $this->USER->EMAILSTATUSCOLOR, $data);
        $data = str_replace("{UDATA_DATECREATED}", $this->USER->DATECREATED, $data);
        $data = str_replace("{UDATA_LASTACCESS}", $this->USER->LASTACCESS, $data);
		$data = str_replace("{UDATA_ACCESS}", $this->USER->ACCESS, $data);
        $data = str_replace("{UDATA_ACCESS_STATUS_COLOR}", $this->USER->ACCESSSTATUSCOLOR, $data);
        $data = str_replace("{UDATA_UPGEXPIRE}", $this->USER->UPGEXPIRE, $data);
        $data = str_replace("{UDATA_UPGMSG}", $this->USER->UPGMESSAGE, $data);
        $data = str_replace("{UDATA_SESSION}", $this->USER->SESSION, $data);
        $data = str_replace("{UDATA_CURRENTURL}", $this->USER->CURRENTURL, $data);

        /** DEBUG COMPONENTS **/
        $this->SITE->DEBUG->TIMEEND = $this->Initialize('MicroTime');
        $this->SITE->DEBUG->MESSAGE = $this->SITE->DESCRIPTION . ' loaded in ' . round($this->SITE->DEBUG->TIMEEND - $this->SITE->DEBUG->TIMESTART, 3) . ' seconds';
        $this->SITE->DEBUG->MESSAGE .= ' with ' . $this->MYSQL->TOTALQUERY . ' queries';
        $this->SITE->DEBUG->MESSAGE .= ' using ' . $this->Initialize('MemoryUsage') . ' of Memory';		
        $data = str_replace("{SITE_DEBUG_MESSAGE}", $this->SITE->DEBUG->MODE ? $this->SITE->DEBUG->MESSAGE : null, $data);
		
        /** RETURN OUTPUT **/
        return ($EnableTemplate ? "<!--"
            . "\n HardCoreCMS Project Untitled Content Management System (APUContentMS)" 
            . "\n Made by Schneider Dark"
            . "\n Developer: Developer Name"
            . "\n "
            . "\n @DEVELOPER PLEASE NOTE"
            . "\n You may edit and/or improve it any further it as long as you do not remove the original author name."
            . "\n-->"
            . "\n\n" : null) . $this->Compress('String', $data);
    }
}
?>