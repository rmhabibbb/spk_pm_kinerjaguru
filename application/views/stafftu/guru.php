    <!-- Header -->
    <!-- Header -->
    <div class="header   pb-6" style="background-color: #0087c2ad">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7"> 
              <h6 class="h2 text-white d-inline-block mb-0">Kelola Guru</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a   href="<?=base_url('stafftu')?>"><i class="fas fa-home"></i></a></li> 
                  <li class="breadcrumb-item active" aria-current="page">Kelola Guru</li>
                </ol>
              </nav>
            </div> 
            <div class="col-lg-6 col-5 text-right">
              <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-neutral">Tambah Guru</a> 
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
              <h3 class="mb-0">Data guru</h3>
            </div>
            <!-- Light table -->

            <div class="card-body">
              <div class="table-responsive py-4">
                <table class="table table-flush" id="datatable-basic">
                  <thead class="thead-light">
                    <tr>  
                      <th>NIP</th>
                      <th>Nama</th>  
                      <th>Jenis Kelamin</th>  
                      <th>Email</th>  
                      <th>No. Telp</th>   
                      <th>Alamat</th>  
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="list">

                   <?php $i = 1; foreach ($guru as $row): ?> 
                    <tr> 
                      <td>
                        <?=$row->nip?>
                      </td> 
                      <td>
                        <?=$row->nama?>
                      </td>
                      <td>
                        <?=$row->jk?>
                      </td> 
                      <td>
                        <?=$row->email?>
                      </td> 
                      <td>
                        <?=$row->no_telp?>
                      </td> 
                       
                      <td>
                        <?=$row->alamat?>
                      </td> 
                      
                      <td class="text-right">
                        <a href="" data-toggle="modal" data-target="#edit-<?=$i?>">
                          <button type="button" class="btn btn-icon" style="background-color: #0087c2ad; color : white"> 
                            <span class="btn-inner--text">Edit</span>
                          </button>
                        </a>
                        
                        <a href="" data-toggle="modal" data-target="#delete-<?=$i++?>">
                          <button type="button" class="btn btn-instagram btn-icon"> 
                            <span class="btn-inner--text">Delete</span>
                          </button>
                        </a>
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
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <?= form_open_multipart('stafftu/guru/') ?>
      <div class="modal-body">
         
          
            <div class="form-group">
                <label for="example-email-input" class="form-control-label">NIP</label>
                <input class="form-control" type="text" required name="nip" >
            </div> 
            <div class="form-group">
                <label for="example-email-input" class="form-control-label">Nama</label>
                <input class="form-control" type="text" required name="nama" >
            </div> 
            <div class="form-group">
                <label for="example-email-input" class="form-control-label">Jenis Kelamin</label>
                <div class="custom-control custom-radio mb-3">
                        <input class="custom-control-input" name="jk" value="Laki - Laki" id="customRadio5" type="radio">
                        <label class="custom-control-label" for="customRadio5">Laki - Laki</label>
                      </div>
                      <div class="custom-control custom-radio mb-3">
                        <input class="custom-control-input" name="jk" value="Perempuan" id="customRadio6"  type="radio">
                        <label class="custom-control-label" for="customRadio6">Perempuan</label>
                      </div>
            </div>  
             <div class="form-group">
                <label for="example-email-input" class="form-control-label">Email</label>
                <input class="form-control" type="email" required name="email" >
            </div> 

            <div class="form-group">
                <label for="example-email-input" class="form-control-label">No. Telepon</label>
                <input class="form-control" type="text" required name="no_telp" >
            </div>  
            

            <div class="form-group">
                <label for="example-email-input" class="form-control-label">Alamat</label>
                <textarea class="form-control" required name="alamat" ></textarea> 
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

<?php $i = 1; foreach ($guru as $row): ?> 
<div class="modal fade" id="edit-<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Edit guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <?= form_open_multipart('stafftu/guru/') ?>
      <div class="modal-body">
        
          <input type="hidden" required name="nip_x"  value="<?=$row->nip?>"> 
          <input type="hidden" required name="id_x"  value="<?=$row->id_guru?>"> 
            <div class="form-group">
                <label for="example-email-input" class="form-control-label">NIP</label>
                <input class="form-control" type="text" required name="nip" value="<?=$row->nip?>">
            </div>
            <div class="form-group">
                <label for="example-email-input" class="form-control-label">Nama</label>
                <input class="form-control" type="text" required name="nama" value="<?=$row->nama?>" >
            </div> 

             <div class="form-group">
                <label for="example-email-input" class="form-control-label">Email</label>
                <input class="form-control" type="email" required name="email" value="<?=$row->email?>">
            </div> 

            <div class="form-group">
                <label for="example-email-input" class="form-control-label">Jenis Kelamin</label>
                <div class="custom-control custom-radio mb-3">
                        <input class="custom-control-input" name="jk" value="Laki - Laki" id="customRadio5-<?=$row->id_guru?>" <?php if ($row->jk == 'Laki - Laki') { echo "checked";    } ?> type="radio">
                        <label class="custom-control-label" for="customRadio5-<?=$row->id_guru?>">Laki - Laki</label>
                      </div>
                      <div class="custom-control custom-radio mb-3">
                        <input class="custom-control-input" name="jk" value="Perempuan" id="customRadio6-<?=$row->id_guru?>" <?php if ($row->jk == 'Perempuan') { echo "checked";    } ?>  type="radio">
                        <label class="custom-control-label" for="customRadio6-<?=$row->id_guru?>">Perempuan</label>
                      </div>
            </div>   
           
            
            <div class="form-group">
                <label for="example-email-input" class="form-control-label">No. Telepon</label>
                <input class="form-control" type="text" required name="no_telp" value="<?=$row->no_telp?>">
            </div>  
            

            <div class="form-group">
                <label for="example-email-input" class="form-control-label">Alamat</label>
                <textarea class="form-control" required name="alamat" ><?=$row->alamat?></textarea> 
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
 
<div class="modal fade" id="delete-<?=$i++?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger"> 
              
                  <div class="modal-body">
                    
                      <div class="py-3 text-center">
                          <i class="ni ni-bell-55 ni-3x"></i>
                          <h4 class="heading mt-4"> Hapus Data guru ini? </h4> 
                      </div>
                      
                  </div>
                  
                  <form action="<?= base_url('stafftu/guru')?>" method="Post" >  
                  <div class="modal-footer">

                   
                      <input type="hidden" value="<?=$row->nip?>" name="nip">  
                      <input type="submit" class="btn btn-white" name="delete" value="Ya!">
                     
                      <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                  </div>
                </form>
          </div>
  </div>
</div>
<?php endforeach; ?>