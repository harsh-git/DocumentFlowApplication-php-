
<?php

// any application will contain roles and their workflow/movement
//
class appschema 
{   public static  $apps_list = array();

	public static  $doc_list = array();

	function __construct()
	{   self::$apps_list["patent"] =  array("pl"=> array(array(),array("lm")),
		"lm"=> array(array("pl"),array("hod")),
		"hod" => array(array("pl"),array("ipc")),
		"ipc" => array(array("pl"),array("iphod","unithead")),
		"iphod" => array(array("pl"),array("ipc","pipec")),
		"pipec" => array(array("iphod"),array()),
		"cipec" => array(array("iphod"),array()),
		"unithead" => array(array("ipc"),array())
		);

		self::$doc_list["patent"] = array( "pl" => array("form1a","form1b"),
		"hod" => array("form2a")
		);











    }

    function app_exists($app){
    	if(array_key_exists($app,self::$apps_list)){
    		return true;
    	}
    	else{
    		false;
    	}
    }

	function nextstations($app,$currentstation){

		return self::$apps_list[$app][$currentstation][1];
	}

	function prevstations($app,$currentstation){

		return self::$apps_list[$app][$currentstation][0];
	}


	function listofalldocs($app,$station=null){
		$list = array();

		if(isset($station)){
			foreach (self::$doc_list[$app] as $key => $value) {
				foreach ($value as $k => $v) {
					if($station == $v){
						$list[] = $key;
					}
				}

			}
		}
		else{
			foreach (self::$doc_list[$app] as $key => $value) {
				$list[] = $key;			
			}


		}

		return $list;
	}
} //end of appschema class





/*

$app = new appschema();
var_dump($app->nextstations('patent','iphod'));

	
		var_dump(prevstations('patent','iphod'));
		var_dump(listofalldocs('patent'));
		var_dump(listofalldocs('patent','hod'));

		return false;
	*/














