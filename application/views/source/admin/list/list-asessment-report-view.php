

        <!-- Breadcrumbs -->


    <style type="text/css">
        
        .stars-outer {
          display: inline-block;
          position: relative;
          font-family: FontAwesome;
        }
        
        .stars-outer::before {
          content: "\f006 \f006 \f006 \f006 \f006";
        }
        
        .stars-inner {
          position: absolute;
          top: 0;
          left: 0;
          white-space: nowrap;
          overflow: hidden;
          /*width: 0;*/
        }
        
        .stars-inner::before {
          content: "\f005 \f005 \f005 \f005 \f005";
          color: #f8ce0b;
        }
        
        .attribution {
          font-size: 12px;
          color: #444;
          text-decoration: none;
          text-align: center;
          position: fixed;
          right: 10px;
          bottom: 10px;
          z-index: -1;
        }
        .attribution:hover {
          color: #1fa67a;
        }

    </style>
        <div class="page-title">
          <div>
            <h1><i class="fa fa-pie-chart"></i> Asessment Report</h1>
            <p></p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">AsessmentReport</a></li>
            </ul>
          </div>
        </div>

      <div class="container-fluid" >
        <!-- Example Tables Card -->
        <div class="card mb-3 " >
          <div class="card-header">
            <!-- <i class="fa fa-dashboard fa-2x"></i> -->
          </div>
          <hr>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover" id="table-AsessmentReport">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Project</th>
                        <th>Requirement</th>
                        <th>Name</th>
                        <th>Date</th>
                        <!-- <th>EV1</th> -->
                        <!-- <th>EV2</th> -->
                        <!-- <th>EV3</th> -->
                        <!-- <th>EV4</th> -->
                        <!-- <th>EV5</th> -->
                        <!-- <th>EV6</th> -->
                        <!-- <th>EV7</th> -->
                        <th>Score</th>
                        <th>Rating</th>
                        <!-- <th>Description</th> -->
                        <!-- <th>Status</th> -->
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


      <script type="text/javascript">
          var code; //for save method string
          var method; //for save method string
          var table;
          $(document).ready(function() {
              //datatables
              table = $('#table-AsessmentReport').DataTable({ 

                  "processing": true, //Feature control the processing indicator.
                  "serverSide": true, //Feature control DataTables' server-side processing mode.
                  "order": [], //Initial no order.

                  // Load data for the table's content from an Ajax source
                  "ajax": {
                      "url": "<?php echo site_url('source/AsessmentReport/ajax_list')?>",
                      "type": "POST"
                  },

                  //Set column definition initialisation properties.
                  "columnDefs": [
                  { 
                      "targets": [ 0 ], //first column / numbering column
                      "orderable": false, //set not orderable
                  },
                  ],

              });

        });

        function registAsessment($data){
             $('#list-table-view').load("<?php echo base_url(); ?>source/interview/index/"+$data).attr('href');
        }

      </script>
