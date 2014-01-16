<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Estadistica_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function n_atendidas ($fecha_inicio=FALSE, $fecha_final=FALSE, $esterilizada=FALSE )
	{
		$sql = 'select count(*) as total_atendidos from mvf_paciente';
		if($esterilizada==FALSE && $fecha_inicio ==FALSE && $fecha_final == FALSE)
		{
			$consulta = $this->db->query($sql);
			$total = $consulta->row();
			return $total->total_atendidos;
		}
		
		$sql = $sql.' where n_hijos >= 0 ';
		
		if ($fecha_inicio!=FALSE)
		{
				$fecha_inicio = $this->db->escape($fecha_inicio);
				$sql = $sql.' and  fecha_atencion >= '.$fecha_inicio;
		}
		
		if ($fecha_final!=FALSE)
		{
				$fecha_final = $this->db->escape($fecha_final);
				$sql = $sql.' and  fecha_atencion <= '.$fecha_final;
		}
		
		if ($esterilizada!=FALSE)
		{
				$esterilizada = $this->db->escape($esterilizada);
				$sql = $sql.' and  esterilizada = '.$esterilizada;
		}
		
		$sql;
		$consulta = $this->db->query($sql);
		$total = $consulta->row();
		return $total->total_atendidos;
			
	}
	
	public function n_atendidas_municipio ($fecha_inicio=FALSE, $fecha_final=FALSE)
	{
		if($fecha_inicio ==FALSE || $fecha_final == FALSE)
		{
			$sql = "select completo.detalle, completo.total as totalcompleto, si.total as totalsi, tq.total as totaltq".
				" from (	(select distinct detalle, count(a.*) as total from mvf_municipio left join mvf_paciente as a on id=a.municipio group by detalle) as completo left join".
				" (select distinct detalle, count(a.*) as total from mvf_municipio left join mvf_paciente as a on id=a.municipio where a.esterilizada = 'si' group by detalle) as si".
				" on completo.detalle=si.detalle) left join".
				" (select distinct detalle, count(a.*) as total from mvf_municipio left join mvf_paciente as a on id=a.municipio where a.esterilizada = 'tq' group by detalle) as tq".
				" on completo.detalle=tq.detalle";
			$consulta = $this->db->query($sql);
			return $consulta->result();
		}
		else{
			$fecha_inicio = $this->db->escape($fecha_inicio);
			$fecha_final = $this->db->escape($fecha_final);
			$sql = "select completo.detalle, completo.total as totalcompleto, si.total as totalsi, tq.total as totaltq".
				" from (	(select distinct detalle, count(a.*) as total from mvf_municipio left join mvf_paciente as a on id=a.municipio where a.fecha_atencion >= $fecha_inicio and a.fecha_atencion <= $fecha_final group by detalle) as completo left join".
				" (select distinct detalle, count(a.*) as total from mvf_municipio left join mvf_paciente as a on id=a.municipio where a.esterilizada = 'si' and a.fecha_atencion >= $fecha_inicio and a.fecha_atencion <= $fecha_final  group by detalle) as si".
				" on completo.detalle=si.detalle) left join".
				" (select distinct detalle, count(a.*) as total from mvf_municipio left join mvf_paciente as a on id=a.municipio where a.esterilizada = 'tq' and a.fecha_atencion >= $fecha_inicio and a.fecha_atencion <= $fecha_final group by detalle) as tq".
				" on completo.detalle=tq.detalle";
			$consulta = $this->db->query($sql);
			return $consulta->result();
		}
			
	}
	
	
	public function n_atendidas_parroquias ($fecha_inicio=FALSE, $fecha_final=FALSE, $municipio)
	{
		if($fecha_inicio ==FALSE || $fecha_final == FALSE)
		{
			$sql = "select completo.detalle, completo.total as totalcompleto, si.total as totalsi, tq.total as totaltq".
				" from (	(select distinct detalle, count(a.*) as total from mvf_parroquia left join mvf_paciente as a on id=a.parroquia where id_municipio=".$municipio." group by detalle) as completo left join".
				" (select distinct detalle, count(a.*) as total from mvf_parroquia left join mvf_paciente as a on id=a.parroquia where a.esterilizada = 'si' and id_municipio=".$municipio." group by detalle) as si".
				" on completo.detalle=si.detalle) left join".
				" (select distinct detalle, count(a.*) as total from mvf_parroquia left join mvf_paciente as a on id=a.parroquia where a.esterilizada = 'tq' and id_municipio=".$municipio." group by detalle) as tq".
				" on completo.detalle=tq.detalle";
			$consulta = $this->db->query($sql);
			return $consulta->result();
		}
		else{
			$fecha_inicio = $this->db->escape($fecha_inicio);
			$fecha_final = $this->db->escape($fecha_final);
			$sql = "select completo.detalle, completo.total as totalcompleto, si.total as totalsi, tq.total as totaltq".
				" from (	(select distinct detalle, count(a.*) as total from mvf_parroquia left join mvf_paciente as a on id=a.parroquia where id_municipio=".$municipio."   and a.fecha_atencion >= $fecha_inicio and a.fecha_atencion <= $fecha_final group by detalle) as completo left join".
				" (select distinct detalle, count(a.*) as total from mvf_parroquia left join mvf_paciente as a on id=a.parroquia where a.esterilizada = 'si' and id_municipio=".$municipio."  and a.fecha_atencion >= $fecha_inicio and a.fecha_atencion <= $fecha_final  group by detalle) as si".
				" on completo.detalle=si.detalle) left join".
				" (select distinct detalle, count(a.*) as total from mvf_parroquia left join mvf_paciente as a on id=a.parroquia where a.esterilizada = 'tq' and id_municipio=".$municipio."   and a.fecha_atencion >= $fecha_inicio and a.fecha_atencion <= $fecha_final  group by detalle) as tq".
				" on completo.detalle=tq.detalle";
			$consulta = $this->db->query($sql);
			return $consulta->result();
		}
	}
	
}
?>
