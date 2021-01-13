
        

        <!-- Breadcrumbs -->

        <div class="page-title">
          <div>
            <h1><i class="fa fa-home"></i> Management Organisasi</h1>
          </div>
        </div>

      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <div class="row" style="margin-right: 5px;margin-left: 5px;">
              <div class="col-md-12">
                <h4 class="line-head">FORM INPUT</h4>
                <form id="city">
                  <div class="clearfix col-md-6">
                    <label>Kode</label>
                    <input class="form-control" type="text" name="management_organisasi_code" value="AUTO" style="text-align: center;" readonly="false">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                  </div>
                  <div class="clearfix col-md-6">
                    <label>Nama</label>
                    <input class="form-control" type="text" name="management_organisasi_name">
                  </div>
                  <div class="clearfix col-md-6">
                    <label>Organisation</label>
                    <input class="form-control" type="text" name="management_organisasi_organisasi_code">
                  </div>
                  <div class="clearfix col-md-6">
                    <label>Role</label>
                    <input class="form-control" type="text" name="management_organisasi_role_code">
                  </div>
                  <div class="clearfix col-md-6">
                    <label>Password</label>
                    <input class="form-control" type="text" name="management_organisasi_password">
                  </div>
                  <div class="row mb-12">
                    <div class="col-md-12" style="margin-top: 10px;margin-bottom: 10px;">
                      <button class="btn btn-primary" type="button" id="save-management-organisasi" onclick="save_data('city')"><i class="fa fa-fw fa-lg fa-save"></i> Save</button>
                      <button class="btn btn-danger" type="button" id="cancel" onclick="<?php echo $cancel;?>"><i class="fa fa-fw fa-lg fa-check-circle"></i> Cancel</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <script type="text/javascript">
        var id_data = '<?php echo $management_organisasi_code; ?>';
        $(document).ready(function(){
          $('.datetimepicker').datetimepicker({format: 'dd-mm-yyyy hh:ii'});
          $('.datepicker').datepicker({
              locale: 'in',
              format: 'dd-mm-yyyy',
              nowText: 'Sekarang'
          });

          $('form').on('keypress', function(e) {
              if(e.keyCode == 13) {
                $("#save-management-organisasi").trigger("click");
              }
          });

          $("form [name='management_organisasi_name']").focus();
          if (id_data!='') {
            $.ajax({
              url : '<?php echo base_url(); ?>/src/menu/Management_Organisasi/reqs_one',
              type: "GET",
              data: {code:id_data},
              dataType: "JSON",
              success: function(response, status, xhr, $form) { 
                if(response.status){
                  $("form [name='management_organisasi_code']").attr('readonly',true);
                  $("form [name='management_organisasi_code']").val(response.data.management_organisasi_code);
                  $("form [name='management_organisasi_name']").val(response.data.management_organisasi_name);
                  // show_message(response.message,1);
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
        });

        function save_data(params){
          // #validasi form
          // if($('form [name="pasien_advertise_code"]').val()==""){
          //   show_message("Iklan Belum Di Pilih!",4);
          //   return;
          // }
          $("#".params).LoadingOverlay("show");
          var url = "";
          if(id_data == ''){url = "<?php echo base_url(); ?>src/menu/Management_Organisasi/insert";
          }else{url = "<?php echo base_url(); ?>src/menu/Management_Organisasi/update";}

           // ajax adding data to database
           var frm_id = "#"+params;
            $.ajax({
              url : url,
              type: "POST",
              data: $(frm_id).serialize(),
              dataType: "JSON",
              success: function(response, status, xhr, $form) { 
                if(response.status){
                  show_message(response.message,1);
                  $('#cancel').trigger('click');
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