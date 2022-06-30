    <!-- Header -->
    <!-- Header -->
    <div class="header   pb-6" style="background-color: #0087c2ad">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7"> 
              <h6 class="h2 text-white d-inline-block mb-0">Kelola Akun</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a   href="<?=base_url('stafftu')?>"><i class="fas fa-home"></i></a></li> 
                  <li class="breadcrumb-item active" aria-current="page">Kelola Akun</li>
                </ol>
              </nav>
            </div> 
            <div class="col-lg-6 col-5 text-right">
              <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-neutral">Tambah Akun</a> 
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
              <h3 class="mb-0">Data Akun</h3>
            </div>
            <!-- Light table -->

            <div class="card-body">
              <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-basic">
                <thead class="thead-light">
                  <tr>  
                    <th>NIP</th>
                    <th>Role</th> 
                    <th>Lasted Login</th> 
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="list">

                 <?php $i = 1; foreach ($users as $row): ?> 
                  <tr> 
                    <td class="budget">
                      <?=$row->nip?>
                    </td>
                    <td>
                      <?php
                        if ($row->role == 1) {
                          echo "Staff TU";
                        }elseif ($row->role == 2) {
                          echo "Kepala Sekolah";
                        }elseif ($row->role == 3) {
                          echo "Guru";
                        } 
                      ?>
                    </td>
                    <td class="budget">
                      <?php if ($row->last_login != NULL) {
                        echo date('d/m/Y H:i:s', strtotime($row->last_login));
                      }else{
                        echo "-";
                      } ?>
                    </td>
                    
                    <td class="text-right">
                      <a href="" data-toggle="modal" data-target="#edit-<?=$i?>">
                        <button type="button" class="btn btn-icon" style="background-color: #0087c2ad; color : white">  
                          <span class="btn-inner--text">Edit</span>
                        </button>
                      </a>
                      <a href="" data-toggle="modal" data-target="#gp-<?=$i?>">
                        <button type="button" class="btn btn-facebook btn-icon"> 
                          <span class="btn-inner--text">Ganti Password</span>
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
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <?= form_open_multipart('stafftu/akun/') ?>
      <div class="modal-body">
         
            <div class="form-group">
                <label for="example-nip-input" class="form-control-label">NIP</label>
                <input class="form-control" type="text" required name="nip" id="example-nip-input">
            </div> 
            <div class="form-group">
                <label for="example-password-input" class="form-control-label">Password</label>
                <input class="form-control" type="password"  required name="password" id="example-password-input">
            </div> 
            <div class="form-group">
                <label for="exampleFormControlSelect2" class="form-control-label">Role</label>
                <select  class="form-control" required name="role" id="exampleFormControlSelect2">
                  <option>Select One</option> 
                  <option value="1">Staff TU</option> 
                  <option value="2">Kepala Sekolah</option>   
                </select>
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

<?php $i = 1; foreach ($users as $row): ?> 
<div class="modal fade" id="edit-<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Edit Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <?= form_open_multipart('stafftu/akun/') ?>
      <div class="modal-body">
        
          <input type="hidden" required name="nip_x"  value="<?=$row->nip?>"> 
          
            <div class="form-group">
                <label for="example-nip-input" class="form-control-label">nip</label>
                <input class="form-control" type="nip" required name="nip" id="example-nip-input" value="<?=$row->nip?>">
            </div>  
            <div class="form-group">
                <label for="exampleFormControlSelect2" class="form-control-label">Role</label>
                <select  class="form-control" required name="role" id="exampleFormControlSelect2">
                  <option value="<?=$row->role?>">
                    <?php
                        if ($row->role == 1) {
                          echo "Staff TU";
                        }elseif ($row->role == 2) {
                          echo "Kepala Sekolah";
                        }elseif ($row->role == 3) {
                          echo "Guru";
                        } 
                      ?>
                  </option>
                  <?php $list = ['stafftu', '', 'Pimpinan' ,'' ] ;
                    for ($z=0; $z <= sizeof($list) ; $z++) { 
                        if ($list[$z] != '') { 
                          if ($z+1 != $row->role) {
                            $x = $z+1;
                          echo '<option value="'.$x.'">'.$list[$z].'</option> ';
                        }
                      }
                    }
                  ?>
                   
                </select>
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

<div class="modal fade" id="gp-<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Ganti Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <?= form_open_multipart('stafftu/akun/') ?>
      <div class="modal-body">
        
          <input type="hidden" required name="nip"  value="<?=$row->nip?>"> 
          
            <div class="form-group">
                <label for="example-nip-input" class="form-control-label">NIP</label>
                <input class="form-control" type="text" readonly  name="nip" value="<?=$row->nip?>">
            </div>   
            

            <div class="form-group">
                <label for="example-password-input" class="form-control-label">Password Baru</label>
                <input class="form-control" type="password"  required name="password" id="example-password-input">
            </div> 

            <div class="form-group">
                <label for="example-password-input" class="form-control-label">Konfirmasi Password</label>
                <input class="form-control" type="password"  required name="password2" id="example-password-input">
            </div> 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="edit2" value="Submit"> 
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
                          <h4 class="heading mt-4"> Hapus akun ini? </h4> 
                      </div>
                      
                  </div>
                  
                  <form action="<?= base_url('stafftu/akun')?>" method="Post" >  
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