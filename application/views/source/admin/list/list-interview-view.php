

        <!-- Breadcrumbs -->

        <div class="page-title">
          <div>
            <h1><i class="fa fa-pie-chart"></i> Interview</h1>
            <p></p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Interview</a></li>
            </ul>
          </div>
        </div>

      <div class="container-fluid">
        <div class="card mb-3  ">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-responsive" id="table-interview">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Country</th>
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
          var table;
          var code = <?php echo $project->ptId; ?>;
          $(document).ready(function() {
              //datatables
              table = $('#table-interview').DataTable({ 

                  "processing": true, //Feature control the processing indicator.
                  "serverSide": true, //Feature control DataTables' server-side processing mode.
                  "order": [], //Initial no order.

                  // Load data for the table's content from an Ajax source
                  "ajax": {
                      "url": "<?php echo site_url('source/Interview/ajax_list')?>/"+code,
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


           // $('#form-evaluation-report').click(function(){
           //     $('#list-table-view').load("form-evaluation-report-input.php").attr('href');
           });

        function interviewCandidate($data){
             $('#list-table-view').load("<?php echo base_url(); ?>source/Evaluation/index/"+$data+"/"+code).attr('href');
        }


      </script>