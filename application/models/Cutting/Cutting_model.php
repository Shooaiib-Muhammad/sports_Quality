<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cutting_model extends CI_Model {

  public function machineCounter($s_date, $e_date)
  {
 
   $query = $this->db->query("SELECT      SUM(Counter) AS BallCounter, MachineName
   FROM            dbo.view_PC_Cutting_Process
   WHERE       (Date BETWEEN '$s_date' AND '$e_date')
   GROUP BY MachineName ORDER BY MachineName
   ");

  }

 public function HfCutting($currentDate)
 {
  $Month = date('m');
  $Year = date('Y');
  $Day = date('d');
  $Date=$Year.'-'.$Month.'-'.$Day;
  $query = $this->db->query("SELECT        Name, COUNT(Counter) AS Counter
  FROM            dbo.view_HF_Cutting
  WHERE        (Date = CONVERT(DATETIME, '$Date 00:00:00', 102))
  GROUP BY Name");
  
return  $query->result_array();
 }

 

}


// $data['poCounter'] = $this->RWPD->poCounter($_POST['Sdate'], $_POST['Edate']);


?>






<!-- // SELECT        MachineName, Counter, Date
// FROM            dbo.view_PC_Cutting_Process
// WHERE        (Date BETWEEN '17/05/2022' AND '17/05/2022') -->