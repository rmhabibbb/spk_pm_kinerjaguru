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

                  <li class="breadcrumb-item active" aria-current="page"> <a href="<?=base_url('kepalasekolah/penilaian/'.$kinerja->id_kinerja)?>">[<?=$kinerja->id_kinerja?>] <?php 
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
                      ?> <?=$kinerja->tahun?> </a></li>

                  <li class="breadcrumb-item active" aria-current="page"> Detail Perhitungan </li>
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
              <h3 class="mb-0">Detail Perhitungan Metode Profile Matching</h3>
            </div>
            <!-- Light table -->
            <div class="card-body">

              <h3>#Data Kriteria</h3>
              <table class="table table-bordered table-striped table-hover" style="width: 100%">
                <thead class="thead-light">
                  <tr style="text-align: center;">  
                    <th>ID Kriteria</th>
                    <th>Nama Kriteria</th>  
                    <th>Bobot Kriteria</th>  
                    <th>Subkriteria</th>  
                    <th>Jenis</th>   
                    <th>Nilai Standar</th>
                  </tr>
                </thead>
                <tbody class="list">


                 <?php  
                 $m = 1;
                 foreach ($list_kriteria as $row): ?> 
                  <?php $list_subs = $this->Subkriteria_m->get(['id_kriteria' => $row->id_kriteria]); ?>
                  <tr style="text-align: center;"> 
                    <td rowspan="<?=sizeof($list_subs)+1?>" >
                       <?=$row->id_kriteria?>
                    </td> 
                    <td rowspan="<?=sizeof($list_subs)+1?>">
                       <?=$row->nama_kriteria?>
                    </td> 
                    <td rowspan="<?=sizeof($list_subs)+1?>" >
                      <?=$row->bobot_kriteria?>%
                    </td> 
                    
                    </tr>
                    <?php
                     foreach ($list_subs as $s): ?> 
                      <tr>
                        <td rowspan="1"> 
                          [C<?=$m++?>] <?=$s->nama_sub;?>
                        </td> 
                        <td rowspan="1"> 
                          <?=$s->jenis;?>
                        </td> 
                        <td rowspan="1" style="text-align: center;"> 
                          <?=$s->nilai_standar;?>
                        </td>  
                      </tr>
                    <?php endforeach; ?>

                  
                  <?php endforeach; ?>
                </tbody>
              </table> 
              <br>
              <h3>#Data Guru</h3>
              <table class="table table-bordered table-striped table-hover" style="width: 100%">
                <thead class="thead-light">
                    <tr style="text-align: center;">  
                      <th>NIP</th>
                      <th>Nama</th>  
                      <th>Jenis Kelamin</th>  
                      <th>Email</th>  
                      <th>No. Telp</th>   
                      <th>Alamat</th>  
                    </tr>
                </thead>
                <tbody class="list">

                 <?php foreach ($list_guru as $row): ?> 
                  <?php $guru = $this->Guru_m->get_row(['id_guru' => $row->id_guru]); ?>
                  <tr>  
                    <td>
                      <?=$guru->nip?>
                    </td> 
                    <td>
                      <?=$guru->nama?>
                    </td> 
                     <td>
                        <?=$guru->jk?>
                      </td> 
                      <td>
                        <?=$guru->email?>
                      </td> 
                      <td>
                        <?=$guru->no_telp?>
                      </td> 
                       
                      <td>
                        <?=$guru->alamat?>
                      </td> 
                  </tr>

                  
                  <?php endforeach; ?>
                </tbody>
              </table> 

              <br>
              <h3>1. Nilai Awal</h3>
              <div style=" overflow-x: scroll;padding-bottom: 20px">
                <table class="table table-bordered table-striped table-hover" >
                  <thead class="thead-light">
                    <tr>
                      <th rowspan="2" style="vertical-align: middle;text-align: center;">NIP</th>
                      <th rowspan="2" style="vertical-align: middle;text-align: center;">Nama Guru</th> 
                      <?php $m = 0; foreach ($list_kriteria as $row): ?>
                      <?php $list_subs = $this->Subkriteria_m->get(['id_kriteria' => $row->id_kriteria]); ?>
                      <th colspan="<?=sizeof($list_subs)?>"><center><?=$row->nama_kriteria?></center></th>
                      <?php $m = $m + sizeof($list_subs); endforeach; ?> 
                    </tr>
                    <tr> 
                      <?php for ($i=1; $i <= $m ; $i++) { 
                        echo "<th>C".$i."</th>";
                      } ?>
                    </tr>
                  </thead>
                  <tbody class="list">
                   

                   <?php  foreach ($nilai_awal_gap as $row): ?> 

                    <?php $guru = $this->Guru_m->get_row(['id_guru' => $row['id_guru']]); ?>
                    <tr>
                      <td><?=$guru->nip?></td>
                      <td><?=$guru->nama?></td>
                      <?php 
                        for ($i=0; $i < sizeof($row['data']); $i++) { 
                          for ($j=0; $j < sizeof($row['data'][$i]['nilai']); $j++) { 
                            echo "<td>".$row['data'][$i]['nilai'][$j]['awal']."</td>";
                          }
                        }
                      ?>
                    </tr>
                     
                    <?php endforeach; ?>
                  </tbody>
                </table> 
              </div>

              <br>
              <h3>2. Nilai GAP</h3>
              <div style=" overflow-x: scroll;padding-bottom: 20px">
                <table class="table table-bordered table-striped table-hover" >
                  <thead class="thead-light">
                    <tr>
                      <th rowspan="2" style="vertical-align: middle;text-align: center;">NIP</th>
                      <th rowspan="2" style="vertical-align: middle;text-align: center;">Nama Guru</th> 
                      <?php $m = 0; foreach ($list_kriteria as $row): ?>
                      <?php $list_subs = $this->Subkriteria_m->get(['id_kriteria' => $row->id_kriteria]); ?>
                      <th colspan="<?=sizeof($list_subs)?>"><center><?=$row->nama_kriteria?></center></th>
                      <?php $m = $m + sizeof($list_subs); endforeach; ?> 
                    </tr>
                    <tr> 
                      <?php for ($i=1; $i <= $m ; $i++) { 
                        echo "<th>C".$i."</th>";
                      } ?>
                    </tr>
                  </thead>
                  <tbody class="list">
                   

                   <?php  foreach ($nilai_awal_gap as $row): ?> 

                    <?php $guru = $this->Guru_m->get_row(['id_guru' => $row['id_guru']]); ?>
                    <tr>
                      <td><?=$guru->nip?></td>
                      <td><?=$guru->nama?></td>
                      <?php 
                        for ($i=0; $i < sizeof($row['data']); $i++) { 
                          for ($j=0; $j < sizeof($row['data'][$i]['nilai']); $j++) { 
                            echo "<td>".$row['data'][$i]['nilai'][$j]['gap']."</td>";
                          }
                        }
                      ?>
                    </tr>
                     
                    <?php endforeach; ?>
                  </tbody>
                </table> 
              </div>

              <br>
              <h3>3. Bobot Nilai GAP</h3>
              <center>
                <img src="<?=base_url('assets/img/bobot-gap.png')?>">
              </center>
              <br>
              <div style=" overflow-x: scroll;padding-bottom: 20px">
                <table class="table table-bordered table-striped table-hover" >
                  <thead class="thead-light">
                    <tr>
                      <th rowspan="2" style="vertical-align: middle;text-align: center;">NIP</th>
                      <th rowspan="2" style="vertical-align: middle;text-align: center;">Nama Guru</th> 
                      <?php $m = 0; foreach ($list_kriteria as $row): ?>
                      <?php $list_subs = $this->Subkriteria_m->get(['id_kriteria' => $row->id_kriteria]); ?>
                      <th colspan="<?=sizeof($list_subs)?>"><center><?=$row->nama_kriteria?></center></th>
                      <?php $m = $m + sizeof($list_subs); endforeach; ?> 
                    </tr>
                    <tr> 
                      <?php for ($i=1; $i <= $m ; $i++) { 
                        echo "<th>C".$i."</th>";
                      } ?>
                    </tr>
                  </thead>
                  <tbody class="list">
                   

                   <?php  foreach ($bobot_gap as $row): ?> 

                    <?php $guru = $this->Guru_m->get_row(['id_guru' => $row['id_guru']]); ?>
                    <tr>
                      <td><?=$guru->nip?></td>
                      <td><?=$guru->nama?></td>
                      <?php 
                        for ($i=0; $i < sizeof($row['data']); $i++) { 
                          for ($j=0; $j < sizeof($row['data'][$i]['nilai']); $j++) { 
                            echo "<td>".$row['data'][$i]['nilai'][$j]['bobot_gap']."</td>";
                          }
                        }
                      ?>
                    </tr>
                     
                    <?php endforeach; ?>
                  </tbody>
                </table> 
              </div>

              <br>
              <h3>4.  Pengelompokkan Bobot Nilai GAP Core Factor dan Secondary Factor </h3>
              
              <div style=" overflow-x: scroll;padding-bottom: 20px">
                <table class="table table-bordered table-striped table-hover" >
                  <thead class="thead-light">
                    <tr>
                      <th rowspan="2" style="vertical-align: middle;text-align: center;">NIP</th>
                      <th rowspan="2" style="vertical-align: middle;text-align: center;">Nama Guru</th> 
                      <?php $m = 0; foreach ($list_kriteria as $row): ?>
                      <?php $list_subs = $this->Subkriteria_m->get(['id_kriteria' => $row->id_kriteria]); ?>
                      <th  colspan="2"><center><?=$row->nama_kriteria?></center></th>
                      <?php $m++; endforeach; ?> 
                    </tr>
                    <tr> 
                      <?php for ($i=1; $i <= $m ; $i++) { 

                        echo "
                        <th style='vertical-align: middle;text-align: center;'>Core Factor</th>
                        <th style='vertical-align: middle;text-align: center;'>Secondary Factor</th> ";
                      } ?>
                    </tr>
                  </thead>
                  <tbody class="list">
                   

                   <?php  foreach ($kelompok_bobot_gap as $row): ?> 

                    <?php $guru = $this->Guru_m->get_row(['id_guru' => $row['id_guru']]); ?>
                    <tr>
                      <td><?=$guru->nip?></td>
                      <td><?=$guru->nama?></td>
                      <?php 
                        for ($i=0; $i < sizeof($row['data']); $i++) {   
                             echo "<td>".$row['data'][$i]['core'] ."</td>";
                             echo "<td>".$row['data'][$i]['secondary'] ."</td>";
                        }
                      ?>
                    </tr>
                     
                    <?php endforeach; ?>
                  </tbody>
                </table> 
              </div>

              <br>
              <h3>5.  Nilai Total Core Factor dan Secondary Factor  </h3>
                <table class="table table-bordered table-striped table-hover" style="width: 40%" >
                  <thead class="thead-light">
                    <tr>
                      <th  style="vertical-align: middle;text-align: center;">Core Factor (%)</th>
                      <td><?=$kinerja->persen_NCF?>%</td>
                    </tr>
                    <tr>
                      <th  style="vertical-align: middle;text-align: center;">Secondary Factor (%)</th>
                      <td><?=$kinerja->persen_NSF?>%</td>
                    </tr>
                   
                  </thead> 
                </table> 
                <br>
              <div style=" overflow-x: scroll;padding-bottom: 20px">
                <table class="table table-bordered table-striped table-hover" >
                  <thead class="thead-light">
                    <tr>
                      <th  style="vertical-align: middle;text-align: center;">NIP</th>
                      <th  style="vertical-align: middle;text-align: center;">Nama Guru</th> 
                      <?php $m = 0; foreach ($list_kriteria as $row): ?>
                      <?php $list_subs = $this->Subkriteria_m->get(['id_kriteria' => $row->id_kriteria]); ?>
                      <th  ><center><?=$row->nama_kriteria?> (<?=$row->bobot_kriteria?>%)</center></th>
                      <?php $m++; endforeach; ?> 
                    </tr>
                   
                  </thead>
                  <tbody class="list">
                   

                   <?php  foreach ($nilai_total_kompetensi as $row): ?> 

                    <?php $guru = $this->Guru_m->get_row(['id_guru' => $row['id_guru']]); ?>
                    <tr>
                      <td><?=$guru->nip?></td>
                      <td><?=$guru->nama?></td>
                      <?php 
                        for ($i=0; $i < sizeof($row['data']); $i++) {   
                             echo "<td>".$row['data'][$i]['total'] ."</td>"; 
                        }
                      ?>
                    </tr>
                     
                    <?php endforeach; ?>
                  </tbody>
                </table> 
              </div>

              <br>
              <h3>6.  Hasil Akhir  </h3>
              
              <div>
                <table class="table table-bordered table-striped table-hover" >
                  <thead class="thead-light">
                    <tr>
                      <th  style="vertical-align: middle;text-align: center;">NIP</th>
                      <th  style="vertical-align: middle;text-align: center;">Nama Guru</th> 
                       <th style="vertical-align: middle;text-align: center;">Hasil Akhir</th>
                    </tr>
                   
                  </thead>
                  <tbody class="list">
                   

                   <?php  foreach ($hasil_akhir as $row): ?> 

                    <?php $guru = $this->Guru_m->get_row(['id_guru' => $row['id_guru']]); ?>
                    <tr>
                      <td><?=$guru->nip?></td>
                      <td><?=$guru->nama?></td>
                      
                      <?php  
                             echo "<td><center>".$row['ha'] ."</center></td>"; 
                        
                      ?>

                    </tr>
                     
                    <?php endforeach; ?>
                  </tbody>
                </table> 
              </div>
              <br>
              <h3>7.  Perankingan  </h3>
              
              <div >
                <table class="table table-bordered table-striped table-hover" >
                  <thead class="thead-light">
                    <tr>
                      <th  style="vertical-align: middle;text-align: center;">Peringkat</th>
                      <th  style="vertical-align: middle;text-align: center;">NIP</th>
                      <th  style="vertical-align: middle;text-align: center;">Nama Guru</th> 
                       <th style="vertical-align: middle;text-align: center;">Hasil Akhir</th>
                    </tr>
                   
                  </thead>
                  <tbody class="list">
                   

                   <?php $i=1;  foreach ($rank as $row): ?> 

                    <?php $guru = $this->Guru_m->get_row(['id_guru' => $row['id_guru']]); ?>
                    <tr>
                      <td><?=$i++?></td>
                      <td><?=$guru->nip?></td>
                      <td><?=$guru->nama?></td>
                      
                      <?php  
                             echo "<td><center>".$row['ha'] ."</center></td>"; 
                        
                      ?>

                    </tr>
                     
                    <?php endforeach; ?>
                  </tbody>
                </table> 
              </div>
              

            <hr>
             
                <a href="<?=base_url('kepalasekolah/penilaian/'.$kinerja->id_kinerja)?>" >
                    <button type="button" class="btn btn-twitter btn-icon"> 
                      <span class="btn-inner--text">Kembali</span>
                    </button>
                  </a>   
            </div>
          </div>
        </div>
      </div>
  


 