<?php 
class Kinerja_m extends MY_Model
{

  function __construct()
  {
    parent::__construct();
    $this->data['primary_key'] = 'id_kinerja';
    $this->data['table_name'] = 'kinerja_guru';
  }
}

 ?>
