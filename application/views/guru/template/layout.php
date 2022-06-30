<?php
$data =[ 
  'index' => $index
];
$this->load->view('guru/template/header',$data); 
$this->load->view('guru/template/navbar');
$this->load->view($content);
$this->load->view('guru/template/footer');
 ?>
