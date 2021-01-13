

        <!-- Breadcrumbs -->
        <div class="page-title">
          <div>
            <h1><i class="fa fa-home"></i> Management Peserta</h1>
          </div>
        </div>
        
      <div class="container-fluid">
        <div class="card mb-3">
        <div class="form-group text-left">
          <a  type="button" onclick="<?php echo $tambah;?>" class="btn btn-success">Tambah</a>
        </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover datatable" id="table-management-organisasi">
                <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode</th>
                      <th>Nama</th>
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
            table = $('#table-management-organisasi').DataTable({ 
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('src/menu/Management_Organisasi/ajax_list')?>",
                    "type": "GET"
                },
                "columnDefs": [{ 
                  "orderable": false, 
                  "className": "dt-head-nowrap" 
                },{
                  "targets": [-1],
                  "width":"190px" 
                },{
                  "targets": [0],
                  "width":"50px" 
                },{
                  "targets": [1],
                  "width":"80px" 
                }
                ],
            });
        });

        function delete_city(id_data){
         // ajax adding data to database
          $.ajax({
            url : "<?php echo base_url(); ?>src/menu/Management_Organisasi/delete",
            type: "GET",
            data: {management_organisasi_code:id_data},
            dataType: "JSON",
            success: function(response, status, xhr, $form) { 
              if(response.status){
                show_message(response.message,1);
                table.ajax.reload( null, false );
              }else{
                show_message(response.message,4);
              }
              // $('#form-project-head').modal('hide');
            },
            error: function(response, status, xhr, $form) { 
              show_message('Gagal proses data.!',4);
              return;
            }
          });
        }
      </script>