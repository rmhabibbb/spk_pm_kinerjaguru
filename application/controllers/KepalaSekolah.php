<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class KepalaSekolah extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
  
        $this->data['nip'] = $this->session->userdata('nip');
        $this->data['id_role']  = $this->session->userdata('id_role'); 
          if (!$this->data['nip'] || ($this->data['id_role'] != 2))
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
      $this->data['list_guru'] = $this->Guru_m->get(); 
      $this->data['list_kinerja'] = $this->Kinerja_m->get(['status' => 2]);
      $this->data['index'] = 1;
      $this->data['content'] = 'kepalasekolah/dashboard';
      $this->template($this->data,'kepalasekolah');
}
 

public function ulasan()
{    
      $this->data['list_ulasan'] = $this->Laporan_m->get(['ulasan !=' => NULL]);  
      $this->data['index'] = 1;
      $this->data['content'] = 'kepalasekolah/ulasan';
      $this->template($this->data,'kepalasekolah');
}
 


public function laporan()
{     
    if ($this->uri->segment(3)) {
        $this->data['kinerja'] = $this->Kinerja_m->get_row(['id_kinerja' => $this->uri->segment(3)]);
        $this->data['laporan'] = $this->Laporan_m->get(['id_kinerja' => $this->uri->segment(3)]);
        $this->data['index'] = 1;
        $this->data['content'] = 'kepalasekolah/laporan-detail';
        $this->template($this->data,'kepalasekolah');
    }else{
        $this->data['list_kinerja'] = $this->Kinerja_m->get(['status' => 3]);
        $this->data['index'] = 1;
        $this->data['content'] = 'kepalasekolah/laporan';
        $this->template($this->data,'kepalasekolah');
    }
     
}
 
 
public function penilaian()
{     

  if ($this->POST('inputnilai')) { 
          
    $list_kriteria = $this->Kriteria_m->get();

    foreach ($list_kriteria as $k) { 
        $list_sub = $this->Subkriteria_m->get(['id_kriteria' => $k->id_kriteria]);

        foreach ($list_sub as $s) {
          $data = [   
            'id_kinerja' => $this->POST('id_kinerja'),  
            'id_guru' => $this->POST('id_guru'),  
            'id_sub' => $s->id_sub, 
            'nilai' => $this->POST('sub-'.$s->id_sub)
          ];
          $this->Penilaian_m->insert($data);
          
        }
      

    }

    

    $this->flashmsg2('Penilaian berhasil diinput', 'success');
    redirect('kepalasekolah/penilaian/'.$this->POST('id_kinerja'));
    exit();  
  } 
  elseif ($this->POST('editnilai')) { 
        
    $this->Penilaian_m->delete_by(['id_guru' => $this->POST('id_guru'),'id_kinerja' => $this->POST('id_kinerja')]);
    $list_kriteria = $this->Kriteria_m->get();

    foreach ($list_kriteria as $k) { 
        $list_sub = $this->Subkriteria_m->get(['id_kriteria' => $k->id_kriteria]);

        foreach ($list_sub as $s) {
          $data = [   
            'id_kinerja' => $this->POST('id_kinerja'),  
            'id_guru' => $this->POST('id_guru'),  
            'id_sub' => $s->id_sub, 
            'nilai' => $this->POST('sub-'.$s->id_sub)
          ];
          $this->Penilaian_m->insert($data);
          
        }
      

    }

    

    $this->flashmsg2('Penilaian berhasil diedit', 'success');
    redirect('kepalasekolah/penilaian/'.$this->POST('id_kinerja'));
    exit();  
  } 
  elseif ($this->POST('deletenilai')) { 
        
    $this->Penilaian_m->delete_by(['id_guru' => $this->POST('id_guru'),'id_kinerja' => $this->POST('id_kinerja')]); 
    

    $this->flashmsg2('Penilaian berhasil dihapus', 'success');
    redirect('kepalasekolah/penilaian/'.$this->POST('id_kinerja'));
    exit();  
  } 

  elseif ($this->POST('selesai')) { 
        
    
    $spk = $this->Penilaian_m->ProfileMatching($this->POST('id_kinerja'));  
    $rank = $spk['rank']; 
    $detail = $spk['nilai_total_kompetensi'];

    for ($i=0; $i < sizeof($rank) ; $i++) { 
      $data = [
        'id_kinerja' => $this->POST('id_kinerja'),
        'id_guru' => $rank[$i]['id_guru'],
        'peringkat' => $i+1,
        'hasil_akhir' => $rank[$i]['ha']
      ];

      $this->Laporan_m->insert($data);
      $id = $this->db->insert_id(); 
      for ($j=0; $j < sizeof($detail[$i]['data']) ; $j++) { 

        $data2 = [
          'id_laporan' => $id,
          'kriteria' => $detail[$i]['data'][$j]['nk'],
          'bobot' => $detail[$i]['data'][$j]['bk'],
          'hasil' => $detail[$i]['data'][$j]['total']
        ];

        $this->DetailLaporan_m->insert($data2);
        
      }
 

    }
 

      $d = [ 
        'status' => 3
      ];

      if ($this->Kinerja_m->update($this->POST('id_kinerja'), $d)) {
         $this->flashmsg2('Penilaian selesai.', 'success');
        redirect('kepalasekolah/laporan/'.$this->POST('id_kinerja'));
        exit();  
      }else{

        $this->Laporan_m->delete_by(['id_kinerja' => $this->POST('id_kinerja')]);
        $this->flashmsg2('Gagal, Coba lagi!', 'warning'); 
        redirect('kepalasekolah/penilaian/'.$this->POST('id_kinerja'));
        exit();  
      } 

   
  } 


  elseif ($this->uri->segment(3)) {
    if ($this->uri->segment(4) == 'pm'){
        $this->data['kinerja'] = $this->Kinerja_m->get_row(['id_kinerja' => $this->uri->segment(3)]);  
        $this->data['list_kriteria'] = $this->Kriteria_m->get(); 

        
        $spk = $this->Penilaian_m->ProfileMatching($this->uri->segment(3)); 
        $this->data['list_guru'] = $spk['list_guru'];  
        $this->data['rank'] = $spk['rank'];
        $this->data['hasil_akhir'] = $spk['hasil_akhir'];
        $this->data['nilai_awal_gap'] = $spk['nilai_awal_gap'];
        $this->data['bobot_gap'] = $spk['bobot_gap'];
        $this->data['kelompok_bobot_gap'] = $spk['kelompok_bobot_gap'];
        $this->data['nilai_total_kompetensi'] = $spk['nilai_total_kompetensi'];
        $this->data['content'] = 'kepalasekolah/pm';
         

        $this->data['index'] = 2;
        $this->template($this->data,'kepalasekolah');
    }else{
       $this->data['kinerja'] = $this->Kinerja_m->get_row(['id_kinerja' => $this->uri->segment(3)]); 
        $this->data['list_guru'] = $this->Guru_m->get(); 
        $this->data['list_kriteria'] = $this->Kriteria_m->get(); 

        
        $spk = $this->Penilaian_m->ProfileMatching($this->uri->segment(3));



        $this->data['rank'] = $spk['rank'];
        $this->data['content'] = 'kepalasekolah/penilaian';
         

        $this->data['index'] = 2;
        $this->template($this->data,'kepalasekolah');
    }
   
  }
  else { 
    redirect('kepalasekolah/');
    exit();  
  }
}


