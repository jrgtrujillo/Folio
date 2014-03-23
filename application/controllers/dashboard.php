<?php
if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller{

	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged')){
			redirect('/principal/', 'refresh');
		}
	}

	function index(){
		$datos_header['titulo_panel'] = 'Dashboard';
		$datos_modal['modal_titulo'] = 'Titulo';
		$datos_modal['modal_texto'] = 'Texto';
		$datos_footer['script'] = "<script>$('#otro').modal('show');</script>";
		$this->load->view('template/header', $datos_header);
		$this->load->view('dashboard');
		$this->load->view('modal', $datos_modal);
		$this->load->view('template/footer', $datos_footer);
	}
}