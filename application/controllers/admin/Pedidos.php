<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('Pedidos_model', 'pedidos');
    $this->load->library('table');
    $this->load->helper('array');
  }

  public function criarPedido(){

    $data['produtos'] = $this->pedidos->getAllProducts()->result();

    if($this->input->post()){
      var_dump($this->input->post());
      die();
    }

    $this->load->view('templates/header');
    $this->load->view('templates/menuUpLeft');
    $this->load->view('admin/pedidos/criarPedido', $data);
    $this->load->view('templates/footer');

  }

  public function gerenciarPedidos(){

    $this->load->view('templates/header');
    $this->load->view('templates/menuUpLeft');
    $this->load->view('admin/pedidos/gerenciarPedidos');
    $this->load->view('templates/footer');
  }

}
