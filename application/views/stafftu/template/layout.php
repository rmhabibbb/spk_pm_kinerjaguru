<?php
$data =[ 
  'index' => $index
];
$this->load->view('stafftu/template/header',$data); 
$this->load->view('stafftu/template/navbar');
$this->load->view($content);
$this->load->view('stafftu/template/footer');
 ?>
