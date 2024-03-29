<div id="panel-1" class="panel">



  <?php $this->load->view('includes/new_header'); ?>

  <!-- BEGIN Page Wrapper -->
  <div class="page-wrapper">
    <div class="page-inner">
      <!-- BEGIN Left Aside -->
      <?php $this->load->view('includes/new_aside'); ?>
      <!-- END Left Aside -->
      <div class="page-content-wrapper">
        <!-- BEGIN Page Header -->
        <?php $this->load->view('includes/top_header.php'); ?>
        <main id="js-page-content" role="main" class="page-content">

          <div class="col-lg-12" style="margin-bottom:20px">
         
          <ol class="breadcrumb page-breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(
                                                                    'index.php/DashboardController'
                                                                ); ?>">Dashboard</a></li>
                                                                <li class="breadcrumb-item">Metal Detector</li>


                        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
                    </ol>

                    <div class="subheader">
                        <h1 class="subheader-title">
                            <i class='subheader-icon fal fa-chart-area'></i>Metal Detector</span>

                        </h1>
                    </div>
          <?php if ($this->session->userdata('userStus') == 1) { ?>

<style>
    section#counter-stats {
	display: flex;
	justify-content: center;
	margin-top: 100px;
}

.stats {
  text-align: center;
  font-size: 35px;
  font-weight: 700;
  font-family: 'Montserrat', sans-serif;
}

.stats .fa {
  color: #008080;
  font-size: 60px;
}
</style>
<body>

  <div id="right-panel" class="right-panel">

    <style>



    </style>
    <link href="<?php link_file(
        'assets/qa_assets/main.css'
    ); ?>" rel="stylesheet">





    <?php
    $Month = date('m');
    $Year = date('Y');
    $Day = date('d');
    $CurrentDate = $Year . '-' . $Month . '-' . $Day;
    ?>


    <!-- <div class="row clearfix"> -->
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><b>Date Filteration</b></h5>
        <div class="row clearfix">
          <div class="col-md-2" style="margin-right:20px;">
            <div class="form-group">
              <label class="form-control-label">From Date:</label>
              <div class="input-group">
                <input class="form-control" type="Date" id="SDate" name="Sdate" value="<?php echo $CurrentDate; ?>" style="width: 100%">
              </div>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label class="form-control-label">To Date:</label>
              <div class="input-group">
                <input class="form-control" type="Date" id="EDate" name="Edate" value="<?php echo $CurrentDate; ?>" style="width: 100%">
              </div>
            </div>
          </div>


          <div class="col-md-1">
            <div class="form-group">
              <label class=" form-control-label"></label>
              <div style="margin-top:18px" class="input-group">
                <button type="submit" id="submit" name="submit" onclick="MainFunction()" class="btn btn-success btn-block" style="border-radius: 15px;"><i class=" fa fa-search"></i> Search</button>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>


    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
          <div class="col-lg-12 stats" style="margin-top: 10%;">

				<i style="font-weight: bolder;color:black" class="fa fa-life-ring"" aria-hidden="true"></i>
				<div class="counting" data-count="75" style="color:black">0</div>
				<h5 style="font-weight: bolder;color:black">Metals Detected</h5>
			</div> 
          </div>
          <div class="col-md-6">
          <div class="card" style="height: 100%;border-radius:10%">
      <div class="card-body">
      <div class="col-lg-12" style="margin-top: 10%;">
      <h3 style="text-align: center;margin-top:10px;font-weight:bolder" id="titleTable"></h3>
      <div class="card-body" id="customTableDateRange">
			</div>  
    </div>
          </div>
          </div>
        </div>
      </div>
    </div>

    </div>

    <script src="<?php echo base_url(); ?>assets/js/chart.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>/assets/charts/highcharts.js"></script>
    <script src="<?php echo base_url(); ?>/assets/charts/data.js"></script>
    <script src="<?php echo base_url(); ?>/assets/charts/drilldown.js"></script>
    <script src="<?php echo base_url(); ?>/assets/charts/exporting.js"></script>
    <script src="<?php echo base_url(); ?>/assets/charts/export-data.js"></script>
    <script src="<?php echo base_url(); ?>/assets/charts/accessibility.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/vendors.bundle.js"></script>
      <script src="<?php echo base_url(); ?>/assets/js/app.bundle.js"></script>
      <script src="<?php echo base_url(); ?>/assets/js/statistics/peity/peity.bundle.js"></script>
      <script src="<?php echo base_url(); ?>/assets/js/statistics/flot/flot.bundle.js"></script>
      <script src="<?php echo base_url(); ?>/assets/js/statistics/easypiechart/easypiechart.bundle.js"></script>
      <script src="<?php echo base_url(); ?>/assets/js/datagrid/datatables/datatables.bundle.js"></script>
      <script type="text/javascript">




      

          /* Activate smart panels */
          $('#js-page-content').smartPanel();
      </script>
  
    <script>
      function MainFunction() {

        c_date = $('#SDate').val();
        e_date = $('#EDate').val();

        let splitDate = c_date.split("-");
       let newFormate = splitDate[2] + "-" +splitDate[1] + "-"+splitDate[0];

       let splitDateE = e_date.split("-");
       let newFormateE = splitDateE[2] + "-" +splitDateE[1] + "-"+splitDateE[0];
       $('#titleTable').html("")
       $('#titleTable').text(`Metal Detector Data ${newFormate} to ${newFormateE}`)

        url = "<?php echo base_url('MIS/MetalDetectorController/getChartDataRange'); ?>"
        url2 = "<?php echo base_url('MIS/MetalDetectorController/getTotalCountRange'); ?>"
        url3 = "<?php echo base_url('MIS/MetalDetectorController/getTableDataRange'); ?>"

$.post(url3,{"c_date": c_date,"e_date":e_date},function(data){
   $('#customTableDateRange').html("");
   let tableData = `<table id="exampleDataTable1" class="table table-striped table-bordered" style="width:100%">
<thead class="bg-primary-200 text-light" style="color: #fff;">
   <tr>
   <th>
   Date
   </th>
  
   <th>
   Machine Name
   </th>
 
 <th>
 Deduction Count
   </th>
   </tr>  </thead>
<tbody>`
data.forEach(element => {
    tableData += `
    <tr>
    <td>${element.Datee11}</td>
    
   
  
    <td>${element.MachineName}</td>
   
    <td>${element.DedCount}</td>
    </tr>` 
});

tableData += `</tbody>
</table>`

$("#customTableDateRange").append(tableData);
$("#exampleDataTable1").DataTable(
{ 

dom: 'Bfrtip',
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
        ],
"ordering":false,
"pageLength":10,
"searching":true,
"LengthChange":true,
"oLanguage":{"sEmptyTable":"Data Is Not Available Yet!"},

});
  
});

