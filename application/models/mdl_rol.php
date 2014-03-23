<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_rol extends CI_Model{

	function consultar_rol($rol){
		if($rol){
			$this->db->like('rolcodigo',$rol);
			$this->db->or_like('roldescri', $rol);
		}
		return $this->db->get('admgerol');
	}

	function registrar_rol(){
		$datos = array(
			'roldescri'=> $this->input->post('rol')
		);
		$this->db->insert('admgerol', $datos);
		return $this->db->affected_rows();
	}

	function actualizar_rol(){
		$datos = array(
			'roldescri' => $this->input->post('rol')
            );
		$this->db->where('rolcodigo', $this->input->post('codigo'));
		$this->db->update('admgerol', $datos); 
		return $this->db->affected_rows();
	}
}