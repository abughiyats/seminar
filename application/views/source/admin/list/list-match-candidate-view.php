

        <!-- Breadcrumbs -->

        <div class="page-title">
          <div>
            <h1><i class="fa fa-table"></i> Match Candidate</h1>
            <p></p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Match Candidate</a></li>
            </ul>
          </div>
        </div>

        
      <div class="container-fluid">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <hr>
                <div class="form-group row" style="margin-left: 10%;">
                  <label class="col-3 col-form-label">Company Name </label>:
                  <label class="col-3 col-form-label"> <?php echo $project->ptName; ?> </label>
                </div>
                <div class="form-group row"  style="margin-left: 10%;">
                  <label class="col-3 col-form-label">Contact Number </label>:
                  <label class="col-3 col-form-label"> <?php echo $project->ptPhone; ?> </label>
                </div>
                <hr>
              </div>
            </div>
          </div>
        </div>

      <div class="container-fluid">
        <div class="card mb-3  ">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-responsive" id="table-match-candidate">
                <thead>
                  <th>No</th>
                  <th>Status</th>
                  <th>NIK</th>
                  <th>Peserta</th>
                  <th>Hanphone</th>
                  <th>Negara</th>
                  <th>Kota</th>
                  <th>Alamat</th>
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
          var code = <?php echo $project->ptId; ?> ;
          var search1 = <?php echo $search1; ?> ;
          var search2 = <?php echo $search2; ?> ;
          var search3 = <?php echo $search3; ?> ;
          var search4 = <?php echo $search4; ?> ;
          var overlay;
          $(document).ready(function() {
            // overlay = $('<div></div>').prependTo('body').attr('id', 'overlay');

              //datatables
              table = $('#table-match-candidate').DataTable({ 

                  "processing": true, //Feature control the processing indicator.
                  "serverSide": true, //Feature control DataTables' server-side processing mode.
                  "order": [], //Initial no order.

                  // Load data for the table's content from an Ajax source
                  "ajax": {
                      "url": "<?php echo site_url('source/MatchCandidate/ajax_list')?>/"+code+"/"+search1+"/"+search2+"/"+search3+"/"+search4,
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


        function registCandidate(id){
          //Ajax Load data from ajax
          $.ajax({
            url : "<?php echo site_url('source/AsessmentReport/insert')?>/"+id+"/"+code,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                  table.ajax.reload( null, false );
                // $('#jwId').val(data.jwId);

            },
            error: function (jqXHR, textStatus, errorThrown){
              // alert(textStatus);
                alert('Error get data from ajax');
            }
          });
        }
      </script>