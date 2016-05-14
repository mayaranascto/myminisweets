<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

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

  public function excluirCliente($idcliente=NULL){
    if($idcliente!=NULL){
      $this->db->where('idclientes', $idcliente);
      $this->db->delete('clientes');
      return TRUE;
    }else{
      return FALSE;
    }
  }

  public function cadastroProduto($data=NULL){
    if($data!=NULL){
      if($this->db->insert('produtos', $data)) return TRUE;
      return FALSE;
    }
  }

  public function getAllProducts(){
    $this->db->order_by('nome_produto', 'name ASC');
    return $this->db->get('produtos');
  }

  public function getProductById($idProduto=NULL){
    if($idProduto!=NULL){
      $this->db->where('idprodutos', $idProduto);
      return $this->db->get('produtos');
    }else{
      return FALSE;
    }
  }

  public function updateProduto($idProduto, $data){
    if($idProduto==NULL || $data==NULL){
      return FALSE;
    }else{
      $this->db->where('idprodutos', $idProduto);
      $this->db->update('produtos', $data);
      return TRUE;
    }
  }

  public function deleteProduto($idProduto){
    if($idProduto!=NULL){
      $this->db->where('idprodutos', $idProduto);
      $this->db->delete('produtos');
      return TRUE;
    }else{
      return FALSE;
    }
  }

}
