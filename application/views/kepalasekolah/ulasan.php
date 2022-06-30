    <!-- Header -->
    <!-- Header -->
    <div class="header   pb-6" style="background-color: #0087c2ad">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7"> 
              <h6 class="h2 text-white d-inline-block mb-0">Ulasan</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a  href="<?=base_url('kepalasekolah')?>"><i class="fas fa-home"></i></a></li> 
                  <li class="breadcrumb-item active" aria-current="page">Ulasan</li>
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
              <h3 class="mb-0">Ulasan</h3>
            </div>
            <!-- Light table -->

            <div class="card-body">
              <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-buttons">
                <thead class="thead-light">
                  <tr>  
                    <th>No.</th>
                    <th>Bulan/Tahun</th>  
                    <th>Nama Guru</th>  
                    <th>Ulasan</th>    
                  </tr>
                </thead>
                <tbody class="list">

                 <?php $i=1; foreach ($list_ulasan as $row): ?> 
                <?php $kinerja = $this->Kinerja_m->get_row(['id_kinerja' => $row->id_kinerja]) ?>  
                  <tr> 
                    <td> 
                      <?=$i++;?>
                    </td> 
                    <td> 
                     <?php 
                        if ($kinerja->bulan == 1) {
                          echo "Januari";
                        }elseif ($kinerja->bulan == 2) { 
                          echo "Februari";
                        }elseif ($kinerja->bulan == 3) { 
                          echo "Maret";
                        }elseif ($kinerja->bulan == 4) { 
                          echo "April";
                        }elseif ($kinerja->bulan == 5) { 
                          echo "Mei";
                        }elseif ($kinerja->bulan == 6) { 
                          echo "Juni";
                        }elseif ($kinerja->bulan == 7) { 
                          echo "Juli";
                        }elseif ($kinerja->bulan == 8) { 
                          echo "Agustus";
                        }elseif ($kinerja->bulan == 9) { 
                          echo "September";
                        }elseif ($kinerja->bulan == 10) { 
                          echo "Oktober";
                        }elseif ($kinerja->bulan == 11) { 
                          echo "November";
                        }elseif ($kinerja->bulan == 12) { 
                          echo "Desember";
                        }
                      ?>   <?=$kinerja->tahun?>
                    </td> 
                    <td> 
                     <?=$this->Guru_m->get_row(['id_guru' => $row->id_guru])->nama?>
                    </td> 
                  
                    <td>  
                       <?=$row->ulasan?>
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
  
 