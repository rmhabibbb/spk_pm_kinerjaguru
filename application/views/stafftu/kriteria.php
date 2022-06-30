    <!-- Header -->
    <!-- Header -->
    <div class="header   pb-6" style="background-color: #0087c2ad">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7"> 
              <h6 class="h2 text-white d-inline-block mb-0">Kelola Kriteria</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a  href="<?=base_url('stafftu')?>"><i class="fas fa-home"></i></a></li> 
                  <li class="breadcrumb-item active" aria-current="page">Kelola Kriteria</li>
                </ol>
              </nav>
            </div> 
            <div class="col-lg-6 col-5 text-right">
              <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-neutral">Tambah Kriteria</a> 
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
              <h3 class="mb-0">Data Kriteria</h3>
            </div>
            <!-- Light table -->

            <div class="card-body">
              <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-basic">
                <thead class="thead-light">
                  <tr>  
                    <th>ID Kriteria</th>
                    <th>Nama Kriteria</th>  
                    <th>Bobot Kriteria</th>  
                    <th>Jumlah Subkriteria</th>   
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody class="list">

                 <?php foreach ($kriteria as $row): ?> 
                  <tr> 
                    <td>
                      <?=$row->id_kriteria?>
                    </td> 
                    <td>
                      <?=$row->nama_kriteria?>
                    </td> 
                    <td>
                      <?=$row->bobot_kriteria?>%
                    </td> 
                  
                    <td> 
                      <?=$this->Subkriteria_m->get_num_row(['id_kriteria' => $row->id_kriteria]);?>
                    </td>  
                    
                    <td class="text-right">
                      <center>
                        <a href="<?=base_url('stafftu/kriteria/'.$row->id_kriteria)?>"  >
                          <button type="button" class="btn btn-icon bg-success" style="color : white">  
                            <span class="btn-inner--text">Lihat Detail</span>
                          </button>
                        </a>
                        <a href="" data-toggle="modal" data-target="#edit-<?=$row->id_kriteria?>">
                          <button type="button" class="btn btn-icon" style="background-color: #0087c2ad; color : white">  
                            <span class="btn-inner--text">Edit</span>
                          </button>
                        </a>
                       
                      <a href="" data-toggle="modal" data-target="#delete-<?=$row->id_kriteria?>">
                        <button type="button" class="btn btn-instagram btn-icon"> 
                          <span class="btn-inner--text">Delete</span>
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
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Kriteria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <?= form_open_multipart('stafftu/kriteria/') ?>
      <div class="modal-body">
         
            
            <div class="form-group">
                <label for="example-email-input" class="form-control-label">Nama Kriteria</label>
                <input class="form-control" type="text" required name="nama" >
            </div>   
            <div class="form-group">
                    <label for="example-email-input" class="form-control-label">Bobot Kriteria (%)</label>
                    <input class="form-control" type="number" min="0" max="100" required name="bobot_kriteria" >
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

<?php $i = 1; foreach ($kriteria as $row): ?> 
<div class="modal fade" id="edit-<?=$row->id_kriteria?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Edit Kriteria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
          
          <?= form_open_multipart('stafftu/kriteria/') ?>
          <div class="modal-body">
                <input type="hidden" required name="id_x"  value="<?=$row->id_kriteria?>"> 
                <div class="form-group">
                    <label for="example-email-input" class="form-control-label">Nama</label>
                    <input class="form-control" type="text" required name="nama" value="<?=$row->nama_kriteria?>" >
                </div>
                <div class="form-group">
                    <label for="example-email-input" class="form-control-label">Bobot Kriteria</label>
                    <input class="form-control" type="number" min="0" max="100" required name="bobot_kriteria" value="<?=$row->bobot_kriteria?>" >
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
 

<div class="modal fade" id="delete-<?=$row->id_kriteria?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger"> 
              
                  <div class="modal-body">
                    
                      <div class="py-3 text-center">
                          <i class="ni ni-bell-55 ni-3x"></i>
                          <h4 class="heading mt-4"> Hapus Data Kriteria ini? </h4> 
                      </div>
                      
                  </div>
                  
                  <form action="<?= base_url('stafftu/kriteria')?>" method="Post" >  
                  <div class="modal-footer">

                   
                      <input type="hidden" value="<?=$row->id_kriteria?>" name="id_kriteria">  
                      <input type="submit" class="btn btn-white" name="delete" value="Ya!">
                     
                      <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                  </div>
                </form>
          </div>
  </div>
</div>
<?php endforeach; ?>