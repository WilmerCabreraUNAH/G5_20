<?php

	class Facturas extends Conectar{
	
		public function get_facturas(){
			$conectar= parent::conexion();
			parent::set_names();
			$sql="SELECT * FROM ma_facturas WHERE Estado= 'f'";
			$sql=$conectar->prepare($sql);
			$sql->execute();
			return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
		}

		public function get_factura($Id){
			$conectar= parent::conexion();
			parent::set_names();
			$sql="SELECT * FROM ma_facturas WHERE Estado='f' AND Id =?";
			$sql=$conectar->prepare($sql);
			$sql->bindValue(1, $Id);
			$sql->execute();
			return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
		}
		
		
		public function insert_facturas($Numero_Factura,$Id_Socio, $Fecha_Factura, $Detalle, $Sub_Total, $Total_Isv, $Total, $Fecha_Vencimiento ){
			$conectar= parent::conexion();
			parent::set_names();
			$sql= "INSERT INTO ma_facturas(Id, Numero_Factura, Id_Socio, Fecha_Factura, Detalle, Sub_Total, Total_Isv, Total, Fecha_Vencimiento ,Estado)
			VALUES (NULL,?,?,?,?,?,?,?,?,'f');";
			$sql=$conectar->prepare($sql);
			$sql->bindValue(1, $Numero_Factura);
			$sql->bindValue(2, $Id_Socio);
			$sql->bindValue(3, $Fecha_Factura);
			$sql->bindValue(4, $Detalle);
        	$sql->bindValue(5, $Sub_Total);
        	$sql->bindValue(6, $Total_Isv);
        	$sql->bindValue(7, $Total);
        	$sql->bindValue(8, $Fecha_Vencimiento);
			$sql->execute();
			return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
		}

		public function eliminar_factura($Id){
			$conectar= parent::conexion();
			parent::set_names();
			$sql= "DELETE from ma_facturas WHERE Id=?";
			$sql=$conectar->prepare($sql);
			$sql->bindValue(1, $Id);
			$sql->execute();
			return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
		}

		 
		public function actualizar_factura($Id,$Numero_Factura,$Id_Socio, $Fecha_Factura, $Detalle, $Sub_Total, $Total_Isv, $Total, $Fecha_Vencimiento, $Estado){
			$conectar= parent::conexion();
			parent::set_names();
			$sql= "UPDATE  ma_facturas SET Numero_Factura=?, Id_Socio=?, Fecha_Factura=?, Detalle=?, Sub_Total=?, Total_Isv=?, Total=?, Fecha_Vencimiento=?, Estado=? WHERE Id=?";
			$sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Numero_Factura);
            $sql->bindValue(2, $Id_Socio);
            $sql->bindValue(3, $Fecha_Factura);
            $sql->bindValue(4, $Detalle);
            $sql->bindValue(5, $Sub_Total);
            $sql->bindValue(6, $Total_Isv);
            $sql->bindValue(7, $Total);
            $sql->bindValue(8, $Fecha_Vencimiento);
            $sql->bindValue(9, $Estado);
			$sql->bindValue(10, $Id);
			$sql->execute();
			return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
		}

    }
?>