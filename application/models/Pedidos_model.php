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

  public function pedidoFinalizado($dados=NULL){
    $array = array();
    if($dados != NULL){
      $this->db->insert('pedidos_avulsos', $dados['pedidos_a']);

      $this->db->select_max('id_pedidos_a');
      $idPedido = $this->db->get('pedidos_avulsos')->row('id_pedidos_a');

      foreach ($dados['itens_idProduto'] as $keyProduto => $valueProduto) {
        foreach ($dados['itens_quantidade'] as $keyQuantidade => $valueQuantidade) {
          if($keyProduto != $keyQuantidade ){
            continue;
          }else{
            array_push($array, array('produtos_idprodutos'=>(integer)$valueProduto, 'pedidos_avulsos_id_pedidos_a'=>(integer)$idPedido, 'quantidade'=>(integer)$valueQuantidade));
          }
        }
      }
      foreach ($array as $item) {
        $this->db->insert('itens', $item);
      }
      return TRUE;
      }
  }

  public function getPedidos(){
    return $this->db->get('pedidos_avulsos')->result();
  }

  public function getItens($idPedido = NULL){
    if($idPedido != NULL){
      $this->db->where('pedidos_avulsos_id_pedidos_a', $idPedido);
      $this->db->join('produtos', 'produtos.idprodutos = itens.produtos_idprodutos');
      return $this->db->get('itens')->result();
    }
  }
}
