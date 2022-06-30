    <!-- Header -->
    <!-- Header -->
    <div class="header   pb-6" style="background-color: #0087c2ad">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">  
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a   href="<?=base_url('kepalasekolah')?>"><i class="fas fa-home"></i></a></li> 
                  
                  <li class="breadcrumb-item active" aria-current="page"><a   href="<?=base_url('kepalasekolah')?>">Penilaian Kinerja Guru </a></li>

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
            <div class="col-lg-6 col-5 text-right"> 
              <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-neutral">Input Nilai Guru</a> 
               
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
              <h3 class="mb-0">Penilaian Kinerja Guru</h3>
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
                                 Jumlah guru yang telah dinilai
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
                                <?=$x;?>/<?=$this->Guru_m->get_num_row([]);?>

                             </td>
                         </tr> 
                          
                         
                    </tbody>

                </table> 

               <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-basic">
                <thead class="thead-light">
                  <tr>  
                    <th>Peringkat</th>
                    <th>NIP</th>  
                    <th>Nama Guru</th>   
                    <th>Hasil Akhir</th>  
                    <th><center>Action</center></th> 
                  </tr>
                </thead>
                <tbody class="list">

                 <?php $i = 1; foreach ($rank as $row): ?> 
                 <?php if ($this->Penilaian_m->get_num_row(['id_kinerja' => $kinerja->id_kinerja, 'id_guru' => $row['id_guru']]) != 0) {
                    $guru = $this->Guru_m->get_row(['id_guru' => $row['id_guru']]);
                  ?>
                  
                  <tr> 
                    <td><?=$i++?></td>
                    <td>
                      <?=$guru->nip?>
                    </td> 
                    <td>
                      <?=$guru->nama?>
                    </td> 
                    <th>
                      <?=$row['ha']?>
                    </th>   
 
                    <td class="text-right">
                      <center>
                        <a href="" data-toggle="modal" data-target="#edit-<?=$guru->id_guru?>">
                        <button type="button" class="btn btn-twitter btn-icon"> 
                          <span class="btn-inner--text">Edit Nilai</span>
                        </button>
                      </a>
                      <a href="" data-toggle="modal" data-target="#delete2-<?=$guru->id_guru?>">
                        <button type="button" class="btn btn-instagram btn-icon"> 
                          <span class="btn-inner--text">Hapus</span>
                        </button>
                      </a>
                      </center>
                       
                    </td> 
                  </tr>
                  <?php } endforeach; ?>
                </tbody>
              </table>
            </div>
 
            <hr>
            
               <center>
                <a href="<?=base_url('kepalasekolah/penilaian/'.$kinerja->id_kinerja.'/pm')?>" >
                    <button type="button" class="btn btn-twitter btn-icon"> 
                      <span class="btn-inner--text">Lihat Detail Perhitungan</span>
                    </button>
                  </a> 

                 <a href="" data-toggle="modal" data-target="#selesai">
                    <button type="button" class="btn btn-success btn-icon"> 
                      <span class="btn-inner--text">Selesai Tahap Penilaian</span>
                    </button>
                  </a> 
               </center>
            </div>
          </div>
        </div>
      </div>
  


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Input Nilai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <?= form_open_multipart('kepalasekolah/penilaian/') ?>
      <div class="modal-body">
         
            <input type="hidden" name="id_kinerja" value="<?=$kinerja->id_kinerja?>">
            <div class="form-group">
                <label for="example-email-input" class="form-control-label">Guru</label>
                 <select class="form-control" name="id_guru" required>
                    <option value="">Pilih Guru</option>
                    <?php  foreach ($list_guru as $k): ?> 
                    <?php if ($this->Penilaian_m->get_num_row(['id_guru' => $k->id_guru]) == 0) { ?>
                      <option value="<?=$k->id_guru?>"> [<?=$k->nip?>] <?=$k->nama?></option>
                    <?php } endforeach; ?>
                  </select>
            </div> 

            <input type="hidden" name="id_kinerja" value="<?=$kinerja->id_kinerja?>">
                            <table class="table table-bordered">
                             
                              <?php $i= 1; foreach ($list_kriteria as $row): ?>   
                                <tr>
                                  <th colspan="2">
                                    <center><b><?=$row->nama_kriteria?></b></center>
                                  </th>
                                </tr>
                                <?php 

                                  $list_sub = $this->Subkriteria_m->get(['id_kriteria' => $row->id_kriteria]);

                                  foreach ($list_sub as $s) { ?>
                                    <tr>
                                        <td style="width: 70%; white-space:normal"><?=$s->nama_sub?></td>
                                        <td>
                                            <select class="form-control"  required name="sub-<?=$s->id_sub?>">
                                                <option value="">- Pilih -</option> 
                                                <option value="1">Sangat Kurang</option>  
                                                <option value="2">Kurang</option>  
                                                <option value="3">Cukup</option>  
                                                <option value="4">Baik</option>  
                                                <option value="5">Sangat Baik</option>  
                                             </select> 
                                        </td>
                                    </tr>
                                <?php   }  ?>
 
                                <?php   endforeach; ?>
                              
                            </table>
                                
            
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="inputnilai" value="Submit"> 
      </div>
      </form>
    </div>
  </div>