$.post(url2,{    
    "c_date": c_date,
    'e_date': e_date
},function(data){

    $('.counting').attr('data-count',`${data?parseInt(data[0].DedCount):0}`);

        $('.counting').each(function() {
        var $this = $(this),
        countTo = $this.attr('data-count');

        $({ countNum: $this.text()}).animate({
        countNum: countTo
        },

        {

        duration: 1300,
        easing:'linear',
        step: function() {
        $this.text(Math.floor(this.countNum));
        },
        complete: function() {
        $this.text(this.countNum);
        //alert('finished');
        }

        });  


        });
});
$.post(
    url,
    {
    "c_date": c_date,
    'e_date': e_date
    },
    function(data) {
        let m1 = [];
        let m2 = [];
        let m3 = [];
        let m4 = [];
        let m5 = [];
        let machinesNames = []
        let datesArray = []
 
        $.each(data, function(index, value) {
        if (datesArray.indexOf(value.Date) === -1) {
          datesArray.push(value.Date);
        }
        if(value.MachineName == 'Metal Ded 1'){
            m1.push(parseInt(value.DedCount));
        }
        else if (value.MachineName == 'Metal Ded 2'){
            m2.push(parseInt(value.DedCount));
        }
        else if (value.MachineName == 'Metal Ded 3'){
            m3.push(parseInt(value.DedCount));
        }
        else if (value.MachineName == 'Metal Ded 4'){
            m4.push(parseInt(value.DedCount));
        }
        else if (value.MachineName == 'Metal Ded 5'){
            m5.push(parseInt(value.DedCount));
        }
      });

      let seriesData = [{
          name: 'Metal Detector 1',
          data: m1
        },
        {
          name: 'Metal Detector 2',
          data: m2
        },
        {
          name: 'Metal Detector 3',
          data: m3
        },
        {
          name: 'Metal Detector 4',
          data: m4
        },
        {
          name: 'Metal Detector 5',
          data: m5
        }
      ]
        Highcharts.chart('DetectionBarChart', {
        chart: {
          type: 'column'
        },
        title: {
          text: `Metal Detection Count from ${newFormate} to ${newFormateE}`
        },

        xAxis: {
          categories: datesArray,
          crosshair: true
        },
        yAxis: {
          min: 0,
          title: {
            text: 'Detection Count'
          }
        },
        tooltip: {
          headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
          pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
          footerFormat: '</table>',
          shared: true,
          useHTML: true
        },
        plotOptions: {
          column: {
            pointPadding: 0.2,
            borderWidth: 0
          }
        },
        series: seriesData
      });
}

);

}

      window.onload = function() {
       let c_date = $('#SDate').val(); 
       let splitDate = c_date.split("-");
       let newFormate = splitDate[2] + "-" +splitDate[1] + "-"+splitDate[0];
       $('#titleTable').text(`Metal Detector Data ${newFormate}`)
        url = "<?php echo base_url('MIS/MetalDetectorController/getChartData'); ?>"
        url2 = "<?php echo base_url('MIS/MetalDetectorController/getTotalCount'); ?>"
        url3 = "<?php echo base_url('MIS/MetalDetectorController/getTableData'); ?>"

        $.post(url3,{"c_date": c_date,},function(data){
       
           let tableData = `<table id="exampleDataTable1" class="table table-striped table-bordered" style="width:100%">
        <thead class="bg-primary-200 text-light" style=" color: #fff;">
        <tr>
   <th>
   Date
   </th>
   
   <th>
   Machine Name
   </th>
 
 <th>
 Deduction Count
   </th>
   </tr>  </thead>
        <tbody>`
        data.forEach(element => {
            tableData += `
            <tr>
            <td>${element.Datee11}</td>
          
            <td>${element.MachineName}</td>
       
            <td>${element.DedCount}</td>
            </tr>` 
        });

        tableData += `</tbody>
   </table>`

   $("#customTableDateRange").append(tableData);
   
   $('#exampleDataTable1').dataTable({
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
  //  $("#exampleDataTable1").DataTable(
  //  { 
  
  //      dom: 'Bfrtip',
  //       buttons: [
  //           /*{
  //                   	extend:    'colvis',
  //                   	text:      'Column Visibility',
  //                   	titleAttr: 'Col visibility',
  //                   	className: 'mr-sm-3'
  //                   },*/
  //                   {
  //                       extend: 'pdfHtml5',
  //                       text: 'PDF',
  //                       titleAttr: 'Generate PDF',
  //                       className: 'btn-outline-danger btn-sm mr-1'
  //                   },
  //                   {
  //                       extend: 'excelHtml5',
  //                       text: 'Excel',
  //                       titleAttr: 'Generate Excel',
  //                       className: 'btn-outline-success btn-sm mr-1'
  //                   },
  //                   {
  //                       extend: 'csvHtml5',
  //                       text: 'CSV',
  //                       titleAttr: 'Generate CSV',
  //                       className: 'btn-outline-primary btn-sm mr-1'
  //                   },
  //                   {
  //                       extend: 'copyHtml5',
  //                       text: 'Copy',
  //                       titleAttr: 'Copy to clipboard',
  //                       className: 'btn-outline-primary btn-sm mr-1'
  //                   },
  //                   {
  //                       extend: 'print',
  //                       text: 'Print',
  //                       titleAttr: 'Print Table',
  //                       className: 'btn-outline-primary btn-sm'
  //                   }
  //       ],
  //     "ordering":false,
  //     "pageLength":10,
  //     "searching":true,
  //     "LengthChange":true,
  //     "oLanguage":{"sEmptyTable":"Data Is Not Available Yet!"},
    
  //   });
          
        });

        $.post(url2,{"c_date": c_date,},function(data){
  
            $('.counting').attr('data-count',`${data?parseInt(data[0].DedCount):0}`);

                $('.counting').each(function() {
                var $this = $(this),
                countTo = $this.attr('data-count');

                $({ countNum: $this.text()}).animate({
                countNum: countTo
                },

                {

                duration: 1300,
                easing:'linear',
                step: function() {
                $this.text(Math.floor(this.countNum));
                },
                complete: function() {
                $this.text(this.countNum);
                //alert('finished');
                }

                });  


                });
        });
        $.post(
            url,
            {
            "c_date": c_date,
            },
            function(data) {
                let m1 = [];
                let m2 = [];
                let m3 = [];
                let m4 = [];
                let m5 = [];
                let machinesNames = []
                let datesArray = []
 
                $.each(data, function(index, value) {
                if (datesArray.indexOf(value.Date) === -1) {
                  datesArray.push(value.Date);
                }
                if(value.MachineName == 'Metal Detector 1'){
                    m1.push(parseInt(value.DedCount));
                }
                else if (value.MachineName == 'Metal Detector 2'){
                    m2.push(parseInt(value.DedCount));
                }
                else if (value.MachineName == 'Metal Detector 3'){
                    m3.push(parseInt(value.DedCount));
                }
                else if (value.MachineName == 'Metal Detector 4'){
                    m4.push(parseInt(value.DedCount));
                }
                else if (value.MachineName == 'Metal Detector 5'){
                    m5.push(parseInt(value.DedCount));
                }
              });

              let seriesData = [{
                  name: 'Metal Ded 1',
                  data: m1
                },
                {
                  name: 'Metal Ded 2',
                  data: m2
                },
                {
                  name: 'Metal Ded 3',
                  data: m3
                },
                {
                  name: 'Metal Ded 4',
                  data: m4
                },
                {
                  name: 'Metal Ded 5',
                  data: m5
                }
              ]
                Highcharts.chart('DetectionBarChart', {
                chart: {
                  type: 'column'
                },
                title: {
                  text: `Metal Detection Count ${newFormate}`
                },

                xAxis: {
                  categories: datesArray,
                  crosshair: true
                },
                yAxis: {
                  min: 0,
                  title: {
                    text: 'Detection Count'
                  }
                },
                tooltip: {
                  headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                  pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
                  footerFormat: '</table>',
                  shared: true,
                  useHTML: true
                },
                plotOptions: {
                  column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                  }
                },
                series: seriesData
              });
        }

        );

      }

    </script>



  <?php } else {redirect('Welcome/index');}
?>

          </div>
        </main>
      </div>
    </div>
  </div>
</div>