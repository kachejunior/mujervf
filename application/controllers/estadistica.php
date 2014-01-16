<?php

/**
 * Description of administracion1
 *
 * @author desarrollo
 */
class Estadistica extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('bolivar_model');
		//$this->load->model('paciente_model');
		$this->load->model('estadistica_model');
		$this->load->library('session');
		if($this->session->userdata('logged') != TRUE){
                       if(!$this->input->is_ajax_request())
                               redirect(base_url().'login');
                       else
                               return -3;
         }
	}

	public function index(){
		$data['municipios'] = $this->bolivar_model->municipio();
		$data['total_atendidos'] = $this->estadistica_model->n_atendidas();
		$data['total_esterilizadas'] = $this->estadistica_model->n_atendidas(false, false,'si');
		$data['total_tratamiento'] = $this->estadistica_model->n_atendidas(false, false,'tq');
		$data['municipales'] = $this->estadistica_model->n_atendidas_municipio();
		//$data['parroquiales'] = $this->estadistica_model->n_atendidas_parroquias(false, false, 1);
	
		$this->load->view('template/header');	
		$this->load->view('template/menu');	
		$this->load->view('administrar/estadistica', $data);
		$this->load->view('template/footer');
	} 
	
	public function getAtendidas(){
		$fecha_inicio = $this->input->post('fecha_inicio');
		$fecha_final = $this->input->post('fecha_final');
		echo $this->estadistica_model->n_atendidas($fecha_inicio, $fecha_final, false);
	}
	
	public function getEsterilizadas(){
		$fecha_inicio = $this->input->post('fecha_inicio');
		$fecha_final = $this->input->post('fecha_final');
		echo $this->estadistica_model->n_atendidas($fecha_inicio, $fecha_final, 'si');
	}
	
	public function getTratamiento(){
		$fecha_inicio = $this->input->post('fecha_inicio');
		$fecha_final = $this->input->post('fecha_final');
		echo $this->estadistica_model->n_atendidas($fecha_inicio, $fecha_final, 'tq');
	}
	
	public function getMunicipales()
	{
		$fecha_inicio = $this->input->post('fecha_inicio');
		$fecha_final = $this->input->post('fecha_final');
		echo json_encode($this->estadistica_model->n_atendidas_municipio($fecha_inicio, $fecha_final));
	}
	
	public function getParroquiales()
	{
		$fecha_inicio = $this->input->post('fecha_inicio');
		$fecha_final = $this->input->post('fecha_final');
		$municipio = $this->input->post('municipio');
		echo json_encode($this->estadistica_model->n_atendidas_parroquias ($fecha_inicio, $fecha_final, $municipio));
	}
	
		
}

?>
