    <!-- Header -->
    <!-- Header -->
    <div class="header   pb-6" style="background-color: #0087c2ad">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7"> 
              <h6 class="h2 text-white d-inline-block mb-0">Kinerja Guru</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a  href="<?=base_url('stafftu')?>"><i class="fas fa-home"></i></a></li> 
                  <li class="breadcrumb-item active" aria-current="page">Data Kinerja Guru</li>
                </ol>
              </nav>
            </div> 
            <div class="col-lg-6 col-5 text-right">
              <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-neutral">Tambah Kinerja Guru</a> 
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
              <h3 class="mb-0">Data Kinerja Guru</h3>
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
                    <th>NCF (%)</th>   
                    <th>NSF (%)</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody class="list">

                 <?php $i=1; foreach ($kinerja as $row): ?> 
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
                      <?=$row->persen_NCF?>%
                    </td>  
                    <td>  
                      <?=$row->persen_NSF?>%
                    </td>  
                    <td>
                      <?php
                        if ($row->status == 1) {
                          echo "Draft";
                        }elseif ($row->status == 2) {
                          echo "Tahap Penilaian";
                        }elseif ($row->status == 3) {
                          echo "Selesai";
                        }
                      ?>
                    </td>
                    
                    <td class="text-right">
                      <center>
                        <a href="<?=base_url('stafftu/kinerja/'.$row->id_kinerja)?>"  >
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
  


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Kinerja Guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <?= form_open_multipart('stafftu/kinerja/') ?>
      <div class="modal-body">
         
            
            <div class="form-group">
                <label for="example-email-input" class="form-control-label">Bulan</label>
                <select class="form-control" name="bulan" required>
                  <option value="1">Januari</option>
                  <option value="2">Februari</option>
                  <option value="3">Maret</option>
                  <option value="4">April</option>
                  <option value="5">Mei</option>
                  <option value="6">Juni</option>
                  <option value="7">Juli</option>
                  <option value="8">Agustus</option>
                  <option value="9">September</option>
                  <option value="10">Oktober</option>
                  <option value="11">November</option>
                  <option value="12">Desember</option>
                </select>
            </div> 
            <div class="form-group">
                <label for="example-email-input" class="form-control-label">Tahun</label>
                <input class="form-control" type="number" max="<?=date('Y')?>" required name="tahun" value="<?=date('Y')?>" >
            </div>
            <div class="form-group">
                <label for="example-email-input" class="form-control-label">Nilai rata-rata core factor (%)</label>
                <input class="form-control" type="number" min="0" max="100" required name="ncf" >
            </div>  
            <div class="form-group">
                <label for="example-email-input" class="form-control-label">Nilai rata-rata secondary factor (%)</label>
                <input class="form-control" type="number" min="0" max="100" required name="nsf" >
            </div>

            <p style="color: red"><i>Jumlah (%) NCF dan NSF harus 100%</i></p>
 
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="add" value="Submit"> 
      </div>
      </form>
    </div>
  </div>
</div>
 