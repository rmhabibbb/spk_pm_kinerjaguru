<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class StaffTU extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
  
        $this->data['nip'] = $this->session->userdata('nip');
        $this->data['id_role']  = $this->session->userdata('id_role'); 
          if (!$this->data['nip'] || ($this->data['id_role'] != 1))
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
     
    date_default_timezone_set("Asia/Jakarta");


  }

public function index()
{    
      $this->data['index'] = 1;
      $this->data['content'] = 'stafftu/dashboard';
      $this->template($this->data,'stafftu');
}
 
public function akun()
{     

  if ($this->POST('add')) { 
        
    if ($this->login_m->get_num_row(['nip' => $this->POST('nip')]) != 0) {
      $this->flashmsg2('NIP telah digunakan!', 'warning');
      redirect('stafftu/akun/');
      exit();  
    }

     
    $data = [
      'nip' => $this->POST('nip'), 
      'role' => $this->POST('role'),
      'password' => md5($this->POST('password')) 
    ];

    if ($this->login_m->insert($data)) {
      $this->flashmsg2('Akun berhasil ditambah', 'success');
      redirect('stafftu/akun/');
      exit();  
    }else{
      $this->flashmsg2('Gagal, Coba lagi!', 'warning');
      redirect('stafftu/akun/');
      exit();  
    }
  }
  elseif ($this->POST('edit')) { 
        
    if ($this->login_m->get_num_row(['nip' => $this->POST('nip')]) != 0 && $this->POST('nip_x') != $this->POST('nip')) {
      $this->flashmsg2('nip telah digunakan!', 'warning');
      redirect('stafftu/akun/');
      exit();  
    }

   
    $data = [
      'nip' => $this->POST('nip'), 
      'role' => $this->POST('role')
    ];
    
    

    if ($this->login_m->update($this->POST('nip_x'),$data)) {
      $this->flashmsg2('Akun berhasil diedit.', 'success');
      redirect('stafftu/akun/');
      exit();  
    }else{
      $this->flashmsg2('Gagal, Coba lagi!', 'warning');
      redirect('stafftu/akun/');
      exit();  
    }
  }
  elseif ($this->POST('edit2')) { 
        
    if ($this->POST('password') != $this->POST('password2')) {
      $this->flashmsg2('Konfirmasi password tidak sama!', 'warning');
      redirect('stafftu/akun/');
      exit();  
    }

   
    $data = [
      'password' => md5($this->POST('password'))
    ];
    
    

    if ($this->login_m->update($this->POST('nip'),$data)) {
      $this->flashmsg2('Password '.$this->POST('nip'). ' berhasil diganti.', 'success');
      redirect('stafftu/akun/');
      exit();  
    }else{
      $this->flashmsg2('Gagal, Coba lagi!', 'warning');
      redirect('stafftu/akun/');
      exit();  
    }
  }
  elseif ($this->POST('delete')) {
    if ($this->login_m->delete($this->POST('nip'))) {
      $this->flashmsg2('Akun berhasil dihapus.', 'success');
      redirect('stafftu/akun/');
      exit();  
    }else{
      $this->flashmsg2('Gagal, Coba lagi!', 'warning');
      redirect('stafftu/akun/');
      exit();  
    }
  }
  else {
    $this->data['users'] = $this->login_m->get(['nip !=' => $this->data['nip']  ]);
    $this->data['index'] = 2;
    $this->data['content'] = 'stafftu/users';
    $this->template($this->data,'stafftu');
  }
}
 
