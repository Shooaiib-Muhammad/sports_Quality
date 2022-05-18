<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Cutting extends CI_Controller
{
 public function __construct()
 {
  parent::__construct();

  $this->load->model('Cutting/Cutting_Model', 'Cutting');
 }

 public function index()
 {

  $Month = date('m');
  $Year = date('Y');
  $Day = date('d');
  $CurrentDate = $Day . '/' . $Month . '/' . $Year;

  
  $data['machineCounter'] = $this->Cutting->machineCounter($CurrentDate , $CurrentDate);



  $total = 0;
  
  foreach ($data['machineCounter'] as $count) {

   $total = $total + $count['BallCounter'];

  }

  
  $data['total'] = $total;



  // echo "<pre>";
  //print_r($data['articleCounter']);
  //   echo "</pre>";
  // // // die;
  $this->load->view("Cutting/cutting", $data);
 }



 public function searchData()
 {

  $data['machineCounter'] = $this->Cutting->machineCounter(date("d/m/Y",strtotime($_POST['Sdate'])), date("d/m/Y", strtotime($_POST['Edate'])));

 

  // date("d/m/Y",strtotime($_POST['Sdate'])), date("d/m/Y",strtotime($_POST['Edate']))
  
  $total = 0;
  foreach ($data['machineCounter'] as $count) {

   
   $total = $total + $count['BallCounter'];
  }

  $data['total'] = $total;



  // echo "<pre>";
  //   print_r($data['articleCounter']);
  //   echo "</pre>";
  // // // die;
  $this->load->view("Cutting/cutingDateWise", $data);

 }


}

?>


