<?php
$data =[ 
  'index' => $index
];
$this->load->view('kepalasekolah/template/header',$data); 
$this->load->view('kepalasekolah/template/navbar');
$this->load->view($content);
$this->load->view('kepalasekolah/template/footer');
 ?>
