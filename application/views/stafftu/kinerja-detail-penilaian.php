    <!-- Header -->
    <!-- Header -->
    <div class="header   pb-6" style="background-color: #0087c2ad">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7"> 
              <h6 class="h2 text-white d-inline-block mb-0">Detail Kinerja Guru</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a  href="<?=base_url('stafftu')?>"><i class="fas fa-home"></i></a></li> 
                  <li class="breadcrumb-item active" aria-current="page"><a  href="<?=base_url('stafftu/kinerja')?>"> Kinerja Guru </a></li>

                  <li class="breadcrumb-item active" aria-current="page"> [<?=$kinerja->id_kinerja?>] <?php 
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
                      ?> <?=$kinerja->tahun?></li>
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
              <h3 class="mb-0">Detail Kinerja Guru</h3>
            </div>
            <!-- Light table -->

                <div class="card-body">
                  <table class="table table-bordered table-striped table-hover" style="width: 100%">

                    <tbody>
                        
                         <tr>
                             <th style="width: 30%">
                                 ID Kinerja Guru
                             </th>
                             <td> 
                              
                                <?=$kinerja->id_kinerja?>

                             </td>
                         </tr>
                         <tr>
                             <th style="width: 30%">
                                 Bulan
                             </th>
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
                         </tr> 
                         <tr>
                             <th style="width: 30%">
                                 Tahun
                             </th>
                             <td> 
                              
                                <?=$kinerja->tahun?>

                             </td>
                         </tr> 
                         <tr>
                             <th style="width: 30%">
                                 Nilai rata-rata Core Factor (%)
                             </th>
                             <td> 
                              
                                <?=$kinerja->persen_NCF?>%

                             </td>
                         </tr>  
                         <tr>
                             <th style="width: 30%">
                                 Nilai rata-rata Secondary Factor (%)
                             </th>
                             <td> 
                              
                                <?=$kinerja->persen_NSF?>%

                             </td>
                         </tr> 
                         <tr>
                             <th style="width: 30%">
                                 Jumlah Guru
                             </th>
                             <td> 
                              
                                <?=$this->Guru_m->get_num_row([]);?>

                             </td>
                         </tr> 
                         <tr>
                             <th style="width: 30%">
                                 Jumlah Guru yang telah dinilai
                             </th>
                             <td> 
                              
                               <?php 
                                 $x = 0;
                                  foreach ($list_guru as $g) {
                                    if ($this->Penilaian_m->get_num_row(['id_kinerja' => $kinerja->id_kinerja , 'id_guru' => $g->id_guru]) != 0) {
                                      $x++;
                                    }
                                  }
                                ?>
                                <?=$x;?>

                             </td>
                         </tr> 
                         <tr>
                             <th style="width: 30%">
                                 Status
                             </th>
                             <td> 
                               <?php
                                  if ($kinerja->status == 1) {
                                    echo "Draft";
                                  }elseif ($kinerja->status == 2) {
                                    echo "Tahap Penilaian, menunggu penialain dari Kepala Sekolah";
                                  }elseif ($kinerja->status == 3) {
                                    echo "Selesai";
                                  }
                                ?>

                             </td>
                         </tr>  
                         
                    </tbody>

                </table>  
                <br>
                <center> 
                    <a  href="#" data-toggle="modal" data-target="#delete" class="btn bg-danger text-white">
                    Hapus
                    </a>

                    <a  href="#" data-toggle="modal" data-target="#edit" class="btn text-white" style="background-color: #0087c2ad">
                      Edit
                    </a> 
                   
                </div>

                
          </div>
        </div>
      </div>
  


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Subkinerja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <?= form_open_multipart('stafftu/subkinerja/') ?>
      <div class="modal-body">
            
            <input type="hidden" name="id_kinerja" value="<?=$kinerja->id_kinerja?>">
            
            <div class="form-group">
                <label for="example-email-input" class="form-control-label">Nama Subkinerja</label>
                <input class="form-control" type="text" required name="nama_sub" >
            </div>
            <div class="form-group">
                <label for="example-email-input" class="form-control-label">Jenis</label>
                <div class="custom-control custom-radio mb-3">
                        <input class="custom-control-input" name="jenis" value="Core Factor" id="customRadio5" type="radio">
                        <label class="custom-control-label" for="customRadio5">Core Factor</label>
                      </div>
                      <div class="custom-control custom-radio mb-3">
                        <input class="custom-control-input" name="jenis" value="Secondary Factor" id="customRadio6"  type="radio">
                        <label class="custom-control-label" for="customRadio6">Secondary Factor</label>
                      </div>
            </div>    
            <div class="form-group">
                <label for="example-email-input" class="form-control-label">Nilai Standar Komptensi (1 - 5)</label>
                <input class="form-control" type="number" min="1" max="5" required name="nilai_standar" >
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



