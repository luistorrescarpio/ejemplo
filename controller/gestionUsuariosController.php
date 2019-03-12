<?php 
	require("../conex/heasy_mysql.php");

	$obj = (object)$_REQUEST;

	switch ($obj->action) {
		case 'info':
			$r = query("SELECT * FROM usuario AS us
				INNER JOIN contacto AS con 
				ON us.id_usuario = con.id_usuario
				WHERE us.id_usuario=$obj->idus");
			res($r[0]);
			break;
		case 'getListContactos':
			$r = query("SELECT us.id_usuario,con.con_fullname,con.con_celular, us.correo FROM usuario AS us
				INNER JOIN contacto AS con
				ON us.id_usuario=con.id_usuario
				ORDER BY con.con_fullname ASC");
			res($r);
			break;
		case 'registrar':
			$idus = query("INSERT INTO usuario (correo, password)VALUES('$obj->correo','$obj->password')");
			if(isset($idus["error"])){
				res([
					"success"=>false
					,"message"=>"No se pudo registrar usuario"
				]);
			}

			$idcon = query("INSERT INTO contacto (con_fullname,con_celular,con_direccion,con_edad,con_sexo,con_fech_register,id_usuario)VALUES('$obj->con_fullname','$obj->con_celular','$obj->con_direccion','$obj->con_edad','$obj->con_sexo','".date("Y-m-d")."',$idus)");
			if(isset($idcon["error"])){
				query("DELETE FROM usuario WHERE id_usuario=$idus");
				res([
					"success"=>false
					,"message"=>"No se pudo insertar registro en contacto, el usuario fue eliminado"
				]);
			}

			res([
				"success"=>true
				,"message"=>"Registro exitoso!"
			]);

			break;
		

		case 'eliminar':

			break;
	}


?>