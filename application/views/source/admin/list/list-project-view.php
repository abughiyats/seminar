

        <!-- Breadcrumbs -->

        <div class="page-title">
          <div>
            <h1><i class="fa fa-dashboard"></i> Project</h1>
            <p></p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Project</a></li>
            </ul>
          </div>
        </div>

      <div class="container-fluid" >
        <!-- Example Tables Card -->
        <div class="card mb-3 " >
          <div class="card-header">
            <!-- <i class="fa fa-dashboard fa-2x"></i> -->
            <button type="button" class="btn btn-info" onclick="add()" margin-left: 2%;">Project</button>
          </div>
          <hr>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover" id="table-project">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Contract</th>
                        <th>Company Name</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th>Email</th>
                        <!-- <th>Status</th> -->
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
    <div class="portfolio-modal modal fade" id="form-project-head" tabindex="-1" role="dialog" aria-hidden="true">
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
                  <h2>Project Name</h2>
                  <form id="form">
                    <div class="form-group text-left" hidden="true">
                      <label for="name"><strong> ID </strong></label>
                      <input type="text" class="form-control" id="ptId" name="ptId" maxlength="3" style="text-transform:uppercase" placeholder="Enter Company ID  *"/>
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> Name </strong></label>
                      <input type="text" class="form-control" id="ptName" name="ptName" placeholder="Enter Company Name  *"/>
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> Email </strong></label>
                      <input type="text" class="form-control" id="ptEmail" name="ptEmail" placeholder="Enter Company Email *"/>
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> Phone </strong></label>
                      <input type="text" class="form-control" id="ptPhone" name="ptPhone" placeholder="Enter Company Phone *"/>
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> Addresss </strong></label>
                      <input type="text" class="form-control" id="ptAddress" name="ptAddress" placeholder="Enter Address *"/>
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> City </strong></label>
                      <input type="text" class="form-control" id="ptCity" name="ptCity" placeholder="Enter City *"/>
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> Country </strong></label>
                      <input type="text" class="form-control" id="ptCountry" name="ptCountry" placeholder="Enter Country *"/>
                    </div>
                    <div class="form-group text-right">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                      <a  type="button" onclick="saveProject()" class="btn btn-success">Save</a>
                    </div>
                  </form>          
                </div>
              </div>
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
              table = $('#table-project').DataTable({ 

                  "processing": true, //Feature control the processing indicator.
                  "serverSide": true, //Feature control DataTables' server-side processing mode.
                  "order": [], //Initial no order.

                  // Load data for the table's content from an Ajax source
                  "ajax": {
                      "url": "<?php echo site_url('source/Project/ajax_list')?>",
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

        function add(){
          method = 'add';
          $('#form')[0].reset(); // reset form on modals
          $('#form-project-head').modal('show'); // show bootstrap modal
        //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
        }

        function registProject($data){
          $url= "<?php echo base_url(); ?>source/Spesification"
             $('#list-table-view').load("<?php echo base_url(); ?>source/Spesification/index/"+$data).attr('href');
        }

        function saveProject(){
          var url;

          if(method == 'add'){
              url = "<?php echo base_url(); ?>source/Project/insert";
          }else{
              url = "<?php echo base_url(); ?>source/Project/update";
          }

           // ajax adding data to database
            $.ajax({
              url : url,
              type: "POST",
              data: $('#form').serialize(),
              dataType: "JSON",
              success: function(data){
                // alert(data)
                 //if success close modal and reload ajax table

                  table.ajax.reload( null, false );
                 $('#form-project-head').modal('hide');
              },
              error: function (jqXHR, textStatus, errorThrown){
                  alert('Error adding / update data');
                  return;
              }
            });
        }


        function getOneData(id){

          method = 'update';

          $('#form')[0].reset(); // reset form on modals

          //Ajax Load data from ajax
          $.ajax({
            url : "<?php echo site_url('source/Project/getOneData')?>/"+id,
            type: "GET",
            // data: {'ptId':id}, 
            dataType: "json",
            success: function(data){
                $('#ptId').val(data.ptId);
                $('#ptName').val(data.ptName);
                $('#ptPhone').val(data.ptPhone);
                $('#ptAddress').val(data.ptAddress);
                $('#ptCity').val(data.ptCity);
                $('#ptCountry').val(data.ptCountry);
                $('#ptEmail').val(data.ptEmail);
                $('#form-project-head').modal('show'); // show bootstrap modal when complete loaded

            },
            error: function (jqXHR, textStatus, errorThrown){
              // alert(textStatus);
                alert('Error get data from ajax');
            }
          });
        }

      </script>