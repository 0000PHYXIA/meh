<?php
/**
  * Game Title Content Management System - Data Handler
  * @Author Schneider Dark
  * @Developer "Developer Name"
  *
  * DEVELOPER PLEASE NOTE
  * You may edit and/or improve it any further it as long as you do not remove the original author name.
**/

class DataHandler {
    /** INITIALIZES VARIABLES **/
    var $DATA, $CHILD = null, $XML, $DOM, $TYPE, $OUTPUT = null;

    /** CLASS CONSTRUCTOR **/
    function DataHandler($type = null, $parent = null) {
        $this->DATA = new stdClass();
        switch ($type = strtoupper($type)) {
            case 'XML':
                $this->TYPE = strtoupper($type);
                $this->XML = new SimpleXMLElement('<' . $parent . '></' . $parent . '>');
                $this->DOM = null;
                break;
            case 'DOM':
                $this->TYPE = strtoupper($type);
                $this->XML = null;
                $this->DOM = new DOMDocument();
                break;
            default:
                $this->TYPE = strtoupper($type);
                $this->XML = null;
                $this->DOM = null;
                break;
        }
    }

    function addData($name, $value, $sub = null) {
        if (isset($sub)) {
		    $test = count(get_object_vars($this->CHILD));
            $this->CHILD[$test] = array( 0 => $name, 1 => $value, 2 => $sub);			
        } else
            $this->DATA->$name = $value;
    }
	
    function addChild($child) {
        return $this->XML->addChild($child);
    }
	
    function removeData($name) {
        unset($this->DATA->$name);
    }
	
    function removeChild($name) {
        //soon
    }
	
    function ObjectToArray($object) {
        $Array = is_object($object) ? get_object_vars($object) : $object;
        $Data = array();

        foreach ($Array as $Key => $Value) {
            $Value = (is_array($Value) OR is_object($Value)) ? $this->ObjectToArray($Value) : $Value;
            $Data[$Key] = $Value;
        }
		
        return $Data;
    }

    function ParseData() {
        /** PARSES OBJECT DATA **/
        $Data = ($this->ObjectToArray($this->DATA));
        foreach ($Data as $Key => $Value) {
            switch (strtoupper($this->TYPE)) {
                case 'XML':
                    $this->XML->addAttribute($Key, $Value);
                    break;
                case null:
                default:
                    $this->OUTPUT =  $this->OUTPUT == null ? $Key . '=' . $Value : $this->OUTPUT . '&' . $Key . '=' . $Value;
                    break;
            }
        }
		
        /** PARSES CHILDS **/
        $Data = $this->CHILD;
        if ($Data != null) {
            foreach ($Data as $Key => $Value) {
                switch (strtoupper($this->TYPE)) {
                    case 'XML':
                        $Data[$Key][2]->addAttribute($Data[$Key][0], $Data[$Key][1]);
                        break;
                    case null:
                    default:
                        break;
                }
            }
        }

        /** XML TO STRING **/
        if (strtoupper($this->TYPE) != null AND strtoupper($this->TYPE) == 'XML') {
            $XMLDOM = dom_import_simplexml($this->XML);
            $this->OUTPUT = $XMLDOM->ownerDocument->saveXML($XMLDOM->ownerDocument->documentElement);
        }

        /** RETURN OUTPUT **/
        return $this->OUTPUT;
    }
}
/*
$DataHandler = new DataHandler('XML', array( 0 => 'nigger' ));
$DataHandler->addData('name', 'ddd');
$NewChild = $DataHandler->addChild('name', 'value');

$DataHandler->addData('newchild', 'value', $NewChild);
$DataHandler->removeData('name');

------------------------------------------------------------
$DataHandler->Data('ADD', array( 0 => 'Test', 1 => 'fap'));
$DataHandler->Data('ADD', array( 0 => 'add', 1 => 'dsadsa'));

$NEWXML = $DataHandler->Data('NEWCHILD', array( 0 => 'test' ));
$DataHandler->Data('ADD', array( 0 => 'arararar', 1 => 'content', 2 => $NEWXML));

echo $DataHandler->ParseData();
*/
?>