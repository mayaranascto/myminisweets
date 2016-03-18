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
    $this->db->order_by('idclientes', 'name ASC');
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

  public function alterarCliente($idCliente=NULL, $data=NULL){
    if($idCliente==NULL || $data==NULL){
      return FALSE;
    }else{
      $this->db->where('idclientes', $idCliente);
      $this->db->update('clientes', $data);
      return TRUE;
    }
  }

}