public function guru()
{     

  if ($this->POST('add')) { 
    $cek = 0;
    $msg = ''; 
    if ($this->login_m->get_num_row(['nip' => $this->POST('nip')]) != 0) {
      $msg = $msg . 'NIP telah digunakan!<br>';
      $cek++;
    }
     

    if ($cek != 0) {

      $this->flashmsg2($msg, 'warning');
      redirect('stafftu/guru/');
      exit();  
    }
     
    $data = [
      'nip' => $this->POST('nip'), 
      'role' => 3,
      'password' => md5($this->POST('nip')) 
    ];

    if ($this->login_m->insert($data)) {

      $d = [ 
        'nama' =>  $this->POST('nama'),
        'email' =>  $this->POST('email'),
        'nip' => $this->POST('nip'),  
        'alamat' => $this->POST('alamat'),  
        'no_telp' => $this->POST('no_telp'),  
        'jk' => $this->POST('jk') 
      ];

      if ($this->Guru_m->insert($d)) {
         $this->flashmsg2('Data guru berhasil ditambah', 'success');
          redirect('stafftu/guru/');
          exit(); 
      }else{
        $this->login_m->delete($this->POST('nip'));
        $this->flashmsg2('Gagal, Coba lagi!', 'warning');
        redirect('stafftu/guru/');
        exit();  
      }

      
    }else{
      $this->flashmsg2('Gagal, Coba lagi!', 'warning');
      redirect('stafftu/guru/');
      exit();  
    }
  }
  elseif ($this->POST('edit')) { 
         
    $cek = 0;
    $msg = ''; 
    if ($this->login_m->get_num_row(['nip' => $this->POST('nip')]) != 0 && $this->POST('nip_x') != $this->POST('nip')) {
      $msg = $msg . 'NIP telah digunakan!<br>';
      $cek++;
    }
    

    if ($cek != 0) {

      $this->flashmsg2($msg, 'warning');
      redirect('stafftu/guru/');
      exit();  
    }
     
   
    $data = [
      'nip' => $this->POST('nip') 
    ];
    
    

    if ($this->login_m->update($this->POST('nip_x'),$data)) {

      $d = [ 
        'nama' =>  $this->POST('nama'),
        'email' =>  $this->POST('email'),
        'nip' => $this->POST('nip'),  
        'alamat' => $this->POST('alamat'),  
        'no_telp' => $this->POST('no_telp'),  
        'jk' => $this->POST('jk') 
      ];

      if ($this->Guru_m->update($this->POST('id_x'), $d)) {
        $this->flashmsg2('Data guru berhasil diedit.', 'success');
        redirect('stafftu/guru/');
        exit(); 
      }else{
        $this->flashmsg2('Gagal, Coba lagi!', 'warning');
        redirect('stafftu/guru/');
        exit();  
    }

       
    }else{
      $this->flashmsg2('Gagal, Coba lagi!', 'warning');
      redirect('stafftu/guru/');
      exit();  
    } 
  } 
  elseif ($this->POST('delete')) {
    if ($this->login_m->delete($this->POST('nip'))) {
      $this->flashmsg2('Data guru berhasil dihapus.', 'success');
      redirect('stafftu/guru/');
      exit();  
    }else{
      $this->flashmsg2('Gagal, Coba lagi!', 'warning');
      redirect('stafftu/guru/');
      exit();  
    }
  }
  else {
    $this->data['guru'] = $this->Guru_m->get();
    $this->data['index'] = 3;
    $this->data['content'] = 'stafftu/guru';
    $this->template($this->data,'stafftu');
  }
}

public function kriteria()
{     

  if ($this->POST('add')) { 
    
    $data = [
      'nama_kriteria' => $this->POST('nama'),
      'bobot_kriteria' => $this->POST('bobot_kriteria') 
    ];

    if ($this->Kriteria_m->insert($data)) {

      $id = $this->db->insert_id();
      $this->flashmsg2('Kriteria berhasil ditambah', 'success');
      redirect('stafftu/kriteria/'.$id);
      exit(); 
  
      
    }else{
      $this->flashmsg2('Gagal, Coba lagi!', 'warning');
      redirect('stafftu/kriteria/');
      exit();  
    }
  }
  elseif ($this->POST('edit')) { 
         
    
 
      $d = [ 
        'nama_kriteria' =>  $this->POST('nama') ,
      'bobot_kriteria' => $this->POST('bobot_kriteria') 
      ];

      if ($this->Kriteria_m->update($this->POST('id_x'), $d)) {
        $this->flashmsg2('Data kriteria berhasil diedit.', 'success');
        redirect('stafftu/kriteria/');
        exit(); 
      }else{
        $this->flashmsg2('Gagal, Coba lagi!', 'warning');
        redirect('stafftu/kriteria/');
        exit();  
      }

        
  } 
  elseif ($this->POST('delete')) {
    if ($this->Kriteria_m->delete($this->POST('id_kriteria'))) {
      $this->flashmsg2('Data kriteria berhasil dihapus.', 'success');
      redirect('stafftu/kriteria/');
      exit();  
    }else{
      $this->flashmsg2('Gagal, Coba lagi!', 'warning');
      redirect('stafftu/kriteria/');
      exit();  
    }
  }


  elseif ($this->uri->segment(3)) {
    $this->data['kriteria'] = $this->Kriteria_m->get_row(['id_kriteria' => $this->uri->segment(3)]);
    $this->data['list_subs'] = $this->Subkriteria_m->get(['id_kriteria' => $this->uri->segment(3)]);
    $this->data['index'] = 2;
    $this->data['content'] = 'stafftu/kriteria-detail';
    $this->template($this->data,'stafftu');
  }
  else {
    $this->data['kriteria'] = $this->Kriteria_m->get();
    $this->data['index'] = 2;
    $this->data['content'] = 'stafftu/kriteria';
    $this->template($this->data,'stafftu');
  }
}

