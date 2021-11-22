<?php
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS'){
	    header('Access-Control-Allow-Origin: *');
	    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
	    header('Access-Control-Allow-Headers: token, Content-Type');
	    header('Access-Control-Max-Age: 1728000');
	    header('Content-Length: 0');
	    header('Content-Type: text/plain');
	die();
	}
		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');
		require_once("../../config/conexion.php");  
		require_once("../../Facturas/models/Facturas.php");
		$facturas = new Facturas();
	
		$body =json_decode(file_get_contents("php://input"), true);

			switch($_GET["op"]){
	
			case "GetFacturas":
			$datos=$facturas->get_facturas();  
			echo json_encode($datos);
			break;

	
			case "GetUno":
			$datos=$facturas->get_factura($body["Id"]);
			echo json_encode($datos);
			break;
			
			case "InsertFacturas":
			$datos=$facturas->insert_facturas($body["Numero_Factura"],$body["Id_Socio"],$body["Fecha_Factura"],$body["Detalle"],$body["Sub_Total"],$body["Total_Isv"],$body["Total"],$body["Fecha_Vencimiento"]);
			echo json_encode("Factura Agregada");
			break;

			case "DeleteFactura":
			$datos=$facturas->eliminar_factura($body["Id"]);
			echo json_encode("Factura Eliminada");
			break;

			case "UpdateFactura":
			$datos=$facturas->actualizar_factura($body["Id"],$body["Numero_Factura"],$body["Id_Socio"],$body["Fecha_Factura"],$body["Detalle"],$body["Sub_Total"],$body["Total_Isv"],$body["Total"],$body["Fecha_Vencimiento"],$body["Estado"]);
			echo json_encode("Factura Actualizada");
			break;

		}


?>