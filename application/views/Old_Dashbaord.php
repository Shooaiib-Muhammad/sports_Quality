<?php

if (!$this->session->has_userdata('user_id')) {
 redirect('');
} else {
?>

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
     <!-- 
                    <div class="subheader">
                        <h1 class="subheader-title">
                            <i class='subheader-icon fal fa-chart-area'></i> Dashboard</span>

                        </h1>
                    </div> -->

     <style>
      .table th,
      .table td {
       padding: 4px;
       vertical-align: top;
       border-top: 1px solid #e9e9e9;
      }

      @import url("https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap");

      :root {
       --color-accent: rgb(112, 71, 235);
       --background-color: #f8f7fa;
       --foreground-color: #ffffff;
       --text-color: #19181a;
       --highlight-text-color: var(--text-color);
       --active-text-color: #f8f7fa;
       --inactive-text-color: #a5a5a5;
       --btn-bg: #f8f7fa;
       --box-shadow: #efefef;

       --border-width: 1px;
       --border-radius: 15px;
       --spacing: 18px;
      }

      @media (prefers-color-scheme: dark) {
       :root {
        --background-color: #19181a;
        --foreground-color: #282729;
        --text-color: #c9c8cc;
        --highlight-text-color: #f8f7fa;
        --inactive-text-color: #68676a;
        --btn-bg: #313133;
        --box-shadow: #111111;
       }
      }

      * {
       margin: 0;
       padding: 0;
      }

      .card {
       width: 340px;
       height: fit-content;
       background-color: var(--foreground-color);
       border-radius: var(--border-radius);
       box-shadow: 0px 0px 10px var(--box-shadow);
      }

      .calendar-toolbar {
       display: flex;
       justify-content: space-between;
       align-items: center;
       padding: 20px;
       padding-bottom: 15px;
       border-bottom: var(--border-width) solid var(--box-shadow);
      }

      .calendar-toolbar>.current-month {
       font-size: 20px;
       font-weight: bold;
       color: var(--highlight-text-color);
      }

      .calendar-toolbar>[class$="month-btn"] {
       width: 40px;
       aspect-ratio: 1;
       text-align: center;
       line-height: 40px;
       font-size: 14px;
       color: var(--highlight-text-color);
       background: var(--btn-bg);
       border: none;
       border-radius: var(--border-radius);
      }

      .weekdays,
      .calendar-days {
       display: flex;
       flex-wrap: wrap;
       padding-inline: var(--spacing);
      }

      .weekdays {
       padding-top: 12px;
      }

      .calendar-days {
       padding-bottom: 12px;
      }

      .weekday-name,
      [class$="-day"] {
       width: 40px;
       height: 40px;
       color: var(--text-color);
       text-align: center;
       line-height: 40px;
       font-weight: 500;
       font-size: 1rem;
      }

      .weekday-name {
       color: var(--highlight-text-color);
       font-weight: 700;
      }

      .current-day {
       background-color: var(--color-accent);
       color: var(--active-text-color);
       border-radius: var(--border-radius);
       font-weight: 700;
       transition: 0.5s;
       cursor: pointer;
      }

      .padding-day {
       color: var(--inactive-text-color);
       user-select: none;
      }

      .calendar-toolbar>[class$="month-btn"]:hover,
      .month-day:hover,
      .btnCustom:hover {
       border-radius: var(--border-radius);
       background-color: var(--btn-bg);
       color: var(--color-accent);
       border-radius: var(--border-radius);
       transition: 0.1s;
       cursor: pointer;
       box-shadow: inset 0px 0px 0px 1.5px var(--color-accent);
      }

      .calendar-toolbar>[class$="month-btn"]:focus,
      .month-day:focus,
      .btnCustom:focus {
       border-radius: var(--border-radius);
       background-color: var(--color-accent);
       color: var(--active-text-color);
      }

      .goto-buttons {
       border-top: var(--border-width) solid var(--box-shadow);
       padding-block: 18px;
       display: flex;
       justify-content: space-evenly;
      }

      .btnCustom {
       background: var(--btn-bg);
       border: none;
       border-radius: var(--border-radius);
       padding: 11px 13px;
       color: var(--highlight-text-color);
       font-family: "Quicksand", sans-serif;
       font-weight: 600;
       font-size: 0.9rem;
       margin-right: 1px;
       box-shadow: 0px 0px 0px var(--box-shadow);
      }
     </style>
     <script src="https://code.highcharts.com/highcharts.js"></script>
     <script src="https://code.highcharts.com/modules/variable-pie.js"></script>
     <script src="https://code.highcharts.com/modules/exporting.js"></script>
     <script src="https://code.highcharts.com/modules/export-data.js"></script>
     <script src="https://code.highcharts.com/modules/accessibility.js"></script>

     <div class="row">
      <div class="col-lg-12">
       <div class="panel-container show">
        <div class="panel-content poisition-relative">
         <div class="pb-5 pt-3">
          <div class="row">
           <div class="subheader-block d-lg-flex align-items-center border-faded border-right-0 border-top-0 border-bottom-0 ml-3 pl-3">
            <div class="d-inline-flex flex-column justify-content-center mr-3">
             <span class="fw-300 fs-xs d-block">
              <label class="fs-sm mb-0">Total Ball Manufactured</label>
             </span>
             <span class="fw-500 fs-xl d-block color-danger-500 count">
              38500
             </span>
            </div>
            <span class="sparklines hidden-lg-down" sparkType="bar" sparkBarColor="#cff02b" sparkHeight="32px" sparkBarWidth="5px" values="1,4,3,6,5,3,9,6,5,9,7"></span>
           </div>
           <div class="subheader-block d-lg-flex align-items-center border-faded border-right-0 border-top-0 border-bottom-0 ml-3 pl-3">
            <div class="d-inline-flex flex-column justify-content-center mr-3">
             <span class="fw-300 fs-xs d-block">
              <label class="fs-sm mb-0">Avg. RFT</label>
             </span>
             <span class="fw-500 fs-xl d-block color-danger-500 ">
              <i class="count"> 98.58</i> %
             </span>
            </div>
            <span class="sparklines hidden-lg-down" sparkType="bar" sparkBarColor="#03cafc" sparkHeight="32px" sparkBarWidth="5px" values="1,4,3,6,5,3,9,6,5,9,7"></span>
           </div>
           <div class="subheader-block d-lg-flex align-items-center border-faded border-right-0 border-top-0 border-bottom-0 ml-3 pl-3">
            <div class="d-inline-flex flex-column justify-content-center mr-3">
             <span class="fw-300 fs-xs d-block">
              <label class="fs-sm mb-0">Total Defected Balls</label>
             </span>
             <span class="fw-500 fs-xl d-block color-danger-500 count">
              200
             </span>
            </div>
            <span class="sparklines hidden-lg-down" sparkType="bar" sparkBarColor="#fc0339" sparkHeight="32px" sparkBarWidth="5px" values="1,4,3,6,5,3,9,6,5,9,7"></span>
           </div>

           <div class="subheader-block d-lg-flex align-items-center border-faded border-right-0 border-top-0 border-bottom-0 ml-3 pl-3">
            <div class="d-inline-flex flex-column justify-content-center mr-3">
             <span class="fw-300 fs-xs d-block">
              <label class="fs-sm mb-0">Defected Ball Precentage </label>
             </span>
             <span class="fw-500 fs-xl d-block color-danger-500">
              <i class="count"> 1.58</i> %
             </span>
            </div>
            <span class="sparklines hidden-lg-down" sparkType="bar" sparkBarColor="#c203fc" sparkHeight="32px" sparkBarWidth="5px" values="1,4,3,6,5,3,9,6,5,9,7"></span>

            <div class="subheader-block d-lg-flex align-items-center border-faded border-right-0 border-top-0 border-bottom-0 ml-3 pl-3">
             <div class="d-inline-flex flex-column justify-content-center mr-3">
              <span class="fw-300 fs-xs d-block">
               <label class="fs-sm mb-0">Total Checked</label>
              </span>
              <span class="fw-500 fs-xl d-block color-danger-500 count">
               20000
              </span>
             </div>
             <span class="sparklines hidden-lg-down" sparkType="bar" sparkBarColor="#fc8c03" sparkHeight="32px" sparkBarWidth="5px" values="1,4,3,6,5,3,9,6,5,9,7"></span>
            </div>
            <div class="subheader-block d-lg-flex align-items-center border-faded border-right-0 border-top-0 border-bottom-0 ml-3 pl-3">
             <div class="d-inline-flex flex-column justify-content-center mr-3">
              <span class="fw-300 fs-xs d-block">
               <label class="fs-sm mb-0">Total Pass Ball</label>
              </span>
              <span class="fw-500 fs-xl d-block color-danger-500 count">
               15000
              </span>
             </div>
             <span class="sparklines hidden-lg-down" sparkType="bar" sparkBarColor="#03fce3" sparkHeight="32px" sparkBarWidth="5px" values="1,4,3,6,5,3,9,6,5,9,7"></span>
            </div>
            <div class="subheader-block d-lg-flex align-items-center border-faded border-right-0 border-top-0 border-bottom-0 ml-3 pl-3">
             <div class="d-inline-flex flex-column justify-content-center mr-3">
              <span class="fw-300 fs-xs d-block">
               <label class="fs-sm mb-0">Total Fail Ball</label>
              </span>
              <span class="fw-500 fs-xl d-block color-danger-500 count">
               5000
              </span>
             </div>
             <span class="sparklines hidden-lg-down" sparkType="bar" sparkBarColor="#fe6bb0" sparkHeight="32px" sparkBarWidth="5px" values="1,4,3,6,5,3,9,6,5,9,7"></span>

            </div>
           </div>
          </div>
         </div>

        </div>
       </div>

      </div>
      <div class="col-md-8">

       <div id="panel-3" class="panel">
        <div class="panel-hdr color-success-600">
         <h2>
          <!-- Dashboard  <span class="fw-300"><i></i></span> -->
         </h2>
         <div class="panel-toolbar">
          <!-- <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button> -->
         </div>
        </div>

        <div class="panel-container show">
         <div class="panel-content">
          <div class="row">
           <!-- <div class="col-md-4">
                                <div class="col-sm-12 col-xl-12">
                                <div class="p-3 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g">
                                    <div class="">
                                        <h3 class="display-4 d-block l-h-n m-0 fw-500">
                                            45000
                                      
                                        </h3>
                                        <p style="font-weight: bolder;font-size:large">B34001</p>
                                    </div>
                                    <i class="fal fa-futbol position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
                                </div>
                            </div>
                                </div> -->

           <div class="col-md-3">
            <div class="col-sm-12">
             <div style="background-color: #414A76;" class="p-3 rounded overflow-hidden position-relative text-white mb-g ">
              <div class="">

               <p style="display: inline;font-weight:bolder;font-size:large">Hand Stitched Ball:</p> <br>
               <!-- <div class="counting2Fail" data-count="<?php echo count($TM) >= 1 ? $TM[0]['Fail'] : 0 ?>" style="color:white;display: inline;font-weight:bolder;font-size:large"></div> -->


               <p style="display:inline;bolder;font-size:small;">B34001: </p><br>

               <p style="display: inline;font-weight:bolder;font-size:large;"> Today Produced: <i class="count"> 200 </i></p><br>
               <p style="display: inline;font-weight:bolder;font-size:large;"> yesterday Produced: <i class="count"> 200 </i></p><br>
               <p style="display: inline;font-weight:bolder;font-size:large;">Quality Dashbaord</p><br>

               <p style="display:inline;bolder;font-size:small;">Avg RFT %: </p><br>
               <p style="display:inline;bolder;font-size:small;">Yesterday RFT %: </p><br>
               <p style="display:inline;bolder;font-size:small;">Predictive RFT %: </p><br>
               <p style="display:inline;bolder;font-size:small;">Checked: </p><br>
               <p style="display:inline;bolder;font-size:small;">Pass: </p><br>
               <p style="display:inline;bolder;font-size:small;">Fail: </p><br>
              </div>
              <i class="fal fa-futbol position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
             </div>
            </div>
           </div>
           <div class="col-md-3">
            <div class="col-sm-12">
             <div style="background-color: #86C748;" class="p-3  rounded overflow-hidden position-relative text-white mb-g ">
              <div class="">
               <p style="display: inline;font-weight:bolder;font-size:large">Competition Ball :</p> <br>



               <p style="display:inline;bolder;font-size:small;">B34002: </p><br>
               <p style="display: inline;font-weight:bolder;font-size:large;"> Today Produced: <i class="count"> 200 </i></p><br>
               <p style="display: inline;font-weight:bolder;font-size:large;"> yesterday Produced: <i class="count"> 200 </i></p><br>
               <p style="display: inline;font-weight:bolder;font-size:large;">Quality Dashbaord</p><br>
               <p style="display:inline;bolder;font-size:small;">Avg RFT %: </p><br>
               <p style="display:inline;bolder;font-size:small;">Yesterday RFT %: </p><br>
               <p style="display:inline;bolder;font-size:small;">Predictive RFT %: </p><br>
               <p style="display:inline;bolder;font-size:small;">Checked: </p><br>
               <p style="display:inline;bolder;font-size:small;">Pass: </p><br>
               <p style="display:inline;bolder;font-size:small;">Fail: </p><br>
              </div>
              <i class="fal fa-futbol position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
             </div>
            </div>
           </div>
           <div class="col-md-3">
            <div class="col-sm-12 col-xl-12">
             <div style="background-color: #1FD3E6;" class="p-3 rounded overflow-hidden position-relative text-white mb-g ">
              <div class="">
               <p style="display: inline;font-weight:bolder;font-size:large">Finale Ball:</p> <br>
               <!-- <div class="counting2Fail" data-count="<?php echo count($TM) >= 1 ? $TM[0]['Fail'] : 0 ?>" style="color:white;display: inline;font-weight:bolder;font-size:large"></div> -->


               <p style="display:inline;bolder;font-size:small;">B34003: </p><br>
               <p style="display: inline;font-weight:bolder;font-size:large;"> Today Produced: <i class="count"> 200 </i></p><br>
               <p style="display: inline;font-weight:bolder;font-size:large;"> yesterday Produced: <i class="count"> 200 </i></p><br>
               <p style="display: inline;font-weight:bolder;font-size:large;">Quality Dashbaord</p><br>
               <p style="display:inline;bolder;font-size:small;">Avg RFT %: </p><br>
               <p style="display:inline;bolder;font-size:small;">Yesterday RFT %: </p><br>
               <p style="display:inline;bolder;font-size:small;">Predictive RFT %: </p><br>
               <p style="display:inline;bolder;font-size:small;">Checked: </p><br>
               <p style="display:inline;bolder;font-size:small;">Pass: </p><br>
               <p style="display:inline;bolder;font-size:small;">Fail: </p><br>
              </div>
              <i class="fal fa-futbol position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
             </div>
            </div>
           </div>
           <div class="col-md-3">
            <div class="col-sm-12 col-xl-12">
             <div style="background-color: #21AD77;" class="p-3  rounded overflow-hidden position-relative text-white mb-g ">
              <div class="">
               <p style="display: inline;font-weight:bolder;font-size:large">Urban Ball:</p> <br>

               <p style="display:inline;bolder;font-size:small;">B34004: </p><br>
               <p style="display: inline;font-weight:bolder;font-size:large;"> Today Produced: <i class="count"> 200 </i></p><br>
               <p style="display: inline;font-weight:bolder;font-size:large;"> yesterday Produced: <i class="count"> 200 </i></p><br>
               <p style="display: inline;font-weight:bolder;font-size:large;">Quality Dashbaord</p><br>
               <p style="display:inline;bolder;font-size:small;">Avg RFT %: </p><br>
               <p style="display:inline;bolder;font-size:small;">Yesterday RFT %: </p><br>
               <p style="display:inline;bolder;font-size:small;">Predictive RFT %: </p><br>
               <p style="display:inline;bolder;font-size:small;">Checked: </p><br>
               <p style="display:inline;bolder;font-size:small;">Pass: </p><br>
               <p style="display:inline;bolder;font-size:small;">Fail: </p><br>
              </div>
              <i class="fal fa-futbol position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
             </div>
            </div>
           </div>
           <div class="col-md-3">
            <div class="col-sm-12 col-xl-12">
             <div style="background-color: #47BC70;" class="p-3 rounded overflow-hidden position-relative text-white mb-g ">
              <div class="">
               <p style="display: inline;font-weight:bolder;font-size:large">Machine Stitch Ball:</p> <br>


               <p style="display:inline;bolder;font-size:small;">B34005: </p><br>
               <p style="display: inline;font-weight:bolder;font-size:large;"> Today Produced: <i class="count"> 200 </i></p><br>
               <p style="display: inline;font-weight:bolder;font-size:large;"> yesterday Produced: <i class="count"> 200 </i></p><br>
               <p style="display: inline;font-weight:bolder;font-size:large;">Quality Dashbaord</p><br>
               <p style="display:inline;bolder;font-size:small;">Avg RFT %: </p><br>
               <p style="display:inline;bolder;font-size:small;">Yesterday RFT %: </p><br>
               <p style="display:inline;bolder;font-size:small;">Predictive RFT %: </p><br>
               <p style="display:inline;bolder;font-size:small;">Checked: </p><br>
               <p style="display:inline;bolder;font-size:small;">Pass: </p><br>
               <p style="display:inline;bolder;font-size:small;">Fail: </p><br>
              </div>
              <i class="fal fa-futbol position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
             </div>
            </div>
           </div>
           <div class="col-md-3">
            <div class="col-sm-12 col-xl-12">
             <div style="background-color: #254887" class="p-3 rounded overflow-hidden position-relative text-white mb-g ">
              <div class="">
               <p style="display: inline;font-weight:bolder;font-size:large">Airless Mini Ball:</p> <br>
               <!-- <div class="counting2Fail" data-count="<?php echo count($TM) >= 1 ? $TM[0]['Fail'] : 0 ?>" style="color:white;display: inline;font-weight:bolder;font-size:large"></div> -->


               <p style="display:inline;bolder;font-size:small;">B34006: </p><br>
               <p style="display: inline;font-weight:bolder;font-size:large;"> Today Produced: <i class="count"> 200 </i></p><br>
               <p style="display: inline;font-weight:bolder;font-size:large;"> yesterday Produced: <i class="count"> 200 </i></p><br>
               <p style="display: inline;font-weight:bolder;font-size:large;">Quality Dashbaord</p><br>
               <p style="display:inline;bolder;font-size:small;">Avg RFT %: </p><br>
               <p style="display:inline;bolder;font-size:small;">Yesterday RFT %: </p><br>
               <p style="display:inline;bolder;font-size:small;">Predictive RFT %: </p><br>
               <p style="display:inline;bolder;font-size:small;">Checked: </p><br>
               <p style="display:inline;bolder;font-size:small;">Pass: </p><br>
               <p style="display:inline;bolder;font-size:small;">Fail: </p><br>
              </div>
              <i class="fal fa-futbol position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
             </div>
            </div>
           </div>
           <div class="col-md-3">
            <div class="col-sm-12 col-xl-12">
             <div style="background-color: #EEB0AF;" class="p-3  rounded overflow-hidden position-relative text-white mb-g ">
              <div class="">
               <p style="display: inline;font-weight:bolder;font-size:large">Laminated Ball:</p> <br>
               <!-- <div class="counting2Fail" data-count="<?php echo count($TM) >= 1 ? $TM[0]['Fail'] : 0 ?>" style="color:white;display: inline;font-weight:bolder;font-size:large"></div> -->


               <p style="display:inline;bolder;font-size:small;">B34007: </p><br>
               <p style="display: inline;font-weight:bolder;font-size:large;"> Today Produced: <i class="count"> 200 </i></p><br>
               <p style="display: inline;font-weight:bolder;font-size:large;"> yesterday Produced: <i class="count"> 200 </i></p><br>
               <p style="display: inline;font-weight:bolder;font-size:large;">Quality Dashbaord</p><br>
               <p style="display:inline;bolder:font-size:small;">Avg RFT %: </p><br>
               <p style="display:inline;bolder:font-size:small;">Yesterday RFT %: </p><br>
               <p style="display:inline;bolder:font-size:small;">Predictive RFT %: </p><br>
               <p style="display:inline;bolder:font-size:small;">Checked: </p><br>
               <p style="display:inline;bolder:font-size:small;">Pass: </p><br>
               <p style="display:inline;bolder:font-size:small;">Fail: </p><br>
              </div>
              <i class="fal fa-futbol position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
             </div>
            </div>
           </div>
           <div class="col-md-3">
            <!-- <div id="container" style="width:100%; height:300px;"></div> -->
            <canvas id="myChart" width="400" height="400"></canvas>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
           </div>


          </div>
         </div>
        </div>
       </div>
      </div>
      <!-- <div class="col-md-4">
                            <div class="card" style="margin-left: 45px;">
                                <div class="calendar-toolbar">
                                    <button class="prev month-btn"><i class="fal fa-chevron-left"></i></button>
                                    <div class="current-month"></div>
                                    <button class="next month-btn"><i class="fal fa-chevron-right"></i></button>
                                </div>
                                <div class="calendar">
                                    <div class="weekdays">
                                        <div class="weekday-name">Sa</div>
                                        <div class="weekday-name">Su</div>
                                        <div class="weekday-name">Mo</div>
                                        <div class="weekday-name">Tu</div>
                                        <div class="weekday-name">We</div>
                                        <div class="weekday-name">Th</div>
                                        <div class="weekday-name">Fr</div>
                                    </div>
                                    <div class="calendar-days"></div>
                                </div>
                                <div class="goto-buttons">
                                    <button type="button" class="btnCustom prev-year">Prev Year</button>
                                    <button type="button" class="btnCustom today">Today</button>
                                    <button type="button" class="btnCustom next-year">Next Year</button>
                                </div>
                            </div>
                        </div>  -->
      <div class="col-md-4">
       <div id="panel-3" class="panel">
        <div class="panel-hdr color-success-600">

         <div class="panel-toolbar">
          <!-- <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button> -->
         </div>
        </div>
        <div class="panel-container show">
         <div class="panel-content">
          <div class="row">
           <div class="panel-container show">
            <div id="container"></div>
            <div id="container1"></div>
           </div>
          </div>
         </div>
        </div>
       </div>
      </div>
     </div>
   </div>





  </div>
 </div>
 </div>
 <script src="<?php echo base_url(); ?>/assets/js//jquery.min.js" type="text/javascript"></script>
 <script src="<?php echo base_url(); ?>/assets/js/statistics/peity/peity.bundle.js"></script>
 <script src="<?php echo base_url(); ?>/assets/js/statistics/flot/flot.bundle.js"></script>
 <script src="<?php echo base_url(); ?>/assets/js/statistics/easypiechart/easypiechart.bundle.js"></script>
 <script src="<?php echo base_url(); ?>/assets/js/datagrid/datatables/datatables.bundle.js"></script>
 <script src="js/statistics/sparkline/sparkline.bundle.js"></script>
 <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->
 <!-- BEGIN Page Footer -->
 <footer class="page-footer" role="contentinfo">
  <div class="d-flex align-items-center flex-1 text-muted">
   <span class="hidden-md-down fw-700">2021 © Forward Sports by&nbsp;IT Dept Forward Sports</span>
  </div>
  <div>

  </div>
 </footer>
 <script src="<?php echo base_url(); ?>/assets/js/statistics/peity/peity.bundle.js"></script>
 <script src="<?php echo base_url(); ?>/assets/js/statistics/flot/flot.bundle.js"></script>
 <script src="<?php echo base_url(); ?>/assets/js/statistics/easypiechart/easypiechart.bundle.js"></script>
 <script src="<?php echo base_url(); ?>/assets/js/datagrid/datatables/datatables.bundle.js"></script>

 <script src="<?php echo base_url(); ?>/assets/js/vendors.bundle.js"></script>
 <script src="<?php echo base_url(); ?>/assets/js/app.bundle.js"></script>
 <!-- sparkline bundle: 
		+ jquery.sparkline.js (core)
		+ src/../jquery.sparkline.config.js (config) -->
 <script src="<?php echo base_url(); ?>/assets/js/statistics/sparkline/sparkline.bundle.js"></script>
 <script src="<?php echo base_url(); ?>/assets/js/vendors.bundle.js"></script>
 <script src="<?php echo base_url(); ?>/assets/js/app.bundle.js"></script>
 <!-- dependency for c3 charts : this dependency is a BSD license with clause 3 -->
 <script src="j<?php echo base_url(); ?>/assets/s/statistics/d3/d3.js"></script>
 <!-- c3 charts : MIT license -->
 <script src="<?php echo base_url(); ?>/assets/js/statistics/c3/c3.js"></script>
 <script src="<?php echo base_url(); ?>/assets/js/statistics/demo-data/demo-c3.js"></script>

 <script>
  $('.count').each(function() {
   $(this).prop('Counter', 0).animate({
    Counter: $(this).text()
   }, {
    duration: 4000,
    easing: 'swing',
    step: function(now) {
     $(this).text(Math.ceil(now));
    }
   });
  });
  Highcharts.chart('container1', {

   title: {
    text: 'Weekly produciton'
   },



   yAxis: {
    title: {
     text: 'Number of Balls'
    }
   },

   xAxis: {
    accessibility: {
     rangeDescription: 'Range: 2010 to 2017'
    }
   },

   legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'middle'
   },

   plotOptions: {
    series: {
     label: {
      connectorAllowed: false
     },
     pointStart: 2010
    }
   },

   series: [{
    name: 'B34001',
    data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
   }, {
    name: 'B34002',
    data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
   }, {
    name: 'B34003',
    data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
   }, {
    name: 'B34004',
    data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
   }, {
    name: 'B34005',
    data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
   }],

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
  // Highcharts.chart('container', {
  //     chart: {
  //         type: 'variablepie'
  //     },
  //     series: [{
  //         minPointSize: 10,
  //         innerSize: '40%',
  //         zMin: 0,
  //         name: 'countries',
  //         data: [{
  //             name: 'Spain',
  //             y: 505370,
  //             z: 92.9
  //         }, {
  //             name: 'France',
  //             y: 551500,
  //             z: 118.7
  //         }]
  //     }]
  // });
  Highcharts.chart('container', {
   chart: {
    type: 'bar'
   },
   title: {
    text: 'Today Production'
   },
   subtitle: {
    // text: 'Source: <a href="https://en.wikipedia.org/wiki/World_population">Wikipedia.org</a>'
   },
   xAxis: {
    categories: ['B34001', 'B34002', 'B34003', 'B34004', 'B34005'],
    title: {
     text: null
    }
   },
   yAxis: {
    min: 0,
    title: {
     text: 'No of Balls',
     align: 'high'
    },
    labels: {
     overflow: 'justify'
    }
   },
   tooltip: {
    valueSuffix: ' millions'
   },
   plotOptions: {
    bar: {
     dataLabels: {
      enabled: true
     }
    }
   },
   legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'top',
    x: -40,
    y: 80,
    floating: true,
    borderWidth: 1,
    backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
    shadow: true
   },
   credits: {
    enabled: false
   },
   series: [{
    name: 'Produced',
    data: [107, 31, 635, 203, 2]
   }]
  });

  const ctx = document.getElementById('myChart').getContext('2d');

  const myChart = new Chart(ctx, {
   type: 'doughnut',
   data: {
    labels: ['Check', 'Pass', 'Fail'],
    datasets: [{
     label: '# of Votes',
     data: [12, 19, 20],
     backgroundColor: [

      'rgb(54, 162, 235)',
      'rgb(255, 99, 132)',
      'rgb(255, 205, 86)'

     ],
     borderColor: [

      'rgb(54, 162, 235)',
      'rgb(255, 99, 132)',
      'rgb(255, 205, 86)'


     ],
     borderWidth: 1
    }]
   }
  });
 </script>
 <!-- END Page Footer -->
 <!-- BEGIN Shortcuts -->
 <div class="modal fade modal-backdrop-transparent" id="modal-shortcut" tabindex="-1" role="dialog" aria-labelledby="modal-shortcut" aria-hidden="true">
  <div class="modal-dialog modal-dialog-top modal-transparent" role="document">
   <div class="modal-content">
    <div class="modal-body">
     <ul class="app-list w-auto h-auto p-0 text-left">
      <li>
       <a href="intel_introduction.html" class="app-list-item text-white border-0 m-0">
        <div class="icon-stack">
         <i class="base base-7 icon-stack-3x opacity-100 color-primary-500 "></i>
         <i class="base base-7 icon-stack-2x opacity-100 color-primary-300 "></i>
         <i class="fal fa-home icon-stack-1x opacity-100 color-white"></i>
        </div>
        <span class="app-list-name">
         Home
        </span>
       </a>
      </li>
      <li>
       <a href="page_inbox_general.html" class="app-list-item text-white border-0 m-0">
        <div class="icon-stack">
         <i class="base base-7 icon-stack-3x opacity-100 color-success-500 "></i>
         <i class="base base-7 icon-stack-2x opacity-100 color-success-300 "></i>
         <i class="ni ni-envelope icon-stack-1x text-white"></i>
        </div>
        <span class="app-list-name">
         Inbox
        </span>
       </a>
      </li>
      <li>
       <a href="intel_introduction.html" class="app-list-item text-white border-0 m-0">
        <div class="icon-stack">
         <i class="base base-7 icon-stack-2x opacity-100 color-primary-300 "></i>
         <i class="fal fa-plus icon-stack-1x opacity-100 color-white"></i>
        </div>
        <span class="app-list-name">
         Add More
        </span>
       </a>
      </li>
     </ul>
    </div>
   </div>
  </div>
 </div>


 <!-- END Shortcuts -->
 <!-- BEGIN Color profile -->
 <!-- this area is hidden and will not be seen on screens or screen readers -->
 <!-- we use this only for CSS color refernce for JS stuff -->
 <p id="js-color-profile" class="d-none">
  <span class="color-primary-50"></span>
  <span class="color-primary-100"></span>
  <span class="color-primary-200"></span>
  <span class="color-primary-300"></span>
  <span class="color-primary-400"></span>
  <span class="color-primary-500"></span>
  <span class="color-primary-600"></span>
  <span class="color-primary-700"></span>
  <span class="color-primary-800"></span>
  <span class="color-primary-900"></span>
  <span class="color-info-50"></span>
  <span class="color-info-100"></span>
  <span class="color-info-200"></span>
  <span class="color-info-300"></span>
  <span class="color-info-400"></span>
  <span class="color-info-500"></span>
  <span class="color-info-600"></span>
  <span class="color-info-700"></span>
  <span class="color-info-800"></span>
  <span class="color-info-900"></span>
  <span class="color-danger-50"></span>
  <span class="color-danger-100"></span>
  <span class="color-danger-200"></span>
  <span class="color-danger-300"></span>
  <span class="color-danger-400"></span>
  <span class="color-danger-500"></span>
  <span class="color-danger-600"></span>
  <span class="color-danger-700"></span>
  <span class="color-danger-800"></span>
  <span class="color-danger-900"></span>
  <span class="color-warning-50"></span>
  <span class="color-warning-100"></span>
  <span class="color-warning-200"></span>
  <span class="color-warning-300"></span>
  <span class="color-warning-400"></span>
  <span class="color-warning-500"></span>
  <span class="color-warning-600"></span>
  <span class="color-warning-700"></span>
  <span class="color-warning-800"></span>
  <span class="color-warning-900"></span>
  <span class="color-success-50"></span>
  <span class="color-success-100"></span>
  <span class="color-success-200"></span>
  <span class="color-success-300"></span>
  <span class="color-success-400"></span>
  <span class="color-success-500"></span>
  <span class="color-success-600"></span>
  <span class="color-success-700"></span>
  <span class="color-success-800"></span>
  <span class="color-success-900"></span>
  <span class="color-fusion-50"></span>
  <span class="color-fusion-100"></span>
  <span class="color-fusion-200"></span>
  <span class="color-fusion-300"></span>
  <span class="color-fusion-400"></span>
  <span class="color-fusion-500"></span>
  <span class="color-fusion-600"></span>
  <span class="color-fusion-700"></span>
  <span class="color-fusion-800"></span>
  <span class="color-fusion-900"></span>
 </p>
 <!-- END Color profile -->
 </div>
 </div>
 </div>
 <!-- END Page Wrapper -->
 <!-- BEGIN Quick Menu -->
 <!-- to add more items, please make sure to change the variable '$menu-items: number;' in your _page-components-shortcut.scss -->
 <nav class="shortcut-menu d-none d-sm-block">
  <input type="checkbox" class="menu-open" name="menu-open" id="menu_open" />
  <label for="menu_open" class="menu-open-button ">
   <span class="app-shortcut-icon d-block"></span>
  </label>
  <a href="#" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Scroll Top">
   <i class="fal fa-arrow-up"></i>
  </a>
  <a href="page_login_alt.html" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Logout">
   <i class="fal fa-sign-out"></i>
  </a>
  <a href="#" class="menu-item btn" data-action="app-fullscreen" data-toggle="tooltip" data-placement="left" title="Full Screen">
   <i class="fal fa-expand"></i>
  </a>
  <a href="#" class="menu-item btn" data-action="app-print" data-toggle="tooltip" data-placement="left" title="Print page">
   <i class="fal fa-print"></i>
  </a>
  <a href="#" class="menu-item btn" data-action="app-voice" data-toggle="tooltip" data-placement="left" title="Voice command">
   <i class="fal fa-microphone"></i>
  </a>
 </nav>




 <!-- END Quick Menu -->
 <!-- BEGIN Messenger -->
 <div class="modal fade js-modal-messenger modal-backdrop-transparent" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-right">
   <div class="modal-content h-100">
    <div class="dropdown-header bg-trans-gradient d-flex align-items-center w-100">
     <div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
      <span class="mr-2">
       <span class="rounded-circle profile-image d-block" style="background-image:url('img/demo/avatars/avatar-d.png'); background-size: cover;"></span>
      </span>
      <div class="info-card-text">
       <a href="javascript:void(0);" class="fs-lg text-truncate text-truncate-lg text-white" data-toggle="dropdown" aria-expanded="false">
        Tracey Chang
        <i class="fal fa-angle-down d-inline-block ml-1 text-white fs-md"></i>
       </a>
       <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Send Email</a>
        <a class="dropdown-item" href="#">Create Appointment</a>
        <a class="dropdown-item" href="#">Block User</a>
       </div>
       <span class="text-truncate text-truncate-md opacity-80">IT Director</span>
      </div>
     </div>
     <button type="button" class="close text-white position-absolute pos-top pos-right p-2 m-1 mr-2" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true"><i class="fal fa-times"></i></span>
     </button>
    </div>
    <div class="modal-body p-0 h-100 d-flex">
     <!-- BEGIN msgr-list -->
     <div class="msgr-list d-flex flex-column bg-faded border-faded border-top-0 border-right-0 border-bottom-0 position-absolute pos-top pos-bottom">
      <div>
       <div class="height-4 width-3 h3 m-0 d-flex justify-content-center flex-column color-primary-500 pl-3 mt-2">
        <i class="fal fa-search"></i>
       </div>
       <input type="text" class="form-control bg-white" id="msgr_listfilter_input" placeholder="Filter contacts" aria-label="FriendSearch" data-listfilter="#js-msgr-listfilter">
      </div>
      <div class="flex-1 h-100 custom-scroll">
       <div class="w-100">
        <ul id="js-msgr-listfilter" class="list-unstyled m-0">
         <li>
          <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="tracey chang online">
           <div class="d-table-cell align-middle status status-success status-sm ">
            <span class="profile-image-md rounded-circle d-block" style="background-image:url('img/demo/avatars/avatar-d.png'); background-size: cover;"></span>
           </div>
           <div class="d-table-cell w-100 align-middle pl-2 pr-2">
            <div class="text-truncate text-truncate-md">
             Tracey Chang
             <small class="d-block font-italic text-success fs-xs">
              Online
             </small>
            </div>
           </div>
          </a>
         </li>
         <li>
          <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="oliver kopyuv online">
           <div class="d-table-cell align-middle status status-success status-sm ">
            <span class="profile-image-md rounded-circle d-block" style="background-image:url('img/demo/avatars/avatar-b.png'); background-size: cover;"></span>
           </div>
           <div class="d-table-cell w-100 align-middle pl-2 pr-2">
            <div class="text-truncate text-truncate-md">
             Oliver Kopyuv
             <small class="d-block font-italic text-success fs-xs">
              Online
             </small>
            </div>
           </div>
          </a>
         </li>
         <li>
          <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="dr john cook phd away">
           <div class="d-table-cell align-middle status status-warning status-sm ">
            <span class="profile-image-md rounded-circle d-block" style="background-image:url('img/demo/avatars/avatar-e.png'); background-size: cover;"></span>
           </div>
           <div class="d-table-cell w-100 align-middle pl-2 pr-2">
            <div class="text-truncate text-truncate-md">
             Dr. John Cook PhD
             <small class="d-block font-italic fs-xs">
              Away
             </small>
            </div>
           </div>
          </a>
         </li>
         <li>
          <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="ali amdaney online">
           <div class="d-table-cell align-middle status status-success status-sm ">
            <span class="profile-image-md rounded-circle d-block" style="background-image:url('img/demo/avatars/avatar-g.png'); background-size: cover;"></span>
           </div>
           <div class="d-table-cell w-100 align-middle pl-2 pr-2">
            <div class="text-truncate text-truncate-md">
             Ali Amdaney
             <small class="d-block font-italic fs-xs text-success">
              Online
             </small>
            </div>
           </div>
          </a>
         </li>
         <li>
          <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="sarah mcbrook online">
           <div class="d-table-cell align-middle status status-success status-sm">
            <span class="profile-image-md rounded-circle d-block" style="background-image:url('img/demo/avatars/avatar-h.png'); background-size: cover;"></span>
           </div>
           <div class="d-table-cell w-100 align-middle pl-2 pr-2">
            <div class="text-truncate text-truncate-md">
             Sarah McBrook
             <small class="d-block font-italic fs-xs text-success">
              Online
             </small>
            </div>
           </div>
          </a>
         </li>
         <li>
          <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="ali amdaney offline">
           <div class="d-table-cell align-middle status status-sm">
            <span class="profile-image-md rounded-circle d-block" style="background-image:url('img/demo/avatars/avatar-a.png'); background-size: cover;"></span>
           </div>
           <div class="d-table-cell w-100 align-middle pl-2 pr-2">
            <div class="text-truncate text-truncate-md">
             oliver.kopyuv@gotbootstrap.com
             <small class="d-block font-italic fs-xs">
              Offline
             </small>
            </div>
           </div>
          </a>
         </li>
         <li>
          <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="ali amdaney busy">
           <div class="d-table-cell align-middle status status-danger status-sm">
            <span class="profile-image-md rounded-circle d-block" style="background-image:url('img/demo/avatars/avatar-j.png'); background-size: cover;"></span>
           </div>
           <div class="d-table-cell w-100 align-middle pl-2 pr-2">
            <div class="text-truncate text-truncate-md">
             oliver.kopyuv@gotbootstrap.com
             <small class="d-block font-italic fs-xs text-danger">
              Busy
             </small>
            </div>
           </div>
          </a>
         </li>
         <li>
          <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="ali amdaney offline">
           <div class="d-table-cell align-middle status status-sm">
            <span class="profile-image-md rounded-circle d-block" style="background-image:url('img/demo/avatars/avatar-c.png'); background-size: cover;"></span>
           </div>
           <div class="d-table-cell w-100 align-middle pl-2 pr-2">
            <div class="text-truncate text-truncate-md">
             oliver.kopyuv@gotbootstrap.com
             <small class="d-block font-italic fs-xs">
              Offline
             </small>
            </div>
           </div>
          </a>
         </li>
         <li>
          <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="ali amdaney inactive">
           <div class="d-table-cell align-middle">
            <span class="profile-image-md rounded-circle d-block" style="background-image:url('img/demo/avatars/avatar-m.png'); background-size: cover;"></span>
           </div>
           <div class="d-table-cell w-100 align-middle pl-2 pr-2">
            <div class="text-truncate text-truncate-md">
             +714651347790
             <small class="d-block font-italic fs-xs opacity-50">
              Missed Call
             </small>
            </div>
           </div>
          </a>
         </li>
        </ul>
        <div class="filter-message js-filter-message"></div>
       </div>
      </div>
      <div>
       <a class="fs-xl d-flex align-items-center p-3">
        <i class="fal fa-cogs"></i>
       </a>
      </div>
     </div>
     <!-- END msgr-list -->
     <!-- BEGIN msgr -->
     <div class="msgr d-flex h-100 flex-column bg-white">
      <!-- BEGIN custom-scroll -->
      <div class="custom-scroll flex-1 h-100">
       <div id="chat_container" class="w-100 p-4">
        <!-- start .chat-segment -->
        <div class="chat-segment">
         <div class="time-stamp text-center mb-2 fw-400">
          Jun 19
         </div>
        </div>
        <!--  end .chat-segment -->
        <!-- start .chat-segment -->
        <div class="chat-segment chat-segment-sent">
         <div class="chat-message">
          <p>
           Hey Tracey, did you get my files?
          </p>
         </div>
         <div class="text-right fw-300 text-muted mt-1 fs-xs">
          3:00 pm
         </div>
        </div>
        <!--  end .chat-segment -->
        <!-- start .chat-segment -->
        <div class="chat-segment chat-segment-get">
         <div class="chat-message">
          <p>
           Hi
          </p>
          <p>
           Sorry going through a busy time in office. Yes I analyzed the solution.
          </p>
          <p>
           It will require some resource, which I could not manage.
          </p>
         </div>
         <div class="fw-300 text-muted mt-1 fs-xs">
          3:24 pm
         </div>
        </div>
        <!--  end .chat-segment -->
        <!-- start .chat-segment -->
        <div class="chat-segment chat-segment-sent chat-start">
         <div class="chat-message">
          <p>
           Okay
          </p>
         </div>
        </div>
        <!--  end .chat-segment -->
        <!-- start .chat-segment -->
        <div class="chat-segment chat-segment-sent chat-end">
         <div class="chat-message">
          <p>
           Sending you some dough today, you can allocate the resources to this project.
          </p>
         </div>
         <div class="text-right fw-300 text-muted mt-1 fs-xs">
          3:26 pm
         </div>
        </div>
        <!--  end .chat-segment -->
        <!-- start .chat-segment -->
        <div class="chat-segment chat-segment-get chat-start">
         <div class="chat-message">
          <p>
           Perfect. Thanks a lot!
          </p>
         </div>
        </div>
        <!--  end .chat-segment -->
        <!-- start .chat-segment -->
        <div class="chat-segment chat-segment-get">
         <div class="chat-message">
          <p>
           I will have them ready by tonight.
          </p>
         </div>
        </div>
        <!--  end .chat-segment -->
        <!-- start .chat-segment -->
        <div class="chat-segment chat-segment-get chat-end">
         <div class="chat-message">
          <p>
           Cheers
          </p>
         </div>
        </div>
        <!--  end .chat-segment -->
        <!-- start .chat-segment for timestamp -->
        <div class="chat-segment">
         <div class="time-stamp text-center mb-2 fw-400">
          Jun 20
         </div>
        </div>
        <!--  end .chat-segment for timestamp -->
       </div>
      </div>
      <!-- END custom-scroll  -->
      <!-- BEGIN msgr__chatinput -->
      <div class="d-flex flex-column">
       <div class="border-faded border-right-0 border-bottom-0 border-left-0 flex-1 mr-3 ml-3 position-relative shadow-top">
        <div class="pt-3 pb-1 pr-0 pl-0 rounded-0" tabindex="-1">
         <div id="msgr_input" contenteditable="true" data-placeholder="Type your message here..." class="height-10 form-content-editable"></div>
        </div>
       </div>
       <div class="height-8 px-3 d-flex flex-row align-items-center flex-wrap flex-shrink-0">
        <a href="javascript:void(0);" class="btn btn-icon fs-xl width-1 mr-1" data-toggle="tooltip" data-original-title="More options" data-placement="top">
         <i class="fal fa-ellipsis-v-alt color-fusion-300"></i>
        </a>
        <a href="javascript:void(0);" class="btn btn-icon fs-xl mr-1" data-toggle="tooltip" data-original-title="Attach files" data-placement="top">
         <i class="fal fa-paperclip color-fusion-300"></i>
        </a>
        <a href="javascript:void(0);" class="btn btn-icon fs-xl mr-1" data-toggle="tooltip" data-original-title="Insert photo" data-placement="top">
         <i class="fal fa-camera color-fusion-300"></i>
        </a>
        <div class="ml-auto">
         <a href="javascript:void(0);" class="btn btn-info">Send</a>
        </div>
       </div>
      </div>
      <!-- END msgr__chatinput -->
     </div>
     <!-- END msgr -->
    </div>
   </div>
  </div>
 </div>
 <!-- END Messenger -->
 <!-- BEGIN Page Settings -->
 <div class="modal fade js-modal-settings modal-backdrop-transparent" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-right modal-md">
   <div class="modal-content">
    <div class="dropdown-header bg-trans-gradient d-flex justify-content-center align-items-center w-100">
     <h4 class="m-0 text-center color-white">
      Layout Settings
      <small class="mb-0 opacity-80">User Interface Settings</small>
     </h4>
     <button type="button" class="close text-white position-absolute pos-top pos-right p-2 m-1 mr-2" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true"><i class="fal fa-times"></i></span>
     </button>
    </div>
    <div class="modal-body p-0">
     <div class="settings-panel">
      <div class="mt-4 d-table w-100 px-5">
       <div class="d-table-cell align-middle">
        <h5 class="p-0">
         App Layout
        </h5>
       </div>
      </div>
      <div class="list" id="fh">
       <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="header-function-fixed"></a>
       <span class="onoffswitch-title">Fixed Header</span>
       <span class="onoffswitch-title-desc">header is in a fixed at all times</span>
      </div>
      <div class="list" id="nff">
       <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-fixed"></a>
       <span class="onoffswitch-title">Fixed Navigation</span>
       <span class="onoffswitch-title-desc">left panel is fixed</span>
      </div>
      <div class="list" id="nfm">
       <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-minify"></a>
       <span class="onoffswitch-title">Minify Navigation</span>
       <span class="onoffswitch-title-desc">Skew nav to maximize space</span>
      </div>
      <div class="list" id="nfh">
       <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-hidden"></a>
       <span class="onoffswitch-title">Hide Navigation</span>
       <span class="onoffswitch-title-desc">roll mouse on edge to reveal</span>
      </div>
      <div class="list" id="nft">
       <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-top"></a>
       <span class="onoffswitch-title">Top Navigation</span>
       <span class="onoffswitch-title-desc">Relocate left pane to top</span>
      </div>
      <div class="list" id="mmb">
       <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-main-boxed"></a>
       <span class="onoffswitch-title">Boxed Layout</span>
       <span class="onoffswitch-title-desc">Encapsulates to a container</span>
      </div>
      <div class="expanded">
       <ul class="">
        <li>
         <div class="bg-fusion-50" data-action="toggle" data-class="mod-bg-1"></div>
        </li>
        <li>
         <div class="bg-warning-200" data-action="toggle" data-class="mod-bg-2"></div>
        </li>
        <li>
         <div class="bg-primary-200" data-action="toggle" data-class="mod-bg-3"></div>
        </li>
        <li>
         <div class="bg-success-300" data-action="toggle" data-class="mod-bg-4"></div>
        </li>
       </ul>
       <div class="list" id="mbgf">
        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-fixed-bg"></a>
        <span class="onoffswitch-title">Fixed Background</span>
       </div>
      </div>
      <div class="mt-4 d-table w-100 px-5">
       <div class="d-table-cell align-middle">
        <h5 class="p-0">
         Mobile Menu
        </h5>
       </div>
      </div>
      <div class="list" id="nmp">
       <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-mobile-push"></a>
       <span class="onoffswitch-title">Push Content</span>
       <span class="onoffswitch-title-desc">Content pushed on menu reveal</span>
      </div>
      <div class="list" id="nmno">
       <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-mobile-no-overlay"></a>
       <span class="onoffswitch-title">No Overlay</span>
       <span class="onoffswitch-title-desc">Removes mesh on menu reveal</span>
      </div>
      <div class="list" id="sldo">
       <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-mobile-slide-out"></a>
       <span class="onoffswitch-title">Off-Canvas <sup>(beta)</sup></span>
       <span class="onoffswitch-title-desc">Content overlaps menu</span>
      </div>
      <div class="mt-4 d-table w-100 px-5">
       <div class="d-table-cell align-middle">
        <h5 class="p-0">
         Accessibility
        </h5>
       </div>
      </div>
      <div class="list" id="mbf">
       <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-bigger-font"></a>
       <span class="onoffswitch-title">Bigger Content Font</span>
       <span class="onoffswitch-title-desc">content fonts are bigger for readability</span>
      </div>
      <div class="list" id="mhc">
       <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-high-contrast"></a>
       <span class="onoffswitch-title">High Contrast Text (WCAG 2 AA)</span>
       <span class="onoffswitch-title-desc">4.5:1 text contrast ratio</span>
      </div>
      <div class="list" id="mcb">
       <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-color-blind"></a>
       <span class="onoffswitch-title">Daltonism <sup>(beta)</sup> </span>
       <span class="onoffswitch-title-desc">color vision deficiency</span>
      </div>
      <div class="list" id="mpc">
       <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-pace-custom"></a>
       <span class="onoffswitch-title">Preloader Inside</span>
       <span class="onoffswitch-title-desc">preloader will be inside content</span>
      </div>
      <div class="mt-4 d-table w-100 px-5">
       <div class="d-table-cell align-middle">
        <h5 class="p-0">
         Global Modifications
        </h5>
       </div>
      </div>
      <div class="list" id="mcbg">
       <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-clean-page-bg"></a>
       <span class="onoffswitch-title">Clean Page Background</span>
       <span class="onoffswitch-title-desc">adds more whitespace</span>
      </div>
      <div class="list" id="mhni">
       <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-hide-nav-icons"></a>
       <span class="onoffswitch-title">Hide Navigation Icons</span>
       <span class="onoffswitch-title-desc">invisible navigation icons</span>
      </div>
      <div class="list" id="dan">
       <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-disable-animation"></a>
       <span class="onoffswitch-title">Disable CSS Animation</span>
       <span class="onoffswitch-title-desc">Disables CSS based animations</span>
      </div>
      <div class="list" id="mhic">
       <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-hide-info-card"></a>
       <span class="onoffswitch-title">Hide Info Card</span>
       <span class="onoffswitch-title-desc">Hides info card from left panel</span>
      </div>
      <div class="list" id="mlph">
       <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-lean-subheader"></a>
       <span class="onoffswitch-title">Lean Subheader</span>
       <span class="onoffswitch-title-desc">distinguished page header</span>
      </div>
      <div class="list" id="mnl">
       <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-nav-link"></a>
       <span class="onoffswitch-title">Hierarchical Navigation</span>
       <span class="onoffswitch-title-desc">Clear breakdown of nav links</span>
      </div>
      <div class="list mt-1">
       <span class="onoffswitch-title">Global Font Size <small>(RESETS ON REFRESH)</small> </span>
       <div class="btn-group btn-group-sm btn-group-toggle my-2" data-toggle="buttons">
        <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text-sm" data-target="html">
         <input type="radio" name="changeFrontSize"> SM
        </label>
        <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text" data-target="html">
         <input type="radio" name="changeFrontSize" checked=""> MD
        </label>
        <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text-lg" data-target="html">
         <input type="radio" name="changeFrontSize"> LG
        </label>
        <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text-xl" data-target="html">
         <input type="radio" name="changeFrontSize"> XL
        </label>
       </div>
       <span class="onoffswitch-title-desc d-block mb-0">Change <strong>root</strong> font size to effect rem
        values</span>
      </div>
      <hr class="mb-0 mt-4">
      <div class="mt-2 d-table w-100 pl-5 pr-3">
       <div class="fs-xs text-muted p-2 alert alert-warning mt-3 mb-2">
        <i class="fal fa-exclamation-triangle text-warning mr-2"></i>The settings below uses localStorage to load
        the external CSS file as an overlap to the base css. Due to network latency and CPU utilization, you may
        experience a brief flickering effect on page load which may show the intial applied theme for a split
        second. Setting the prefered style/theme in the header will prevent this from happening.
       </div>
      </div>
      <div class="mt-2 d-table w-100 pl-5 pr-3">
       <div class="d-table-cell align-middle">
        <h5 class="p-0">
         Theme colors
        </h5>
       </div>
      </div>
      <div class="expanded theme-colors pl-5 pr-3">
       <ul class="m-0">
        <li>
         <a href="#" id="myapp-0" data-action="theme-update" data-themesave data-theme="" data-toggle="tooltip" data-placement="top" title="Wisteria (base css)" data-original-title="Wisteria (base css)"></a>
        </li>
        <li>
         <a href="#" id="myapp-1" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-1.css" data-toggle="tooltip" data-placement="top" title="Tapestry" data-original-title="Tapestry"></a>
        </li>
        <li>
         <a href="#" id="myapp-2" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-2.css" data-toggle="tooltip" data-placement="top" title="Atlantis" data-original-title="Atlantis"></a>
        </li>
        <li>
         <a href="#" id="myapp-3" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-3.css" data-toggle="tooltip" data-placement="top" title="Indigo" data-original-title="Indigo"></a>
        </li>
        <li>
         <a href="#" id="myapp-4" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-4.css" data-toggle="tooltip" data-placement="top" title="Dodger Blue" data-original-title="Dodger Blue"></a>
        </li>
        <li>
         <a href="#" id="myapp-5" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-5.css" data-toggle="tooltip" data-placement="top" title="Tradewind" data-original-title="Tradewind"></a>
        </li>
        <li>
         <a href="#" id="myapp-6" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-6.css" data-toggle="tooltip" data-placement="top" title="Cranberry" data-original-title="Cranberry"></a>
        </li>
        <li>
         <a href="#" id="myapp-7" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-7.css" data-toggle="tooltip" data-placement="top" title="Oslo Gray" data-original-title="Oslo Gray"></a>
        </li>
        <li>
         <a href="#" id="myapp-8" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-8.css" data-toggle="tooltip" data-placement="top" title="Chetwode Blue" data-original-title="Chetwode Blue"></a>
        </li>
        <li>
         <a href="#" id="myapp-9" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-9.css" data-toggle="tooltip" data-placement="top" title="Apricot" data-original-title="Apricot"></a>
        </li>
        <li>
         <a href="#" id="myapp-10" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-10.css" data-toggle="tooltip" data-placement="top" title="Blue Smoke" data-original-title="Blue Smoke"></a>
        </li>
        <li>
         <a href="#" id="myapp-11" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-11.css" data-toggle="tooltip" data-placement="top" title="Green Smoke" data-original-title="Green Smoke"></a>
        </li>
        <li>
         <a href="#" id="myapp-12" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-12.css" data-toggle="tooltip" data-placement="top" title="Wild Blue Yonder" data-original-title="Wild Blue Yonder"></a>
        </li>
        <li>
         <a href="#" id="myapp-13" data-action="theme-update" data-themesave data-theme="css/themes/cust-theme-13.css" data-toggle="tooltip" data-placement="top" title="Emerald" data-original-title="Emerald"></a>
        </li>
       </ul>
      </div>
      <hr class="mb-0 mt-4">
      <div class="pl-5 pr-3 py-3 bg-faded">
       <div class="row no-gutters">
        <div class="col-6 pr-1">
         <a href="#" class="btn btn-outline-danger fw-500 btn-block" data-action="app-reset">Reset Settings</a>
        </div>
        <div class="col-6 pl-1">
         <a href="#" class="btn btn-danger fw-500 btn-block" data-action="factory-reset">Factory Reset</a>
        </div>
       </div>
      </div>
     </div> <span id="saving"></span>
    </div>
   </div>
  </div>
 </div>
 <!-- END Page Settings -->
 <!-- base vendor bundle: 
			 DOC: if you remove pace.js from core please note on Internet Explorer some CSS animations may execute before a page is fully loaded, resulting 'jump' animations 
						+ pace.js (recommended)
						+ jquery.js (core)
						+ jquery-ui-cust.js (core)
						+ popper.js (core)
						+ bootstrap.js (core)
						+ slimscroll.js (extension)
						+ app.navigation.js (core)
						+ ba-throttle-debounce.js (core)
						+ waves.js (extension)
						+ smartpanels.js (extension)
						+ src/../jquery-snippets.js (core) -->
 <script src="<?php echo base_url(); ?>/assets/js/vendors.bundle.js"></script>
 <script src="<?php echo base_url(); ?>/assets/js/app.bundle.js"></script>
 <script type="text/javascript">
  /* Activate smart panels */
  $('#js-page-content').smartPanel();
 </script>
 <!-- The order of scripts is irrelevant. Please check out the plugin pages for more details about these plugins below: -->
 <script src="<?php echo base_url(); ?>/assets/js/statistics/peity/peity.bundle.js"></script>
 <script src="<?php echo base_url(); ?>/assets/js/statistics/flot/flot.bundle.js"></script>
 <script src="<?php echo base_url(); ?>/assets/js/statistics/easypiechart/easypiechart.bundle.js"></script>
 <script src="<?php echo base_url(); ?>/assets/js/datagrid/datatables/datatables.bundle.js"></script>
 <script>
  $('#schedule').dataTable({
   responsive: true,
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
  /* defined datas */
  var dataTargetProfit = [
   [1354586000000, 153],
   [1364587000000, 658],
   [1374588000000, 198],
   [1384589000000, 663],
   [1394590000000, 801],
   [1404591000000, 1080],
   [1414592000000, 353],
   [1424593000000, 749],
   [1434594000000, 523],
   [1444595000000, 258],
   [1454596000000, 688],
   [1464597000000, 364]
  ]
  var dataProfit = [
   [1354586000000, 53],
   [1364587000000, 65],
   [1374588000000, 98],
   [1384589000000, 83],
   [1394590000000, 980],
   [1404591000000, 808],
   [1414592000000, 720],
   [1424593000000, 674],
   [1434594000000, 23],
   [1444595000000, 79],
   [1454596000000, 88],
   [1464597000000, 36]
  ]
  var dataSignups = [
   [1354586000000, 647],
   [1364587000000, 435],
   [1374588000000, 784],
   [1384589000000, 346],
   [1394590000000, 487],
   [1404591000000, 463],
   [1414592000000, 479],
   [1424593000000, 236],
   [1434594000000, 843],
   [1444595000000, 657],
   [1454596000000, 241],
   [1464597000000, 341]
  ]
  var dataSet1 = [
   [0, 10],
   [100, 8],
   [200, 7],
   [300, 5],
   [400, 4],
   [500, 6],
   [600, 3],
   [700, 2]
  ];
  var dataSet2 = [
   [0, 9],
   [100, 6],
   [200, 5],
   [300, 3],
   [400, 3],
   [500, 5],
   [600, 2],
   [700, 1]
  ];

  $(document).ready(function() {

   /* init datatables */
   $('#dt-basic-example').dataTable({
    responsive: true,
    dom: "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'B>>" +
     "<'row'<'col-sm-12'tr>>" +
     "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    buttons: [{
      extend: 'colvis',
      text: 'Column Visibility',
      titleAttr: 'Col visibility',
      className: 'btn-outline-default'
     },
     {
      extend: 'csvHtml5',
      text: 'CSV',
      titleAttr: 'Generate CSV',
      className: 'btn-outline-default'
     },
     {
      extend: 'copyHtml5',
      text: 'Copy',
      titleAttr: 'Copy to clipboard',
      className: 'btn-outline-default'
     },
     {
      extend: 'print',
      text: '<i class="fal fa-print"></i>',
      titleAttr: 'Print Table',
      className: 'btn-outline-default'
     }

    ],
    columnDefs: [{
      targets: -1,
      title: '',
      orderable: false,
      render: function(data, type, full, meta) {

       /*
       -- ES6
       -- convert using https://babeljs.io online transpiler
       return `
       <a href='javascript:void(0);' class='btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1' title='Delete Record'>
       	<i class="fal fa-times"></i>
       </a>
       <div class='dropdown d-inline-block dropleft '>
       	<a href='#'' class='btn btn-sm btn-icon btn-outline-primary rounded-circle shadow-0' data-toggle='dropdown' aria-expanded='true' title='More options'>
       		<i class="fal fa-ellipsis-v"></i>
       	</a>
       	<div class='dropdown-menu'>
       		<a class='dropdown-item' href='javascript:void(0);'>Change Status</a>
       		<a class='dropdown-item' href='javascript:void(0);'>Generate Report</a>
       	</div>
       </div>`;
       	
       ES5 example below:	

       */
       return "\n\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1' title='Delete Record'>\n\t\t\t\t\t\t\t<i class=\"fal fa-times\"></i>\n\t\t\t\t\t\t</a>\n\t\t\t\t\t\t<div class='dropdown d-inline-block dropleft'>\n\t\t\t\t\t\t\t<a href='#'' class='btn btn-sm btn-icon btn-outline-primary rounded-circle shadow-0' data-toggle='dropdown' aria-expanded='true' title='More options'>\n\t\t\t\t\t\t\t\t<i class=\"fal fa-ellipsis-v\"></i>\n\t\t\t\t\t\t\t</a>\n\t\t\t\t\t\t\t<div class='dropdown-menu'>\n\t\t\t\t\t\t\t\t<a class='dropdown-item' href='javascript:void(0);'>Change Status</a>\n\t\t\t\t\t\t\t\t<a class='dropdown-item' href='javascript:void(0);'>Generate Report</a>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>";
      },
     },

    ]

   });


   /* flot toggle example */
   var flot_toggle = function() {

    var data = [{
      label: "Target Profit",
      data: dataTargetProfit,
      color: color.info._400,
      bars: {
       show: true,
       align: "center",
       barWidth: 30 * 30 * 60 * 1000 * 80,
       lineWidth: 0,
       /*fillColor: {
       	colors: [color.primary._500, color.primary._900]
       },*/
       fillColor: {
        colors: [{
          opacity: 0.9
         },
         {
          opacity: 0.1
         }
        ]
       }
      },
      highlightColor: 'rgba(255,255,255,0.3)',
      shadowSize: 0
     },
     {
      label: "Actual Profit",
      data: dataProfit,
      color: color.warning._500,
      lines: {
       show: true,
       lineWidth: 2
      },
      shadowSize: 0,
      points: {
       show: true
      }
     },
     {
      label: "User Signups",
      data: dataSignups,
      color: color.success._500,
      lines: {
       show: true,
       lineWidth: 2
      },
      shadowSize: 0,
      points: {
       show: true
      }
     }
    ]

    var options = {
     grid: {
      hoverable: true,
      clickable: true,
      tickColor: '#f2f2f2',
      borderWidth: 1,
      borderColor: '#f2f2f2'
     },
     tooltip: true,
     tooltipOpts: {
      cssClass: 'tooltip-inner',
      defaultTheme: false
     },
     xaxis: {
      mode: "time"
     },
     yaxes: {
      tickFormatter: function(val, axis) {
       return "$" + val;
      },
      max: 1200
     }

    };

    var plot2 = null;

    function plotNow() {
     var d = [];
     $("#js-checkbox-toggles").find(':checkbox').each(function() {
      if ($(this).is(':checked')) {
       d.push(data[$(this).attr("name").substr(4, 1)]);
      }
     });
     if (d.length > 0) {
      if (plot2) {
       plot2.setData(d);
       plot2.draw();
      } else {
       plot2 = $.plot($("#flot-toggles"), d, options);
      }
     }

    };

    $("#js-checkbox-toggles").find(':checkbox').on('change', function() {
     plotNow();
    });
    plotNow()
   }
   flot_toggle();
   /* flot toggle example -- end*/

   /* flot area */
   var flotArea = $.plot($('#flot-area'), [{
     data: dataSet1,
     label: 'New Customer',
     color: color.success._200
    },
    {
     data: dataSet2,
     label: 'Returning Customer',
     color: color.info._200
    }
   ], {
    series: {
     lines: {
      show: true,
      lineWidth: 2,
      fill: true,
      fillColor: {
       colors: [{
         opacity: 0
        },
        {
         opacity: 0.5
        }
       ]
      }
     },
     shadowSize: 0
    },
    points: {
     show: true,
    },
    legend: {
     noColumns: 1,
     position: 'nw'
    },
    grid: {
     hoverable: true,
     clickable: true,
     borderColor: '#ddd',
     tickColor: '#ddd',
     aboveData: true,
     borderWidth: 0,
     labelMargin: 5,
     backgroundColor: 'transparent'
    },
    yaxis: {
     tickLength: 1,
     min: 0,
     max: 15,
     color: '#eee',
     font: {
      size: 0,
      color: '#999'
     }
    },
    xaxis: {
     tickLength: 1,
     color: '#eee',
     font: {
      size: 10,
      color: '#999'
     }
    }

   });
   /* flot area -- end */

   var flotVisit = $.plot('#flotVisit', [{
     data: [
      [3, 0],
      [4, 1],
      [5, 3],
      [6, 3],
      [7, 10],
      [8, 11],
      [9, 12],
      [10, 9],
      [11, 12],
      [12, 8],
      [13, 5]
     ],
     color: color.success._200
    },
    {
     data: [
      [1, 0],
      [2, 0],
      [3, 1],
      [4, 2],
      [5, 2],
      [6, 5],
      [7, 8],
      [8, 12],
      [9, 9],
      [10, 11],
      [11, 5]
     ],
     color: color.info._200
    }
   ], {
    series: {
     shadowSize: 0,
     lines: {
      show: true,
      lineWidth: 2,
      fill: true,
      fillColor: {
       colors: [{
         opacity: 0
        },
        {
         opacity: 0.12
        }
       ]
      }
     }
    },
    grid: {
     borderWidth: 0
    },
    yaxis: {
     min: 0,
     max: 15,
     tickColor: '#ddd',
     ticks: [
      [0, ''],
      [5, '100K'],
      [10, '200K'],
      [15, '300K']
     ],
     font: {
      color: '#444',
      size: 10
     }
    },
    xaxis: {

     tickColor: '#eee',
     ticks: [
      [2, '2am'],
      [3, '3am'],
      [4, '4am'],
      [5, '5am'],
      [6, '6am'],
      [7, '7am'],
      [8, '8am'],
      [9, '9am'],
      [10, '1pm'],
      [11, '2pm'],
      [12, '3pm'],
      [13, '4pm']
     ],
     font: {
      color: '#999',
      size: 9
     }
    }
   });


  });
 </script>
 <script src="<?php echo base_url(); ?>/assets/js/statistics/sparkline/sparkline.bundle.js"></script>
 <script>
  /* 
   * draw the little mouse speed animated graph this just attaches a handler to the mousemove event to see
   * (roughly) how far the mouse has moved and then updates the display a couple of times a second via
   * setTimeout()
   */
  var drawMouseSpeedDemo = function() {
   var mrefreshinterval = 500, // update display every 500ms
    lastmousex = -1,
    lastmousey = -1,
    lastmousetime,
    mousetravel = 0,
    mpoints = [],
    mpoints_max = 30;

   $('html').mousemove(function(e) {
    var mousex = e.pageX,
     mousey = e.pageY;

    if (lastmousex > -1) {
     mousetravel += Math.max(Math.abs(mousex - lastmousex), Math.abs(mousey - lastmousey));
    }
    lastmousex = mousex;
    lastmousey = mousey;
   });

   var mdraw = function() {
    var md = new Date();
    var timenow = md.getTime();
    if (lastmousetime && lastmousetime != timenow) {
     var pps = Math.round(mousetravel / (timenow - lastmousetime) * 1000);
     mpoints.push(pps);
     if (mpoints.length > mpoints_max)
      mpoints.splice(0, 1);
     mousetravel = 0;
     $('#mousespeed-line').sparkline(mpoints, {
      type: 'line',
      width: 210,
      height: 40,
      lineColor: color.info._500,
      fillColor: color.info._50,
      tooltipSuffix: ' pixels per second'
     });
     $('#mousespeed-bar').sparkline(mpoints, {
      type: 'bar',
      height: 40,
      tooltipSuffix: ' pixels per second'
     });
    }
    lastmousetime = timenow;
    setTimeout(mdraw, mrefreshinterval);
   }
   // we could use setInterval instead, but I prefer to do it this way
   setTimeout(mdraw, mrefreshinterval);
  };

  $(document).ready(function() {
   //start refresh chart
   drawMouseSpeedDemo();
  });
 </script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js" integrity="sha512-gtII6Z4fZyONX9GBrF28JMpodY4vIOI0lBjAtN/mcK7Pz19Mu1HHIRvXH6bmdChteGpEccxZxI0qxXl9anY60w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


 <script>
  function printSoccerballsSize5() {

   var prtContent = document.getElementById("printSoccerBallsSize5");
   var WinPrint = window.open('', '', '');
   WinPrint.document.write(prtContent.innerHTML);
   WinPrint.document.close();
   WinPrint.focus();
   WinPrint.print();
   WinPrint.close();
  }
 </script>
 </body>

 </html>


<?php
} ?>