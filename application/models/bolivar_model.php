<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Bolivar_model extends CI_Model{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function municipio()
    {
        $this->db->order_by('mvf_municipio','asc');
        $municipio = $this->db->get('mvf_municipio');
        if($municipio->num_rows()>0)
        {
            return $municipio->result();
        }
    }
    
		
	public function parroquia($municipio=FALSE)
	{
		//En dado caso que no exista id se devolvera la tabla completa, caso contrario se devolvera el registro especificado
		$sql = 'select *  from mvf_parroquia';
		if($municipio==FALSE)
		{
			$sql = $sql.' order by id';
			$consulta = $this->db->query($sql);
			return $consulta->result(); 
		}
		else
		{
			$municipio = $this->db->escape($municipio);
			$sql = $sql.' where id_municipio = '.$municipio;
			$consulta = $this->db->query($sql);
			return $consulta->result(); 
		}
	}
}