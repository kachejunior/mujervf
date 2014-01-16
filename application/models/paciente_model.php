<?php

/**
 * Description of administracion_general1
 *
 * @author desarrollo
 * 
 
 */
class Paciente_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	private function _validar($tabla, $id)
	{
		$sql = 'select count(*) as total from '.$tabla.' where id ='.(int)$id;
		$consulta = $this->db->query($sql);
		if($consulta->row()->total > 0) 
			return true;
		else
			return false;			
	}
	
	private function _validar_esterilizada($esterilizada){
		echo "ban 2";
		if($esterilizada=="") 
			return 'true';
		else
			return 'false';			
	}
	
	public function agregar($cedula, $nombre, $apellido, $n_hijos,  $municipio, $parroquia, $telefono1, $telefono2, $direccion,
										$esterilizada, $fecha_esterilizacion, $observacion, $fecha_atencion, $fecha_nacimiento, $agregar)
	{
		if((!$this->_validar('mvf_municipio', $municipio)) 
				OR (!$this->_validar('mvf_parroquia', $parroquia)) )
			return -1;
		$cedula = $this->db->escape($cedula);
		$nombre = $this->db->escape($nombre);
		$apellido = $this->db->escape($apellido);
		$telefono1 = $this->db->escape($telefono1);
		$telefono2 = $this->db->escape($telefono2);
		$direccion = $this->db->escape($direccion);
		$observacion = $this->db->escape($observacion);
		$esterilizada = $this->db->escape($esterilizada);
		$fecha_atencion = $this->db->escape($fecha_atencion);
		$fecha_esterilizacion = $this->db->escape($fecha_esterilizacion);
		$fecha_nacimiento = $this->db->escape($fecha_nacimiento);
		$agregar = $this->db->escape($agregar);
		
		//validamos que no exista otro elemento con el mismo nombre antes de agregarla
		$sql = 'select count(*) as total from mvf_paciente where lower(cedula) = lower('.$cedula.')';
		$query = $this->db->query($sql);
		if ($query->row()->total >0)
			return -2;
		
		//insertamos el elemento en la tabla y retornamos el id con el que se agrego
		$sql = 'insert into mvf_paciente values('.$cedula.','.$nombre.','.$apellido.','.
						$n_hijos.','.$municipio.','.$parroquia.','.$telefono1.','.$telefono2.','.$direccion.
						','.$esterilizada.','.$fecha_esterilizacion.','.$observacion.','.$fecha_atencion.','.$fecha_nacimiento.' ,'.$agregar.')';
		$this->db->query($sql);
		return $this->db->affected_rows();	
	}

	public function editar($cedula, $nombre, $apellido, $n_hijos,  $municipio, $parroquia, $telefono1, $telefono2, $direccion,
									$esterilizada, $fecha_esterilizacion, $observacion, $fecha_atencion, $fecha_nacimiento)
	{
		if((!$this->_validar('mvf_municipio', $municipio)) 
				OR (!$this->_validar('mvf_parroquia', $parroquia)) )
			return -1;
		
		$esterilizada= $this->db->escape($esterilizada);
		$cedula = $this->db->escape($cedula);
		$nombre = $this->db->escape($nombre);
		$apellido = $this->db->escape($apellido);
		$telefono1 = $this->db->escape($telefono1);
		$telefono2 = $this->db->escape($telefono2);
		$direccion = $this->db->escape($direccion);
		$observacion = $this->db->escape($observacion);
		$fecha_atencion = $this->db->escape($fecha_atencion);
		$fecha_esterilizacion = $this->db->escape($fecha_esterilizacion);
		$fecha_nacimiento = $this->db->escape($fecha_nacimiento);
		
		//Editamos el elemento en la tabla
		$sql = 'update mvf_paciente set '. 
						'nombre = '.$nombre.', '.
						'apellido = '.$apellido.', '.
						'telefono1 = '.$telefono1.', '.
						'telefono2 = '.$telefono2.', '.
						'direccion = '.$direccion.', '.
						'municipio = '.$municipio.', '.
						'parroquia = '.$parroquia.', '.
						'observacion = '.$observacion.', '.
						'n_hijos = '.(int)$n_hijos.', '.
						'esterilizada = '.$esterilizada.', '.
						'fecha_atencion = '.$fecha_atencion.', '.
						'fecha_esterilizacion = '.$fecha_esterilizacion.', '.
						'fecha_nacimiento = '.$fecha_nacimiento.' '.
						' where cedula = '.$cedula;
		$this->db->query($sql);
		return $this->db->affected_rows();
	}

	public function eliminar($cedula)
	{
		$cedula = $this->db->escape($cedula);
		//Eliminamos el elemento de la tabla
		$sql = 'delete from mvf_paciente where cedula = '.$cedula;
		$this->db->query($sql);
		return $this->db->affected_rows();
	}
	
	public function get($cedula=FALSE)
	{
		$this->db->query('SET datestyle TO postgres, dmy;');
		//En dado caso que no exista id se devolvera la tabla completa, caso contrario se devolvera el registro especificado
		$sql = 'select *  from mvf_paciente';
		if($cedula==FALSE)
		{
			$sql = $sql.' order by cedula';
			$consulta = $this->db->query($sql);
			return $consulta->result(); 
		}
		else
		{
			$cedula = $this->db->escape($cedula);
			$sql = $sql.' where cedula = '.$cedula;
			$consulta = $this->db->query($sql);
			return $consulta->row();
		}
	}
	
	public function get2($pagina)
	{
		$this->db->query('SET datestyle TO postgres, dmy;');
		//En dado caso que no exista id se devolvera la tabla completa, caso contrario se devolvera el registro especificado
		$sql = 'select a.*, b.detalle  from mvf_paciente as a, mvf_municipio as b where a.municipio = b.id ';
		$sql = $sql.' order by cedula';
		$p = ($pagina-1)*50;
		$sql = $sql.' limit 50	 offset '.$p;
		$consulta = $this->db->query($sql);
		return $consulta->result(); 
	}
	
	 public function numero_paginas()
	{
		 $sql ='select count(*) as  total from mvf_paciente';
		 $consulta = $this->db->query($sql);
		 $total = $consulta->row();
		 return $total->total/50;
		 
	}
	
	public function get3($esterilizada=FALSE, $fecha_inicio=FALSE, $fecha_final=FALSE, $municipio=FALSE, $parroquia=FALSE, $cedula=FALSE)
	{
		$this->db->query('SET datestyle TO postgres, dmy;');
		//En dado caso que no exista id se devolvera la tabla completa, caso contrario se devolvera el registro especificado
		$sql = 'select a.*, b.detalle  from mvf_paciente as a, mvf_municipio as b where a.municipio = b.id ';
		if($esterilizada==FALSE && $fecha_inicio=FALSE && $fecha_final=FALSE && $municipio=FALSE & $parroquia=FALSE)
		{
			$sql = $sql.' order by fecha_atencion';
			$consulta = $this->db->query($sql);
			return $consulta->result(); 
			
		}
		else
		{
			if ($cedula!=FALSE)
			{
				$sql = $sql.' and  a.cedula like \'%'.$cedula.'%\'';
			}
			
			if ($esterilizada!=FALSE)
			{
				$esterilizada = $this->db->escape($esterilizada);
				$sql = $sql.' and  a.esterilizada = '.$esterilizada;
			}
			
			if ($fecha_inicio!=FALSE)
			{
				$fecha_inicio = $this->db->escape($fecha_inicio);
				$sql = $sql.' and  a.fecha_atencion => '.$fecha_inicio;
			}
			
			if ($fecha_final!=FALSE)
			{
				$fecha_final = $this->db->escape($fecha_final);
				$sql = $sql.' and  a.fecha_atencion <= '.$fecha_final;
			}
			
			if ($municipio!=FALSE)
			{
				if($parroquia==FALSE)
				{
					$sql = $sql.' and  a.municipio = '.$municipio;
				}
				else
				{
					$sql = $sql.' and  a.parroquia = '.$parroquia;
				}
			}
			
			
			$consulta = $this->db->query($sql);
			return $consulta->result(); 
		}
	}
	
	public function buscar($esterilizada=FALSE, $municipio=FALSE,  $cedula=FALSE, $nombre=FALSE, $fecha_inicio=FALSE, $fecha_final=FALSE)
	{
		$this->db->query('SET datestyle TO postgres, dmy;');
		//En dado caso que no exista id se devolvera la tabla completa, caso contrario se devolvera el registro especificado
		$sql = 'select a.*, b.detalle  from mvf_paciente as a, mvf_municipio as b where a.municipio = b.id ';
		if($esterilizada==NULL && $municipio==NULL && $cedula==NULL && $nombre==NULL  && $fecha_inicio==NULL  && $fecha_final==NULL)
		{
			$sql = $sql.' order by fecha_atencion';
			$consulta = $this->db->query($sql);
			return $consulta->result(); 
		}
			if ($cedula!=NULL)
			{
				$sql = $sql.' and  a.cedula like \'%'.$cedula.'%\'';
			}
			
			if ($municipio!=NULL)
			{
				$sql = $sql.' and  a.municipio = '.$municipio;
			}
			
			if ($nombre!=NULL)
			{
				$sql = $sql.' and  ( a.nombre like \'%'.$nombre.'%\' or a.apellido like \'%'.$nombre.'%\')';
			}
			
			if ($esterilizada != NULL)
			{
				$esterilizada = $this->db->escape($esterilizada);
				$sql = $sql.' and  a.esterilizada = '.$esterilizada;
			}
			
			if ($fecha_inicio!=NULL)
			{
				$fecha_inicio = $this->db->escape($fecha_inicio);
				$sql = $sql.' and  a.fecha_atencion >= '.$fecha_inicio;
			}
			
			if ($fecha_final!=NULL)
			{
				$fecha_final = $this->db->escape($fecha_final);
				$sql = $sql.' and  a.fecha_atencion <= '.$fecha_final;
			}
			
			
			//echo $sql;
			$consulta = $this->db->query($sql);
			return $consulta->result(); 
		
	}
	
	
	
	
}
?>
