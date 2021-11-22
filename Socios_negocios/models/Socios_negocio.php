<?php
        class Socios_negocio extends Conectar{

            public function get_socios_negocio(){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_socios_negocio";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
            }

            public function get_socio_negocio($id){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_socios_negocio WHERE id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
            }

            public function insertar_socios_negocio($id,$nombre,$razón_social,$dirección,$tipo_socio,$contacto,$email,$fecha_creado,$estado,$telefono)
        {   $conectar= parent::Conexion();
            parent :: set_names();
            $sql="INSERT INTO ma_socios_negocio(id,nombre,razón_social,dirección,tipo_socio,contacto,email,fecha_creado,estado,telefono)
            VALUES (?,?,?,?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->bindValue(2, $nombre);
            $sql->bindValue(3, $razón_social);
            $sql->bindValue(4, $dirección);
            $sql->bindValue(5, $tipo_socio);
            $sql->bindValue(6, $contacto);
            $sql->bindValue(7, $email);
            $sql->bindValue(8, $fecha_creado);
            $sql->bindValue(9, $estado);
            $sql->bindValue(10, $telefono);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }

        public function eliminar_socio_negocio($id){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="DELETE FROM ma_socios_negocio WHERE id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function actualizar_socio_negocio($id,$nombre,$razón_social,$dirección,$tipo_socio,$contacto,$email,$fecha_creado,$estado,$telefono){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="UPDATE ma_socios_negocio SET nombre=?, razón_social=?, dirección=?, tipo_socio=?, contacto=?, email=?, fecha_creado=?, estado=?, telefono=? WHERE id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2, $razón_social);
            $sql->bindValue(3, $dirección);
            $sql->bindValue(4, $tipo_socio);
            $sql->bindValue(5, $contacto);
            $sql->bindValue(6, $email);
            $sql->bindValue(7, $fecha_creado);
            $sql->bindValue(8, $estado);
            $sql->bindValue(9, $telefono);
            $sql->bindValue(10, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>
