<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Telas_model extends CI_Model {

  public function inserirCliente($data=NULL){
    if($data!=NULL){
      if($this->db->insert('clientes', $data)) return TRUE;
      return FALSE;
    }
  }

  public function getAllClientes(){
    return $this->db->get('clientes');
  }

  public function getById($idCliente=NULL){
    if($idCliente==NULL){
        return FALSE;
    }else{
        $this->db->where('idclientes', $idCliente);
        return $this->db->get('clientes');
    }

  }

}
