 <!-- Header -->
    <div class="header  pb-6" style="background-color: #0087c2ad">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              
              <h6 class="h2 text-white d-inline-block mb-0">Dahsboard</h6>
               
            </div>
            
          </div> 
        </div>
        <?= $this->session->flashdata('msg2') ?>
      </div>
    </div>  

    <div class="container-fluid mt--6">
       <div class="row">

            <div class="col-xl-12 col-md-12">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <h1 style="text-align: center;">Selamat Datang di Sistem Penduduk Keputusan Penilaian Kinerja Guru<br>Menggunakan Metode Profile Matching</h1>
                  
                  <p style="text-indent: 50px;">
                    <b>Sistem Pendukung Keputusan (SPK)</b> adalah bagian dari sistem informasi berbasis komputer termasuk sistem berbasis manajemen pengetahuan yang dipakai untuk mendukung pengambilan keputusan dalam suatu organisasi atau perusahaan, mengolah data menjadi informasi untuk mengambil keputusan dari masalah semi terstruktur yang spesifik. SPK bukanlah alat pengambilan keputusan, tetapi merupakan sebuah sistem yang membantu pengambil keputusan dengan menyediakan informasi dari data yang sudah diolah dengan relevan dan diperlukan untuk membuat keputusan tentang permasalahan dengan lebih cepat dan akurat. Sistem ini tidak dimaksudkan untuk menggantikan pengambilan keputusan dalam proses pembuatan keputusan. (Wisanti, 2017)
                  </p>
                  <p style="text-indent: 50px;">
                    <b>Metode Profile Matching</b> merupakan sebuah mekanisme pengambilan keputusan dengan mengansumsikan bahwa terdapat tingkatan mnimal variabel prediktor yang ideal yang harus dipenuhi oleh subyek yang sedang diteliti. (Cahyono et al., 2018)
                  </p>
                </div>
              </div>
            </div> 

            <div class="col-xl-12 col-md-12">
              <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Penilaian Kinerja Guru</h3>
            </div>
            <!-- Light table -->

            <div class="card-body">
              <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-basic">
                <thead class="thead-light">
                  <tr>  
                    <th>No.</th>
                    <th>Bulan</th>  
                    <th>Tahun</th>  
                    <th>Jumlah yang telah dinilai</th>   
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody class="list">

                 <?php $i=1; foreach ($list_kinerja as $row): ?> 
                  <tr> 
                    <td> 
                      <?=$i++;?>
                    </td> 
                    <td> 
                      <?php 
                        if ($row->bulan == 1) {
                          echo "Januari";
                        }elseif ($row->bulan == 2) { 
                          echo "Februari";
                        }elseif ($row->bulan == 3) { 
                          echo "Maret";
                        }elseif ($row->bulan == 4) { 
                          echo "April";
                        }elseif ($row->bulan == 5) { 
                          echo "Mei";
                        }elseif ($row->bulan == 6) { 
                          echo "Juni";
                        }elseif ($row->bulan == 7) { 
                          echo "Juli";
                        }elseif ($row->bulan == 8) { 
                          echo "Agustus";
                        }elseif ($row->bulan == 9) { 
                          echo "September";
                        }elseif ($row->bulan == 10) { 
                          echo "Oktober";
                        }elseif ($row->bulan == 11) { 
                          echo "November";
                        }elseif ($row->bulan == 12) { 
                          echo "Desember";
                        }
                      ?>
                    </td> 
                    <td> 
                      <?=$row->tahun?>
                    </td> 
                  
                    <td>  
                      
                       <?php 
                                 $x = 0;
                                  foreach ($list_guru as $g) {
                                    if ($this->Penilaian_m->get_num_row(['id_kinerja' => $row->id_kinerja , 'id_guru' => $g->id_guru]) != 0) {
                                      $x++;
                                    }
                                  }
                                ?>
                                <?=$x;?>
                                /<?=$this->Guru_m->get_num_row([]);?> Guru
                    </td>  
                  
                    
                    
                    <td class="text-right">
                      <center>
                        <a href="<?=base_url('kepalasekolah/penilaian/'.$row->id_kinerja)?>"  >
                          <button type="button" class="btn btn-icon bg-success" style="color : white">  
                            <span class="btn-inner--text">Input Nilai</span>
                          </button>
                        </a>
                     
                      </center>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div> 
            </div>
          </div>
            </div> 

            


          </div>
    </div>

 