<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Edit Kinerja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
          
          <?= form_open_multipart('stafftu/kinerja/') ?>
          <div class="modal-body"> 
                <input type="hidden" name="id_kinerja" value="<?=$kinerja->id_kinerja?>">
            
              <div class="form-group">
                <label for="example-email-input" class="form-control-label">Bulan</label>
                <select class="form-control" name="bulan" required>
                  <option value="<?=$kinerja->bulan?>">
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
                  </option>
                  <?php for ($i=1; $i <= 12 ; $i++) {  
                        if ($i != $kinerja->bulan) {
                          if ($i == 1) {
                            echo " <option value='".$i."'>Januari</option>";
                          }elseif ($i == 2) { 
                            echo "<option value='".$i."'>Februari</option>";
                          }elseif ($i == 3) { 
                            echo "<option value='".$i."'>Maret</option>";
                          }elseif ($i == 4) { 
                            echo "<option value='".$i."'>April</option>";
                          }elseif ($i == 5) { 
                            echo "<option value='".$i."'>Mei</option>";
                          }elseif ($i == 6) { 
                            echo "<option value='".$i."'>Juni</option>";
                          }elseif ($i == 7) { 
                            echo "<option value='".$i."'>Juli</option>";
                          }elseif ($i == 8) { 
                            echo "<option value='".$i."'>Agustus</option>";
                          }elseif ($i == 9) { 
                            echo "<option value='".$i."'>September</option>";
                          }elseif ($i == 10) { 
                            echo "<option value='".$i."'>Oktober</option>";
                          }elseif ($i == 11) { 
                            echo "<option value='".$i."'>November</option>";
                          }elseif ($i == 12) { 
                            echo "<option value='".$i."'>Desember</option>";
                          }
                        }
                  }  ?>
                   
                </select>
            </div> 
            <div class="form-group">
                <label for="example-email-input" class="form-control-label">Tahun</label>
                <input class="form-control" type="number" max="<?=date('Y')?>" required name="tahun" value="<?=$kinerja->tahun?>" >
            </div>
            <div class="form-group">
                <label for="example-email-input" class="form-control-label">Nilai rata-rata core factor (%)</label>
                <input class="form-control" type="number" min="0" max="100" required name="ncf"  value="<?=$kinerja->persen_NCF?>">
            </div>  
            <div class="form-group">
                <label for="example-email-input" class="form-control-label">Nilai rata-rata secondary factor (%)</label>
                <input class="form-control" type="number" min="0" max="100" required name="nsf" value="<?=$kinerja->persen_NSF?>">
            </div>

            <p style="color: red"><i>Jumlah (%) NCF dan NSF harus 100%</i></p>
              
          </div>
  
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" name="edit" value="Submit"> 
          </div>
          </form>  
      
    </div>
  </div>
</div>
 

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger"> 
              
                  <div class="modal-body">
                    
                      <div class="py-3 text-center">
                          <i class="ni ni-bell-55 ni-3x"></i>
                          <h4 class="heading mt-4"> Hapus Data Kinerja Guru ini? </h4> 
                      </div>
                      
                  </div>
                  
                  <form action="<?= base_url('stafftu/kinerja')?>" method="Post" >  
                  <div class="modal-footer">

                   
                      <input type="hidden" value="<?=$kinerja->id_kinerja?>" name="id_kinerja">   
                      <input type="submit" class="btn btn-white" name="delete" value="Ya!">
                     
                      <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                  </div>
                </form>
          </div>
  </div>
</div> 
 