public function subkriteria(){
  if ($this->POST('add')) {   
    $data = [   
      'nama_sub' => $this->POST('nama_sub'), 
      'jenis' => $this->POST('jenis'),
      'nilai_standar' => $this->POST('nilai_standar'),
      'id_kriteria' => $this->POST('id_kriteria') 
    ];
    $this->Subkriteria_m->insert($data);

    $id = $this->db->insert_id();

    $this->flashmsg2('Subkriteria berhasil ditambah!', 'success');
    redirect('stafftu/kriteria/'. $this->POST('id_kriteria'));
    exit();    
  }  

  if ($this->POST('edit')) { 
    $data = [   
      'nama_sub' => $this->POST('nama_sub'), 
      'jenis' => $this->POST('jenis'),
      'nilai_standar' => $this->POST('nilai_standar') 
    ];

    $this->Subkriteria_m->update($this->POST('id_sub'),$data);

    $this->flashmsg2('Data Subkriteria berhasil disimpan!', 'success');
    redirect('stafftu/kriteria/'.$this->POST('id_kriteria'));
    exit();    
  } 

  if ($this->POST('delete')) {   
    $this->Subkriteria_m->delete($this->POST('id_sub'));
    $this->flashmsg2('Data Subkriteria berhasil dihapus!', 'success');
    redirect('stafftu/kriteria/'.$this->POST('id_kriteria'));
    exit();    
  }  
} 

public function kinerja()
{     

  if ($this->POST('add')) { 
    
    if (($this->POST('ncf') + $this->POST('nsf')) > 100) {
      $this->flashmsg2('Gagal, jumlah NCF dan NSF lebih dari 100%', 'warning');
      redirect('stafftu/kinerja/');
      exit(); 
    }

    if (($this->POST('ncf') + $this->POST('nsf')) < 100) {
      $this->flashmsg2('Gagal, jumlah NCF dan NSF kurang dari 100%', 'warning');
      redirect('stafftu/kinerja/');
      exit(); 
    }

    $data = [
      'bulan' => $this->POST('bulan'),
      'tahun' => $this->POST('tahun'),
      'persen_NCF' => $this->POST('ncf'),
      'persen_NSF' => $this->POST('nsf'),
      'tgl_buat' => date('Y-m-d H:i:s'),
      'status' => 1
    ];

    if ($this->Kinerja_m->insert($data)) {

      $id = $this->db->insert_id();
      $this->flashmsg2('Data Kinerja Guru berhasil ditambah', 'success');
      redirect('stafftu/kinerja/'.$id);
      exit(); 
  
      
    }else{
      $this->flashmsg2('Gagal, Coba lagi!', 'warning');
      redirect('stafftu/kinerja/');
      exit();  
    }
  }
  elseif ($this->POST('edit')) {  
      if (($this->POST('ncf') + $this->POST('nsf')) > 100) {
        $this->flashmsg2('Gagal, jumlah NCF dan NSF lebih dari 100%', 'warning');
        redirect('stafftu/kinerja/'.$this->POST('id_kinerja'));
        exit(); 
      }
      if (($this->POST('ncf') + $this->POST('nsf')) < 100) {
        $this->flashmsg2('Gagal, jumlah NCF dan NSF kurang dari 100%', 'warning');
        redirect('stafftu/kinerja/'.$this->POST('id_kinerja'));
        exit(); 
      }

      $d = [
        'bulan' => $this->POST('bulan'),
        'tahun' => $this->POST('tahun'),
        'persen_NCF' => $this->POST('ncf'),
        'persen_NSF' => $this->POST('nsf'),
        'tgl_buat' => date('Y-m-d H:i:s') 
      ];

      if ($this->Kinerja_m->update($this->POST('id_kinerja'), $d)) {
        $this->flashmsg2('Data kinerja guru berhasil disimpan.', 'success'); 
        redirect('stafftu/kinerja/'.$this->POST('id_kinerja'));
        exit(); 
      }else{
        $this->flashmsg2('Gagal, Coba lagi!', 'warning'); 
        redirect('stafftu/kinerja/'.$this->POST('id_kinerja'));
        exit();  
      } 
  } 

  elseif ($this->POST('mulai')) {  
       

      $d = [ 
        'status' => 2
      ];

      if ($this->Kinerja_m->update($this->POST('id_kinerja'), $d)) {
        $this->flashmsg2('Tahap penilaian telah dimulai', 'success'); 
        redirect('stafftu/kinerja/'.$this->POST('id_kinerja'));
        exit(); 
      }else{
        $this->flashmsg2('Gagal, Coba lagi!', 'warning'); 
        redirect('stafftu/kinerja/'.$this->POST('id_kinerja'));
        exit();  
      } 
  } 

  elseif ($this->POST('delete')) {
    if ($this->Kinerja_m->delete($this->POST('id_kinerja'))) {
      $this->flashmsg2('Data kinerja guru berhasil dihapus.', 'success');
      redirect('stafftu/kinerja/');
      exit();  
    }else{
      $this->flashmsg2('Gagal, Coba lagi!', 'warning');
      redirect('stafftu/kinerja/');
      exit();  
    }
  } 
  elseif ($this->uri->segment(3)) {
      $this->data['list_guru'] = $this->Guru_m->get(); 
    $this->data['kinerja'] = $this->Kinerja_m->get_row(['id_kinerja' => $this->uri->segment(3)]); 

    if ($this->data['kinerja']->status == 1) {
      $this->data['content'] = 'stafftu/kinerja-detail-draft';
    }elseif ($this->data['kinerja']->status == 2) {
      $this->data['content'] = 'stafftu/kinerja-detail-penilaian';
    }elseif ($this->data['kinerja']->status == 3) {
        $this->data['laporan'] = $this->Laporan_m->get(['id_kinerja' => $this->uri->segment(3)]);
      $this->data['content'] = 'stafftu/kinerja-detail-laporan';
    }

    $this->data['index'] = 2;
    $this->template($this->data,'stafftu');
  }
  else {
    $this->data['kinerja'] = $this->Kinerja_m->get();
    $this->data['index'] = 2;
    $this->data['content'] = 'stafftu/kinerja';
    $this->template($this->data,'stafftu');
  }
}


