    <!-- Header -->
    <!-- Header -->
    <div class="header   pb-6" style="background-color: #0087c2ad">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7"> 
              <h6 class="h2 text-white d-inline-block mb-0">Laporan Kinerja</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a  href="<?=base_url('kepalasekolah')?>"><i class="fas fa-home"></i></a></li> 
                  <li class="breadcrumb-item active" aria-current="page">Data Laporan Kinerja</li>
                </ol>
              </nav>
            </div> 
             
          </div>
        </div>
        <?= $this->session->flashdata('msg2') ?>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Laporan Kinerja</h3>
            </div>
            <!-- Light table -->

            <div class="card-body">
              <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-basic2">
                <thead class="thead-light">
                  <tr>  
                    <th>No.</th>
                    <th>Bulan</th>  
                    <th>Tahun</th>  
                    <th>Jumlah Guru</th>   
                    <th style="text-align: center;">Aksi</th>
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
                      <?=$this->Laporan_m->get_num_row(['id_kinerja' => $row->id_kinerja])?> Guru
                    </td>    
                   
                    
                    <td  >
                      <center>
                        <a href="<?=base_url('kepalasekolah/laporan/'.$row->id_kinerja)?>"  >
                          <button type="button" class="btn btn-icon bg-success" style="color : white">  
                            <span class="btn-inner--text">Lihat Detail</span>
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
  
 