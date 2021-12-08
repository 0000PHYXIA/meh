<?php
/**
 * Put this in your game folder.
 */
//5 and 6
//error_reporting(0);
define('PATH', getAbsolutePath());
//echo $_SERVER['DOCUMENT_ROOT'];
//echo PATH;
global $dir,$result,$html, $status;
if (isset($_POST['links'])) {
    $links = $_POST['links'];
    $e = explode("\n", $links);
    foreach($e as $key => $value) {
        $status = "Downloading..";
        $value = preg_replace('/\s*/m', '', $value);
        $html = substr($value, 0, strlen($value));
		$b = strrpos($value, "/");
		$x = strrpos($value, "/classes");
		$c = strrpos($value, "/items");
        $m = strrpos($value, "/maps");
        $mon = strrpos($value, "/mon");
		$html .= substr($value, $b + 1)."<br />";
		if(strrpos($value, "/items")) {
			$fileName = PATH."/gamefiles/".substr($value, $c + 1);
			if (!file_exists($fileName)) {
				copy($value, $fileName);
				$result .=  "Downloaded! ".substr($value, $c + 1)." <br />";
			} else {
				$result .=  "Skipped! ".substr($value, $c + 1)." <br />";
			}
		} else if (strrpos($value, "/classes")) {
			$fileName = PATH."/gamefiles/".substr($value, $x + 1);
			if (!file_exists($fileName)) {
				copy($value, $fileName);
				$result .= "Downloaded! ".substr($value, $x + 1)." <br />";
			} else {
				$result .=  "Skipped! ".substr($value, $x + 1)." <br />";
			}
		} else if (strrpos($value, "/maps")) {
			$fileName = PATH."/gamefiles/".substr($value, $m + 1);
			if (!file_exists($fileName)) {
				copy($value, $fileName);
				$result .= "Downloaded! ".substr($value, $m + 1)." <br />";
			} else {
				$result .=  "Skipped! ".substr($value, $m + 1)." <br />";
			}
		} else if (strrpos($value, "/mon")) {
			$fileName = PATH."/gamefiles/".substr($value, $mon + 1);
			if (!file_exists($fileName)) {
				copy($value, $fileName);
				$result .= "Downloaded! ".substr($value, $mon + 1)." <br />";
			} else {
				$result .=  "Skipped! ".substr($value, $mon + 1)." <br />";
			}
		}
    }
//echo $result;
    $status = "Downloading..Done!";
    print($result);
}

function getAbsolutePath() {
    return $absolute_path = str_replace('\\', '/', dirname(__FILE__));
}
//if (!file_exists($dir)) {
//                copy($value, $dir);
//            }
//echo PATH;
/**foreach($ex as $k => $v) {
    echo $v."\n";
}
echo $ex;**/

function urlFile($url) {
    $file = substr($url,strrpos($url,'/'),strlen($url));
    $fname = explode("/",$file);
    return $fname[1];
}

function escape($str) {

    $patterns = array(
        '/\//',
        '/\^/',
        '/\./',
        '/\$/',
        '/\|/',
        '/\(/',
        '/\)/',
        '/\[/',
        '/\]/',
        '/\*/',
        '/\+/',
        '/\?/',
        '/\{/',
        '/\}/',
        '/\,/');
    $replace = array(
        '\/',
        '\^',
        '\.',
        '\$',
        '\|',
        '\(',
        '\)',
        '\[',
        '\]',
        '\*',
        '\+',
        '\?',
        '\{',
        '\}',
        '\,');

    return preg_replace($patterns, $replace, $str);
}
//print($result);
?>
<html>
<head>
<title>HP SWF </title>

<style type="text/css">
body{
#BBBBBB
}
#submit {
background: #41b6ff;
width: 741px;
height: 30px;
color: #000;
-webkit-border-radius: 10px;
-moz-border-radius: 10px;
border-radius: 10px;

text-size: 15px;

 }
 
 #submit:hover {
 background: #8DD3FF;
 }
#textarea {
-webkit-border-radius: 10px;
-moz-border-radius: 10px;
border-radius: 10px;
-moz-box-shadow: 0 0 5px 5px #888;
-webkit-box-shadow: 0 0 5px 5px#888;
box-shadow: 0 0 5px 5px #888;
border: none;
}



</head>
</style>

<center><form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<textarea rows=90 cols=90 name=links id=textarea ><?php echo isset($_GET['links']) ? $_GET['links'] : "" ."\n";?></textarea>

<br>
<input type=submit value=submit id=submit class=submit />
</form>
</center>

</html>