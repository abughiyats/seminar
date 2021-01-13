
        

        <!-- Breadcrumbs -->

        <div class="page-title">
          <div>
            <h1><i class="fa fa-home"></i> Seminar</h1>
          </div>
        </div>

      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <div class="row" style="margin-right: 5px;margin-left: 5px;">
              <div class="col-md-12">
                <h4 class="line-head">Settings</h4>
                <form id="seminar">
                  <div class="clearfix col-md-6">
                    <label>Code</label>
                    <input class="form-control" type="text" name="seminar_code" value="AUTO" style="text-align: center;" readonly="true">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                  </div>
                  <div class="clearfix col-md-6">
                    <label>seminar_title</label>
                    <input class="form-control" type="text" name="seminar_title">
                  </div>
                  <div class="clearfix col-md-6">
                    <label>seminar_date</label>
                    <input class="form-control datepicker" type="text" name="seminar_target_date">
                  </div>
                  <div class="clearfix col-md-6">
                    <label>pembicara</label>
                    <input class="form-control" type="text" name="seminar_pembicara">
                  </div>
                  <div class="clearfix col-md-3">
                    <label>open_regist_date</label>
                    <input class="form-control datepicker" type="text" name="seminar_open_regist_date">
                  </div>
                  <div class="clearfix col-md-3">
                    <label>close_regist_date</label>
                    <input class="form-control datepicker" type="text" name="seminar_close_regist_date">
                  </div>
                  <div class="clearfix col-md-3">
                    <label>qouta</label>
                    <input class="form-control" type="number" name="seminar_qouta">
                  </div>
                  <div class="clearfix col-md-3">
                    <label>price</label>
                    <input class="form-control" type="number" name="seminar_price">
                  </div>
                  <div class="clearfix col-md-6">
                    <label>certificate_status</label>
                    <input class="form-control" type="text" name="seminar_certificate_status">
                  </div>
                  <div class="clearfix col-md-6">
                    <label>remark</label>
                    <input class="form-control" type="text" name="seminar_remark">
                  </div>
                  <div class="row mb-12">
                    <div class="col-md-12" style="margin-top: 10px;margin-bottom: 10px;">
                      <button class="btn btn-primary" type="button" id="save-seminar" onclick="save_data('seminar')"><i class="fa fa-fw fa-lg fa-save"></i> Save</button>
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
        var id_data = '<?php echo $seminar_code; ?>';
        $(document).ready(function(){
          $('.datetimepicker').datetimepicker({format: 'dd-mm-yyyy hh:ii'});
          $('.datepicker').datepicker({
              locale: 'in',
              format: 'dd-mm-yyyy',
              nowText: 'Sekarang'
          });

          $('form').on('keypress', function(e) {
              if(e.keyCode == 13) {
                $("#save-seminar").trigger("click");
              }
          });

          $("form [name='seminar_title']").focus();
          if (id_data!='') {
            $.ajax({
              url : '<?php echo base_url(); ?>/src/menu/seminar/reqs_one',
              type: "GET",
              data: {code:id_data},
              dataType: "JSON",
              success: function(response, status, xhr, $form) { 
                if(response.status){
                  $("form [name='seminar_code']").attr('readonly',true);
                  $("form [name='seminar_code']").val(response.data.seminar_code);
                  $("form [name='seminar_title']").val(response.data.seminar_title);
                  $("form [name='seminar_target_date']").val(formatDate(response.data.seminar_target_date));
                  $("form [name='seminar_pembicara']").val(response.data.seminar_pembicara);
                  $("form [name='seminar_open_regist_date']").val(formatDate(response.data.seminar_open_regist_date));
                  $("form [name='seminar_close_regist_date']").val(formatDate(response.data.seminar_close_regist_date));
                  $("form [name='seminar_qouta']").val(response.data.seminar_qouta);
                  $("form [name='seminar_price']").val(response.data.seminar_price);
                  $("form [name='seminar_certificate_status']").val(response.data.seminar_certificate_status);
                  $("form [name='seminar_remark']").val(response.data.seminar_remark);
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
          if(id_data == ''){url = "<?php echo base_url(); ?>src/menu/seminar/insert";
          }else{url = "<?php echo base_url(); ?>src/menu/seminar/update";}

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
                $('#form-project-head').modal('hide');
              },
              error: function(response, status, xhr, $form) { 
                show_message('Gagal proses data.!',4);
                return;
              }
            });
        }
      </script>