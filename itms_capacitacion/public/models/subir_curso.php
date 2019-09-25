<?php  

	class Archivo{
		public function subir($tarchivo, $archivo){

			session_start();
			include("conexion.php");
			$documento = $_SESSION["documento"];
			$nombres = $_SESSION["nombres"];
			$apellidos = $_SESSION["apellidos"];
			$cont = "0";

			$sql = "SELECT * FROM archivos WHERE documento = '$documento'";

			if(!$result = $db ->query($sql)){
				die ('Ya existe un registro con ese documento [' .$db->error .']');
			}

			while ($row = $result -> fetch_assoc()) {
				$aarchivo = stripcslashes($row["archivo"]);
				$ddocumento = stripslashes($row["documento"]);
				$nnombres = stripslashes($row["nombres"]);
				$aapellidos = stripslashes($row["apellidos"]);
				$cont = $cont + 1;
			}

			if ($aarchivo != $archivo) {

				include("../views/alerts/alerta_s_archivo.html");

				$sql2 = "INSERT INTO archivos (tipo_archivo, archivo, documento, nombres, apellidos) VALUES ('$tarchivo', '$archivo', '$documento', '$nombres', '$apellidos')";


 				if(!$result2 = $db->query($sql2)){
 					die('Hay un error corriendo en la consulta [' . $db->error . ']');
				}

			}else if($archivo == $aarchivo){
				include("../views/alerts/alerta_d_archivo.html");
			}
		}
	}

	$nuevo = new Archivo();
	$nuevo -> subir($_POST["tarchivo"], $_POST["archivo"]);

?>