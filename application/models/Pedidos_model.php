<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos_model extends CI_Model {

  public function getAllProducts(){
    return $this->db->get('produtos');
  }

  public function getProductLike($search=''){
      if(!$search) return FALSE;

      $sql = "SELECT * FROM produtos WHERE nome_produto ILIKE '%" .$this->db->escape_like_str($search)."%' ESCAPE '!' ORDER BY nome_produto ASC";
      return $this->db->query($sql);
  }

  public function pedidoFinalizado(){
    return TRUE;
  }
}
