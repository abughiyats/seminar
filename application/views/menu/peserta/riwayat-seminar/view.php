

        <!-- Breadcrumbs -->
        <div class="page-title">
          <div>
            <h1><i class="fa fa-home"></i> Riwayat Seminar</h1>
          </div>
        </div>
        
      <div class="container-fluid">
        <div class="card mb-3">
	      <div class="form-group text-left">
	        <!-- <a  type="button" onclick="<?php echo $tambah;?>" class="btn btn-success">Tambah</a> -->
	      </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover datatable" id="table-seminar">
                <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode</th>
          						<th>Tema</th>
          						<th>Tgl_Seminar</th>
          						<th>pembicara</th>
          						<th>lokasi</th>
          						<!-- <th>close_regist_date</th> -->
          						<th>qouta</th>
          						<th>price</th>
          						<th>Sertifikat_Status</th>
                      <!-- <th>Action</th> -->
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
            table = $('#table-seminar').DataTable({ 
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('src/menu/peserta/Riwayat_Seminar/ajax_list')?>",
                    "type": "GET"
                },
                "columnDefs": [{ 
                  "orderable": false, 
                  "className": "dt-head-nowrap" 
                },{
                  "targets": [-1,1,4,6,7],
                  "width":"100px" 
                }
                ],
            });
        });
      </script>