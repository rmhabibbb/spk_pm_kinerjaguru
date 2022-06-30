<?php
/**
 *
 */
class Login extends MY_Controller {
  function __construct() {
    parent::__construct();
    $this->data['nip'] = $this->session->userdata('nip');
    $this->data['id_role']  = $this->session->userdata('id_role');
    if (isset($this->data['nip'], $this->data['id_role']))
    { 
      if ($this->data['id_role'] == 1) { 
          redirect('stafftu');
          exit();
      }elseif ($this->data['id_role'] == 2) {
          redirect('kepalasekolah');
          exit();
      }elseif ($this->data['id_role'] == 3) {
          redirect('guru');
          exit();
      } 
    }
    $this->load->model('Login_m'); 
    date_default_timezone_set("Asia/Jakarta"); 
  }

  
  public function index() {
    $this->data[ 'title' ] = 'Login | ' . $this->title;
    $this->data[ 'content' ] = 'login';
    $this->load->view('sign-in');
  }

  public function cek(){
      $nip = $this->POST('nip');
      $password = $this->POST('password');
      if($this->Login_m->cek_login($nip,$password) == 0){
        $this->flashmsg('NIP tidak terdaftar!', 'danger');
        redirect('login');
        exit;
      }else if($this->Login_m->cek_login($nip,$password) == 1){
        setcookie('nip_temp', $nip, time() + 5, "/");
        $this->flashmsg('Password Salah!', 'danger');
        redirect('login');
        exit;
      } 
    redirect('login');
  }


}

?>
