<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

  public function verificaDados($login=NULL, $senha=NULL){
    if($login==NULL || $senha==NULL){
      return FALSE;
    }else{
      $data = $this->db->get_where('clientes', array('login' => $login))->row();
      if($data->login == $login && $data->senha == $senha){
        return TRUE;
      }else{
        return FALSE;
      }
      }

    }

    public function verificaPermissao($login=NULL){

      if($login==NULL){
        return false;
      }else{
        $data = $this->db->get_where('clientes', array('login' => $login))->row('permissao');
        if($data == 2){
          return true;
        }else{
          return false;
        }
      }

    }
}
