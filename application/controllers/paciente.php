<?php

/**
 * Description of administracion1
 *
 * @author desarrollo
 */
class Paciente extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('general_model');
		$this->load->model('paciente_model');
		$this->load->model('bolivar_model');
		$this->load->library('session');
		if($this->session->userdata('logged') != TRUE){
                       if(!$this->input->is_ajax_request())
                               redirect(base_url().'login');
                       else
                               return -3;
         }
	}

	public function index()
	{
		$data["paciente"] = $this->paciente_model->get2(1);
		$data["municipios"] = $this->bolivar_model->municipio();
		$data['paginas'] =  $this->paciente_model->numero_paginas();
		$data['pagina'] =  1;
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('administrar/paciente',$data);
		$this->load->view('template/footer');
	}
	
	public function p($pagina)
	{
		
		$data['paciente'] =  $this->paciente_model->get2($pagina);
		$data['paginas'] =  $this->paciente_model->numero_paginas();
		$data['pagina'] =  $pagina;
		if ($pagina>$data['paginas']+1)
		{
			redirect(base_url().'paciente');
		}
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('administrar/paciente',$data);
		$this->load->view('template/footer');
	}
	
	public function form()
	{
		$data["municipios"] = $this->bolivar_model->municipio();
		$data["parroquia"] = $this->bolivar_model->parroquia(1);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('administrar/paciente_form',$data);
		$this->load->view('template/footer');
	}
	
	
	public function prueba()
	{
		$this->load->view('administrar/boostrap');
	}
		
	public function get($id=FALSE)
	{
		echo json_encode($this->paciente_model->get($id));
	}
	
	public function get2($id=FALSE)
	{
		echo json_encode($this->paciente_model->get2($id));
	}
	
	public function buscar()
	{
		$esterilizada = $this->input->post('_esterilizada');
		$municipio = $this->input->post('_municipio');
		$cedula = $this->input->post('_cedula');
		$nombre = $this->input->post('_nombre');
		$fecha_inicio = $this->input->post('_fecha_inicio');
		$fecha_final = $this->input->post('_fecha_final');
		echo json_encode($this->paciente_model->buscar($esterilizada, $municipio,  $cedula, $nombre, $fecha_inicio, $fecha_final));
	}
	
	public function eliminar($cedula)
	{
		echo $this->paciente_model->eliminar($cedula);
	}
	
	public function agregar()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cedula', 'Cedula', 'trim|required');
		$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');
		$this->form_validation->set_rules('apellido', 'Apellido', 'trim|required');
		$this->form_validation->set_rules('fecha_nacimiento', 'Fecha Nacimiento', 'trim|required');
		$this->form_validation->set_rules('telefono1', 'Telefono 1', 'trim|required');
		$this->form_validation->set_rules('direccion', 'Direccion', 'trim|required');
		$this->form_validation->set_rules('fecha_atencion', 'Fecha Atencion', 'trim|required');
		if($this->form_validation->run())
		{
			
			 $cedula = $this->input->post('cedula');
			 $nombre = $this->input->post('nombre');
			 $apellido = $this->input->post('apellido');
			 $fecha_nacimiento = $this->input->post('fecha_nacimiento');
			 $direccion = $this->input->post('direccion');
			 $municipio = $this->input->post('municipio');
			 $parroquia = $this->input->post('parroquia');
			 $telefono1 = $this->input->post('telefono1');
			 $telefono2 = $this->input->post('telefono2');
			 $fecha_atencion = $this->input->post('fecha_atencion');
			 $n_hijos = $this->input->post('n_hijos');
			 $esterilizada = $this->input->post('esterilizada');
			 $fecha_esterilizacion = $this->input->post('fecha_esterilizacion');
			 $observacion = $this->input->post('observacion');
			 $agregar = $this->session->userdata('nombre');
			 echo $this->paciente_model->agregar($cedula, $nombre, $apellido, $n_hijos,  $municipio, $parroquia, $telefono1, $telefono2, $direccion,
										$esterilizada, $fecha_esterilizacion, $observacion, $fecha_atencion, $fecha_nacimiento, $agregar);
			
		}
		else
			echo -3;
	}
	
	public function editar()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cedula', 'Cedula', 'trim|required|max_length[15]');
		$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');
		$this->form_validation->set_rules('apellido', 'Apellido', 'trim|required');
		$this->form_validation->set_rules('fecha_nacimiento', 'Fecha Nacimiento', 'trim|required');
		$this->form_validation->set_rules('direccion', 'Direccion', 'trim|required');
		$this->form_validation->set_rules('fecha_atencion', 'Fecha Atencion Responsable', 'trim|required');
		if($this->form_validation->run())
		{
			
			 $cedula = $this->input->post('cedula');
			 $nombre = $this->input->post('nombre');
			 $apellido = $this->input->post('apellido');
			 $fecha_nacimiento = $this->input->post('fecha_nacimiento');
			 $direccion = $this->input->post('direccion');
			 $municipio = $this->input->post('municipio');
			 $parroquia = $this->input->post('parroquia');
			 $telefono1 = $this->input->post('telefono1');
			 $telefono2 = $this->input->post('telefono2');
			 $fecha_atencion = $this->input->post('fecha_atencion');
			 $n_hijos = $this->input->post('n_hijos');
			 $esterilizada = $this->input->post('esterilizada');
			 $fecha_esterilizacion = $this->input->post('fecha_esterilizacion');
			 $observacion = $this->input->post('observacion');
			echo $this->paciente_model->editar($cedula, $nombre, $apellido, $n_hijos,  $municipio, $parroquia, $telefono1, $telefono2, $direccion,
										$esterilizada, $fecha_esterilizacion, $observacion, $fecha_atencion, $fecha_nacimiento);
		}
		else
			echo '-1';
	}
	
	public function exporte_xls()
	{
		$esterilizada = $this->input->post('_esterilizada');
		$municipio = $this->input->post('_municipio');
		$cedula = $this->input->post('_cedula');
		$nombre = $this->input->post('_nombre');
		$fecha_inicio = $this->input->post('_fecha_inicio');
		$fecha_final = $this->input->post('_fecha_final');
		
		$data['pacientes'] = $this->paciente_model->buscar($esterilizada, $municipio,  $cedula, $nombre, $fecha_inicio, $fecha_final);
		$this->load->view('template/header');
		$this->load->view('administrar/importe_xls',$data);
		$this->load->view('template/footer');
	}
	
		
}

?>
