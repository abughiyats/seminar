

        <!-- Breadcrumbs -->
        <div class="page-title">
          <div>
            <h1><i class="fa fa-home"></i> Seminar Detail</h1>
          </div>
        </div>
        
      <div class="container-fluid">
        <div class="card mb-3">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover datatable" id="table-seminar_detail">
                <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode</th>
          						<th>Seminar Kode</th>
          						<th>Peserta Kode</th>
                      <th>Paid Amount</th>
          						<th>Payment Amount</th>
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
            table = $('#table-seminar_detail').DataTable({ 
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('src/menu/organisasi/Seminar_Detail/ajax_list')?>",
                    "type": "GET"
                },
                "columnDefs": [{ 
                  "orderable": false, 
                  "className": "dt-head-nowrap" 
                },{
                  "targets": [-1,1,4],
                  "width":"100px" 
                }
                ],
            });
        });

        function delete_seminar_detail(id_data){
         // ajax adding data to database
          $.ajax({
            url : "<?php echo base_url(); ?>src/menu/organisasi/Seminar_Detail/delete",
            type: "GET",
            data: {seminar_detail_code:id_data},
            dataType: "JSON",
            success: function(response, status, xhr, $form) { 
              if(response.status){
                show_message(response.message,1);
                table.ajax.reload( null, false );
              }else{
                show_message(response.message,4);
              }
              $('#form-project-head').modal('hide');
            },
            error: function(response, status, xhr, $form) { 
              show_message('Gagal proses data.!',4);
              return;
            }
          });
        }

        function update_seminar_detail(id_data,amount_data){
         // ajax adding data to database
          $.ajax({
            url : "<?php echo base_url(); ?>src/menu/organisasi/Seminar_Detail/update",
            type: "GET",
            data: {seminar_detail_code:id_data,seminar_detail_paid_amount:amount_data},
            dataType: "JSON",
            success: function(response, status, xhr, $form) { 
              if(response.status){
                show_message(response.message,1);
            	  table.ajax.reload( null, false );
              }else{
                show_message(response.message,4);
              }
              $('#form-project-head').modal('hide');
            },
            error: function(response, status, xhr, $form) { 
              show_message('Gagal proses data.!',4);
              return;
            }
          });
        }
      </script>