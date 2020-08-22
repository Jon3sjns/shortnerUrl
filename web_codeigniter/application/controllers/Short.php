<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Short extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model("Short_model");
  }

  private function pendek_url(){
    $panjang=2;
    $karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
    $pos = rand(0, strlen($karakter)-1);
    $string .= $karakter{$pos};
    }
    return $string.substr(uniqid(),6,5);
  }

  private function _rules(){
    return [
      [
      "field"=>"url_asli",
      "label"=>"URL",
      "rules"=>"required"
      ]
    ];
  }

  public function index()
  {
    $url_asli=$this->input->post("url_asli");
    $url_pendek=$this->pendek_url();
    $data=[
      "url_asli"=>$url_asli,
      "url_pendek"=>$url_pendek,
      "visitor"=>0,
      "tanggal"=>date("Y-m-d H:i:s")
    ];

    if ($this->form_validation->set_rules($this->_rules())->run()) {
        if ($this->Short_model->create_url($data)) {
          $this->session->set_flashdata("sukses_tambah_url","Sukses tambah url");
          redirect(base_url("short/sukses/".$url_pendek));
        }
    }

    $this->load->view("index.php");
  }

  public function sukses($url=null)
  {
    if($this->session->flashdata("sukses_tambah_url")){
      $data['url']=$url;
      $this->load->view("sukses",$data);
    }else {
      show_404();
    }
  }

  public function akses($url=null)
  {

    // if ($url=="admin") {
    //   //login admin
    //   $this->load->model("Admin_model");
    //   $rules=[
    //     [
    //       "field"=>"username",
    //       "label"=>"Username",
    //       "rules"=>"required"
    //     ],
    //     [
    //       "field"=>"password",
    //       "label"=>"Password",
    //       "rules"=>"required"
    //     ]
    //   ];
    //
    //   if ($this->form_validation->set_rules($rules)->run()) {
    //     $username=$this->input->post("username");
    //     $password=md5($this->input->post("password"));
    //
    //     $data=[
    //       "username"=>$username,
    //       "password"=>$password
    //     ];
    //
    //     //cek login
    //     if ($this->Admin_model->login($data)<1) {
    //       $this->session->set_flashdata("gagal_login","Cek username dan password anda");
    //       redirect(base_url("admin"));
    //     }else {
    //       //buat session
    //       $sesi=[
    //         "username"=>$username,
    //         "status"=>"login"
    //       ];
    //       $this->session->set_userdata($sesi);
    //
    //       //redirect ke halaman admin
    //       redirect(base_url("admin/index"));
    //
    //     }
    //
    //   }
    //
    //   $this->load->view("admin/login.php");
    //
    // }else{

      //url apakah ada
      $id=$this->Short_model->alihkan($url);
      if ($id->num_rows()<1) {
        //tampilkan not found
        show_404();
      }else {
        //redirect ke url asli
        $jumlah_visitor=$this->Short_model->view_visitor($url)->row();
        $jumlah_visitor2=$jumlah_visitor->visitor+1;
        if ($this->Short_model->update_visitor($jumlah_visitor2,$url)) {
          // redirect($this->Short_model->view_visitor($url)->row()->url_asli);
          redirect($this->Short_model->alihkan($url)->row()->url_asli);
          // echo $this->Short_model->alihkan($url)->url_asli;
        }
      }

  }
}

 ?>
