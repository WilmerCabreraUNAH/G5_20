<?php
    
    class Pedidos extends Conectar{

        public function get_pedidos(){            
            $Conectar=parent::Conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_pedidos WHERE ESTADO = 1";
            $sql=$Conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_pedido($ID){            
            $Conectar=parent::Conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_pedidos WHERE ESTADO=1 AND ID = ?";
            $sql=$Conectar->prepare($sql); 
            $sql->bindValue(1, $ID);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_pedidos($ID_SOCIO, $FECHA_PEDIDO, $DETALLE, $SUB_TOTAL, $TOTAL_ISV, $TOTAL, $FECHA_ENTREGA, $ESTADO){
            $Conectar=parent::Conexion();
            parent::set_names();
            $sql="INSERT INTO ma_pedidos(ID, ID_SOCIO, FECHA_PEDIDO, DETALLE, SUB_TOTAL, TOTAL_ISV, TOTAL, FECHA_ENTREGA, ESTADO)
            VALUES (NULL,?,?,?,?,?,?,?,?);";
            $sql=$Conectar->prepare($sql);
            $sql->bindValue(1, $ID_SOCIO);
            $sql->bindValue(2, $FECHA_PEDIDO);
            $sql->bindValue(3, $DETALLE);
            $sql->bindValue(4, $SUB_TOTAL);
            $sql->bindValue(5, $TOTAL_ISV);
            $sql->bindValue(6, $TOTAL);
            $sql->bindValue(7, $FECHA_ENTREGA);
            $sql->bindValue(8, $ESTADO);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_pedidos($ID, $ID_SOCIO, $FECHA_PEDIDO, $DETALLE, $SUB_TOTAL, $TOTAL_ISV, $TOTAL, $FECHA_ENTREGA, $ESTADO){            
            $Conectar=parent::Conexion();
            parent::set_names();
            $sql="UPDATE ma_pedidos
                SET ID_SOCIO=?, FECHA_PEDIDO=?, DETALLE=?, SUB_TOTAL=?, TOTAL_ISV=?, TOTAL=?, FECHA_ENTREGA=?, ESTADO=?
                WHERE ID = ?";
            $sql=$Conectar->prepare($sql);
            $sql->bindValue(1, $ID_SOCIO);
            $sql->bindValue(2, $FECHA_PEDIDO);
            $sql->bindValue(3, $DETALLE);
            $sql->bindValue(4, $SUB_TOTAL);
            $sql->bindValue(5, $TOTAL_ISV);
            $sql->bindValue(6, $TOTAL);
            $sql->bindValue(7, $FECHA_ENTREGA);
            $sql->bindValue(8, $ESTADO);
            $sql->bindValue(9, $ID);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }      

        public function delete_pedidos($ID){            
            $Conectar=parent::Conexion();
            parent::set_names();
            $sql="DELETE FROM ma_pedidos WHERE ID=?";
            $sql=$Conectar->prepare($sql);
            $sql->bindValue(1, $ID);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>