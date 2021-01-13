

        <!-- Breadcrumbs -->

        <div class="page-title">
          <div>
            <h1><i class="fa fa-pie-chart"></i> Asessment</h1>
            <p></p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Asessment</a></li>
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
              <table class="table table-hover" id="table-asessment">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Company Name</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th>Action</th>
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
              table = $('#table-asessment').DataTable({ 

                  "processing": true, //Feature control the processing indicator.
                  "serverSide": true, //Feature control DataTables' server-side processing mode.
                  "order": [], //Initial no order.

                  // Load data for the table's content from an Ajax source
                  "ajax": {
                      "url": "<?php echo site_url('source/Asessment/ajax_list')?>",
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
             $('#list-table-view').load("<?php echo base_url(); ?>source/Interview/index/"+$data).attr('href');
        }

      </script>


      