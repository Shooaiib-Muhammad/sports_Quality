<?php

class Efficiency extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Efficiency_model', 'E');

    $this->load->model('RWPD_Model', 'RWPD');
  }

  public function index()
  {
    $data['count'] = $this->E->departments();
    $count = [];
    foreach ($data['count'] as $c) {
      array_push($count, $c['DeptName']);
    }
    $data['total'] = count($count);
    $this->load->view('Efficiency/efficiency', $data);
  }

  public function departments()
  {

    $data['departments'] = $this->E->departments();


    $this->load->view('Efficiency/departments', $data);
  }
  public function AirlessMini()
  {

    // print_r$data['departments'] = $this->E->departments();


    $this->load->view('Efficiency/AirlessMini/AirlessMini');
  }
  public function MS()
  {

    // print_r$data['departments'] = $this->E->departments();


    $this->load->view('Efficiency/MS/MS');
  }

  public function Gluing()
  {

    // print_r$data['departments'] = $this->E->departments();


    $this->load->view('Efficiency/AirlessMini/GLuing');
  }


  public function HF_Cutting()
  {

    // print_r$data['departments'] = $this->E->departments();


    $this->load->view('Efficiency/AirlessMini/HF_Cutting');
  }

  public function Sheet_Sizing()
  {

    // print_r$data['departments'] = $this->E->departments();


    $this->load->view('Efficiency/AirlessMini/Sheet_Sizing');
  }

  public function Panel_Preparation()
  {

    // print_r$data['departments'] = $this->E->departments();


    $this->load->view('Efficiency/AirlessMini/Panel_Preparation');
  }


  public function Assembly()
  {

    // print_r$data['departments'] = $this->E->departments();


    $this->load->view('Efficiency/AirlessMini/Assembly');
  }


  public function Final_Cleaning()
  {

    // print_r$data['departments'] = $this->E->departments();


    $this->load->view('Efficiency/AirlessMini/Final_Cleaning');
  }

  public function  LabelingAndPacking()
  {

    // print_r$data['departments'] = $this->E->departments();


    $this->load->view('Efficiency/AirlessMini/LabelingAndPacking');
  }

  public function  Bladder_Winding()
  {

    // print_r$data['departments'] = $this->E->departments();


    $this->load->view('Efficiency/MS/Bladder_Winding');
  }

  public function  Sheet_SizingMS()
  {

    // print_r$data['departments'] = $this->E->departments();


    $this->load->view('Efficiency/MS/Sheet_Sizing');
  }

  public function  Panel_CuttingMS()
  {

    // print_r$data['departments'] = $this->E->departments();


    $this->load->view('Efficiency/MS/Panel_Cutting');
  }

  public function  Panel_PreparationMS()
  {

    // print_r$data['departments'] = $this->E->departments();


    $this->load->view('Efficiency/MS/Panel_Preparation');
  }

  public function  AssemblyMS()
  {

    // print_r$data['departments'] = $this->E->departments();


    $this->load->view('Efficiency/MS/Assembly');
  }

  public function  LabelingAndPackingMS()
  {

    // print_r$data['departments'] = $this->E->departments();


    $this->load->view('Efficiency/MS/LabelingAndPacking');
  }



  public function sections()
  {


    $data['sections'] = $this->E->sections($_GET['id']);

    $this->load->view('Efficiency/sections', $data);
  }

  public function realTimeAtten()
  {


    $data['realtime'] = $this->E->realTimeAtten($_GET['dept_id'], $_GET['section_id']);


    // print_r($data['realtime']);
    // die;
    $this->load->view('Efficiency/realTimeAtten', $data);
  }
  public function RWPD()
  {
    $Month = date('m');
    $Year = date('Y');
    $Day = date('d');
    $CurrentDate = $Day . '/' . $Month . '/' . $Year;
    $currentDateNew = $Year . '-' . $Month . '-' . $Day;
    $data['IndividualReading'] = $this->RWPD->IndividualReading($currentDateNew, $currentDateNew);
    $data['machineCounter'] = $this->RWPD->machineCounter($CurrentDate, $CurrentDate);
    $total = 0;
    foreach ($data['machineCounter'] as $count) {

      $total = $total + $count['BallCounter'];
    }

    $data['total'] = $total;
    // echo "<pre>";
    $data['realtime'] = $this->E->realTimeAtten($_GET['dept_id'], $_GET['section_id']);

    $data['HourllyReading'] = $this->E->HourllyReading($CurrentDate, $CurrentDate);
    // print_r($data['realtime']);
    // die;
    $this->load->view('Efficiency/RWPD', $data);
  }

  public function Cutting()
  {
    $Month = date('m');
    $Year = date('Y');
    $Day = date('d');
    $CurrentDate = $Year . '-' . $Month . '-' . $Day;
    $data['HourllyReading'] = $this->E->HourllyReadingCutting($CurrentDate, $CurrentDate);
    $data['Counter'] = $this->RWPD->Cutting();
    // // $total = 0;
    // // foreach ($data['machineCounter'] as $count) {

    // //  $total = $total + $count['BallCounter'];
    // // }

    // // $data['total'] = $total;
    // // echo "<pre>";
    $data['realtime'] = $this->E->realTimeAtten($_GET['dept_id'], $_GET['section_id']);


    // print_r($data['realtime']);
    // die;
    $this->load->view('Efficiency/Cutting', $data);
  }
  public function panelCutting()
  {
    $Month = date('m');
    $Year = date('Y');
    $Day = date('d');
    $CurrentDate = $Year . '-' . $Month . '-' . $Day;
    $data['HourllyReading'] = $this->E->HourllyReadingPanelCutting($CurrentDate, $CurrentDate);
    $data['Counter'] = $this->RWPD->panelCutting();
    // // $total = 0;
    // // foreach ($data['machineCounter'] as $count) {

    // //  $total = $total + $count['BallCounter'];
    // // }

    // // $data['total'] = $total;
    // // echo "<pre>";
    $data['realtime'] = $this->E->realTimeAtten($_GET['dept_id'], $_GET['section_id']);


    // print_r($data['realtime']);
    // die;
    $this->load->view('Efficiency/panelCutting', $data);
  }
  

  public function CuttingBladderWinding()
  {
    $Month = date('m');
    $Year = date('Y');
    $Day = date('d');
    $CurrentDate = $Year . '-' . $Month . '-' . $Day;

    $data['Counter'] = $this->RWPD->Cutting();
    // // $total = 0;
    // // foreach ($data['machineCounter'] as $count) {

    // //  $total = $total + $count['BallCounter'];
    // // }

    // // $data['total'] = $total;
    // // echo "<pre>";
    $data['realtime'] = $this->E->realTimeAtten($_GET['dept_id'], $_GET['section_id']);


    // print_r($data['realtime']);
    // die;
    $this->load->view('Efficiency/MS/CuttingBladderWinding', $data);
  }

  public function CuttingSheetSizing()
  {
    $Month = date('m');
    $Year = date('Y');
    $Day = date('d');
    $CurrentDate = $Year . '-' . $Month . '-' . $Day;

    $data['Counter'] = $this->RWPD->Cutting();
    // // $total = 0;
    // // foreach ($data['machineCounter'] as $count) {

    // //  $total = $total + $count['BallCounter'];
    // // }

    // // $data['total'] = $total;
    // // echo "<pre>";
    $data['realtime'] = $this->E->realTimeAtten($_GET['dept_id'], $_GET['section_id']);


    // print_r($data['realtime']);
    // die;
    $this->load->view('Efficiency/MS/CuttingSheetSizing', $data);
  }


  public function CuttingPanelCutting()
  {
    $Month = date('m');
    $Year = date('Y');
    $Day = date('d');
    $CurrentDate = $Year . '-' . $Month . '-' . $Day;

    $data['Counter'] = $this->RWPD->Cutting();
    // // $total = 0;
    // // foreach ($data['machineCounter'] as $count) {

    // //  $total = $total + $count['BallCounter'];
    // // }

    // // $data['total'] = $total;
    // // echo "<pre>";
    $data['realtime'] = $this->E->realTimeAtten($_GET['dept_id'], $_GET['section_id']);


    // print_r($data['realtime']);
    // die;
    $this->load->view('Efficiency/MS/CuttingPanelCutting', $data);
  }
  public function HSB34001(){

    $this->load->view('Efficiency/HSB34001');
  }

  public function TMB(){

    $this->load->view('Efficiency/TMB');
  }
  public function LFB(){

    $this->load->view('Efficiency/LFB');
  }
  public function AMB()
  {



    $this->load->view('Efficiency/AMB');
  }
  public function MSB()
  {

    // print_r$data['departments'] = $this->E->departments();


    $this->load->view('Efficiency/MSB');
  }
  public function CuttingPanelPreparation()
  {
    $Month = date('m');
    $Year = date('Y');
    $Day = date('d');
    $CurrentDate = $Year . '-' . $Month . '-' . $Day;

    $data['Counter'] = $this->RWPD->Cutting();
    // // $total = 0;
    // // foreach ($data['machineCounter'] as $count) {

    // //  $total = $total + $count['BallCounter'];
    // // }

    // // $data['total'] = $total;
    // // echo "<pre>";
    $data['realtime'] = $this->E->realTimeAtten($_GET['dept_id'], $_GET['section_id']);


    // print_r($data['realtime']);
    // die;
    $this->load->view('Efficiency/MS/CuttingPanelPreparation', $data);
  }

  public function CuttingAssembly()
  {
    $Month = date('m');
    $Year = date('Y');
    $Day = date('d');
    $CurrentDate = $Year . '-' . $Month . '-' . $Day;

    $data['Counter'] = $this->RWPD->Cutting();
    // // $total = 0;
    // // foreach ($data['machineCounter'] as $count) {

    // //  $total = $total + $count['BallCounter'];
    // // }

    // // $data['total'] = $total;
    // // echo "<pre>";
    $data['realtime'] = $this->E->realTimeAtten($_GET['dept_id'], $_GET['section_id']);


    // print_r($data['realtime']);
    // die;
    $this->load->view('Efficiency/MS/CuttingAssembly', $data);
  }

  public function CuttingLabelingAndPacking()
  {
    $Month = date('m');
    $Year = date('Y');
    $Day = date('d');
    $CurrentDate = $Year . '-' . $Month . '-' . $Day;

    $data['Counter'] = $this->RWPD->Cutting();
    // // $total = 0;
    // // foreach ($data['machineCounter'] as $count) {

    // //  $total = $total + $count['BallCounter'];
    // // }

    // // $data['total'] = $total;
    // // echo "<pre>";
    $data['realtime'] = $this->E->realTimeAtten($_GET['dept_id'], $_GET['section_id']);


    // print_r($data['realtime']);
    // die;
    $this->load->view('Efficiency/MS/CuttingLabelingAndPacking', $data);
  }

  public function CuttingCorGluining()
  {
    $Month = date('m');
    $Year = date('Y');
    $Day = date('d');
    $CurrentDate = $Year . '-' . $Month . '-' . $Day;

    $data['Counter'] = $this->RWPD->Cutting();
    // // $total = 0;
    // // foreach ($data['machineCounter'] as $count) {

    // //  $total = $total + $count['BallCounter'];
    // // }

    // // $data['total'] = $total;
    // // echo "<pre>";
    $data['realtime'] = $this->E->realTimeAtten($_GET['dept_id'], $_GET['section_id']);


    // print_r($data['realtime']);
    // die;
    $this->load->view('Efficiency/AirlessMini/CuttingCorGluining', $data);
  }


  public function CuttingHF_Cutting()
  {
    $Month = date('m');
    $Year = date('Y');
    $Day = date('d');
    $CurrentDate = $Year . '-' . $Month . '-' . $Day;

    $data['Counter'] = $this->RWPD->Cutting();
    // // $total = 0;
    // // foreach ($data['machineCounter'] as $count) {

    // //  $total = $total + $count['BallCounter'];
    // // }

    // // $data['total'] = $total;
    // // echo "<pre>";
    $data['realtime'] = $this->E->realTimeAtten($_GET['dept_id'], $_GET['section_id']);


    // print_r($data['realtime']);
    // die;
    $this->load->view('Efficiency/AirlessMini/CuttingHF_Cutting', $data);
  }


  public function CuttingSheetSizingAirless()
  {
    $Month = date('m');
    $Year = date('Y');
    $Day = date('d');
    $CurrentDate = $Year . '-' . $Month . '-' . $Day;

    $data['Counter'] = $this->RWPD->Cutting();
    // // $total = 0;
    // // foreach ($data['machineCounter'] as $count) {

    // //  $total = $total + $count['BallCounter'];
    // // }

    // // $data['total'] = $total;
    // // echo "<pre>";
    $data['realtime'] = $this->E->realTimeAtten($_GET['dept_id'], $_GET['section_id']);


    // print_r($data['realtime']);
    // die;
    $this->load->view('Efficiency/AirlessMini/CuttingSheetSizingAirless', $data);
  }

  public function CuttingPanelPreparationAirless()
  {
    $Month = date('m');
    $Year = date('Y');
    $Day = date('d');
    $CurrentDate = $Year . '-' . $Month . '-' . $Day;

    $data['Counter'] = $this->RWPD->Cutting();
    // // $total = 0;
    // // foreach ($data['machineCounter'] as $count) {

    // //  $total = $total + $count['BallCounter'];
    // // }

    // // $data['total'] = $total;
    // // echo "<pre>";
    $data['realtime'] = $this->E->realTimeAtten($_GET['dept_id'], $_GET['section_id']);


    // print_r($data['realtime']);
    // die;
    $this->load->view('Efficiency/AirlessMini/CuttingPanelPreparationAirless', $data);
  }


  public function CuttingAssemblyAirless()
  {
    $Month = date('m');
    $Year = date('Y');
    $Day = date('d');
    $CurrentDate = $Year . '-' . $Month . '-' . $Day;

    $data['Counter'] = $this->RWPD->Cutting();
    // // $total = 0;
    // // foreach ($data['machineCounter'] as $count) {

    // //  $total = $total + $count['BallCounter'];
    // // }

    // // $data['total'] = $total;
    // // echo "<pre>";
    $data['realtime'] = $this->E->realTimeAtten($_GET['dept_id'], $_GET['section_id']);


    // print_r($data['realtime']);
    // die;
    $this->load->view('Efficiency/AirlessMini/CuttingAssemblyAirless', $data);
  }


  public function CuttingFinalCleaningAirless()
  {
    $Month = date('m');
    $Year = date('Y');
    $Day = date('d');
    $CurrentDate = $Year . '-' . $Month . '-' . $Day;

    $data['Counter'] = $this->RWPD->Cutting();
    // // $total = 0;
    // // foreach ($data['machineCounter'] as $count) {

    // //  $total = $total + $count['BallCounter'];
    // // }

    // // $data['total'] = $total;
    // // echo "<pre>";
    $data['realtime'] = $this->E->realTimeAtten($_GET['dept_id'], $_GET['section_id']);


    // print_r($data['realtime']);
    // die;
    $this->load->view('Efficiency/AirlessMini/CuttingFinalCleaningAirless', $data);
  }

  public function CuttingLabelingAndPackingAirless()
  {
    $Month = date('m');
    $Year = date('Y');
    $Day = date('d');
    $CurrentDate = $Year . '-' . $Month . '-' . $Day;

    $data['Counter'] = $this->RWPD->Cutting();
    // // $total = 0;
    // // foreach ($data['machineCounter'] as $count) {

    // //  $total = $total + $count['BallCounter'];
    // // }

    // // $data['total'] = $total;
    // // echo "<pre>";
    $data['realtime'] = $this->E->realTimeAtten($_GET['dept_id'], $_GET['section_id']);


    // print_r($data['realtime']);
    // die;
    $this->load->view('Efficiency/AirlessMini/CuttingLabelingAndPackingAirless', $data);
  }


  public function getEmployees()
  {

    // print_r($_POST);
    // die;
    $data = $this->E->getEmployees($_POST['section_id'], $_POST['dept_id'], $_POST['direct']);

    return $this->output
      ->set_content_type('application/json')
      ->set_status_header(200)
      ->set_output(json_encode($data));
  }

  public function getEmployeesNull()
  {
    $data = $this->E->getEmployeesNull($_POST['section_id'], $_POST['dept_id'], $_POST['direct']);
    return $this->output
      ->set_content_type('application/json')
      ->set_status_header(200)
      ->set_output(json_encode($data));
  }

  public function getRWPDDateRangeData(){
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    $data['BarData'] = $this->E->getRWPDDateRangeDataBar($startDate, $endDate);
    $data['MachineData'] = $this->E->getRWPDDateRangeDataMachine($startDate, $endDate);

    return $this->output
    ->set_content_type('application/json')
    ->set_status_header(200)
    ->set_output(json_encode($data));
  }

  public function getCuttingSheetSizingDateRangeData(){
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    $data['BarData'] = $this->E->getCuttingSheetSizingDateRangeData($startDate, $endDate);
    $data['MachineData'] = $this->E->getCuttingSheetSizingDateRangeDataMachineWise($startDate, $endDate);

    return $this->output
    ->set_content_type('application/json')
    ->set_status_header(200)
    ->set_output(json_encode($data));
  }

  public function getCuttingPanelDateRangeData(){
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    $data['BarData'] = $this->E->getCuttingPanelDateRangeData($startDate, $endDate);
    $data['MachineData'] = $this->E->getCuttingPanelDateRangeDataMachineWise($startDate, $endDate);

    return $this->output
    ->set_content_type('application/json')
    ->set_status_header(200)
    ->set_output(json_encode($data));
  }

  public function getCuttingHFDateRangeData(){
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    $data['BarData'] = $this->E->getCuttingHFDateRangeData($startDate, $endDate);
    $data['MachineData'] = $this->E->getCuttingHFDateRangeDataMachineWise($startDate, $endDate);

    return $this->output
    ->set_content_type('application/json')
    ->set_status_header(200)
    ->set_output(json_encode($data));
  }

  public function getLaminationDateRangeData(){
    
    $startDate = date("Y-m-d", strtotime($_POST['startDate']));
    $endDate = date("Y-m-d", strtotime($_POST['endDate']));

   //  $data['getData'] = $this->Lamination->getData($startDate, $endDate);
    $data['BarData'] = $this->E->getLaminationDateRangeData($startDate, $endDate);
    $data['MachineData'] = $this->E->getLaminationDateRangeDataMachineWise($startDate, $endDate);

    return $this->output
    ->set_content_type('application/json')
    ->set_status_header(200)
    ->set_output(json_encode($data));
  }

  public function getRealTimeDateRange(){
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    $data['realtime'] = $this->E->realTimeAttenDateRange($_POST['dept_id'], $_POST['section_id'],$startDate,$endDate);

    return $this->output
    ->set_content_type('application/json')
    ->set_status_header(200)
    ->set_output(json_encode($data));
  }
  public function gettingambcoreData(){
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    
    $data['BarData'] = $this->E->gettingambcoreData($startDate, $endDate);
    //$data['MachineData'] = $this->E->getCuttingSheetSizingDateRangeDataMachineWise($startDate, $endDate);
    
    return $this->output
    ->set_content_type('application/json')
    ->set_status_header(200)
    ->set_output(json_encode($data));
    }

    public function gettingCarcasData(){
      $startDate = $_POST['startDate'];
      $endDate = $_POST['endDate'];
      
      $data['BarData'] = $this->E->gettingCarcasData($startDate, $endDate);
      //$data['MachineData'] = $this->E->getCuttingSheetSizingDateRangeDataMachineWise($startDate, $endDate);
      
      return $this->output
      ->set_content_type('application/json')
      ->set_status_header(200)
      ->set_output(json_encode($data));
      }
      public function gettinglfbCarcasData(){
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        
        $data['BarData'] = $this->E->gettinglfbCarcasData($startDate, $endDate);
        //$data['MachineData'] = $this->E->getCuttingSheetSizingDateRangeDataMachineWise($startDate, $endDate);
        
        return $this->output
        ->set_content_type('application/json')
        ->set_status_header(200)
        ->set_output(json_encode($data));
        }
  
      public function getMSLinesDateRangeData(){
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
    
        $data['BarData'] = $this->E->getMSLinesDateRangeData($startDate, $endDate);
        $data['MachineData'] = $this->E->getMSLinesDateRangeDataMachineWise($startDate, $endDate);
    
        return $this->output
        ->set_content_type('application/json')
        ->set_status_header(200)
        ->set_output(json_encode($data));
      }

      public function getBladderWindingDateRangeData(){
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
    
        $data['BarData'] = $this->E->getBladderWindingDateRangeData($startDate, $endDate);
        $data['MachineData'] = $this->E->getBladderWindingDateRangeDataMachineWise($startDate, $endDate);
    
        return $this->output
        ->set_content_type('application/json')
        ->set_status_header(200)
        ->set_output(json_encode($data));
      }

      public function getTMDateRangeData(){
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
    
        $data['BarData'] = $this->E->getTMDateRangeData($startDate, $endDate);
        $data['MachineData'] = $this->E->getTMDateRangeDataMachineWise($startDate, $endDate);
    
        return $this->output
        ->set_content_type('application/json')
        ->set_status_header(200)
        ->set_output(json_encode($data));
      }

      public function getAMBAssemblingDateRangeData(){
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
    
        $data['BarData'] = $this->E->getAMBAssemblingDateRangeData($startDate, $endDate);
        $data['MachineData'] = $this->E->getAMBAssemblingDateRangeDataMachineWise($startDate, $endDate);
    
        return $this->output
        ->set_content_type('application/json')
        ->set_status_header(200)
        ->set_output(json_encode($data));
      }

      public function getAMBPackingDateRangeData(){
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
    
        $data['BarData'] = $this->E->getAMBPackingDateRangeData($startDate, $endDate);
        $data['MachineData'] = $this->E->getAMBPackingDateRangeDataMachineWise($startDate, $endDate);
    
        return $this->output
        ->set_content_type('application/json')
        ->set_status_header(200)
        ->set_output(json_encode($data));
      }

      public function getLFBDateRangeData(){
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
    
        $data['BarData'] = $this->E->getLFBDateRangeData($startDate, $endDate);
        $data['MachineData'] = $this->E->getLFBDateRangeDataMachineWise($startDate, $endDate);
    
        return $this->output
        ->set_content_type('application/json')
        ->set_status_header(200)
        ->set_output(json_encode($data));
      }

}
