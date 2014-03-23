<?php
if ( !defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller{

	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged')){
			redirect('/principal/', 'refresh');
		}
		// Carga del Modelo de Usuarios
		$this->load->model('mdl_user');
		// Carga helper
		$this->load->helper('form');
	}

	function Index(){
		$usuarios = $this->mdl_user->consultar_usuario('');
		$datos_header['titulo_panel'] = 'Información de Usuarios';
		$datos_usuario['usuarios'] = $usuarios;
		$this->load->view('template/header', $datos_header);
		$this->load->view('grids/grid_users', $datos_usuario);
		$this->load->view('template/footer');
	}

	function crear_usuario(){
		// Carga de Libreria
		$this->load->library('form_validation');
		// carga de Modelos
		$this->load->model('mdl_rol');
		// Registro de validaciones
		$this->form_validation->set_rules('codigo', 'Codigo', 'trim|required|callback_consultar_codigo');
		$this->form_validation->set_rules('nombre', 'Nombre Completo', 'trim|required');
		$this->form_validation->set_rules('cargo', 'Cargo', 'trim|required');
		$this->form_validation->set_rules('password', 'Contraseña', 'trim|required|matches[repassword]');
		$this->form_validation->set_rules('repassword', 'Confirmar Contraseña', 'trim|required');
		$this->form_validation->set_rules('rol', 'Rol', 'trim|required');
		// Seteo de Mensajes de error en validaciones
		$this->form_validation->set_message('required', 'El campo %s es requerido');
		$this->form_validation->set_message('matches', 'El campo %s no es igual al campo %s');
		$datos_header['titulo_panel'] = 'Registro de Usuario';
		if($this->form_validation->run() == FALSE){
			$this->load->view('template/header', $datos_header);
			$this->load->view('forms/frm_usuario_nuevo');
			$this->load->view('template/footer');
		}else{
			$this->registrar_usuario();
		}
	}

	function consultar_usuario(){
		$busqueda = $this->input->post('buscar');
		$usuarios = $this->mdl_user->consultar_usuario($busqueda);
		$datos_header['titulo_panel'] = 'Información de Usuarios';
		$datos_usuario['usuarios'] = $usuarios;
		$this->load->view('template/header', $datos_header);
		$this->load->view('grids/grid_users', $datos_usuario);
		$this->load->view('template/footer');

	}

	function registrar_usuario(){
		// Carga de librerias
		$this->load->library('encrypt');
		$nuevo_usuario = $this->mdl_user->registrar_usuario();
		$usuarios = $this->mdl_user->consultar_usuario('');
		$datos_modal['modal_titulo'] = 'Nuevo Usuario';
		if($nuevo_usuario > 0){
			$datos_modal['modal_texto'] = 'Usuario Creado Correctamente';
		}else{
			$datos_modal['modal_texto'] = 'Error al Crear Usuario';
		}
		$datos_header['titulo_panel'] = 'Información de Usuarios';
		$datos_footer['script'] = "<script>$('#otro').modal('show');</script>";
		$datos_usuario['usuarios'] = $usuarios;
		$this->load->view('template/header', $datos_header);
		$this->load->view('modal', $datos_modal);
		$this->load->view('grids/grid_users', $datos_usuario);
		$this->load->view('template/footer', $datos_footer);
	}

	function consultar_codigo($codigo){
        $consulta = $this->mdl_user->consultar_codigo($codigo);
        if($consulta->num_rows()>0){
            $this->form_validation->set_message('consultar_codigo', 'El Codigo no esta disponible');
            return FALSE;
        }else{
            return TRUE;
        }
    }

    function editar_usuario($usuario){
    	// Carga de modelos
    	$this->load->model('mdl_rol');
    	$usuarios = $this->mdl_user->consultar_usuario($usuario);
    	$datos_usuario['usuario'] = $usuarios;
    	$datos_header['titulo_panel'] = 'Información de Usuario';
    	$this->load->view('template/header', $datos_header);
    	$this->load->view('forms/frm_usuario_editar', $datos_usuario);
    	$this->load->view('template/footer');

    }

    function actualizar_usuario(){
    	// Carga de librerias
    	$this->load->library('encrypt');
  		$actualizar_usuario = $this->mdl_user->actualizar_usuario();
  		$usuarios = $this->mdl_user->consultar_usuario('');
  		$datos_modal['modal_titulo'] = 'Actualización de Usuario';
  		if($actualizar_usuario > 0){
  			$datos_modal['modal_texto'] = 'El usuario se actualizó correctamente';
  		}else{
  			$datos_modal['modal_texto'] = 'Error al actualizar el usuario';
  		}
		$datos_header['titulo_panel'] = 'Información de Usuarios';
		$datos_usuario['usuarios'] = $usuarios;
		$datos_footer['script'] = "<script>$('#otro').modal('show');</script>";
		$this->load->view('template/header', $datos_header);
		$this->load->view('modal', $datos_modal);
		$this->load->view('grids/grid_users', $datos_usuario);
		$this->load->view('template/footer', $datos_footer);
    }
}