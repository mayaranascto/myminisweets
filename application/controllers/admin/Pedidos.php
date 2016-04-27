<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('Pedidos_model', 'pedidos');
    $this->load->library('table');
    $this->load->helper('array');
    $this->load->library('form_validation');
  }

  public function criarPedidoA(){

    $data['produtos'] = $this->pedidos->getAllProducts()->result();

    if($this->input->post()){

      $this->form_validation->set_message('required', 'O campo %s é obrigatório');

      $this->form_validation->set_rules('nome', 'Nome do Cliente', 'trim|required');
      $this->form_validation->set_rules('endereco', 'Endereço', 'trim|required');
      $this->form_validation->set_rules('telefone', 'Telefone', 'trim|required');
      $this->form_validation->set_rules('email', 'E-mail', 'trim|required');

      if($this->form_validation->run()==TRUE){
        var_dump($this->input->post());
        die();
      }
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
