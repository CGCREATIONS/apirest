<?php
    require_once "connection/Connection.php";

    class docente {

        public static function getAll() {
            $db = new Connection();
            $query = "SELECT *FROM alumno";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'id_alumno' => $row['id_alumno'],
                        'nombre' => $row['nombre'],
                        'apellido' => $row['apellido'],
                        'dni_alumno' => $row['dni_alumno'],
                        'grado' => $row['grado'],
                        'seccion' => $row['seccion']
                      
                    ];
                }//end while
                return $datos;
            }//end if
            return $datos;
        }//end getAll

        public static function getWhere($id_cliente) {
            $db = new Connection();
            $query = "SELECT *FROM alumno WHERE id=$id_cliente";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'id_alumno' => $row['id_alumno'],
                        'nombre' => $row['nombre'],
                        'apellido' => $row['apellido'],
                        'dni_alumno' => $row['dni_alumno'],
                        'grado' => $row['grado'],
                        'seccion' => $row['seccion']
                    ];
                }//end while
                return $datos;
            }//end if
            return $datos;
        }//end getWhere

        public static function insert($nombre, $apellido, $dni_alumno,$grado, $seccion) {
            $db = new Connection();
            $query = "INSERT INTO alumno (nombre, apellido, dni_alumno, gardo,seccion)
            VALUES('".$nombre."', '".$apellido."', '".$dni_alumno."','".$grado."','".$seccion."')";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }//end if
            return FALSE;
        }//end insert

        public static function update($id_cliente, $nombre, $apellido, $dni_alumno, $seccion, $grado) {
            $db = new Connection();
            $query = "UPDATE alumno SET
            nombre='".$nombre."', apellido='".$apellido."', dni_alumno='".$dni_alumno."',seccion='".$seccion."' ,grado='".$grado."'  
            WHERE id=$id_cliente";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }//end if
            return FALSE;
        }//end update

        public static function delete($id_cliente) {
            $db = new Connection();
            $query = "DELETE FROM alumno WHERE id=$id_cliente";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }//end if
            return FALSE;
        }//end delete

    }//end class Cliente