// PROFIL
  public function profile(){
    if ($this->POST('save')) {
      if ($this->login_m->get_num_row(['nip' => $this->POST('nip')]) != 0 && $this->POST('nip') != $this->POST('nipx')) { 
        $this->flashmsg2('nip telah digunakan!', 'warning');
        redirect('kepalasekolah/profile/');
        exit();  
      }

        if ($this->login_m->update($this->POST('nipx'),['nip' => $this->POST('nip')])) {
          $user_session = [
            'nip' => $this->POST('nip')
          ];
          $this->session->set_userdata($user_session);

          $this->flashmsg2('Berhasil!', 'success');
          redirect('kepalasekolah/profile/');
          exit();  
        }else{
          $this->flashmsg2('Gagal, Coba lagi!', 'warning');
          redirect('kepalasekolah/profile/');
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
        redirect('kepalasekolah/profile/');
        exit();  
      }

      $data = [ 
        'password' => md5($this->POST('passwordnew')) 
      ];
      if ($this->login_m->update($this->data['profil']->nip, $data)) {
        $this->flashmsg2('Password berhasil diganti!', 'success');
        redirect('kepalasekolah/profile/');
        exit();  
      }else{
        $this->flashmsg2('Gagal, Coba lagi!', 'warning');
        redirect('kepalasekolah/profile/');
        exit();  
      } 
    }

    $this->data['index'] = 5;
    $this->data['content'] = 'kepalasekolah/profile';
    $this->template($this->data,'kepalasekolah');
  }



  public function proses_edit_profil(){
    if ($this->POST('edit')) {
      
      


      
    } 
    elseif ($this->POST('edit2')) { 
      
      
      $this->login_m->update($this->data['nip'],$data);
  
      $this->flashmsg('PASSWORD BARU TELAH TERSIMPAN!', 'success');
      redirect('kepalasekolah/profil');
      exit();    
    }   
    else{ 
      redirect('kepalasekolah/profil');
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
