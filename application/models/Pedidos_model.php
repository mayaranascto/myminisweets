<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos_model extends CI_Model {

  public function getAllProducts(){
    return $this->db->get('produtos');
  }
}
