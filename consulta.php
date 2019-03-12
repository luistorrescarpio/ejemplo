<?php 
	require("conex/heasy_mysql.php");

	$obj = (object)$_REQUEST;

	switch ($obj->action) {

		case 'viewCol':
			$sql = "SELECT $obj->columna FROM contacto";
			$r = query($sql);
			res([
				"success"=>true
				,"rows"=>$r
				,"sql"=>$sql
			]);
			break;

		case 'search':
			$r = query("SELECT * FROM contacto");
			res($r);
			break;

		case 'eliminar':
			# code...
			break;
	}
?>