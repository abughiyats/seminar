

        <!-- Breadcrumbs -->

        <div class="page-title">
          <div>
            <!-- <h1><i class="fa fa-table"></i>city</h1> -->
            <p></p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <!-- <li><a href="#">city</a></li> -->
            </ul>
          </div>
        </div>
        
      <div class="container-fluid">
        <div class="card mb-3  ">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-responsive" id="table-city">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Code</th>
                        <th>Name</th>
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
          $(document).ready(function() {
              //datatables
              table = $('#table-city').DataTable({ 

                  "processing": true, //Feature control the processing indicator.
                  "serverSide": true, //Feature control DataTables' server-side processing mode.
                  "order": [], //Initial no order.

                  // Load data for the table's content from an Ajax source
                  "ajax": {
                      "url": "<?php echo site_url('src/master/city/ajax_list')?>",
                      "type": "POST"
                  },

                  //Set column definition initialisation properties.
                  "columnDefs": [{ 
                      "targets": [ 0 ], //first column / numbering column
                      "orderable": false, //set not orderable
                    },
                  ],
              });
          });

      </script>