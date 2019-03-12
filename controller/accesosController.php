<?php //Solo para control de accesos
require("../conex/heasy_mysql.php");

$obj = (object)$_REQUEST;

switch ($obj->action) {
	case 'logear':
		$r = query("SELECT * FROM usuario WHERE correo='$obj->correo' AND password='$obj->password'");
		if(count($r)>0){
			res([
				"success"=>true
				,"message"=>"acceso correcto"
			]);
		}else{
			res([
				"success"=>false
				,"message"=>"Correo o password Incorrecto"
			]);
		}
		break;
	case 'bloquear_acceso':

		break;

	case 'suspender':

		break;
}