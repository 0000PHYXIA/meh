<?php
/**
  * Game Title Content Management System - Class Login
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
    var $MYSQL;
    var $USER;
    var $ADDONS;

    /** MISC VARIABLES **/
    var $SHOWOPTIONS = false;	
    var $USERSONLINE = 0;
    var $SERVERSONLINE = 0;

    /** CONSTRUCTOR **/
    function SchneiderDarkCMS() {
        $this->SITE = new stdClass();
        $this->MYSQL = new stdClass();
        $this->USER = new stdClass();
        $this->ADDONS = new stdClass();

        $this->SITE->TITLE = SERVER_NAME;
        $this->SITE->DESCRIPTION = SERVER_DESCRIPTION;

        $this->SITE->DEBUG = new stdClass();
        $this->SITE->DEBUG->MODE = CMS_DEBUG_MODE;
        $this->SITE->DEBUG->MESSAGE = null;
        $this->SITE->DEBUG->TIMESTART = $this->Initialize('MicroTime');

        $this->SITE->TEMPLATE = 'accountlogin';
        $this->ADDONS->REG1 = null;
        $this->ADDONS->REG2 = null;
        $this->USER->LOGGEDIN = null;
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
		$data = str_replace("{SITE_STICKY_ACCOUNT}",  !$this->USER->LOGGEDIN ? '
            <form id="login_form" action="?home" method="post">
                <table cellspacing="0">
                     <tbody>
                   <tr>
                     <td class="html7magic"><label style="color: rgb(66, 66, 66);"><strong>Username:</strong></label></td>
                     <td class="html7magic"><label style="color: rgb(66, 66, 66);"><strong>Password:</strong></label></td>
                     <td><a target="_blank" id="settingsLink" href="#" style="color: rgb(66, 66, 66);"><img style="width: 16px; height: 16px;" src="templates/facebook/cog2.png" /></a></td>
                   </tr>
                   <tr>
                     <td><input type="text" class="inputText" name="txtUsername"></td>
                     <td><input type="password" class="inputText" name="txtPassword"></td>
                      <td><label class="uiButton uiButtonConfirm" id="loginbutton" for="u_0_4" style="color: rgb(66, 66, 66);"><button type="submit" class="brown">Link&nbsp;Start</button></label></td>
                   </tr>
                   <tr>
                <td class="login_form_label_field">
                     <div>
                     <div class="uiInputLabel clearfix"><input id="persist_box" type="checkbox" name="persistent" value="1" checked="1" class="uiInputLabelCheckbox" /><label for="persist_box" style="color: rgb(66, 66, 66);">&nbsp;Keep me logged in</label></div>
                        <input type="hidden" name="default_persistent" value="1" />
                     </div>
                     </td>
                     <td class="login_form_label_field"><a rel="nofollow" href="../?register" style="color: rgb(66, 66, 66);">Create a Free Account</a></td>
                   </tr>
                     </tbody>
                </table>
            </form>'
            : '', $data);
        $data = str_replace("{SITE_CUSTOM_SCRIPTS}", $this->SITE->JSCRIPTS, $data);
        $data = str_replace("{SITE_SWF_FILE}", $this->SITE->SWFFILE, $data);
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

        $data = str_replace("{SERVER_MESSAGE}", $this->SERVERMSG, $data);
        $data = str_replace("{SERVER_OWNER_NAME}", SERVER_OWNER_NAME, $data);
        $data = str_replace("{SERVER_OWNER_EMAIL}", SERVER_OWNER_EMAIL, $data);
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
            . "\n HardCoreCMS: Game Title Content Management System (Schneider Dark CMS)" 
            . "\n @Made by Schneider Dark"
			. "\n "
			. "\n @DEVELOPER PLEASE NOTE"
			. "\n You may edit and/or improve it any further it as long as you do not remove the original author name."
            . "\n-->"
            . "\n\n" : null) . $this->Compress('String', $data);
    }
}
?>
