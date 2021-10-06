<?php
    require_once "models/docente.php";

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            if(isset($_GET['id'])) {
                echo json_encode(docente::getWhere($_GET['id']));
            }//end if
            else {
                echo json_encode(docente::getAll());
            }//end else
            break;
        case 'POST':
            $datos = json_decode(file_get_contents('php://input'));
            if($datos != NULL) {
                if(docente::insert($datos->nombre, $datos->apellidos, $datos->dni_alumno, $datos->grado, $datos-> $seccion)) {
                    http_response_code(200);
                }//end if
                else {
                    http_response_code(400);
                }//end else
            }//end if
            else {
                http_response_code(405);
            }//end else
            break;

        case 'PUT':
            $datos = json_decode(file_get_contents('php://input'));
            if($datos != NULL) {
                if(docente::update($datos->id, $datos->nombre, $datos->apellidos, $datos->$dni_alumno, $datos->$grado,$datos->seccion)) {
                    http_response_code(200);
                }//end if
                else {
                    http_response_code(400);
                }//end else
            }//end if
            else {
                http_response_code(405);
            }//end else
            break;
        case 'DELETE':
            if(isset($_GET['id'])){
                if(docente::delete($_GET['id'])) {
                    http_response_code(200);
                }//end if
                else {
                    http_response_code(400);
                }//end else
            }//end if 
            else {
                http_response_code(405);
            }//end else
            break;
        
        default:
            http_response_code(405);
            break;
    }//end while