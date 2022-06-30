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
              <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Hasil Penilaian Kinerja Guru</h3>
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
                    <th>Peringkat</th>
                    <th>Nilai</th>    
                    <th>Ulasan</th>    
                  </tr>
                </thead>
                <tbody class="list">

                 <?php $i=1; foreach ($hasil as $row): ?> 
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
                      ?>
                    </td> 
                    <td> 
                      <?=$kinerja->tahun?>
                    </td> 
                  
                    <td>  
                      <?=$row->peringkat?>
                    </td> 
                    <td>  
                      <?=$row->hasil_akhir?>
                    </td>    
                    <td>
                      <?php if ($row->ulasan == NULL) { ?>
                        <a href="#" data-toggle="modal" data-target="#ulasan-<?=$kinerja->id_kinerja?>"  >
                          <button class="btn bg-blue text-white">Beri Ulasan</button>
                        </a>
                       <?php }else{  ?>
                        <?=$row->ulasan?>
                       <?php } ?>
                      
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


<?php $i=1; foreach ($hasil as $row): ?> 
<?php $kinerja = $this->Kinerja_m->get_row(['id_kinerja' => $row->id_kinerja]) ?> 
<div class="modal fade" id="ulasan-<?=$kinerja->id_kinerja?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Beri Ulasan <?php 
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
                      ?>
                    </td> <?=$kinerja->tahun?> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <?= form_open_multipart('guru/beriulasan/') ?>
      <div class="modal-body">  
           <input type="hidden" name="id_laporan" value="<?=$row->id_laporan?>">
            <div class="form-group">
                <label for="example-email-input" class="form-control-label">Ulasan</label>
                <textarea class="form-control" name="ulasan" ></textarea> 
            </div> 
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="add" value="Submit"> 
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>