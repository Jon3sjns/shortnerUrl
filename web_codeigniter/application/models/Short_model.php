<?php

/**
 *
 */
class Short_model extends CI_Model
{
  function create_url($data)
  {
    return $this->db->insert("url",$data);
  }

  function cekID($data)
  {
    return $this->db->get_where("url",["url_pendek"=>$data]);
  }

  function update_visitor($data,$id){
    return $this->db->update("url",['visitor'=>$data],["url_pendek"=>$id]);
  }

  function view_visitor($url){
    return $this->db->get_where("url",["url_pendek"=>$url]);
  }

  function alihkan($url){
    return $this->db->query("SELECT * FROM url WHERE BINARY url_pendek='$url'");
  }

  // function tambah_view($data){
  //   return $this->db->get_where("url",["hit"=>$data])->row();
  // }
}


 ?>