</div> 



<?php $i = 1; foreach ($list_guru as $row): ?> 

<div class="modal fade" id="edit-<?=$row->id_guru?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Edit Nilai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <?= form_open_multipart('kepalasekolah/penilaian/') ?>
      <div class="modal-body">
         
            <input type="hidden" name="id_kinerja" value="<?=$kinerja->id_kinerja?>">
            <div class="form-group">
                <label for="example-email-input" class="form-control-label">Guru</label>
                 <input type="text" class="form-control" readonly value="<?=$row->nama?>">
                 <input type="hidden" class="form-control" name="id_guru" value="<?=$row->id_guru?>">
            </div> 
 
                            <table class="table table-bordered">
                             
                              <?php $i= 1; foreach ($list_kriteria as $k): ?>    
                                  <tr>
                                      <th colspan="2">
                                    <center><b><?=$k->nama_kriteria?></b></center>
                                  </th>
                                </tr>
                                <?php 

                                  $list_sub = $this->Subkriteria_m->get(['id_kriteria' => $k->id_kriteria]);

                                  foreach ($list_sub as $s) { 
                                    $nilai = $this->Penilaian_m->get_row(['id_kinerja' => $kinerja->id_kinerja, 'id_guru' => $row->id_guru,  'id_sub' => $s->id_sub])->nilai;
                                    ?>
                                    <tr>
                                        <td style="width: 70%; white-space:normal"><?=$s->nama_sub?></td>
                                        <td>
                                            <select class="form-control"  required name="sub-<?=$s->id_sub?>">
                                                <option value="<?=$nilai?>"> 
                                                  <?php 
                                                    if ($nilai == 1) {
                                                      echo "Sangat Kurang";
                                                    }elseif ($nilai == 2) {
                                                      echo "Kurang";
                                                    } elseif ($nilai == 3) {
                                                      echo "Cukup";
                                                    } elseif ($nilai == 4) {
                                                      echo "Baik";
                                                    } elseif ($nilai == 5) {
                                                      echo "Sangat Baik";
                                                    } 
                                                  ?> 
                                                </option> 
                                                <?php $g = ['','Sangat Kurang' , 'Kurang', 'Cukup' ,'Baik' ,'Sangat Baik']; ?>

                                                <?php 
                                                  for ($jj=1; $jj <= 5 ; $jj++) { 
                                                    if ($jj != $nilai) {
                                                      echo '<option value="'.$jj.'">';
                                                       if ($jj == 1) {
                                                          echo "Sangat Kurang";
                                                        }elseif ($jj == 2) {
                                                          echo "Kurang";
                                                        } elseif ($jj == 3) {
                                                          echo "Cukup";
                                                        } elseif ($jj == 4) {
                                                          echo "Baik";
                                                        } elseif ($jj == 5) {
                                                          echo "Sangat Baik";
                                                        } 
                                                      echo '</option>';
                                                    }
                                                  }
                                                ?>
                                               
                                             </select> 
                                        </td>
                                    </tr>
                                
                                <?php   }  ?>
                                <?php   endforeach; ?>
                              
                            </table>
                                
            
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="editnilai" value="Submit"> 
      </div>
      </form>
    </div>
  </div>
</div> 


<div class="modal fade" id="delete2-<?=$row->id_guru?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered text-white" role="document">
        <div class="modal-content bg-gradient-danger"> 
              
                  <div class="modal-body">
                    
                      <div class="py-3 text-center">
                          <i class="ni ni-bell-55 ni-3x"></i>
                          <h4 class="heading mt-4 text-white"> Hapus Penilaian ini? </h4> 
                      </div>
                      
                  </div>
                  
                  <form action="<?= base_url('kepalasekolah/penilaian')?>" method="Post" >  
                  <div class="modal-footer">

                  <input type="hidden" name="id_kinerja" value="<?=$kinerja->id_kinerja?>">
                
                   
                      <input type="hidden" value="<?=$row->id_guru?>" name="id_guru">  
                      <input type="submit" class="btn btn-white" name="deletenilai" value="Ya!">
                     
                      <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                  </div>
                </form>
          </div>
  </div>
</div>
<?php endforeach; ?>

 


<div class="modal fade" id="selesai" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-green"> 
              
                  <div class="modal-body">
                    
                      <div class="py-3 text-center">
                          <i class="ni ni-bell-55 ni-3x"></i>
                          <h4 class="heading mt-4"> Tahap Penilaian Selesai  ? </h4> 
                      </div>
                      
                  </div>
                  
                  <form action="<?= base_url('kepalasekolah/penilaian')?>" method="Post" >  
                  <div class="modal-footer">

                  <input type="hidden" name="id_kinerja" value="<?=$kinerja->id_kinerja?>">
                
                     
                      <input type="submit" class="btn btn-white" name="selesai" value="Ya!">
                     
                      <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                  </div>
                </form>
          </div>
  </div>
</div>