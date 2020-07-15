<?php

$driver = new mysqli_driver();
$driver->report_mode = MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR;

function get($setting) {
	try {
		$db = new mysqli("mysql", "root", "", "testschema" );
		$get = $db->prepare("SELECT * FROM settings WHERE id = ?");
		$get->bind_param("i",$setting);
		$get->execute();
		$res = $get->get_result();
		$db->close();
		while($row = $res->fetch_assoc()) {
			return $row["value"];
		}
	} catch (mysqli_sql_exception $e) {
		$oops = (array)$e;
		$oops = $oops["\0*\0code"];
		if ( $oops == 1049 ) { /* database does not exist */
			init();
			return 1;
		} else {
			var_dump($e);
			die();
		}
	}
}
function init() {
	$db = new mysqli("mysql", "root", "" );
	$create = $db->prepare("CREATE DATABASE testschema");
	$create->execute();
	$db->close();
	
	$db = new mysqli("mysql", "root", "", "testschema" );
	$create = $db->prepare("CREATE TABLE test ( id INT, val VARCHAR(255) )");
	$create->execute();
	$create = $db->prepare("INSERT INTO test (id,val) VALUES (1,'hello')");
	$create->execute();
	$create = $db->prepare("INSERT INTO test (id,val) VALUES (2,'world')");
	$create->execute();
	$db->close();
}

$settingOne = get("1");

print $settingOne . " world, how you doing?";

?>
