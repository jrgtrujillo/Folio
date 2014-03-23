<?php 
if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Rol extends CI_Controller{

	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged')){
			redirect('/principal/', 'refresh');
		}
		// Carga de Modelo
		$this->load->model('mdl_rol');
		// Carga de Helper
		$this->load->helper('form');
	}

	function index(){
		
		$roles = $this->mdl_rol->consultar_rol('');
		$datos_header['titulo_panel'] = 'Información de Rol';
		$datos_rol['rol'] = $roles;
		$this->load->view('template/header', $datos_header);
		$this->load->view('grids/grid_rol', $datos_rol);
		$this->load->view('template/footer');
	}

	function nuevo_rol(){
		// Carga de librerias
		$this->load->library('form_validation');
		// Reglas de Validación
		$this->form_validation->set_rules('rol', 'Rol', 'trim|required');
		// Seteo de Mensajes de error
		$this->form_validation->set_message('required', 'El campo %s es requerido');
		if($this->form_validation->run()== FALSE){
			$datos_header['titulo_panel'] = 'Nuevo Rol';
			$this->load->view('template/header', $datos_header);
			$this->load->view('forms/frm_rol_nuevo');
			$this->load->view('template/footer');
		}else{
			$this->registrar_rol();
		}
	}

	function registrar_rol(){
		$nuevo_rol = $this->mdl_rol->registrar_rol();
		$datos_header['titulo_panel'] = 'Información de Rol';
		$datos_modal['modal_titulo'] = 'Registrar Rol';
		if($nuevo_rol > 0){
			$datos_modal['modal_texto'] = 'Rol registrado correctamente';
		}else{
			$datos_modal['modal_texto'] = 'Error al registrar el rol';
		}
		$datos_footer['script'] = '<script>$("#otro").modal("show")</script>';
		$roles = $this->mdl_rol->consultar_rol('');
		$datos_rol['rol'] = $roles;
		$this->load->view('template/header', $datos_header);
		$this->load->view('modal', $datos_modal);
		$this->load->view('grids/grid_rol',$datos_rol);
		$this->load->view('template/footer', $datos_footer );
	}

	function consultar_rol(){
		$busqueda = $this->input->post('buscar');
		$roles = $this->mdl_rol->consultar_rol($busqueda);
		$datos_header['titulo_panel'] = 'Información de Rol';
		$datos_rol['rol'] = $roles;
		$this->load->view('template/header', $datos_header);
		$this->load->view('grids/grid_rol', $datos_rol);
		$this->load->view('template/footer');

	}

	function editar_rol($rol){
		$datos_header['titulo_panel'] = 'Editar Usuario';
		$roles  = $this->mdl_rol->consultar_rol($rol);
		$datos_rol['rol'] = $roles;
		$this->load->view('template/header', $datos_header);
		$this->load->view('forms/frm_rol_actualizar', $datos_rol);
		$this->load->view('template/footer');
	}

	function actualizar_rol(){
		$actualizar_rol = $this->mdl_rol->actualizar_rol();
		$datos_modal['modal_titulo'] = 'Actualización de Rol';
		if($actualizar_rol > 0){
			$datos_modal['modal_texto'] = 'Rol Actualizado correctamente';
		}else{
			$datos_modal['modal_texto'] = 'Error al actualizar rol';
		}
		$roles = $this->mdl_rol->consultar_rol('');
		$datos_rol['rol'] = $roles;
		$datos_header['titulo_panel'] = 'Información de Rol';
		$datos_footer['script'] = "<script>$('#otro').modal('show');</script>";
		$this->load->view('template/header', $datos_header);
		$this->load->view('modal', $datos_modal);
		$this->load->view('grids/grid_rol', $datos_rol);
		$this->load->view('template/footer', $datos_footer);
	}
}