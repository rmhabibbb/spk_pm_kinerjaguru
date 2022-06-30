 
    <div class="header   pb-6" style="background-color: #0087c2ad">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">  
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a   href="<?=base_url('stafftu')?>"><i class="fas fa-home"></i></a></li> 
                  
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

          <page size="A4" id="printableArea"> 
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
                                 Bulan - Tahun
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
                                ?> - <?=$kinerja->tahun?>

                             </td>
                         </tr> 
                         <tr>
                             <th style="width: 30%">
                                 Core dan Secondary Factor
                             </th>
                             <td> 
                               Core  <?=$kinerja->persen_NCF?>%  & Secondary  <?=$kinerja->persen_NSF?>%
                             </td>
                         </tr> 
                          
                         <tr>
                             <th style="width: 30%">
                                 Jumlah Guru 
                             </th>
                             <td> 
                                
                                 <?=sizeof($laporan);?> Guru

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
                <h3>- Hasil Penilaian</h3>
               <div class="table-responsive py-4">
                  <table class="table table-flush" >
                    <thead class="thead-light">
                      <tr>  
                        <th>Peringkat</th>
                        <th>NIP</th>  
                        <th>Nama Guru</th>   
                        <th>Hasil Akhir</th>   
                      </tr>
                    </thead>
                    <tbody class="list">

                     <?php $i = 1; foreach ($laporan as $row): ?> 
                     <?php  
                        $guru = $this->Guru_m->get_row(['id_guru' => $row->id_guru]);
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
                          <?=$row->hasil_akhir?>
                        </th>   
      
                      </tr>
                      <?php   endforeach; ?>
                    </tbody>
                  </table>
                </div>

                <br>
                <h3>- Detail Penilaian</h3>
                <div class="table-responsive py-4">
                  <table class="table table-flush" >
                    <thead class="thead-light">
                      <tr>   
                        <th style="vertical-align: middle;">NIP</th>  
                        <th style="vertical-align: middle;">Nama Guru</th>  

                        <?php $i = 1; foreach ($laporan as $row): ?> 
                        <?php $detail = $this->DetailLaporan_m->get(['id_laporan' => $row->id_laporan]); ?> 
                          <?php   foreach ($detail as $d): ?> 
                              <th style="text-align: center;"><?= $d->kriteria ?> <br>(<?= $d->bobot ?>%)  </th>  
                          <?php   endforeach; ?> 
                          <?php break; ?>
                        <?php   endforeach; ?> 
                      </tr>
                    </thead>
                    <tbody class="list">

                     <?php $i = 1; foreach ($laporan as $row): ?> 
                     <?php  
                        $guru = $this->Guru_m->get_row(['id_guru' => $row->id_guru]);
                      ?>

                      <tr> 
                        
                        <td>
                          <?=$guru->nip?>
                        </td> 
                        <td>
                          <?=$guru->nama?>
                        </td> 
                        

                        <?php $detail = $this->DetailLaporan_m->get(['id_laporan' => $row->id_laporan]); ?> 
                        <?php   foreach ($detail as $d): ?> 
                              <th style="text-align: center;"><?= $d->hasil ?></th>  
                          <?php   endforeach; ?> 
                          
      
                      </tr>
                      <?php   endforeach; ?>
                    </tbody>
                  </table>
                </div>
  
            </div>
          </div>
        </page>
        </div>
      </div>
  
 