
    <style type="text/css">
      .btn.active {
          background-color: rgba(51, 122, 183, 1);
      }
      .btn-gold-drop {
          color: #fff;
          background-color: #d48600;
          border-color: #46b8da;a
      }
      h2{
        margin-top: 1px;
      }
      h3{
        margin-top: 1px;
      }
      .row {
          margin-right: 35px;
          margin-left: 35px;
      }
    </style>

    <!-- Breadcrumbs -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">HeadHunter</a>
      </li>
      <!-- <li class="breadcrumb-item">
        <a href="#">Profile</a>
      </li> -->
      <li class="breadcrumb-item active">Profile</li>
    </ol>


    <div class="row user">
      <div class="col-md-12">
        <div class="profile">
          <div class="info"><img class="user-img" src="<?php echo base_url(); ?>assets/images/el.png">
            <p><?php echo $this->session->userdata('logged_in')['username'];?></p>
            <p class="designation"><?php echo $this->session->userdata('logged_in')['roleName'];?></p>
          </div>
          <div class="cover-image"></div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card p-0">
          <ul class="nav nav-tabs nav-stacked user-tabs">
            <li class="active"><a href="#user-setting" data-toggle="tab">About Me</a></li>
            <li><a href="#user-experience" data-toggle="tab">Experience</a></li>
            <li><a href="#user-education" data-toggle="tab">Education</a></li>
            <li><a href="#user-sertification" data-toggle="tab">Personal Sertification</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-9">
        <div class="tab-content">
          <div class="tab-pane active" id="user-setting">
            <div class="card user-settings">
              <h4 class="line-head">About Me</h4>
              <form id="form" action="<?php echo base_url(); ?>source/Profile/insert" method="POST">
                <div class="row mb-20">
                  <div class="col-md-6" hidden="true">
                    <label>Id</label>
                    <input class="form-control" value="<?php echo $data->pfId; ?>" name="pfId" type="text">
                  </div>
                  <div class="col-md-6">
                    <label>First Name</label>
                    <input class="form-control" value="<?php echo $data->pfFirstName; ?>" name="pfFirstName" type="text">
                  </div>
                  <div class="col-md-6">
                    <label>Last Name</label>
                    <input class="form-control" value="<?php echo $data->pfLastName; ?>" name="pfLastName" type="text">
                  </div>
                </div>
                <div class="row">
                  <div class="clearfix"></div>
                  <div class="col-md-6">
                    <label>Date Of Bird</label>
                    <input class="form-control datepicker"  value="<?php echo $data->pfDateOfBird; ?>" name="pfDateOfBird" type="text">
                  </div>
                  <div class="col-md-3">
                    <label>Gender</label> 
                    <select class="form-control" id="pfGender" name="pfGender" value="<?php echo $data->pfGender; ?>" >
                        <?php  
                          if ($data->pfGender == 'Female') {
                            echo "<option value='Male'>Male</option>";
                            echo "<option selected='selected' value='Female'>Female</option>";
                          }else{
                            echo "<option selected='selected' value='Male'>Male</option>";
                            echo "<option value='Female'>Female</option>";
                          }
                        ?>
                    </select>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-6">
                    <label>Email</label>
                    <input class="form-control" value="<?php echo $data->pfEmail; ?>" name="pfEmail" type="text">
                  </div>
                  <div class="col-md-6">
                    <label>Password</label>
                    <input class="form-control" value="<?php echo $data->userPassword; ?>" name="pfPassword" type="password">
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-6">
                    <label>Mobile Number</label>
                    <input class="form-control" value="<?php echo $data->pfMobileNumber; ?>" name="pfMobileNumber" type="text">
                  </div>
                  <div class="col-md-6">
                    <label>Phone Number</label>
                    <input class="form-control" value="<?php echo $data->pfPhoneNumber; ?>" name="pfPhoneNumber" type="text">
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-12 mb-20">
                    <label>Address</label>
                    <input class="form-control"  value="<?php echo $data->pfAddress; ?>" name="pfAddress" type="text">
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-6">
                    <label>City</label>
                    <input class="form-control"  value="<?php echo $data->pfCity; ?>" name="pfCity" type="text">
                  </div>
                  <div class="col-md-6">
                    <label>Nationality</label>
                    <input class="form-control"  value="<?php echo $data->pfRegion; ?>" name="pfRegion"  type="text">
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-6 mb-20">
                    <label>Country</label>
                    <input class="form-control"  value="<?php echo $data->pfCountry; ?>" name="pfCountry" type="text">
                  </div>
                  <div class="col-md-6 mb-20">
                    <label>Postal Code</label>
                    <input class="form-control"  value="<?php echo $data->pfPostalCode; ?>" name="pfPostalCode" type="number">
                  </div>
                </div>
                <div class="row mb-10">
                  <div class="col-md-12">
                    <a class="btn btn-primary" type="button" onclick="save()"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="tab-pane" id="user-experience">
            <div class="form-group text-left">
              <button type="button"  onclick="add_ProfileExperience()" class="btn btn-success" >ADD</button>
            </div>
            <div class="timeline">
              <div class="post">
                <div class="content">
                  <h5><a href="#">EXPERIENCE</a></h5>
                </div>
                <table id="table-experience" class="table table-responsive">
                  <thead>
                    <tr>
                      <th></th>
                      <th></th>
                      <!-- <th></th> -->
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="user-education">
            <div class="form-group text-left">
              <button type="button" onclick="add_ProfileEducation()" class="btn btn-success" >ADD</button>
            </div>
            <div class="timeline">
              <div class="post">
                <div class="content">
                  <h5><a href="#">EDUCATION</a></h5>
                </div>
                <table id="table-education" class="table table-responsive">
                  <thead>
                    <tr>
                      <th></th>
                      <th></th>
                      <!-- <th></th> -->
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="user-sertification">
            <div class="form-group text-left">
              <button type="button" class="btn btn-success" onclick="add_ProfileSertification()">ADD</button>
            </div>
            <div class="timeline">
              <div class="post">
                <div class="content">
                  <h5><a href="#">PERSONAL SERTIFICATION</a></h5> 
                </div>
                <table id="table-sertification" class="table table-responsive">
                  <thead>
                    <tr>
                      <th></th>
                      <th></th>
                      <!-- <th></th> -->
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
        var table_ProfileExperience;
        var table_ProfileSertification;
        var table_ProfileEducation;
        var code = <?php echo $data->pfId; ?>;
        $(document).ready(function() {
            $('.datepicker').datepicker({
              format: "dd-MM-yyyy",
              autoclose:true
            });


              table_ProfileExperience = $('#table-experience').DataTable({ 
                  "bFilter": false, 
                  "bInfo": false,
                  "searching": false,
                  "paging": false,
                  "processing": true, //Feature control the processing indicator.
                  "serverSide": true, //Feature control DataTables' server-side processing mode.
                  "order": [], //Initial no order.

                  // Load data for the table's content from an Ajax source
                  "ajax": {
                      "url": "<?php echo site_url('source/ProfileExperience/ajax_list')?>",
                      "type": "POST"
                  },

                  //Set column definition initialisation properties.
                  "columnDefs": [
                  { 
                      "targets": [ 0 ], //first column / numbering column
                      "orderable": false, //set not orderable
                  },
                  ],
                  "aoColumns": [
                      // { "bSortable": false },
                      { "bSortable": false },
                      { "bSortable": false }
                  ]

              });

                table_ProfileSertification = $('#table-sertification').DataTable({ 
                  "bFilter": false, 
                  "bInfo": false,
                  "searching": false,
                  "paging": false,
                  "processing": true, //Feature control the processing indicator.
                  "serverSide": true, //Feature control DataTables' server-side processing mode.
                  "order": [], //Initial no order.

                  // Load data for the table's content from an Ajax source
                  "ajax": {
                      "url": "<?php echo site_url('source/ProfileSertification/ajax_list')?>",
                      "type": "POST"
                  },

                  //Set column definition initialisation properties.
                  "columnDefs": [
                  { 
                      "targets": [ 0 ], //first column / numbering column
                      "orderable": false, //set not orderable
                  },
                  ],
                  "aoColumns": [
                      // { "bSortable": false },
                      { "bSortable": false },
                      { "bSortable": false }
                  ]

              });

              table_ProfileEducation = $('#table-education').DataTable({ 
                  "bFilter": false, 
                  "bInfo": false,
                  "searching": false,
                  "paging": false,
                  "processing": true, //Feature control the processing indicator.
                  "serverSide": true, //Feature control DataTables' server-side processing mode.
                  "order": [], //Initial no order.

                  // Load data for the table's content from an Ajax source
                  "ajax": {
                      "url": "<?php echo site_url('source/ProfileEducation/ajax_list')?>",
                      "type": "POST"
                  },

                  //Set column definition initialisation properties.
                  "columnDefs": [
                  { 
                      "targets": [ 0 ], //first column / numbering column
                      "orderable": false, //set not orderable
                  },
                  ],
                  "aoColumns": [
                      // { "bSortable": false },
                      { "bSortable": false },
                      { "bSortable": false }
                  ]

              });


        });

        function save(){
          var url = "<?php echo base_url(); ?>source/Profile/update";

           // ajax adding data to database
            $.ajax({
              url : url,
              type: "POST",
              data: $('#form').serialize(),
              dataType: "JSON",
              success: function(data){
                // alert(data)
                 //if success close modal and reload ajax table
                 // alert("success");
                  $('#list-table-view').load("<?php echo base_url(); ?>source/Profile").attr('href');

                  // table.ajax.reload( null, false );
              },
              error: function (jqXHR, textStatus, errorThrown){
                  alert('Error adding / update data');
                  return;
              }
            });
        }
    </script>

    <!-- form-experience-head -->
    <div class="portfolio-modal modal fade" id="form-experience-head" tabindex="-1" role="dialog" aria-hidden="true">
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
                  <h2>Experience</h2>
                  <form id="form-experience">
                    <div class="form-group text-left">
                      <label for="name"><strong> Company Name *  </strong></label>
                      <input type="text" class="form-control" id="exCompany" name="exCompany" />
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> Position Title *  </strong></label>
                      <input type="text" class="form-control" id="exId" name="exId" style="display: none;" />
                      <input type="text" class="form-control" id="exTitle" name="exTitle" />
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> Joined Start Duration *  </strong></label>
                      <input type="text" class="form-control datepicker" id="exJoinStartDate" name="exJoinStartDate" />
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> Joined End Duration *  </strong></label>
                      <input type="text" class="form-control datepicker" id="exJoinEndDate" name="exJoinEndDate" />
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> Country *   </strong></label>
                      <input type="text" class="form-control" id="exCountry" name="exCountry" />
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> State *  </strong></label>
                      <input type="text" class="form-control" id="exState" name="exState" />
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> Salary *  </strong></label>
                      <input type="number" class="form-control" id="exSalary" name="exSalary" />
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> Industry *  </strong></label>
                        <select class="form-control" id="exIndustry" name="exIndustry">
                          <option value="0">Select..</option>
                          <?php  
                            if(is_array($listiIndustry) && count($listiIndustry) > 0){
                              foreach ($listiIndustry as $idt) {
                                echo "<option value=" .$idt->inId. ">" .$idt->inName . "</option>";
                              }
                            }
                          ?>
                        </select>
                      <!-- <input type="text" class="form-control" id="exIndustry" name="exIndustry" /> -->
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> Position Level * </strong></label>
                        <select class="form-control" id="exPosition" name="exPosition" >
                          <option value="0">Select..</option>
                          <?php  
                            if(is_array($listPosition) && count($listPosition) > 0){
                              foreach ($listPosition as $pst) {
                                echo "<option value=" .$pst->pnId. ">" .$pst->pnName . "</option>";
                              }
                            }
                          ?>
                        </select>
                      <!-- <input type="text" class="form-control" id="exPosition" name="exPosition" /> -->
                    </div>
                    <div class="form-group text-right">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                      <a  type="button" onclick="save_ProfileExperience()" class="btn btn-success">Save</a>
                    </div>
                  </form>          
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>

    <!-- script-experience-head -->
    <script type="text/javascript">

      function add_ProfileExperience(){
        method = 'add';
        $('#form-experience')[0].reset(); // reset form on modals
        $('#form-experience-head').modal('show'); // show bootstrap modal
      //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
      }

      function save_ProfileExperience(){
        var url;

        if(method == 'add'){
            url = "<?php echo base_url(); ?>source/ProfileExperience/insert";
        }else{
            url = "<?php echo base_url(); ?>source/ProfileExperience/update";
        }

         // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form-experience').serialize(),
            dataType: "JSON",
            success: function(data){
              // alert(data)
               //if success close modal and reload ajax table

                table_ProfileExperience.ajax.reload( null, false );
               $('#form-experience-head').modal('hide');
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error adding / update data');
                return;
            }
          });
      }


      function getOneData_ProfileExperience(id){
        method = 'update';

        $('#form-experience')[0].reset(); // reset form on modals

        //Ajax Load data from ajax
        $.ajax({
          url : "<?php echo site_url('source/ProfileExperience/getOneData')?>/"+id,
          type: "GET",
          dataType: "JSON",
          success: function(data){
              $('#exId').val(data.exId);
              $('#exPfId').val(data.exPfId);
              $('#exTitle').val(data.exTitle);
              $('#exCompany').val(data.exCompany);
              $('#exJoinStartDate').val(data.exJoinStartDate);
              $('#exJoinEndDate').val(data.exJoinEndDate);
              $('#exCountry').val(data.exCountry);
              $('#exState').val(data.exState);
              $('#exIndustry').val(data.exIndustry);
              $('#exPosition').val(data.exPosition);
              $('#exSalary').val(data.exSalary);
              $('#exDescription').val(data.exDescription);
              $('#exStatus').val(data.exStatus);
              $('#form-experience-head').modal('show'); // show bootstrap modal when complete loaded

          },
          error: function (jqXHR, textStatus, errorThrown){
            // alert(textStatus);
              alert('Error get data from ajax');
          }
        });
      }


      function delete_ProfileExperience(id){

        //Ajax Load data from ajax
        $.ajax({
          url : "<?php echo site_url('source/ProfileExperience/delete')?>/"+id,
          type: "GET",
          dataType: "JSON",
          success: function(data){
            alert("success")
          },
          error: function (jqXHR, textStatus, errorThrown){
            // alert(textStatus);
              alert('Error delete data from ajax');
          }
        });
      }
    </script>


    <!-- form-sertification-head -->
    <div class="portfolio-modal modal fade" id="form-sertification-head" tabindex="-1" role="dialog" aria-hidden="true">
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
                  <h2>Sertification</h2>
                  <form id="form-sertification">
                    <div class="form-group text-left">
                      <label for="name"><strong> Certification *  </strong></label>
                      <input type="text" class="form-control" id="seId" name="seId" style="display: none;" />
                      <input type="text" class="form-control" id="seCetificationName" name="seCetificationName" />
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> Certification Authority *  </strong></label>
                      <input type="text" class="form-control" id="seCertificationAuthor" name="seCertificationAuthor" />
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> License Number  *  </strong></label>
                      <input type="number" class="form-control" id="exJoinStartDate" name="exJoinStartDate" />
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> Time Start Period   *   </strong></label>
                      <input type="text" class="form-control datepicker" id="seTimeStartDate" name="seTimeStartDate" />
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> Time End Period  *   </strong></label>
                      <input type="text" class="form-control datepicker" id="seTimeEndtStart" name="seTimeEndtStart" />
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> Certification URL   *  </strong></label>
                      <input type="text" class="form-control" id="seCertificationUrl" name="seCertificationUrl" />
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> Expire  *  </strong></label>
                      <input type="text" class="form-control datepicker" id="seExpired" name="seExpired" />
                    </div>
                    <div class="form-group text-right">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                      <a  type="button" onclick="save_ProfileSertification()" class="btn btn-success">Save</a>
                    </div>
                  </form>          
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>

    <!-- fscriptorm-sertification-head -->
    <script type="text/javascript">

      function add_ProfileSertification(){
        method = 'add';
        $('#form-sertification')[0].reset(); // reset form on modals
        $('#form-sertification-head').modal('show'); // show bootstrap modal
      //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
      }

      function save_ProfileSertification(){
        var url;

        if(method == 'add'){
            url = "<?php echo base_url(); ?>source/ProfileSertification/insert";
        }else{
            url = "<?php echo base_url(); ?>source/ProfileSertification/update";
        }

         // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form-sertification').serialize(),
            dataType: "JSON",
            success: function(data){
              // alert(data)
               //if success close modal and reload ajax table

                table_ProfileSertification.ajax.reload( null, false );
               $('#form-sertification-head').modal('hide');
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error adding / update data');
                return;
            }
          });
      }


      function getOneData_ProfileSertification(id){

        method = 'update';

        $('#form-sertification')[0].reset(); // reset form on modals

        //Ajax Load data from ajax
        $.ajax({
          url : "<?php echo site_url('source/ProfileSertification/getOneData')?>/"+id,
          type: "GET",
          dataType: "JSON",
          success: function(data){
              $('#seId').val(data.seId);
              $('#sePfId').val(data.sePfId);
              $('#seCetificationName').val(data.seCetificationName);
              $('#seCertificationAuthor').val(data.seCertificationAuthor);
              $('#seLicense').val(data.seLicense);
              $('#seTimeStartDate').val(data.seTimeStartDate);
              $('#seTimeEndtStart').val(data.seTimeEndtStart);
              $('#seCertificationUrl').val(data.seCertificationUrl);
              $('#seExpired').val(data.seExpired);
              $('#seDescription').val(data.seDescription);
              $('#seStatus').val(data.seStatus);
              $('#form-sertification-head').modal('show'); // show bootstrap modal when complete loaded

          },
          error: function (jqXHR, textStatus, errorThrown){
            // alert(textStatus);
              alert('Error get data from ajax');
          }
        });
      }


      function delete_ProfileSertification(id){

        //Ajax Load data from ajax
        $.ajax({
          url : "<?php echo site_url('source/ProfileSertification/delete')?>/"+id,
          type: "GET",
          dataType: "JSON",
          success: function(data){
            alert("success")
          },
          error: function (jqXHR, textStatus, errorThrown){
            // alert(textStatus);
              alert('Error delete data from ajax');
          }
        });
      }
    </script>



    <!-- form-education-head -->
    <div class="portfolio-modal modal fade" id="form-education-head" tabindex="-1" role="dialog" aria-hidden="true">
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
                  <h2>Education</h2>
                  <form id="form-education">
                    <div class="form-group text-left">
                      <label for="name"><strong> Institute/University  *  </strong></label>
                      <input type="text" class="form-control" id="edId" name="edId" style="display: none;" />
                      <input type="text" class="form-control" id="edInstitute" name="edInstitute" />
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> Graduation Date  *  </strong></label>
                      <input type="text" class="form-control datepicker" id="edGraduationDate" name="edGraduationDate" />
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> Qualification   *  </strong></label>
                        <select class="form-control" id="edQualification" name="edQualification">
                          <option value="0">Select..</option>
                          <?php  
                            if(is_array($listQualification) && count($listQualification) > 0){
                              foreach ($listQualification as $qlt) {
                                echo "<option value=" .$qlt->qlId. ">" .$qlt->qlName . "</option>";
                              }
                            }
                          ?>
                        </select>
                      <!-- <input type="text" class="form-control datepicker" id="edQualification" name="edQualification" /> -->
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> Location  *   </strong></label>
                      <input type="text" class="form-control" id="edLocation" name="edLocation" />
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> Field of Study  *  </strong></label>
                        <select class="form-control"  id="edFieldOfStudy" name="edFieldOfStudy">
                          <option value="0">Select..</option>
                          <?php  
                            if(is_array($listStudy) && count($listStudy) > 0){
                              foreach ($listStudy as $stdy) {
                                echo "<option value=" .$stdy->stId. ">" .$stdy->stName . "</option>";
                              }
                            }
                          ?>
                        </select>
                      <!-- <input type="text" class="form-control" id="edFieldOfStudy" name="edFieldOfStudy" /> -->
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> Major  *  </strong></label>
                      <input type="text" class="form-control" id="edMaajor" name="edMaajor" />
                    </div>
                    <div class="form-group text-left">
                      <label for="name"><strong> Grade  * </strong></label>
                      <input type="text" class="form-control" id="edGrade" name="edGrade" />
                    </div>
                    <div class="form-group text-right">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                      <a  type="button" onclick=" save_ProfileEducation()" class="btn btn-success">Save</a>
                    </div>
                  </form>          
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>

    <!-- fscriptorm-education-head -->
    <script type="text/javascript">

      function add_ProfileEducation(){
        method = 'add';
        $('#form-education')[0].reset(); // reset form on modals
        $('#form-education-head').modal('show'); // show bootstrap modal
      //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
      }

      function save_ProfileEducation(){
        var url;

        if(method == 'add'){
            url = "<?php echo base_url(); ?>source/ProfileEducation/insert";
        }else{
            url = "<?php echo base_url(); ?>source/ProfileEducation/update";
        }

         // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form-education').serialize(),
            dataType: "JSON",
            success: function(data){
              // alert(data)
               //if success close modal and reload ajax table

                table_ProfileEducation.ajax.reload( null, false );
               $('#form-education-head').modal('hide');
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error adding / update data');
                return;
            }
          });
      }


      function getOneData_ProfileEducation(id){

        method = 'update';

        $('#form-education')[0].reset(); // reset form on modals

        //Ajax Load data from ajax
        $.ajax({
          url : "<?php echo site_url('source/ProfileEducation/getOneData')?>/"+id,
          type: "GET",
          dataType: "JSON",
          success: function(data){
              $('#edId').val(data.edId);
              $('#edPfId').val(data.edPfId);
              $('#edInstitute').val(data.edInstitute);
              $('#edGraduationDate').val(data.edGraduationDate);
              $('#edQualification').val(data.edQualification);
              $('#edLocation').val(data.edLocation);
              $('#edFieldOfStudy').val(data.edFieldOfStudy);
              $('#edMaajor').val(data.edMaajor);
              $('#edGrade').val(data.edGrade);
              $('#edDescription').val(data.edDescription);
              $('#edStatus').val(data.edStatus);
              $('#form-education-head').modal('show'); // show bootstrap modal when complete loaded

          },
          error: function (jqXHR, textStatus, errorThrown){
            // alert(textStatus);
              alert('Error get data from ajax');
          }
        });
      }


      function delete_ProfileEducation(id){

        //Ajax Load data from ajax
        $.ajax({
          url : "<?php echo site_url('source/ProfileEducation/delete')?>/"+id,
          type: "GET",
          dataType: "JSON",
          success: function(data){
            alert("success")
          },
          error: function (jqXHR, textStatus, errorThrown){
            // alert(textStatus);
              alert('Error delete data from ajax');
          }
        });
      }
    </script>