// PROFIL
  public function profile(){
    if ($this->POST('save')) {
      if ($this->login_m->get_num_row(['nip' => $this->POST('nip')]) != 0 && $this->POST('nip') != $this->POST('nipx')) { 
        $this->flashmsg2('nip telah digunakan!', 'warning');
        redirect('stafftu/profile/');
        exit();  
      }

        if ($this->login_m->update($this->POST('nipx'),['nip' => $this->POST('nip')])) {
          $user_session = [
            'nip' => $this->POST('nip')
          ];
          $this->session->set_userdata($user_session);

          $this->flashmsg2('Berhasil!', 'success');
          redirect('stafftu/profile/');
          exit();  
        }else{
          $this->flashmsg2('Gagal, Coba lagi!', 'warning');
          redirect('stafftu/profile/');
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
        redirect('stafftu/profile/');
        exit();  
      }

      $data = [ 
        'password' => md5($this->POST('passwordnew')) 
      ];
      if ($this->login_m->update($this->data['profil']->nip, $data)) {
        $this->flashmsg2('Password berhasil diganti!', 'success');
        redirect('stafftu/profile/');
        exit();  
      }else{
        $this->flashmsg2('Gagal, Coba lagi!', 'warning');
        redirect('stafftu/profile/');
        exit();  
      } 
    }

    $this->data['index'] = 5;
    $this->data['content'] = 'stafftu/profile';
    $this->template($this->data,'stafftu');
  }



  public function proses_edit_profil(){
    if ($this->POST('edit')) {
      
      


      
    } 
    elseif ($this->POST('edit2')) { 
      
      
      $this->login_m->update($this->data['nip'],$data);
  
      $this->flashmsg('PASSWORD BARU TELAH TERSIMPAN!', 'success');
      redirect('stafftu/profil');
      exit();    
    }   
    else{ 
      redirect('stafftu/profil');
      exit();
    } 
  }  
 
  public function ceknip(){ echo $this->login_m->ceknip2($this->input->post('nip')); } 
  public function cekpasslama(){ echo $this->login_m->cekpasslama2($this->data['nip'],$this->input->post('password')); } 
  public function cekpass(){ echo $this->login_m->cek_password_length2($this->input->post('password')); }
  public function cekpass2(){ echo $this->login_m->cek_passwords2($this->input->post('password'),$this->input->post('password2')); }
// PROFIL
 
}

 ?>
