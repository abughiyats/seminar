

        <!-- Breadcrumbs -->

        <div class="page-title">
          <div>
            <h1><i class="fa fa-dashboard"></i>User Management</h1>
            <p></p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">UserManagement</a></li>
            </ul>
          </div>
        </div>

      <div class="container-fluid" >
        <div class="card mb-3 " >
          <div class="card-header">
            <i class="fa fa-dashboard fa-2x"></i>
            <button type="button" class="btn btn-info" onclick="addManagement()" margin-left: 2%;">Headhunter</button>
          </div>
          <hr>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover" id="table-userManagement">
                <thead>
                    <tr>
                        <th>No</th>
                        <!--<th>ID</th>-->
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>addres</th>
                        <th>Status</th>
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


    <!-- form-userManagement-head -->
    <div class="portfolio-modal modal fade" id="form-userManagement-head" tabindex="-1" role="dialog" aria-hidden="true">
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
                  <h2>User Headhunter</h2>
                  <form id="form">
                    <div class="form-group text-left">
                      <label for="name"><strong>First Name </strong></label>
                      <input type="text" class="form-control" id="pfId" name="pfId" style="display: none;" placeholder="Enter Name  *"/>
                      <input type="text" class="form-control" id="pfFirstName" name="pfFirstName" placeholder="Enter First Name  *"/>
                    </div>
                    <div class="form-group text-left">
                    <label for="name"><strong>Last Name </strong></label>
                      <input type="text" class="form-control" id="pfLastName" name="pfLastName" placeholder="Enter Last Name  *"/>
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> Email </strong></label>
                      <input type="text" class="form-control" id="pfEmail" name="pfEmail" placeholder="Enter Email *"/>
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> Password </strong></label>
                      <input type="password" class="form-control" id="userPassword" name="userPassword" placeholder="*******"/>
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> Phone </strong></label>
                      <input type="text" class="form-control" id="pfPhoneNumber" name="pfPhoneNumber" placeholder="Enter Phone *"/>
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> Addresss </strong></label>
                      <input type="text" class="form-control" id="pfAddress" name="pfAddress" placeholder="Enter Address *"/>
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> City </strong></label>
                      <input type="text" class="form-control" id="pfCity" name="pfCity" placeholder="Enter Cty *"/>
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> Country </strong></label>
                      <input type="text" class="form-control" id="pfCountry" name="pfCountry" placeholder="Enter Country *"/>
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> Status </strong></label>
                        <select class="form-control" id="pfStatus" name="pfStatus">
                          <option value="1">Active</option>
                          <option value="0">Non Active</option>
                        </select>
                    </div>
                    <div class="form-group text-right">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                      <a  type="button" onclick="saveManagement()" class="btn btn-success">Save</a>
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
              table = $('#table-userManagement').DataTable({ 

                  "processing": true, //Feature control the processing indicator.
                  "serverSide": true, //Feature control DataTables' server-side processing mode.
                  "order": [], //Initial no order.

                  // Load data for the table's content from an Ajax source
                  "ajax": {
                      "url": "<?php echo site_url('source/UserManagement/ajax_list')?>",
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

        function addManagement(){
          method = 'add';
          $('#form')[0].reset(); // reset form on modals
          $('#form-userManagement-head').modal('show'); // show bootstrap modal
        //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
        }

        function registManagement($data){
          $url= "<?php echo base_url(); ?>source/Spesification"
             $('#list-table-view').load("<?php echo base_url(); ?>source/Spesification/index/"+$data).attr('href');
        }

        function saveManagement(){
          var url;

          if(method == 'add'){
              url = "<?php echo base_url(); ?>source/userManagement/insert";
          }else{
              url = "<?php echo base_url(); ?>source/userManagement/update";
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
                 $('#form-userManagement-head').modal('hide');
              },
              error: function (jqXHR, textStatus, errorThrown){
                  alert('Error adding / update data');
                  return;
              }
            });
        }


        function getOneDataManagement(id){

          method = 'update';

          $('#form')[0].reset(); // reset form on modals

          //Ajax Load data from ajax
          $.ajax({
            url : "<?php echo site_url('source/userManagement/getOneData')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                $('#pfId').val(data.pfId);
                $('#pfFirstName').val(data.pfFirstName);
                $('#pfLastName').val(data.pfLastName);
                $('#userPassword').val(data.userPassword);
                $('#pfName').val(data.pfName);
                $('#pfPhoneNumber').val(data.pfPhoneNumber);
                $('#pfEmail').val(data.pfEmail);
                $('#pfAddress').val(data.pfAddress);
                $('#pfCity').val(data.pfCity);
                $('#pfCountry').val(data.pfCountry);
                $('#pfStatus').val(data.pfStatus);
                $('#pfAction').val(data.pfAction);
                  
                $('#form-userManagement-head').modal('show'); // show bootstrap modal when complete loaded

            },
            error: function (jqXHR, textStatus, errorThrown){
              // alert(textStatus);
                alert('Error get data from ajax');
            }
          });
        }

      </script>