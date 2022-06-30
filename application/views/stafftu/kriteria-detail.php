    <!-- Header -->
    <!-- Header -->
    <div class="header   pb-6" style="background-color: #0087c2ad">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7"> 
              <h6 class="h2 text-white d-inline-block mb-0">Detail Kriteria</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a  href="<?=base_url('stafftu')?>"><i class="fas fa-home"></i></a></li> 
                  <li class="breadcrumb-item active" aria-current="page"><a  href="<?=base_url('stafftu/kriteria')?>"> Kelola Kriteria </a></li>

                  <li class="breadcrumb-item active" aria-current="page"><?=$kriteria->nama_kriteria?></li>
                </ol>
              </nav>
            </div> 
            <div class="col-lg-6 col-5 text-right">
              <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-neutral">Tambah Subkriteria</a> 
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
              <h3 class="mb-0">Detail Kriteria</h3>
            </div>
            <!-- Light table -->

                <div class="card-body">
                  <table class="table table-bordered table-striped table-hover" style="width: 100%">

                    <tbody>
                        
                         <tr>
                             <th style="width: 30%">
                                 ID Kriteria
                             </th>
                             <td> 
                              
                                <?=$kriteria->id_kriteria?>

                             </td>
                         </tr>
                         <tr>
                             <th style="width: 30%">
                                 Nama Kriteria
                             </th>
                             <td> 
                              
                                <?=$kriteria->nama_kriteria?>

                             </td>
                         </tr> 
                         <tr>
                             <th style="width: 30%">
                                 Bobot Kriteria
                             </th>
                             <td> 
                              
                                <?=$kriteria->bobot_kriteria?>%

                             </td>
                         </tr>  
                         
                    </tbody>

                </table>  
                <br>
                <table class="table table-bordered table-striped table-hover" style="width: 100%">

                    <tbody>
                        
                         
                          
                         
                    </tbody>

                </table>  
                <hr>
                <h4 class="mb-3">Data Subkriteria</h4>
                <div class="table-responsive">
                <table class="table table-flush" id="datatable-basic">
                      <thead>
                         
                          <tr>   
                              <th>NO</th> 
                              <th>NAMA SUBKRITERIA</th> 
                              <th>JENIS</th>  
                              <th>NILAI STANDAR</th> 
                              <th>AKSI</th>  
                          </tr>
                      </thead> 
                      <tbody>

                        <?php $i = 1; foreach ($list_subs as $row): ?> 
                            <tr>   
                                <td><?=$i++?></a></td>  
                                <td><?=$row->nama_sub?></td>  
                                <td><?=$row->jenis?></td>  
                                <td><?=$row->nilai_standar?></td>
                                 <td>
                                      <a data-toggle="modal" data-target="#edit-<?=$row->id_sub?>"  href=""><button class="btn  " style="background-color: #0087c2ad; color: white">Edit</button></a>
                                      <a data-toggle="modal" data-target="#delete-<?=$row->id_sub?>"  href=""><button class="btn bg-red text-white">Hapus</button></a>
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
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Subkriteria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <?= form_open_multipart('stafftu/subkriteria/') ?>
      <div class="modal-body">
            
            <input type="hidden" name="id_kriteria" value="<?=$kriteria->id_kriteria?>">
            
            <div class="form-group">
                <label for="example-email-input" class="form-control-label">Nama Subkriteria</label>
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


<?php $i = 1; foreach ($list_subs as $row): ?> 
<div class="modal fade" id="edit-<?=$row->id_sub?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Edit Subkriteria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
          
          <?= form_open_multipart('stafftu/subkriteria/') ?>
          <div class="modal-body">
                <input type="hidden" required name="id_sub"  value="<?=$row->id_sub?>"> 
                <input type="hidden" name="id_kriteria" value="<?=$kriteria->id_kriteria?>">
            
                <div class="form-group">
                    <label for="example-email-input" class="form-control-label">Nama Subkriteria</label>
                    <input class="form-control" type="text" required name="nama_sub" value="<?=$row->nama_sub?>">
                </div>
                <div class="form-group">
                    <label for="example-email-input" class="form-control-label">Jenis</label>
                      <div class="custom-control custom-radio mb-3">
                        <input class="custom-control-input" name="jenis" value="Core Factor" id="customRadio5-<?=$row->id_sub?>" <?php if ($row->jenis == 'Core Factor') { echo "checked";    } ?> type="radio">
                        <label class="custom-control-label" for="customRadio5-<?=$row->id_sub?>">Core Factor</label>
                      </div>
                      <div class="custom-control custom-radio mb-3">
                        <input class="custom-control-input" name="jenis" value="Secondary Factor" id="customRadio6-<?=$row->id_sub?>" <?php if ($row->jenis == 'Secondary Factor') { echo "checked";    } ?>  type="radio">
                        <label class="custom-control-label" for="customRadio6-<?=$row->id_sub?>">Secondary Factor</label>
                      </div>
                </div>    
                <div class="form-group">
                    <label for="example-email-input" class="form-control-label">Nilai Standar Komptensi (1 - 5)</label>
                    <input class="form-control" type="number" min="1" max="5" required name="nilai_standar" value="<?=$row->nilai_standar?>" >
                </div>
              
          </div>
  
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" name="edit" value="Submit"> 
          </div>
          </form>  
      
    </div>
  </div>
</div>
 

<div class="modal fade" id="delete-<?=$row->id_sub?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger"> 
              
                  <div class="modal-body">
                    
                      <div class="py-3 text-center">
                          <i class="ni ni-bell-55 ni-3x"></i>
                          <h4 class="heading mt-4"> Hapus Data Subkriteria ini? </h4> 
                      </div>
                      
                  </div>
                  
                  <form action="<?= base_url('stafftu/subkriteria')?>" method="Post" >  
                  <div class="modal-footer">

                   
                      <input type="hidden" value="<?=$kriteria->id_kriteria?>" name="id_kriteria">  
                      <input type="hidden" value="<?=$row->id_sub?>" name="id_sub">  
                      <input type="submit" class="btn btn-white" name="delete" value="Ya!">
                     
                      <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                  </div>
                </form>
          </div>
  </div>
</div>
<?php endforeach; ?>