<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

  private $data = array('pedido' => array());
  // private $produtos = array('carrinho' => array());

  public function __construct(){
    parent::__construct();
    $this->load->model('Pedidos_model', 'pedidos');
    $this->load->model('Dashboard_model', 'dash');
    $this->load->library('table');
    $this->load->helper('array');
    $this->load->library('form_validation');
  }

  public function criarPedidoA($produto=NULL){

    if($produto != NULL){
      if($this->session->userdata('teste') == NULL){
        array_push($this->data['pedido'] , $this->dash->getProductById($produto)->row());
        $this->session->set_userdata('teste', $this->data['pedido']);
      }else{
        $this->data['pedido'] = $this->session->userdata('teste');
        array_push($this->data['pedido'] , $this->dash->getProductById($produto)->row());
        $this->session->set_userdata('teste', $this->data['pedido']);
        //$i = 0;
        foreach($this->session->userdata('teste') as $id){
         echo $id->idprodutos;

         //o restante do seu código aqui
         //$i++;

        }

      }

      var_dump($this->session->userdata('teste'));
    }

    // if($this->input->post()){
    //
    //   $this->form_validation->set_message('required', 'O campo %s é obrigatório');
    //
    //   $this->form_validation->set_rules('nome', 'Nome do Cliente', 'trim|required');
    //   $this->form_validation->set_rules('endereco', 'Endereço', 'trim|required');
    //   $this->form_validation->set_rules('telefone', 'Telefone', 'trim|required');
    //   $this->form_validation->set_rules('email', 'E-mail', 'trim|required');
    //
    //   if($this->form_validation->run()==TRUE){
    //     var_dump($this->input->post());
    //     die();
    //   }
    // }

      // foreach ($this->data['pedido'] as $linha) {
      //   array_push($produtos['carrinho'], $this->dash->getProductById($linha)->row());
      //   var_dump($produtos['carrinho']);
      //   die();
      // }

    var_dump($this->session->userdata('teste'));

    $this->load->view('templates/header');
    $this->load->view('templates/menuUpLeft');
    $this->load->view('myminisweets/admin/pedidos/criarPedido', $this->data);
    $this->load->view('templates/footer');

  }

  public function pesquisarProdutoJson(){
      $nomeProduto = $this->input->post('busca');
      echo json_encode($this->pedidos->getProductLike($nomeProduto)->result());

  }

  public function addProduto($produto){

    if($this->session->userdata('teste') == NULL){
      array_push($this->data['pedido'] , $produto);
      $this->session->set_userdata('teste', $this->data['pedido']);
    }else{
      $this->data['pedido'] = $this->session->userdata('teste');
      array_push($this->data['pedido'] , $produto);
      $this->session->set_userdata('teste', $this->data['pedido']);
    }

    var_dump($this->session->userdata('teste'));
    //$this->data['pedido'] = $this->dash->getProductById($produto)->row();


    $this->load->view('templates/header');
    $this->load->view('templates/menuUpLeft');
    $this->load->view('myminisweets/admin/pedidos/criarPedido');
    $this->load->view('templates/footer');

  }

  public function destroySession(){
    $this->session->sess_destroy();
    echo "ok";
  }

  public function gerenciarPedidos(){

    $this->load->view('templates/header');
    $this->load->view('templates/menuUpLeft');
    $this->load->view('admin/pedidos/gerenciarPedidos');
    $this->load->view('templates/footer');
  }

}
