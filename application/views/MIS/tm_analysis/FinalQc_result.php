<?php
if (!$this->session->has_userdata('user_id')) {
    redirect('');
} else {
?>

          <?php 

$dateArray = [];
$weightStart = [];
$weightEnd = [];
$weight = [];

$circumferenceStart = [];
$circumferenceEnd = [];
$circumference = [];
foreach ($Data as $key => $value) {

  array_push($dateArray,(string)$value['ArtCode']);
  array_push($weightStart,$value['StrtWeight']);
  array_push($weightEnd,$value['EndWeight']);
  array_push($weight,$value['Weight']);

  array_push($circumferenceStart,$value['StrtRange']);
  array_push($circumferenceEnd,$value['EndRange']);
  array_push($circumference,(($value['Circum1']+$value['Circum2']+$value['Circum3'])/3));


}


?>
<div class="table-responsive " style="width:100%; margin-top:100px; overflow:hidden;">
<table class="table table-hover " style="border: 1px gray solid; width:100%; margin-top:50px;">
    <thead class="bg-primary-200 text-light" style="color: #fffbfb;width:200px;" >
     <th style="text-align: center; width:200px;"><h4>  TM Final QC  Detail Between (<?php echo date("d/m/Y", strtotime($Sdate));?>) To (<?php echo date("d/m/Y", strtotime($Edate));?>) </h4></th>
  </thead>
</table>

<table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="forming-table">
  <thead class="bg-primary-200 text-light" style="border:2px solid black; color: #fff;  font-size: 15px;">
  <th>Serial No.</th>
  <th>Date</th>
  <th>Art Code</th>
  <th> Size</th>
  <th style="text-align: center;">Weight Range</th>
  <th style="text-align: center;">Weight</th>
  <th style="text-align: center;">Cir. Range</th>
  <th style="text-align: center;">Cir 1</th>
  <th style="text-align: center;">Cir 2</th>
  <th style="text-align: center;">Cir 3</th>
  <th style="text-align: center;">Circumfrances</th>
  </thead>
  <tbody>
<?php
$i=0;
foreach($Data as $Data1){
  $j=$i+1;
$ArtCode=$Data1['ArtCode'];
$Datee=$Data1['Dateee'];
$Weight=$Data1['Weight'];

$StrtWeight=$Data1['StrtWeight'];
$ArtSize=$Data1['ArtSize'];
$EndWeight=$Data1['EndWeight'];

$Circum1=$Data1['Circum1'];
$Circum2=$Data1['Circum2'];
$Circum3=$Data1['Circum3'];
$Circumfrances=($Circum1+$Circum2+$Circum3)/3;
$FinCircumfrances=$Circumfrances;
$StrtRange=$Data1['StrtRange'];
$EndRange=$Data1['EndRange'];
?>


<tr>
    <td style="text-align: left;"><?php Echo $j;?></td>
<td style="text-align: left;"><?php echo $Datee;?></td>
      <td style="text-align: left;"><?php echo $ArtCode;?></td>
<td style="text-align: center;"><?php echo $ArtSize;?></td>
<td style="text-align: right; color: green;"><?php echo Round($StrtWeight);?>-<?php echo Round($EndWeight);?></td>
<?php if(($Weight>$EndWeight) ||($Weight<$StrtWeight)){
?> <td style="text-align: right;color:#202020; background: red;"><?php echo Round($Weight);?></td> 
<?php }else{ 
  ?><td style="text-align: right;color: green;"><?php echo Round($Weight);?></td>
<?php } ?>
<td style="text-align: right; color: green;"><?php echo Round($StrtRange,2);?>-<?php echo Round($EndRange,2);?></td>
<td style="text-align: right;color: green;"><?php echo Round($Circum1,2);?></td>
<td style="text-align: right;color: green;"><?php echo Round($Circum2,2);?></td>
<td style="text-align: right;color: green;"><?php echo Round($Circum3,2);?></td>
<?php if(($FinCircumfrances>$EndRange) ||($FinCircumfrances<$StrtRange)){
?>
<td style="text-align: right;color:#202020; background: red;"><?php echo Round($FinCircumfrances,2);?></td>
<?php

}else{
  ?>
  <td style="text-align: right;color: green;"><?php echo Round($FinCircumfrances,2);?></td>
  <?php
}
?>
     </tr>
 <?php
  $i++;
}
?>

 </tbody>

</table>

</div>

<div class="col-md-12">
      <div class="card">
        <div class="card-body">
        <div id="container"></div>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
        <div id="containerCircumference"></div>
        </div>
      </div>
    </div>
    <?php
$this->load->View('AdminFooter');
?>
    <script src="<?php echo base_url(); ?>/assets/js/vendors.bundle.js"></script>
      <script src="<?php echo base_url(); ?>/assets/js/app.bundle.js"></script>
      <script src="<?php echo base_url(); ?>/assets/js/datagrid/datatables/datatables.bundle.js" ></script>
      <script type="text/javascript">
          /* Activate smart panels */
          $('#js-page-content').smartPanel();
      </script>
<script>
    Highcharts.chart('container', {

title: {
  text: 'Weigth wise Graph Between (<?php echo date("d/m/Y", strtotime($Sdate));?>) To (<?php echo date("d/m/Y", strtotime($Edate));?>)'
},

yAxis: {
  title: {
    text: 'Weights'
  }
},

xAxis: {
  title: {
    text: 'Article Code'
  },
  categories: <?php echo json_encode($dateArray);  ?>
},

legend: {
  layout: 'vertical',
  align: 'right',
  verticalAlign: 'middle'
},

// plotOptions: {
//   series: {
//     label: {
//       connectorAllowed: false
//     },
//     pointStart: 2010
//   }
// },

series: [

  
  {
  name: 'Weight Start',
  data: [<?php echo implode(",",$weightStart) ?>]
},{
  name: 'Weight',
  color:'red',
  data: [<?php echo implode(",",$weight) ?>]
},
{
  name: 'Weight End',
  data: [<?php echo implode(",",$weightEnd) ?>]
}
],

responsive: {
  rules: [{
    condition: {
      maxWidth: 500
    },
    chartOptions: {
      legend: {
        layout: 'horizontal',
        align: 'center',
        verticalAlign: 'bottom'
      }
    }
  }]
}

});

Highcharts.chart('containerCircumference', {

title: {
  text: 'Circumference wise Graph Between (<?php echo date("d/m/Y", strtotime($Sdate));?>) To (<?php echo date("d/m/Y", strtotime($Edate));?>)'
},

yAxis: {
  title: {
    text: 'Circumference'
  }
},

xAxis: {
  title: {
    text: 'Article Code'
  },
  categories: <?php echo json_encode($dateArray);  ?>
},

legend: {
  layout: 'vertical',
  align: 'right',
  verticalAlign: 'middle'
},

// plotOptions: {
//   series: {
//     label: {
//       connectorAllowed: false
//     },
//     pointStart: 2010
//   }
// },

series: [

  
  {
  name: 'Circumference Start',
  data: [<?php echo implode(",",$circumferenceStart) ?>]
},{
  name: 'Circumference',
  color:'red',
  data: [<?php echo implode(",",$circumference) ?>]
},
{
  name: 'Circumference End',
  data: [<?php echo implode(",",$circumferenceEnd) ?>]
}
],

responsive: {
  rules: [{
    condition: {
      maxWidth: 500
    },
    chartOptions: {
      legend: {
        layout: 'horizontal',
        align: 'center',
        verticalAlign: 'bottom'
      }
    }
  }]
}

});

$('#forming-table').dataTable({
                responsive: false,
                lengthChange: false,
                dom:
                    /*	--- Layout Structure 
                    	--- Options
                    	l	-	length changing input control
                    	f	-	filtering input
                    	t	-	The table!
                    	i	-	Table information summary
                    	p	-	pagination control
                    	r	-	processing display element
                    	B	-	buttons
                    	R	-	ColReorder
                    	S	-	Select

                    	--- Markup
                    	< and >				- div element
                    	<"class" and >		- div with a class
                    	<"#id" and >		- div with an ID
                    	<"#id.class" and >	- div with an ID and a class

                    	--- Further reading
                    	https://datatables.net/reference/option/dom
                    	--------------------------------------
                     */
                    "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                buttons: [
                    /*{
                    	extend:    'colvis',
                    	text:      'Column Visibility',
                    	titleAttr: 'Col visibility',
                    	className: 'mr-sm-3'
                    },*/
                    {
                        extend: 'pdfHtml5',
                        text: 'PDF',
                        titleAttr: 'Generate PDF',
                        className: 'btn-outline-danger btn-sm mr-1'
                    },
                    {
                        extend: 'excelHtml5',
                        text: 'Excel',
                        titleAttr: 'Generate Excel',
                        className: 'btn-outline-success btn-sm mr-1'
                    },
                    {
                        extend: 'csvHtml5',
                        text: 'CSV',
                        titleAttr: 'Generate CSV',
                        className: 'btn-outline-primary btn-sm mr-1'
                    },
                    {
                        extend: 'copyHtml5',
                        text: 'Copy',
                        titleAttr: 'Copy to clipboard',
                        className: 'btn-outline-primary btn-sm mr-1'
                    },
                    {
                        extend: 'print',
                        text: 'Print',
                        titleAttr: 'Print Table',
                        className: 'btn-outline-primary btn-sm'
                    }
                ]
            });
</script>
         

<?php 
}
?>