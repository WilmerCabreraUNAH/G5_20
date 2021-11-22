<?php
    if ($_SERVER['REQUEST_METHOD']==='OPTIONS'){
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
    require_once("../../Socios_negocios/models/Socios_negocio.php");
    $socios_negocio = new Socios_negocio();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["opcion"]){

        case "GetSocios_negocios":
            $datos=$socios_negocio->get_socios_negocio();
            echo json_encode($datos);
        break;

        case "GetUno":
            $datos=$socios_negocio->get_socio_negocio($body["id"]);
            echo json_encode($datos);
        break;

        case "Insertar_Socio_negocios":
            $datos=$socios_negocio->insertar_socios_negocio($body["id"],$body["nombre"],$body["razón_social"],$body["dirección"],$body["tipo_socio"],$body["contacto"],$body["email"],$body["fecha_creado"],$body["estado"],$body["telefono"]);
            echo json_encode("Socio de negocios agregado");
        break;

        case "Eliminar_Socio_negocios":
            $datos=$socios_negocio->eliminar_socio_negocio($body["id"]);
            echo json_encode("Socio de negocios eliminado");   
        break;

        case "Actualizar_Socio_negocios":
            $datos=$socios_negocio->actualizar_socio_negocio($body["id"],$body["nombre"],$body["razón_social"],$body["dirección"],$body["tipo_socio"],$body["contacto"],$body["email"],$body["fecha_creado"],$body["estado"],$body["telefono"]);
            echo json_encode("Socio de negocios actualizado");   
        break;
    }
?>