<?php
/** SERVER INFORMATION **/
define('SERVER_NAME', 'InfinityServer');
define('SERVER_DESCRIPTION', null);
define('SERVER_FACEBOOK', '/MinionProject');
define('SERVER_OWNER_NAME', 'Kakakaja');
define('SERVER_OWNER_EMAIL', 'nerux2014@gmail.com');

/** MYSQL DATA CONFIGURATIONS **/
define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASS', '');
define('MYSQL_DATA', 'infinity');

define('PAYPAL_EMAIL', 'AhmedSchneider@gmail.com.pk');
define('PAYPAL_SURL', 'http://ProjectUntitled.com//shop.php?gen');
define('PAYPAL_CURL', 'http://ProjectUntitled.com/shop.php?error');
define('PAYPAL_RMETHOD', '2');
define('PAYPAL_PMETHOD', 'CAD');
define('PAYPAL_CCODE', 'CAD');
define('PAYPAL_LANG', 'CA');
define('PAYPAL_SERVER', 'https://www.paypal.com/cgi-bin/webscr');

define('CMS_FILE_PATH', dirname(__FILE__) . "/");
define('CMS_DEBUG_MODE', true);
define('CMS_ADVERTISEMENTS', false);
define('CMS_ROOT', 'http://127.0.0.1/');

define('CMS_CLASS_ERROR', 'classes/class.handler.php');
define('CMS_CLASS_MAIN', 'classes/class.content.php');
define('CMS_CLASS_CORE', 'classes/class.core.php');
define('CMS_CLASS_DATA', 'classes/class.data.php');
define('CMS_CLASS_BBCODES', 'classes/class.bbcodes.php');

function DefineClass($ClassName = null) {
    switch (strtoupper($ClassName)) {
        case 'HANDLER':
            $CLASS = CMS_FILE_PATH . CMS_CLASS_ERROR;
            if (file_exists($CLASS)) require $CLASS; else UrgentMessage('Class ' . $ClassName . ' (' . $CLASS . ') does not exist!', __LINE__, __FILE__);
            break;
        case 'CONTENT':
            $CLASS = CMS_FILE_PATH . CMS_CLASS_MAIN;
            if (file_exists($CLASS)) require $CLASS; else UrgentMessage('Class ' . $ClassName . ' (' . $CLASS . ') does not exist!', __LINE__, __FILE__);
            break;
        case 'CORE':
            $CLASS = CMS_FILE_PATH . CMS_CLASS_CORE;
            if (file_exists($CLASS)) require $CLASS; else UrgentMessage('Class ' . $ClassName . ' (' . $CLASS . ') does not exist!', __LINE__, __FILE__);
            break;
        case 'DATA':
            $CLASS = CMS_FILE_PATH . CMS_CLASS_DATA;
            if (file_exists($CLASS)) require $CLASS; else UrgentMessage('Class ' . $ClassName . ' (' . $CLASS . ') does not exist!', __LINE__, __FILE__);
            break;
        case 'BBCODES':
            $CLASS = CMS_FILE_PATH . CMS_CLASS_BBCODES;
            if (file_exists($CLASS)) require $CLASS; else UrgentMessage('Class ' . $ClassName . ' (' . $CLASS . ') does not exist!', __LINE__, __FILE__);
            break;
    }
}

function UrgentMessage($text = 'No given message', $line = __LINE__, $file = __FILE__) {
    header('Content-Type: text/plain');
    print ("$text - " . date("F j, Y, g:i a"));
    print ("\nLocation: $file ($line)");
    exit(1);
}
?>