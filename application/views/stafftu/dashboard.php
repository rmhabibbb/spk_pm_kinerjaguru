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

            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Data Kinerja Guru</h5>
                      <span class="h2 font-weight-bold mb-0"><?=$this->Kinerja_m->get_num_row([])?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <a href="<?=base_url('stafftu/kinerja')?>" class="text-nowrap text-primary font-weight-600">Lihat</a>
                  </p>
                </div>
              </div>
            </div> 

            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Data Akun</h5>
                      <span class="h2 font-weight-bold mb-0"><?=$this->login_m->get_num_row([])?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-badge "></i>
                      </div>
                    </div>
                  </div>
                  
                <p class="mt-3 mb-0 text-sm">
                  <a href="<?=base_url('stafftu/akun')?>" class="text-nowrap text-primary font-weight-600">Lihat</a>
                </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Data Guru</h5>
                      <span class="h2 font-weight-bold mb-0"><?=$this->Guru_m->get_num_row([])?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-single-02"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <a href="<?=base_url('stafftu/guru')?>" class="text-nowrap text-primary font-weight-600">Lihat</a>
                  </p>
                </div>
              </div>
            </div> 
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Data Kriteria</h5>
                      <span class="h2 font-weight-bold mb-0"><?=$this->Kriteria_m->get_num_row([])?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                        <i class="ni ni-bullet-list-67"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <a href="<?=base_url('stafftu/kriteria')?>" class="text-nowrap text-primary font-weight-600">Lihat</a>
                  </p>
                </div>
              </div>
            </div> 


          </div>
    </div>

 
