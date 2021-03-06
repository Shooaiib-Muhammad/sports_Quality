<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BEC_machines extends CI_Controller
{
 public function __construct()
 {
  parent::__construct();

  $this->load->model('DMMS/Machine_model', 'model');
  $this->load->model('DMMS/Section_model', 'section');
  $this->load->model('DMMS/Department_model', 'd');
  $this->load->model('DMMS/Parameter_model', 'p');
  $this->load->model('DMMS/Schedule_model', 's');
 }

 public function index()
 {
  $data['dept'] = $this->d->findall();
  $data['data'] = $this->model->findall();
  $data['title'] = "Machines";
  $this->load->view("DMMS/machines", $data);
 }

 public function newmachine()
 {
  $title = "New Machine";

  if ($this->input->method() == 'post') {
   $rules = array(
    array(
     'field' => 'name',
     'label' => 'Machine Name',
     'rules' => 'required'
    )

   );

   $this->form_validation->set_rules($rules);

   if ($this->form_validation->run() == TRUE) {
    $this->model->insert($this->input->post());
    $this->session->set_flashdata('success', 'New Machine  Saved Successfully');
   }
   $data['data'] = $this->model->findall();
   $data['title'] = "Machines";
   $this->load->view("DMMS/machines", $data);
  } else {

   $data['title'] = $title;
   $data['dept'] = $this->d->findall();
   $this->load->view('DMMS/new_machine', $data);
  }
 }


 public function delete($id)
 {
  $this->model->delete($id);
  redirect("index.php/machines");
 }
 public function getmachineBydept($id)
 {


  $data['getmachines'] = $this->model->getmachineBydept($id);
  $data['id'] = $id;

  $data['machines'] = $this->model->findall();
  $data['title'] = $data['getmachines'][0]->SecName;
  $data['DeptID'] = $data['getmachines'][0]->DeptID;

  $this->load->view('DMMS/DeptWisemachines', $data);
 }

 public function BECmachines($id)
 {


  $data['getmachines'] = $this->model->getOEEmachineBydept($id);
  $data['id'] = $id;

  $data['machines'] = $this->model->findall();
  $data['Dept'] = $data['getmachines'][0]->DeptName;
  $data['title'] = $data['getmachines'][0]->SecName;
  $data['DeptID'] = $data['getmachines'][0]->DeptID;
  $Dept = $data['DeptID'];
  $SectionID = $data['getmachines'][0]->SectionID;
  $data['Activemachine'] = $this->section->getOEEmachines($SectionID);
  $data['getAvgounter'] = $this->section->getSectionwiseCounter($SectionID);
  $data['DaywiseDowntme'] = $this->section->DaySectionWiseDowntme($SectionID);
  $data['values'] = $this->section->getMintsandtagte($SectionID);
  //Echo $Dept;
  if ($Dept == 6 or $Dept == 7) {
   $data['HallProduction'] = $this->model->production();
  } elseif ($Dept == 1) {
   $data['HallProduction'] = $this->model->AMBproduction();
  } elseif ($Dept == 3) {
   $data['HallProduction'] = $this->model->TMproduction();
  } elseif ($Dept == 24) {
   $data['HallProduction'] = $this->model->LFbproduction();
  }

  $this->load->view('DMMS/BEC_machines', $data);
 }
 public function department()
 {
  if ($this->input->method() == 'post') {
   $data['department'] = $this->input->post('department');
   $data['section'] = $this->input->post('section');
   $data['data'] = $this->model->department_machines($data['department'],  $data['section']);
  } else {
   $data['data'] = $this->model->department_machines();
  }
  $data['dept'] = $this->d->findall();
  $data['title'] = "Installed Machine";

  $this->load->view("DMMS/dept_machines", $data);
 }

 public function department_machine_json($dept = null, $sec = null)
 {
  $data = $this->model->department_machines($dept, $sec);
  return $this->output
   ->set_content_type('application/json')
   ->set_status_header(200)
   ->set_output(json_encode($data));
 }


 public function install()
 {
  $data['dept'] = $this->d->findall();
  $machine = $this->model->getAllmachines();
  $data['machine'] = $machine;
  $data['title'] = "Machine Location";

  if ($this->input->method() == 'post') {
   $rules = array(
    array(
     'field' => 'department',
     'label' => 'Department',
     'rules' => 'required'
    ),
    array(
     'field' => 'section',
     'label' => 'Section',
     'rules' => 'required'
    ),
    array(
     'field' => 'quantity',
     'label' => 'Quantity',
     'rules' => 'required|greater_than[0]'
    )

   );

   $this->form_validation->set_rules($rules);

   if ($this->form_validation->run() == TRUE) {
    //
    redirect("index.php/machines/department");
    return;
   }
  }

  $this->load->view("DMMS/install_machine", $data);
 }
 public function update()
 {
  $Status = $this->input->post('onoffswitch');
  if ($Status == 'on') {
   $Status = 1;
  } else {
   $Status = 0;
  }
  $MID = $this->input->post('MID');
  $MachineName = $this->input->post('MachineName');
  $this->model->update($Status, $MID, $MachineName);
 }
 public function updatemac()
 {
  $Status = $this->input->post('onoffswitch');
  if ($Status == 'on') {
   $Status = 1;
  } else {
   $Status = 0;
  }
  $DMID = $this->input->post('DMID');
  $Sec = $this->input->post('SecID');
  $MachineName = $this->input->post('MachineName');

  $this->model->updatemac($Status, $DMID, $MachineName, $Sec);
 }
 public function insertion()
 {
  $MID = $this->input->post('machine');
  $department = $this->input->post('department');
  $section = $this->input->post('section');
  $Status = $this->input->post('onoffswitch');
  if ($Status == 'on') {
   $Status = 1;
  } else {
   $Status = 0;
  }
  $this->model->insertion($department, $MID, $section, $Status);
 }
 public function Editlocation($id)
 {
  $data['dept'] = $this->d->findall();
  $data['machine'] = $this->model->getAllmachines();
  $data['location'] = $this->model->machineLocations($id);

  $this->load->view("DMMS/machinelocation", $data);
 }
 public function updatelocation()
 {
  $DMID = $this->input->post('DMID');
  $MID = $this->input->post('machine');
  $department = $this->input->post('department');
  $section = $this->input->post('section');
  $Status = $this->input->post('onoffswitch');
  if ($Status == 'on') {
   $Status = 1;
  } else {
   $Status = 0;
  }
  $this->model->updatelocation($Status, $MID, $DMID, $department, $section);
 }
 public function Add()
 {
  $MID = $this->input->post('Machine');
  $SecID = $this->input->post('SecID');

  $data['getDeptID'] = $this->d->getDeptID($SecID);
  $Machine = $this->model->getmachienname($MID);
  //..print_r($Machine);
  $MacName = $Machine[0]->MachineName;

  $DeptiD = $data['getDeptID'][0]->DeptID;
  $this->model->insertionmac($DeptiD, $MID, $SecID, $MacName);
 }


 public function sectionwisemachine($DMID)
 {

  $data['SectionWIsemachine'] = $this->model->machineLocations($DMID);
  //print_r($data['SectionWIsemachine']);
  $machinename = $data['SectionWIsemachine'][0]['Name'];
  $DeptName = $data['SectionWIsemachine'][0]['DeptName'];
  $SecName = $data['SectionWIsemachine'][0]['SecName'];
  $MID = $data['SectionWIsemachine'][0]['MID'];
  $DeptID = $data['SectionWIsemachine'][0]['DeptID'];
  $SectionID = $data['SectionWIsemachine'][0]['SectionID'];
  $data['machinename'] = $machinename;
  $data['DeptName'] = $DeptName;
  $data['SecName'] = $SecName;

  $data['peremerters'] = $this->model->machienperemters($SectionID);
  $data['DMID'] = $DMID;
  $data['MID'] = $MID;
  $data['DeptID'] = $DeptID;
  $data['SectionID'] = $SectionID;
  $data['durations'] = $this->p->getDuration();
  $data['title'] = $DeptName . " / " . $SecName . " / " . $machinename;
  $data['team'] = $this->s->getTeam($DeptID);
  $Month = date('m');
  $Year = date('Y');
  $Day = date('d');
  $this->load->view("DMMS/sectionwisemachines", $data);
 }
 public function machine($DMID)
 {

  $data['SectionWIsemachine'] = $this->model->machineLocations($DMID);
  //print_r($data['SectionWIsemachine']);
  $machinename = $data['SectionWIsemachine'][0]['Name'];
  $DeptName = $data['SectionWIsemachine'][0]['DeptName'];
  $SecName = $data['SectionWIsemachine'][0]['SecName'];
  $MID = $data['SectionWIsemachine'][0]['MID'];
  $DeptID = $data['SectionWIsemachine'][0]['DeptID'];
  $SectionID = $data['SectionWIsemachine'][0]['SectionID'];
  $data['machinename'] = $machinename;
  $data['DeptName'] = $DeptName;
  $data['SecName'] = $SecName;

  $data['peremerters'] = $this->model->machienperemters($SectionID);
  $data['DMID'] = $DMID;
  $data['MID'] = $MID;
  $data['DeptID'] = $DeptID;
  $data['SectionID'] = $SectionID;
  $data['durations'] = $this->p->getDuration();
  $data['title'] = $DeptName . " / " . $SecName . " / " . $machinename;
  $data['team'] = $this->s->getTeam($DeptID);
  $Month = date('m');
  $Year = date('Y');
  $Day = date('d');
  $this->load->view("DMMS/Mainmachine", $data);
 }
 public function maintance($DMID)
 {

  $data['SectionWIsemachine'] = $this->model->machineLocations($DMID);
  //print_r($data['SectionWIsemachine']);
  $machinename = $data['SectionWIsemachine'][0]['Name'];
  $DeptName = $data['SectionWIsemachine'][0]['DeptName'];
  $SecName = $data['SectionWIsemachine'][0]['SecName'];
  $MID = $data['SectionWIsemachine'][0]['MID'];
  $DeptID = $data['SectionWIsemachine'][0]['DeptID'];
  $SectionID = $data['SectionWIsemachine'][0]['SectionID'];


  $data['peremerters'] = $this->model->machienperemters($SectionID);
  $data['DMID'] = $DMID;
  $data['MID'] = $MID;
  $data['DeptID'] = $DeptID;
  $data['SectionID'] = $SectionID;
  $data['durations'] = $this->p->getDuration();
  $data['title'] = $DeptName . " / " . $SecName . " / " . $machinename;
  $data['schedules'] = $this->s->getschedule($DMID);
  //print_r($data['schedules']);

  $data['team'] = $this->s->getTeam($DeptID);
  $Month = date('m');
  $Year = date('Y');
  $Day = date('d');
  $data['Working'] = $this->s->getworking($DMID);
  $this->load->view("DMMS/Miantance", $data);
 }
}