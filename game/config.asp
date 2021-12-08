<?php
/** 
  * Advanced HiddenProject Content Management System - CMS Configurations
  * Copyright (c) 2012 Naufal Hardiansyah (www.gremory.cu.cc)
  * 
  * DEVELOPER NOTES:
  * - As for the MainRoot; if you're going to change constant, please also modify the .htaccess
  * - Internet Explorer 9 is currently not supported by the following CMS, 
  * you might want to change the IESuppport constant. By default, it is enabled (true)
**/

interface Configurations {
    /** CMS BUILD INFO **/ 
    const Build = '1.0';
    const Template = 'new';
    const License = '4ad81c7e99320407b9dab52aa1faba73';
	
    /** SERVER INFORMATION **/
    const ServerName = 'Infinity Server';
    const ServerDescription = 'MMORPG';
    const ServerCompany = 'IFTeam';    

    const OwnerName = 'Kakakaja';
    const OwnerEmail = 'nerux2014@gmail.com';
    const FacebookId = 'Minionproject';
    
    /** MYSQL DATA **/
    const MySQLHost = 'mysqlc';
    const MySQLUser = 'root';
    const MySQLPass = '$Rafa1234';
    const MySQLData = 'meh';
    
    const DebugMode = true;    
    const Advertisements = true;
    const IESupport = true;

    /** PAYPAL STUFF **/    
    const PayPalEmail = "patelprem123@live.com";
    const PayPalSuccessURL = 'shop.php?gen';
    const PayPalFailureURL = 'shop.php?error';
    const PayPalRMethod = 2;
    const PayPalPMethod = 'fso';
    const PayPalCCode = 'USD';
    const PayPalLanguage = 'US';
    const PayPalServer = 'https://www.paypal.com/cgi-bin/webscr';
    
    /** GAME CONFIGURATIONS **/
    const CharacterFile = 'gamefiles/character3.swf';
    const RegistrationFile = 'gamefiles/newuser/AQW-Landing-12Feb14.swf';
    const GameLoader = 'gamefiles/Loader.swf';
    const GameFile = 'HQW-Gamev1.0.5.swf';
    const GameBG = 'INF-BG-2015-01-11~Kakakaja.swf';
    const NewRelease = 'SEXO!';
    const GameUpdates = '';
}

putenv("SiteRoot=/");
putenv("TimeZone=Asia/Jakarta");

error_reporting(E_ALL);
date_default_timezone_set(getenv('TimeZone'));

ini_set('display_errors', Configurations::DebugMode ? 1 : 0);
ini_set('memory_limit', '700M');
ini_set("max_execution_time", 120);
?>