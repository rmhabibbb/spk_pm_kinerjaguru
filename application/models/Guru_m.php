<?php 
class Guru_m extends MY_Model
{

  function __construct()
  {
    parent::__construct();
    $this->data['primary_key'] = 'id_guru';
    $this->data['table_name'] = 'guru';
  }
}

 ?>
