<?php
if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	function index(){
				// Carga de librerias
		$this->load->helper('form');
		// Registro de Validaciones
		$this->form_validation->set_rules('user', 'Usuario', 'required');
		$this->form_validation->set_rules('password', 'Contraseña', 'required');
		// Registro de Mensajes de error
		$this->form_validation->set_message('required', 'El valor %s es Requerido');
		if($this->session->userdata('logged') == TRUE){
			redirect('/dashboard/', 'refresh');
		}else{
			if($this->form_validation->run() == FALSE){
				$this->load->view('login');
			}else{
				$this->validado();
			}
		}

	}

	function validado(){
		// Carga de Modelos
		$this->load->model('mdl_user');
		// Carga de Librerias
		$this->load->library('encrypt');

		$usuario = $this->input->post('user');
		$pass = $this->encrypt->sha1($this->input->post('password'));
		$query_login = $this->mdl_user->ingresar($usuario, $pass);
		if($query_login->num_rows() > 0){
			foreach ($query_login->result() as $usuario_info) {
				$usuario = array();
				$usuario['nombre'] = $usuario_info->usunomcom;
				$usuario['codigo'] = $usuario_info->usucodigo;
				$usuario['activo'] = $usuario_info->usuactivo;
				$usuario['rol'] = $usuario_info->rolcodigo;
				$usuario['logged'] = TRUE;
			}
			if($usuario['activo'] == 1){
				$this->session->set_userdata($usuario);
				redirect('/dashboard/', 'refresh');
			}else{
				$error = "<span class='error'>Usuario Inactivo - Contacte al Administrador</span>";
				$datos['error_usuario'] = $error;
				$this->load->view('login', $datos);
			}
		}else{
			$error = "<span class='error'>Error en usuario y contraseña</span>";
			$datos['error_usuario'] = $error;
			$this->load->view('login', $datos);
		}
	}

	function salir(){
		$this->session->sess_destroy();
		$this->load->view('login');
	}
}