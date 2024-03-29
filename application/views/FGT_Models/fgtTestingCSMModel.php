<div class="modal fade bd-example-modal-lg" id="exampleModalFGTTestingCSMRebound" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(177,157,206);color:white">
                <h5 class="modal-title" id="exampleModalLabel"><b>Report</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card" id="printCardFGTCSMRebound">
                    <div class="card-body">
                        <div class="row">
                            <div class="table" style="display: flex; justify-content:space-between">
                                <div style="margin-left:10px;">
                                    <img src="<?php echo base_url() ?>assets/img/frwd.jpg" alt="Forward_logo" width="250px" height="170px" />
                                </div>
                                <!-- <div><img style="margin-right:20px;" src="<?php echo base_url() ?>assets/img/adidasLogo.png" alt="Lab_logo" width="100px" height="100px" /></div> -->

                                <div style="font-size: medium; font-weight:bold; padding-top:40px; text-align:center;">
                                    <p style="padding-right: 20px;"> Quality Assurance Lab of Forward Sports (Pvt) Ltd <br> Wazirabad Road, Sahowala Stop Sialkot </p>
                                </div>

                                <div>
                                    <div>
                                        <img style="padding-right:10px;" src="<?php echo base_url() ?>assets/img/newLabLogo.jpg" alt="Lab_logo" width="100%" height="90px" />
                                    </div>
                                    <table border="1" style="margin-top: 5px; width:96%;">
                                        <tr>
                                            <td style="padding: 0px; text-align:left;">Document</td>
                                            <td style="padding: 0px; text-align:left;">QSD-12/RTR/TRF</td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 0px; text-align:left;">Revision</td>
                                            <td style="padding: 0px; text-align:left;">2</td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 0px; text-align:left;">Date of Issuance</td>
                                            <td style="padding: 0px; text-align:left;">23-02-2023</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>


                            <div style="font-weight:bold; margin-left: 35%;">
                                <h4>Test Report of Football</h4>
                            </div>

                            <div style="display:flex; justify-content:space-between">
                                <div style="padding-left:30px;padding-right:30px;">
                                    <table border="1">
                                        <tbody>
                                            <tr>
                                                <td>lAB NO.</td>
                                                <th colspan="2" style="text-align: center;" id="labNoFGTCSM"></th>
                                            </tr>
                                            <tr>
                                                <td>CSS NO.</td>
                                                <th colspan="2" style="text-align: center;" id="cssNoFGTCSM"> </th>
                                            </tr>
                                            <tr>
                                                <td>Receiving Date:</td>
                                                <th colspan="2" style="text-align: center;" id="receiveDateFGTCSM"></th>
                                            </tr>
                                            <tr>
                                                <td colspan="1">Testing Date</td>
                                                <th style="text-align: center;" id="testingDataFGTSCSM"></th>
                                                <th style="text-align: center;" id="testingDataFGTECSM"></th>
                                            </tr>
                                            <tr>
                                                <td>Issue Date</td>
                                                <th colspan="2" style="text-align: center;" id="issueDateFGTCSM"></th>
                                            </tr>
                                            <tr>
                                                <td>Enviromental Cond.</td>
                                                <th colspan="2" style="text-align: center;" id="environmentalCondFGTCSM"></th>
                                            </tr>
                                            <tr>
                                                <td>Test Acc. To Cat.</td>
                                                <th colspan="2" style="text-align: center;" id="testAccToCatFGTCSM"></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div style="padding-left:30px;padding-right:30px;">
                                    <table border="1">
                                        <th colspan="2" style="text-align:center;">CONSTRUCTION</th>
                                        <tbody>
                                            <tr>
                                                <td>COVER MAT.</td>
                                                <th style="text-align: center;" id="coverMatFGTCSM"></th>
                                            </tr>
                                            <tr>
                                                <td>BACKING</td>
                                                <th style="text-align: center;" id="backingFGTCSM"></th>
                                            </tr>
                                            <tr>
                                                <td>BLADDER</td>
                                                <th style="text-align: center;" id="bladderFGTCSM"></th>
                                            </tr>
                                            <tr>
                                                <td>Pressure</td>
                                                <th style="text-align: center;" id="pressureFGTCSM"></th>
                                            </tr>
                                            <tr>
                                                <td>BALLTYPE</td>
                                                <th style="text-align: center;" id="ballTypeFGTCSM"></th>
                                            </tr>
                                            <tr>
                                                <td>FiFA STUMP</td>
                                                <th style="text-align: center;" id="fifaStumpFGTCSM"></th>
                                            </tr>
                                            <tr>
                                                <td>Production Month</td>
                                                <th style="text-align: center;" id="prodMonthFGTCSM"></th>
                                            </tr>

                                        </tbody>


                                    </table>

                                </div>
                                <div style="padding-left:30px;padding-right:30px;">
                                    <table border="1">
                                        <tbody>
                                            <tr>
                                                <td>TEST TYPE</td>
                                                <th style="text-align: center;" id="testTypeFGTCSM"></th>
                                            </tr>
                                            <tr>
                                                <td>MAIN MAT.COLOR</td>
                                                <th style="text-align: center;" id="mainMatColorFGTCSM"></th>
                                            </tr>
                                            <tr>
                                                <td>Model Name</td>
                                                <th style="text-align: center;" id="modelNameFGTCSM"></th>
                                            </tr>
                                            <tr>
                                                <td>Article #</td>
                                                <th style="text-align: center;" id="acticleNoFGTCSM"></th>
                                            </tr>
                                            <tr>
                                                <td>Working #</td>
                                                <th style="text-align: center;" id="workingNoFGTCSM"></th>
                                            </tr>
                                            <tr>
                                                <td>RESULT</td>
                                                <th style="text-align: center;" id="resultFGTCSM"></th>
                                            </tr>
                                            <tr>
                                                <td>TESTED BY </td>
                                                <th style="text-align: center;" id="testedbyFGTCSM"></th>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <br> <br>

                            <!-- <div style="margin-top:8px; padding-left:30px;padding-right:30px; width:100%">
                                                                <table border="1">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="width: 10%">CATEGORY 1</td>
                                                                            <th>- all balls stamped with "FIFA Quality PRO" logo (replaced "FIFA APPROVED") or destined for getting the "FIFA Quality PRO" logo, whatever price!- all balls with a "FOB price" of 10.01 or more USD, with or without FIFA logo!</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 10%">CATEGORY 2</td>
                                                                            <th>- all balls stamped with "FIFA Quality" logo (replaced "FIFA INSPECTED") or destined for getting the"FIFA Quality" logo, whatever price!- all balls with a "FOB price" between 5.01 USD and 10.00 USD, with or without FIFA logo!</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 10%">CATEGORY 2</td>
                                                                            <th>- this is the basic requirement, valid for all balls with a "FOB price" less or equal to 5.00 USD, without any FIFA logo!</th>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div> -->

                            <br>
                            <div style="width: 100%">
                                <div style="margin-top: 8px; padding-left:30px;padding-right:30px;">
                                    <table border="1" style="width:100%">
                                        <thead>
                                            <tr style="font-weight:bold; text-align:center;">
                                                <td>Weight</td>
                                                <td colspan="3">Circumference (cm)</td>
                                                <td>Diff</td>
                                                <td>Deviation</td>
                                                <td>Rebound</td>
                                                <td>Remarks</td>
                                            </tr>
                                            <tr style="font-weight:bold; text-align:center;">
                                                <td>gm</td>
                                                <td>Average</td>
                                                <td>Min</td>
                                                <td>Max</td>
                                                <td>cm</td>
                                                <td>%</td>
                                                <td>cm</td>
                                                <td></td>
                                            </tr>
    
                                        <tbody id="fgtTestDetailsCSM">
    
                                        </tbody>
                                        </thead>
                                    </table>
                                </div>
                        
                        </div>


                            <div style="margin-left: 30px; margin-right:30px">
                                <table style="margin-top: 8px; width:100%; border: 1px solid black;">
                                    <tbody>
                                        <tr>
                                            <th style="text-align:center; font-weight:bold;">REMARKS:</th>
                                            <td>
                                                <table border="1">
                                                    <tbody>
                                                        <tr>
                                                            <th style="font-weight: bold;"> Test request</th>
                                                            <td style="width:100%; text-align:center;" id="testRequestCSM">By R&D</td>
                                                        </tr>
                                                        <!-- <tr>
                                                            <th style="font-weight: bold;"> failed criteria</th>
                                                            <td style="width:100% ;"></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="font-weight: bold;">obvious problems, during and after tests</th>
                                                            <td style="width:100% ;"></td>
                                                        </tr> -->
                                                        <tr>
                                                            <th style="font-weight: bold;">Note</th>
                                                            <td style="width:100% ;">The above reported result is applicable to the sample as received at customer service section Uncertainty will be given on the demand of customer</td>
                                                        </tr>
                                                        <!-- <tr>
                                                            <th style="font-weight: bold;">improvements</th>
                                                            <td style="width:100% ;"></td>
                                                        </tr> -->
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                            <table class="table">
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th> <span style="font-size: medium;font-weight:bold"><u>Prepared By</u> </span><br>
                                        <span>Sohail Ghouri </span>
                                    </th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <!-- <th> <span style="font-size: medium;font-weight:bold"><u>Performed By</u> </span><br>
                                                                        <span id="testedbyFGTCSM">Imran Munir </span>
                                                                    </th> -->
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <!-- <th><span style="font-size: medium;font-weight:bold"> <u>Reviewed By</u></span><br><span id="testReviewedBlader"> </span> -->
                                    <th><span style="font-size: medium;font-weight:bold"> <u>Reviewed By</u></span><br><span> Fatima Rasheed </span>

                                    </th>
                                    <th></th>
                                    <th></th>
                                    <th></th>


                                    <th> <span style="font-size: medium;font-weight:bold"> <u>Approved By</u> </span><br>
                                        <!-- <span id="testApprovedBlader"> </span> -->
                                        <span>Zain Abbas </span>
                                    </th>
                                </tr>
                            </table>


                        </div>
                        <div style="display: flex; justify-content: space-evenly; margin-top: 5px; margin-bottom: 5px; text-align:center; font-weight:bold;">
                            <div>
                                <h3>Fresh Image</h3>
                                <img style="border-radius: 8px;" src="" width="150px" height="150px" alt="No image" id="freshImageFGTCSM">
                            </div>
                            <div>
                                <h3>After Shooter Image</h3>
                                <img style="border-radius: 8px;" src="" width="150px" height="150px" alt="No image" id="afterShooterImageFGTCSM">
                            </div>
                            <div>
                                <h3>Hydrolysis Image</h3>
                                <img style="border-radius: 8px;" src="" width="150px" height="150px" alt="No image" id="hydrolysisImageFGTCSM">
                            </div>
                            <div>
                                <h3>Drum Image</h3>
                                <img style="border-radius: 8px;" src="" width="150px" height="150px" alt="No image" id="drumImageFGTCSM">
                            </div>
                        </div>
                        <h2 class="mt-3" style="text-align:center;font-weight:bold">End Of Report</h2>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="printDiv('printCardFGTCSMRebound')" data-dismiss="modal">Print Report</button>
            </div>
            <div class="card-footer text-muted">
                Forward Sports Pvt. Ltd.
            </div>
        </div>
    </div>
</div>