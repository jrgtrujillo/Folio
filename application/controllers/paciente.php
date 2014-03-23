<?php
if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Paciente extends CI_Controller{

	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged')){
			redirect('/principal/', 'refresh');
		}
		// Carga del mpdelo Pacientes
		$this->load->model('mdl_paciente');
		// Carga del helper
		$this->load->helper('form');
	}

	function index(){
		$pacientes = $this->mdl_paciente->consultar_paciente('');
		$datos_paciente['pacientes'] = $pacientes;
		$datos_header['titulo_panel'] = 'Información de Pacientes';
		$this->load->view('template/header', $datos_header);
		$this->load->view('grids/grid_paciente', $datos_paciente);
		$this->load->view('template/footer');
	}

	function nuevo_paciente(){
		$this->load->helper('date');
		// Carga de Modelos de Apoyo
		$this->load->model('mdl_ocupacion');
		$this->load->model('mdl_eps');
		$this->load->model('mdl_vinculado');
		// Información de Consulta de Ocupación
		$datos_paciente['lst_ocupacion'] = $this->mdl_ocupacion->consultar_ocupacion('');
		// Información de Consulta de EPS
		$datos_paciente['lst_eps'] = $this->mdl_eps->consultar_eps('');
		// Información de tipo de vinculado
		$datos_paciente['lst_vinculado'] = $this->mdl_vinculado->consultar_vinculado('');
		$datos_header['titulo_panel'] = 'Registro de Paciente';
		$this->load->view('template/header', $datos_header);
		$this->load->view('forms/frm_paciente_nuevo', $datos_paciente);
		$this->load->view('template/footer');
	}

	function consultar_paciente(){
		$busqueda = $this->input->post('buscar');
		$pacientes = $this->mdl_paciente->consultar_paciente($busqueda);
		$datos_header['titulo_panel'] = 'Información de Pacientes';
		$datos_paciente['pacientes'] = $pacientes;
		$this->load->view('template/header', $datos_header);
		$this->load->view('grids/grid_paciente', $datos_paciente);
		$this->load->view('template/footer');
	}
}
