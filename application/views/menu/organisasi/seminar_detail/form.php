
        

        <!-- Breadcrumbs -->

        <div class="page-title">
          <div>
            <h1><i class="fa fa-home"></i> Seminar Detail</h1>
          </div>
        </div>

      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <div class="row" style="margin-right: 5px;margin-left: 5px;">
              <div class="col-md-12">
                <h4 class="line-head">Settings</h4>
                <form id="seminar_detail">
                  <div class="clearfix col-md-6">
                    <label>Code</label>
                    <input class="form-control" type="text" name="seminar_detail_code" value="AUTO" style="text-align: center;" readonly="true">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                  </div>
                  <div class="clearfix col-md-6">
                    <label>seminar_detail_title</label>
                    <input class="form-control" type="text" name="seminar_detail_title">
                  </div>
                  <div class="clearfix col-md-6">
                    <label>seminar_detail_date</label>
                    <input class="form-control datepicker" type="text" name="seminar_detail_target_date">
                  </div>
                  <div class="clearfix col-md-6">
                    <label>pembicara</label>
                    <input class="form-control" type="text" name="seminar_detail_pembicara">
                  </div>
                  <div class="clearfix col-md-3">
                    <label>open_regist_date</label>
                    <input class="form-control datepicker" type="text" name="seminar_detail_open_regist_date">
                  </div>
                  <div class="clearfix col-md-3">
                    <label>close_regist_date</label>
                    <input class="form-control datepicker" type="text" name="seminar_detail_close_regist_date">
                  </div>
                  <div class="clearfix col-md-3">
                    <label>qouta</label>
                    <input class="form-control" type="number" name="seminar_detail_qouta">
                  </div>
                  <div class="clearfix col-md-3">
                    <label>price</label>
                    <input class="form-control" type="number" name="seminar_detail_price">
                  </div>
                  <div class="clearfix col-md-6">
                    <label>certificate_status</label>
                    <input class="form-control" type="text" name="seminar_detail_certificate_status">
                  </div>
                  <div class="clearfix col-md-6">
                    <label>remark</label>
                    <input class="form-control" type="text" name="seminar_detail_remark">
                  </div>
                  <div class="row mb-12">
                    <div class="col-md-12" style="margin-top: 10px;margin-bottom: 10px;">
                      <button class="btn btn-primary" type="button" id="save-seminar_detail" onclick="save_data('seminar_detail')"><i class="fa fa-fw fa-lg fa-save"></i> Save</button>
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
        var id_data = '<?php echo $seminar_detail_code; ?>';
        $(document).ready(function(){
          $('.datetimepicker').datetimepicker({format: 'dd-mm-yyyy hh:ii'});
          $('.datepicker').datepicker({
              locale: 'in',
              format: 'dd-mm-yyyy',
              nowText: 'Sekarang'
          });

          $('form').on('keypress', function(e) {
              if(e.keyCode == 13) {
                $("#save-seminar_detail").trigger("click");
              }
          });

          $("form [name='seminar_detail_title']").focus();
          if (id_data!='') {
            $.ajax({
              url : '<?php echo base_url(); ?>/src/menu/organisasi/Seminar_Detail/reqs_one',
              type: "GET",
              data: {code:id_data},
              dataType: "JSON",
              success: function(response, status, xhr, $form) { 
                if(response.status){
                  $("form [name='seminar_detail_code']").attr('readonly',true);
                  $("form [name='seminar_detail_code']").val(response.data.seminar_detail_code);
                  $("form [name='seminar_detail_title']").val(response.data.seminar_detail_title);
                  $("form [name='seminar_detail_target_date']").val(formatDate(response.data.seminar_detail_target_date));
                  $("form [name='seminar_detail_pembicara']").val(response.data.seminar_detail_pembicara);
                  $("form [name='seminar_detail_open_regist_date']").val(formatDate(response.data.seminar_detail_open_regist_date));
                  $("form [name='seminar_detail_close_regist_date']").val(formatDate(response.data.seminar_detail_close_regist_date));
                  $("form [name='seminar_detail_qouta']").val(response.data.seminar_detail_qouta);
                  $("form [name='seminar_detail_price']").val(response.data.seminar_detail_price);
                  $("form [name='seminar_detail_certificate_status']").val(response.data.seminar_detail_certificate_status);
                  $("form [name='seminar_detail_remark']").val(response.data.seminar_detail_remark);
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
          if(id_data == ''){url = "<?php echo base_url(); ?>src/menu/organisasi/Seminar_Detail/insert";
          }else{url = "<?php echo base_url(); ?>src/menu/organisasi/Seminar_Detail/update";}

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