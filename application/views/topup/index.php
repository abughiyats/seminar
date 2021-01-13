
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
    <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js" data-client-key="<?php echo CLIENT_KEY;?>"></script>

    <div class="row user">
      <div class="col-md-12">
        <div class="profile">
          <div class="info"><img class="user-img" src="<?php echo base_url(); ?>assets/images/el.png">
            <p><?php echo $this->session->userdata(NAME_SESSION)['user_name'];?></p>
            <p class="designation"><?php echo $this->session->userdata(NAME_SESSION)['user_role_id'];?></p>
          </div>
          <div class="cover-image"></div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card p-0">
          <ul class="nav nav-tabs nav-stacked user-tabs">
            <li class="active"><a href="#user-setting" data-toggle="tab">Saldo</a></li>
            <!-- <li><a href="#user-experience" data-toggle="tab">Transaksi</a></li> -->
          </ul>
        </div>
      </div>
      <div class="col-md-9">
        <div class="tab-content">
          <div class="tab-pane active" id="user-setting">
            <div class="card user-settings">
              <h4 class="line-head">TOP UP</h4>
              <form id="form">
                <div class="row">
                  <div class="col-md-6">
                    <label>Pilih Nominal Saldo</label> 
                    <select class="form-control" id="saldo_peserta" name="saldo_peserta" value="10000" >
                    	<option value='10000'>Rp. 10.000</option>
                    	<option value='20000'>Rp. 20.000</option>
                    	<option value='25000'>Rp. 25.000</option>
                    	<option value='30000'>Rp. 30.000</option>
                    	<option value='50000'>Rp. 50.000</option>
                    	<option value='100000'>Rp. 100.000</option>
                    	<option value='150000'>Rp. 150.000</option>
                    	<option value='200000'>Rp. 200.000</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                	<br>
                  <div class="col-md-12">
                    <a class="btn btn-success" type="button" id="pay-button"><i class="fa fa-fw fa-lg fa-money"></i> TOPUP</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="tab-pane" id="user-experience">
            <div class="timeline">
              <div class="post">
                <div class="content">
                  <h5><a href="#">TRANSAKSI</a></h5>
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
        </div>
      </div>
    </div>

    <form id="payment-form">
      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      <input type="hidden" name="result_type" id="result-type" value=""></div>
      <input type="hidden" name="result_type" id="result-type" value=""></div>
      <input type="hidden" name="result_data" id="result-data" value=""></div>
      <input type="hidden" name="amount" id="amount" value=""></div>
      <input type="hidden" name="saldo" id="saldo" value=""></div>
    </form>
 <script type="text/javascript">
  
    $('#pay-button').click(function (event) {
      event.preventDefault();
      // $(this).attr("disabled", "disabled");
    
      $.ajax({
        url: '<?php echo base_url(); ?>snap/token?saldo='+$("#saldo_peserta").val(),
        cache: false,

        success: function(data) {
          // //location = data;
            $("#saldo").val(parseFloat($("#saldo_prfl").val())+parseFloat($("#saldo_peserta").val()));
            $("#amount").val($("#saldo_peserta").val());

          console.log('token = '+data);
          
          var resultType = document.getElementById('result-type');
          var resultData = document.getElementById('result-data');

          function changeResult(type,data){
            $("#result-type").val(type);
            $("#result-data").val(JSON.stringify(data));
            resultType.innerHTML = type;
            resultData.innerHTML = JSON.stringify(data);
          }
          snap.pay(data, {
            
            onSuccess: function(result){
              // $("#payment-form").submit();
              $.ajax({
                url : "<?php echo base_url(); ?>Topup",
                type: "POST",
                data: $("#payment-form").serialize(),
                dataType: "JSON",
                success: function(response, status, xhr, $form) {
                  location.reload(true);
                },
                error: function(response, status, xhr, $form) { 
                  location.reload(true);
                }
              });
            },
            onPending: function(result){
              // changeResult('pending', result);
              // console.log(result.status_message);
              $.ajax({
                url : "<?php echo base_url(); ?>Topup",
                type: "POST",
                data: $("#payment-form").serialize(),
                dataType: "JSON",
                success: function(response, status, xhr, $form) {
                  location.reload(true);
                },
                error: function(response, status, xhr, $form) { 
                  location.reload(true);
                }
              });
            },
            onError: function(result){
              // changeResult('error', result);
              // console.log(result.status_message);
              // $("#payment-form").submit();
            }
          });
        }
      });

    });
  </script>