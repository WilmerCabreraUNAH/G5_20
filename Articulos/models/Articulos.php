<?php
    
    class Articulos extends Conectar{

        public function get_articulos(){            
            $Conectar=parent::Conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_articulos WHERE ESTADO = 1";
            $sql=$Conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_articulo($ID){            
            $Conectar=parent::Conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_articulos WHERE ESTADO=1 AND ID = ?";
            $sql=$Conectar->prepare($sql); 
            $sql->bindValue(1, $ID); 
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
       }

        public function insert_articulos($DESCRIPCION, $UNIDAD, $COSTO, $PRECIO, $APLICA_ISV, $PORCENTAJE_ISV, $ESTADO, $ID_SOCIO){
            $Conectar=parent::Conexion();
            parent::set_names();
            $sql="INSERT INTO ma_articulos(ID, DESCRIPCION, UNIDAD, COSTO, PRECIO, APLICA_ISV, PORCENTAJE_ISV, ESTADO, ID_SOCIO)
            VALUES (NULL,?,?,?,?,?,?,?,?);";
            $sql=$Conectar->prepare($sql);
            $sql->bindValue(1, $DESCRIPCION);
            $sql->bindValue(2, $UNIDAD);
            $sql->bindValue(3, $COSTO);
            $sql->bindValue(4, $PRECIO);
            $sql->bindValue(5, $APLICA_ISV);
            $sql->bindValue(6, $PORCENTAJE_ISV);
            $sql->bindValue(7, $ESTADO);
            $sql->bindValue(8, $ID_SOCIO);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); 
        }

        public function update_articulos($ID, $DESCRIPCION, $UNIDAD, $COSTO, $PRECIO, $APLICA_ISV, $PORCENTAJE_ISV, $ESTADO, $ID_SOCIO){            
            $Conectar=parent::Conexion();
            parent::set_names();
            $sql="UPDATE ma_articulos
                SET DESCRIPCION=?, UNIDAD=?, COSTO=?, PRECIO=?, APLICA_ISV=?, PORCENTAJE_ISV=?, ESTADO=?, ID_SOCIO=?
                WHERE ID = ?";
            $sql=$Conectar->prepare($sql);
            $sql->bindValue(1, $DESCRIPCION);
            $sql->bindValue(2, $UNIDAD);
            $sql->bindValue(3, $COSTO);
            $sql->bindValue(4, $PRECIO);
            $sql->bindValue(5, $APLICA_ISV);
            $sql->bindValue(6, $PORCENTAJE_ISV);
            $sql->bindValue(7, $ESTADO);
            $sql->bindValue(8, $ID_SOCIO);
            $sql->bindValue(9, $ID);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_articulos($ID){            
            $Conectar=parent::Conexion();
            parent::set_names();
            $sql="DELETE FROM ma_articulos WHERE ID=?";
            $sql=$Conectar->prepare($sql);
            $sql->bindValue(1, $ID);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>
