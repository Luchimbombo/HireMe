<?php
	require 'Database.php';

	class Mensajes{
		function __construct(){}

		public static function CreateTable($NameTable){
			try{
				$consultar = "CREATE TABLE $NameTable (
					id VARCHAR (50) PRIMARY KEY,
				 	mensaje VARCHAR(500) NOT NULL,
				  	tipo_mensaje VARCHAR(10) NOT NULL,
				  	hora_del_mensaje VARCHAR(50) NOT NULL )";
				$respuesta = Database::getInstance()->getDb()->prepare($consultar);
				$respuesta -> execute(array());
				return 200;
			}catch(PDOException $e){
				return -1;
			}
		}

		public static function EnviarMensaje($TableName, $id, $mensaje,$tipo_mensaje,$hora_del_mensaje){
			try{
				$consultar = "INSERT INTO $TableName (id,mensaje,tipo_mensaje,hora_del_mensaje) VALUES(?,?,?,?)";
				$respuesta = Database::getInstance()->getDb()->prepare($consultar);
				$respuesta->execute(array($id,$mensaje,$tipo_mensaje,$hora_del_mensaje));
				return 200;
			}catch(PDOException $e){
				return -1;
			}
		}

		public static function getTokenUser($id){
			$consultar = "SELECT id,token FROM Token WHERE id = ?";
			$resultado = Database::getInstance()->getDb()->prepare($consultar);
			$resultado->execute(array($id));
			$tabla = $resultado->fetch(PDO::FETCH_ASSOC);
			return $tabla;
		}

		public static function EnviarNotification($Mensaje,$hora,$token,$emisor_del_mensaje,$receptor_del_mensaje){
			ignore_user_abort();
			ob_start();

			$url = 'https://fcm.googleapis.com/fcm/send';

			$fields = array('to' => $token,
			'data' => array('type' => 'mensaje','mensaje' => $Mensaje,'hora' => $hora,'cabezera' => $emisor_del_mensaje.' te envio un nuevo mensaje','cuerpo' => $Mensaje,'receptor'=> $receptor_del_mensaje,
				'emisor' =>$emisor_del_mensaje));

			define('GOOGLE_API_KEY', 'AIzaSyAPIMgYOw6P1BZs892ZJW4Vtahc-i7LXzY');

			$headers = array(
			        'Authorization:key='.GOOGLE_API_KEY,
			        'Content-Type: application/json'
			);      

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		 	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

			$result = curl_exec($ch);
			if($result === false)
			  die('Curl failed ' . curl_error());
			curl_close($ch);
			return $result;
		}

	}

?>