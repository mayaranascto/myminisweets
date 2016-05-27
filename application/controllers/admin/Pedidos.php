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
        foreach($this->session->userdata('teste') as $id){
          if($id->idprodutos != $produto){
            $existe = FALSE;
          }else{
            $existe = TRUE;
            break;
          }
        }
        if($existe == FALSE){
          $this->data['pedido'] = $this->session->userdata('teste');
          array_push($this->data['pedido'] , $this->dash->getProductById($produto)->row());
          $this->session->set_userdata('teste', $this->data['pedido']);
        }
      }

      //var_dump($this->session->userdata('teste'));
    }

    if($this->input->post()){
      //var_dump($this->input->post('quant'));
      // var_dump($this->input->post('idprodutos'));
      // die();

      $this->form_validation->set_message('required', 'O campo %s é obrigatório');

      $this->form_validation->set_rules('nome_cliente', 'Nome do Cliente', 'trim|required');
      $this->form_validation->set_rules('endereco', 'Endereço', 'trim|required');
      $this->form_validation->set_rules('telefone', 'Telefone', 'trim|required');
      $this->form_validation->set_rules('email', 'E-mail', 'trim|required');

      if($this->form_validation->run()==TRUE){

        $dados['pedidos_a'] = elements(array('nome_cliente', 'endereco', 'telefone', 'email'), $this->input->post());
        $dados['itens_quantidade'] = $this->input->post('quantidade');
        $dados['itens_idProduto'] = $this->input->post('Produtos_idProdutos');
        //var_dump($this->input->post('Produtos_idProdutos'));

        if($this->pedidos->pedidoFinalizado($dados)){
          $this->session->set_flashdata('pedidoOk', 'Pedido Finalizado com Sucesso');
          $this->session->unset_userdata('teste');
          redirect('admin/Pedidos/criarPedidoA');
        }else{
          $this->session->set_flashdata('pedidoFail', 'Ocorreu um erro ao finalizar o pedido');
          redirect('admin/Pedidos/criarPedidoA');
        }
      }
    }

    $this->data['pedido'] = $this->session->userdata('teste');
    //var_dump($this->session->userdata('teste'));

    $this->load->view('templates/header');
    $this->load->view('templates/menuUpLeft');
    $this->load->view('myminisweets/admin/pedidos/criarPedido', $this->data);
    $this->load->view('templates/footer');

  }

  public function verPedidos(){

    $dados['pedidos'] = $this->pedidos->getPedidos();

    $this->load->view('templates/header');
    $this->load->view('templates/menuUpLeft');
    $this->load->view('myminisweets/admin/pedidos/gerenciarPedidos', $dados);
    $this->load->view('templates/footer');

  }

  public function verItens($idpedido){

    $dados['itens'] = $this->pedidos->getItens($idpedido);
    foreach ($dados['itens'] as $keyProduto => $valueProduto) {
        $dados['ids'] = $valueProduto->produtos_idprodutos;
    }

    //$this->pedidos->getNomeItem($dados);

    $this->load->view('templates/header');
    $this->load->view('templates/menuUpLeft');
    $this->load->view('myminisweets/admin/pedidos/verItens', $dados);
    $this->load->view('templates/footer');
  }

  public function pesquisarProdutoJson(){
      $nomeProduto = $this->input->post('busca');
      echo json_encode($this->pedidos->getProductLike($nomeProduto)->result());

  }

  public function destroySession(){
    $this->session->sess_destroy();
    echo "ok";
  }

  public function closeSession(){

  }

  public function gerenciarPedidos(){

    $this->load->view('templates/header');
    $this->load->view('templates/menuUpLeft');
    $this->load->view('admin/pedidos/gerenciarPedidos');
    $this->load->view('templates/footer');
  }

}
