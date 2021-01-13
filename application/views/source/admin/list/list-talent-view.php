

        <!-- Breadcrumbs -->

        <div class="page-title">
          <div>
            <h1><i class="fa fa-dashboard"></i> Talent</h1>
            <p></p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Talent</a></li>
            </ul>
          </div>
        </div>

      <div class="container-fluid" >
        <div class="card mb-3 " >
          <div class="card-header">
            <!-- <button type="button" class="btn btn-info" onclick="add()" margin-left: 2%;">Talent</button> -->
          </div>
          <hr>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover" id="table-talent">
                <thead>
                    <th>No</th>
                    <th>Project Name</th>
                    <th  width="300px">Talent Need</th>    
                    <th style="text-align: center">Action</th>  
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <br><br><br><br>
            <div class="table-responsive">
              <div class="col-md-12">
                <table id="table-spesification" class="table table-responsive">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th style="text-align: center">Job Offer</th>  
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

    <!-- form-talent-head -->
    <div class="portfolio-modal modal fade" id="search-filter" tabindex="-1" role="dialog" aria-hidden="true">
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
                  <h2>Search Candidat</h2>
                  <hr>
                  <form action="form-search"> 
                    <input hidden="true" type="text" id="ptId" name="ptId" /> 
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon" ><strong>Education  </strong></div> 
                        <select class="form-control" id="sel1" name="sel1">
                          <option value="0">Select..</option>
                          <?php  
                            if(is_array($listEducation) && count($listEducation) > 0){
                              foreach ($listEducation as $edc) {
                                echo "<option value=" .$edc->ecId. ">" .$edc->ecName . "</option>";
                              }
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon"><strong>Industri  </strong></div> 
                        <select class="form-control" id="sel2" name="sel2">
                          <option value="0">Select..</option>
                          <?php  
                            if(is_array($listiIndustry) && count($listiIndustry) > 0){
                              foreach ($listiIndustry as $idt) {
                                echo "<option value=" .$idt->inId. ">" .$idt->inName . "</option>";
                              }
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon" ><strong>Position Level  </strong></div> 
                        <select class="form-control"  id="sel3" name="sel3">
                          <option value="0">Select..</option>
                          <?php  
                            if(is_array($listPosition) && count($listPosition) > 0){
                              foreach ($listPosition as $pst) {
                                echo "<option value=" .$pst->pnId. ">" .$pst->pnName . "</option>";
                              }
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon" ><strong>Experience  </strong></div> 
                        <select class="form-control"  id="sel4" name="sel4">
                          <option value="0">Select..</option>
                          <?php  
                            if(is_array($listExperience) && count($listExperience) > 0){
                              foreach ($listExperience as $exp) {
                                echo "<option value=" .$exp->epId. ">" .$exp->epName . "</option>";
                              }
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group text-right">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                      <a type="button" class="btn btn-info" onclick="registTalent()" data-dismiss="modal">Search</a>
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
          var code; //for save method string
          var method; //for save method string
          var table;
          $(document).ready(function() {
              //datatables
              table = $('#table-talent').DataTable({ 
                  "processing": true, //Feature control the processing indicator.
                  "serverSide": true, //Feature control DataTables' server-side processing mode.
                  "order": [], //Initial no order.

                  // Load data for the table's content from an Ajax source
                  "ajax": {
                      "url": "<?php echo site_url('source/Talent/ajax_list')?>",
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

        function search_fillter(id){
          code = id;
          $("#ptId").val(id);
          $('#search-filter').modal('show'); // show bootstrap modal
        }

        function registData(id){
              $("#table-spesification").dataTable().fnDestroy();
              var table_talent = $('#table-spesification').DataTable({ 
                  "destroy": true,
                  "retrieve": true,
                  "searching":   false,
                  "paging":   false,
                  "ordering": false,
                  "info":     false,
                  "processing": true, //Feature control the processing indicator.
                  "serverSide": true, //Feature control DataTables' server-side processing mode.
                  "order": [], //Initial no order.

                  // Load data for the table's content from an Ajax source
                  "ajax": {
                      "url": "<?php echo site_url('source/Spesification/ajax_list')?>/"+id,
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
        }

        function registTalent(){
          $('#list-table-view').load("<?php echo base_url(); ?>source/MatchCandidate/index/"+code+"/"+$("#sel1").val()+"/"+$("#sel2").val()+"/"+$("#sel3").val()+"/"+$("#sel4").val()).attr('href');
        }

      </script>