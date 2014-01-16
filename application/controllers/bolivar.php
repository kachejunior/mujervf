<?php

/**
 * Description of administracion1
 *
 * @author desarrollo
 */
class Bolivar extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('bolivar_model');
		$this->load->library('session');
	}
		
	public function get($id=FALSE)
	{
		echo json_encode($this->paciente_model->get($id));
	}
	
	public function get2()
	{
		$municipio = $this->input->post('municipio');
		echo json_encode($this->bolivar_model->parroquia($municipio));
	}
	
}

?>
