<?php
/**
  * BBCode Parser (Class)
  *
  * @author N/A
  * @license http://opensource.org/licenses/gpl-license.php GNU Public License
  * @modifer Schneider Dark
  * @credits http://www.phpit.net && http://forums.codecharge.com/posts.php?post_id=77123
  *
  * DEVELOPERS PLEASE NOTE
  * We request you retain the full copyright notice below including the link to http://ProjectUntitled.com/
  * This not only gives respect to the large amount of time given freely by the developers
  * but also helps build interest, traffic and use of "iChat". If you (honestly) cannot retain
  * the full copyright we ask you at least leave in place the "Powered by Project Untitled" line, with
  * "Project Untitled" linked to http://ProjectUntitled.com/ . If you refuse to include even this then support on our
  * Chatbox may be affected.
**/

class BBCodes {   
    function Format($str) {
        $str = htmlentities($str);
        $simple_search = array( 
            /** ADDED LINE BREAK **/ 
            '/\[title\](.*?)\[\/title\]/is', 
            '/\[subtitle\](.*?)\[\/subtitle\]/is', 
            '/\[list\](.*?)\[\/list\]/is', 
            '/\[\*\](.*?)\[\/\*\]/is', 
            '/\[p\=(.*?)\](.*?)\[\/p\]/is', 
            '/\[br\]/is', 
            '/\[b\](.*?)\[\/b\]/is', 
            '/\[i\](.*?)\[\/i\]/is', 
            '/\[u\](.*?)\[\/u\]/is', 
            '/\[url\=(.*?)\](.*?)\[\/url\]/is', 
            '/\[url\](.*?)\[\/url\]/is', 
            '/\[align\=(left|center|right)\](.*?)\[\/align\]/is', 
            '/\[img\](.*?)\[\/img\]/is', 
            '/\[mail\=(.*?)\](.*?)\[\/mail\]/is', 
            '/\[mail\](.*?)\[\/mail\]/is', 
            '/\[font\=(.*?)\](.*?)\[\/font\]/is', 
            '/\[size\=(.*?)\](.*?)\[\/size\]/is', 
            '/\[color\=(.*?)\](.*?)\[\/color\]/is', 
            /** ADDED TEXTAREA FOR CODE PRESENTATION **/ 
            '/\[codearea\](.*?)\[\/codearea\]/is', 
            /** ADDED PRE CLASS FOR CODE PRESENTATION **/
            '/\[code\](.*?)\[\/code\]/is', 
            /** ADDED PARAGRAPH **/ 
            '/\[p\](.*?)\[\/p\]/is', 
            '/\[center\](.*?)\[\/center\]/is', 
        ); 
 
        $simple_replace = array( 
            /** ADDED LINE BREAK **/
            '<h1>$1</h1>', 
            '<h3>$1</h3>', 
            '<ul>$1</ul>', 
            '<li>$1</li>', 
            '<h3>$1</h3><p>$2</p>', 
            '<br />', 
            '<strong>$1</strong>', 
            '<em>$1</em>', 
            '<u>$1</u>', 
            /** ADDED "NOFOLLOW" TO PREVENT SPAM **/ 
            '<a href="$1" rel="nofollow" title="$2 - $1">$2</a>', 
            '<a href="$1" rel="nofollow" title="$1">$1</a>', 
            '<div style="text-align: $1;">$2</div>', 
            /** ADDED ALT ATTRIBUTE FOR VALIDATION **/ 
            '<img src="$1" alt="" />', 
            '<a href="mailto:$1">$2</a>', 
            '<a href="mailto:$1">$1</a>', 
            '<span style="font-family: $1;">$2</span>', 
            '<span style="font-size: $1;">$2</span>', 
            '<span style="color: $1;">$2</span>', 
            /** ADDED TEXTAREA FOR CODE PRESENTATION **/
            '<textarea class="code_container" rows="30" cols="70">$1</textarea>', 
            /** ADDED PRE CLASS   FOR CODE PRESENTATION **/
            '<pre class="code">$1</pre>', 
            /** ADDED PARAGRAPH **/ 
            '<p>$1</p>', 
            '<center>$1</center>', 
        ); 
 
        /** DO SIMPLE BBCode's **/
        $str = preg_replace($simple_search, $simple_replace, $str); 
 
        /** DO <blockquote> BBCode **/ 
        $str = $this->Quote($str); 
 
        return $str; 
    } 
   
    function Quote($str) { 
        /** ADDED "DIV" AND "CLASS" FOR QUOTES **/ 
        $open = '<blockquote><div class="quote">'; 
        $close = '</div></blockquote>'; 
 
        /** HOW OFTEN IS THE OPEN TAG? **/ 
        preg_match_all('/\[quote\]/i', $str, $matches); 
        $opentags = count($matches['0']); 
 
        /** HOW OFTEN IS THE CLOSE TAG? **/ 
        preg_match_all('/\[\/quote\]/i', $str, $matches); 
        $closetags = count($matches['0']); 
 
        /** CHECK HOW MANY TAGS HAVE BEEN UNCLOSED 
          * AND ADD THE UNCLOSING TAG AT THE ENDOF MESSAGE **/
        $unclosed = $opentags - $closetags; 
        for ($i = 0; $i < $unclosed; $i++) { 
            $str .= '</div></blockquote>'; 
        } 
 
        /** DO REPLACEMENT **/ 
        $str = str_replace ('[' . 'quote]', $open, $str); 
        $str = str_replace ('[/' . 'quote]', $close, $str); 
 
        return $str; 
    }
}
?>