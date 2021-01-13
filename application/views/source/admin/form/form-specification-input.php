
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
      <li class="breadcrumb-item">
        <a href="#">Project</a>
      </li>
      <li class="breadcrumb-item active">Specification</li>
    </ol>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">

        <div class="row text-left">
          <div class="col-lg-12">
              <div class="form-group row">
                <button type="button" class="btn btn-info" href="#form-talent-need" onclick="insert()">Specification</button>
              </div>
              <hr>
              <div class="col-md-12">
                <div class="form-group row"  style="margin-left: 10%;">
                  <label class="col-3 col-form-label">Contract ID </label>
                  <div class="col-lg-8" >
                    <label class="col-form-label">: <?php echo $project->ptContract; ?> </label>
                  </div>
                </div>
                <div class="form-group row" style="margin-left: 10%;">
                  <label class="col-3 col-form-label">Company Name </label>:
                  <label class="col-3 col-form-label"><?php echo $project->ptName; ?> </label>
                </div>
              </div>
              <div class="col-md-12">
                <table class="table table-responsive">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Job Offer</th>  
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; 
                      if(is_array($listSpesifications) && count($listSpesifications) > 0){
                        foreach($listSpesifications as $spesification){ 
                          $no = $no+1; ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td>
                            <div class="form-group row text-left">
                              <label class="col-sm-3 form-label"><strong>Title </strong></label>
                              <div class="col-lg-8" >
                                <label class="form-label">&nbsp;&nbsp;<?php echo $spesification->spTitle;?></label>
                              </div>
                            </div>
                            <div class="form-group row text-left">
                              <label class="col-sm-3 form-label"><strong>Description </strong></label>
                              <div class="col-lg-8" >
                                &nbsp;&nbsp;<?php echo $spesification->spDescription;?>
                              </div>
                            </div>
                            <div class="form-group row text-left">
                              <label class="col-sm-3 form-label"><strong>Requirement </strong></label>
                              <div class="col-lg-8" >
                               &nbsp;&nbsp;<?php echo $spesification->spRequirement;?>
                              </div>
                            </div>
                          </td>
                          <td>
                            <button type="button" class="btn btn-warning" onclick="update(<?php echo $spesification->spId;?>)" data-toggle="modal" href="#form-talent-need">Edit</button>
                            <button type="button" class="btn btn-danger" onclick="Delete(<?php echo $spesification->spId;?>)" >Delete</button>
                          </td>
                        </tr>
                     <?php  
                          }
                       }
                     ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>


    <!-- form-talent-need -->
    <div class="portfolio-modal modal fade" id="form-talent-need" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <!-- <div class="container"> -->
            <div class="row">
              <div class="col-lg-12 mx-auto">
                <div class="modal-body">
                  <h2>Specification</h2>
                  <hr>
                  <form id="form">
                    <div hidden="true" class="form-group row text-left">
                      <label class="col-sm form-label"><strong>Id </strong></label>
                      <input type="text" class="form-control" id="spId" name="spId">
                      <input type="text" class="form-control" id="spPtId" name="spPtId" value="<?php echo $project->ptId; ?>">
                    </div>
                    <div class="form-group row text-left">
                      <label class="col-sm form-label"><strong>Title </strong></label>
                      <input type="text" class="form-control" id="spTitle" name="spTitle" placeholder="Enter Title *"/>
                    </div>
                    <div class="form-group row text-left">
                      <label class="col-sm form-label" ><strong>Description </strong></label>
                      <textarea type="text" class="form-control" id="spDescription" name="spDescription" placeholder="Enter Description *"/>
                    </div>
                    <div class="form-group row text-left">
                      <label class="col-sm form-label" id=""><strong>Requirement </strong></label>
                        <textarea type="text" class="form-control" id="spRequirement" name="spRequirement" placeholder="Enter Requirement *"/>
                    </div>
                    <div class="form-group text-right">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                      <a  type="button" onclick="save()" class="btn btn-success">Save</a>
                    </div>
                  </form>          
                </div>
              </div>
            </div>
          <!-- </div> -->
        </div>
      </div>
    </div>

    <script type="text/javascript">

        var save_method; //for save method string
        var table;
        var code = <?php echo $project->ptId; ?>;

      function insert(){
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        // $('#spPtId').val(code);
        $('#form-talent-need').modal('show'); // show bootstrap modal
      }

      function update(id){

        save_method = 'update';

        $('#form')[0].reset(); // reset form on modals

        //Ajax Load data from ajax
        $.ajax({
          url : "<?php echo site_url('source/Spesification/getOneData')?>",
          type: "POST",
          data : {'id':id},
          dataType: "JSON",
          success: function(data){
              $('#spId').val(data.spId);
              // $('#spPtId').val(code);
              $('#spTitle').val(data.spTitle);
              $('#spDescription').val(data.spDescription);
              $('#spRequirement').val(data.spRequirement);
              $("#form-talent-need").modal("show");
          },
          error: function (jqXHR, textStatus, errorThrown){
              alert('Error get data from ajax');
          }
        });
      }



      function save(){
        var url;
          if(save_method == 'add'){
              url = "<?php echo base_url(); ?>source/Spesification/insert";
          }else{
              url = "<?php echo base_url(); ?>source/Spesification/update";
          }

           // ajax adding data to database
            $.ajax({
              url : url,
              type: "POST",
              data: $('#form').serialize(),
              dataType: "JSON",
              success: function(data){
                $('#form-talent-need').modal('hide');
                $('#list-table-view').load("<?php echo base_url(); ?>source/Spesification/index/"+code).attr('href');
              },
              error: function (jqXHR, textStatus, errorThrown){
                  alert('Error adding / update data');
                  return;
              }
            });
        }

        function Delete(id){
          if(confirm('Are you sure delete this data?')){
            // ajax delete data from database
              $.ajax({
                url : "<?php echo base_url(); ?>source/Spesification/delete",
                type: "POST",
                data: {'id':id},
                dataType: "JSON",
                success: function(data){
                $('#list-table-view').load("<?php echo base_url(); ?>source/Spesification/index/"+code).attr('href');
                },
                error: function (jqXHR, textStatus, errorThrown){
                    alert('Error deleting data');
                }
            });

          }
        }

    </script>

