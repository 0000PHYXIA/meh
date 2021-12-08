<?php
/**
  * Game Title Content Management System - Error Handlder
  * @Author Schneider Dark
  * @Developer "Developer Name"
  *
  * DEVELOPER PLEASE NOTE
  * You may edit and/or improve it any further it as long as you do not remove the original author name.
**/

class ErrorHandler {	
    /** CLASS CONSTRUCTOR **/
    function ErrorHandler($absorb = true) {
        error_reporting(E_ALL);
		
        /** PHP INI PROPERTIES **/
        ini_set('display_errors', 0);
        ini_set('memory_limit', '700M');
		
        if ($absorb)
            set_error_handler(array(new ErrorHandler(false), 'HandleError'));
    }

    /** HANDLES ERRORS **/
    function HandleError($ErrorNo, $ErrorMessage, $ErrorFile, $ErrorLine, $ErrorCustom = false) {
        if (!(error_reporting() & $ErrorNo) AND !$ErrorCustom)
            return;

        /** DEFINE MAIN CLASS **/
        if (!class_exists('SchneiderDarkCMS')) 
            require CMS_ROOT . 'classes/class.content.php';

        /** INITIALIZE CONTENT **/
        $error = new SchneiderDarkCMS();

        /** PARSE ERROR TYPE **/
        switch ($ErrorNo) {
            case E_USER_ERROR:
                $ErrorType = 'Fatal Error';
                break;
            case E_USER_WARNING:
                $ErrorType = 'Warning';
                break;
            case E_USER_NOTICE:
                $ErrorType = 'Notice';
                break;
            default:
                $ErrorType = 'Unknown Error';
                break;
        }
    
        $error->SHOWOPTIONS = false;
        $error->SITE->TITLE = 'Warning';
        $error->SITE->DESCRIPTION = $ErrorType;
        $error->SITE->CONTENT = "<p class=\"error\" style=\"margin-top:20px;\"><span>Error No. #{$ErrorNo} - {$ErrorType}</span><br>";
        $error->SITE->CONTENT .= "<i>{$ErrorMessage}</i><br /></br>Error on <strong>line {$ErrorLine}</strong> in file {$ErrorFile}";
        $error->SITE->CONTENT .= '<br />Please notify the server Administrator or Webmaster: <b>' . SERVER_OWNER_EMAIL . '</b></p>';

        print ($error->FlushContent());
        exit(1);
        return true;        
    }
}
?>