

        <!-- Breadcrumbs -->

        <div class="page-title">
          <div>
            <h1><i class="fa fa-table"></i> Candidate</h1>
            <p></p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Candidate</a></li>
            </ul>
          </div>
        </div>
        
      <div class="container-fluid">
        <div class="card mb-3  ">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-responsive" id="table-candidate">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>First Name</th>
                        <th>Last Name</th>
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


    <!-- form-project-head -->
    <div class="portfolio-modal modal fade" id="form-candidate-head" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>

            <div class="row">
              <div class="col-lg-12 mx-auto">
                <div class="modal-body">
                  <h2>Information Candidate</h2>
                  <form id="form">
                  </form>          
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>



      <script type="text/javascript">
          var table;
          $(document).ready(function() {
              //datatables
              table = $('#table-candidate').DataTable({ 

                  "processing": true, //Feature control the processing indicator.
                  "serverSide": true, //Feature control DataTables' server-side processing mode.
                  "order": [], //Initial no order.

                  // Load data for the table's content from an Ajax source
                  "ajax": {
                      "url": "<?php echo site_url('source/Candidate/ajax_list')?>",
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


        function viewCandidate(id){
          $.ajax({
            url : "<?php echo site_url('source/Candidate/getDataUser')?>/"+id,
            type: "GET",
            // data: {'ptId':id}, 
            dataType: "json",
            success: function(data){
                // $('#ptId').val(data.ptId);

                $('#form')[0].reset(); // reset form on modals
                $('#form').html(data.result);
                $('#form-candidate-head').modal('show'); // show bootstrap modal

            },
            error: function (jqXHR, textStatus, errorThrown){
              // alert(textStatus);
                alert('Error get data from ajax');
            }
          });
        //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
        }


      </script>