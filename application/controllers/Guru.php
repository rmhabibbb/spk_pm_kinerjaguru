<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Guru extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
  
        $this->data['nip'] = $this->session->userdata('nip');
        $this->data['id_role']  = $this->session->userdata('id_role'); 
          if (!$this->data['nip'] || ($this->data['id_role'] != 3))
          {
            $this->flashmsg('<i class="glyphicon glyphicon-remove"></i> Anda harus login terlebih dahulu', 'danger');
            redirect('login');
            exit;
          }  
    
    
    $this->load->model('login_m');  
    $this->load->model('Guru_m');   
    $this->load->model('Kriteria_m');   
    $this->load->model('Subkriteria_m');         
    $this->load->model('Kinerja_m');     
    $this->load->model('Penilaian_m');     
    $this->load->model('Laporan_m');     
    $this->load->model('DetailLaporan_m');         
    
    $this->data['profil'] = $this->login_m->get_row(['nip' =>$this->data['nip'] ]); 
    $this->data['guru'] = $this->Guru_m->get_row(['nip' =>$this->data['nip'] ]);   
     
    date_default_timezone_set("Asia/Jakarta");


  }

public function index()
{    
 
      $this->data['hasil'] = $this->Laporan_m->get(['id_guru' => $this->data['guru']->id_guru]);
      $this->data['index'] = 1;
      $this->data['content'] = 'guru/dashboard';
      $this->template($this->data,'guru');
}

public function beriulasan(){
  $data = [
    'ulasan' => $this->POST('ulasan')
  ];

  $this->Laporan_m->update($this->POST('id_laporan'), $data);
  $this->flashmsg2('Terima kasih, ulasan berhasil diberikan.', 'success');
  redirect('guru/');
  exit(); 

}

// PROFIL
  public function profile(){
    if ($this->POST('save')) {
      

          $d = [ 
            'nama' =>  $this->POST('nama'),
            'email' =>  $this->POST('email'),
            'nip' => $this->POST('nip'),  
            'alamat' => $this->POST('alamat'),  
            'no_telp' => $this->POST('no_telp'),  
            'jk' => $this->POST('jk') 
          ];

          if ($this->Guru_m->update($this->POST('id_x'),$d)) {
            

            $this->flashmsg2('Berhasil!', 'success');
            redirect('guru/profile/');
            exit(); 
          }else{
            $this->flashmsg2('Gagal, Coba lagi!', 'warning');
            redirect('guru/profile/');
            exit();  
          } 
           
        

    } 

    if ($this->POST('gpw')) { 

      $cek = 0;
      $msg = ''; 
      if (md5($this->POST('passwordold')) != $this->data['profil']->password) {
        $msg = $msg . 'Password lama salah! <br>';
        $cek++;
      }

      if ($this->POST('passwordnew') != $this->POST('passwordnew2')) {
        $msg = $msg . 'Password baru tidak sama!';
        $cek++;
      }

      if ($cek != 0) {

        $this->flashmsg2($msg, 'warning');
        redirect('guru/profile/');
        exit();  
      }

      $data = [ 
        'password' => md5($this->POST('passwordnew')) 
      ];
      if ($this->login_m->update($this->data['profil']->nip, $data)) {
        $this->flashmsg2('Password berhasil diganti!', 'success');
        redirect('guru/profile/');
        exit();  
      }else{
        $this->flashmsg2('Gagal, Coba lagi!', 'warning');
        redirect('guru/profile/');
        exit();  
      } 
    }

    $this->data['index'] = 5;
    $this->data['content'] = 'guru/profile';
    $this->template($this->data,'guru');
  }
  public function proses_edit_profil(){
    if ($this->POST('edit')) {
      
      


      
    } 
    elseif ($this->POST('edit2')) { 
      
      
      $this->login_m->update($this->data['nip'],$data);
  
      $this->flashmsg('PASSWORD BARU TELAH TERSIMPAN!', 'success');
      redirect('guru/profil');
      exit();    
    }   
    else{ 
      redirect('guru/profil');
      exit();
    } 
  }  
 		

  public function download()
{  
  $this->load->helper('download');
  $explicit = $this->Diskusi_m->get_row(['id_diskusi' => $this->uri->segment(3)])->isi;
  $judul = $this->Diskusi_m->get_row(['id_diskusi' => $this->uri->segment(3)])->judul;
   
  $data = file_get_contents('./'.$explicit); 
  force_download($judul.'.pdf', $data); 
  redirect('guru','refresh');
}


public function download2()
{  
  $this->load->helper('download');
  $explicit = $this->Knowledge_m->get_row(['id_knowledge' => $this->uri->segment(3)])->isi;
  $judul = $this->Knowledge_m->get_row(['id_knowledge' => $this->uri->segment(3)])->judul;
   
  $data = file_get_contents('./'.$explicit); 
  force_download($judul.'.pdf', $data); 
  redirect('guru','refresh');
}


  public function ceknip(){ echo $this->login_m->ceknip2($this->input->post('nip')); } 
  public function cekpasslama(){ echo $this->login_m->cekpasslama2($this->data['nip'],$this->input->post('password')); } 
  public function cekpass(){ echo $this->login_m->cek_password_length2($this->input->post('password')); }
  public function cekpass2(){ echo $this->login_m->cek_passwords2($this->input->post('password'),$this->input->post('password2')); }
// PROFIL
 
}

 ?>
