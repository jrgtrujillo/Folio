<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_user extends CI_Model{

	function ingresar($user, $password){
		$this->db->where('usucodigo', $user);
		$this->db->where('usucontra', $password);
		return $this->db->get('admusuar');
	}

	function consultar_usuario($user){
		if($user){
			$this->db->like('usucodigo', $user);
			$this->db->or_like('usunomcom', $user);
		}
		$this->db->join('admgerol', 'admusuar.rolcodigo = admgerol.rolcodigo');
		return $this->db->get('admusuar');

	}

	function consultar_codigo($codigo){
		$this->db->where('usucodigo', $codigo);
		return $this->db->get('admusuar');
	}

	function registrar_usuario(){
		$datos_usuario = array(
			'usucodigo'=>$this->input->post('codigo'),
			'usunomcom'=>$this->input->post('nombre'),
			'usudescar'=>$this->input->post('cargo'),
			'usucontra'=>$this->encrypt->sha1($this->input->post('password')),
			'rolcodigo'=>$this->input->post('rol'),
			'usuactivo'=>'1',
			'usucreaci'=>$this->session->userdata('codigo')
			);
		$this->db->set($datos_usuario);
		$this->db->insert('admusuar');
		return $this->db->affected_rows();
	}

	function actualizar_usuario(){
		$cambio_usuario = array(
			'usunomcom'=> $this->input->post('nombre'),
			'usudescar'=> $this->input->post('cargo'),
			'rolcodigo'=> $this->input->post('rol'),
			'usuactivo'=> $this->input->post('activo')
		);
		if($this->input->post('password') != ''){
			$new_password = $this->encrypt->sha1($this->input->post('password'));
			$cambio_usuario['usucontra'] = $new_password;
		}
		$this->db->where('usucodigo', $this->input->post('codigo'));
		$this->db->update('admusuar', $cambio_usuario);
		return $this->db->affected_rows();
	}

}