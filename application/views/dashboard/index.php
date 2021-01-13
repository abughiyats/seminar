<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo NAME_TAB_BAR;?></title>
    <!-- CSS-->
    <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/jquery.dataTables.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.min.css" rel="stylesheet" >
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" >

    <!-- Javascripts-->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.1.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.cookie.js"> </script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pace.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/tether.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/front.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/loadingoverlay.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-notify.min.js"></script>

    <style type="text/css">
      .row {
          margin-right: 35px;
          margin-left: 35px;
      }
      body{
        font-size: 1.5em;
      }
    </style>
  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->
      <header class="main-header hidden-print"><a class="logo" href="<?php echo base_url(); ?>auth/login" style='font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;'><?php echo NAME_TAB_BAR;?></a>
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu">
            <ul class="top-nav">
              <!-- User Menu-->
              <li class="dropdown"><a class="dropdown-toggle" href="<?php echo base_url(); ?>#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu">
                  <li><a id="setting-user" onclick="<?php echo $mn_profile;?>" href="#Profile" onclick="<?php echo $mn_profile;?>"><i class="fa fa-cog fa-lg"></i> Profile</a></li>
                  <!-- <li><a id="setting-profile"><i class="fa fa-user fa-lg"></i> Profile</a></li> -->
                  <li><a href="<?php echo base_url(); ?>auth/logout"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image" href="#Profile" onclick="<?php echo $mn_profile;?>"><img href="#Profile" onclick="<?php echo $mn_profile;?>" class="img-circle" src="<?php echo base_url(); ?>assets/images/user.png" alt="User Image"></div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata(NAME_SESSION)['user_name'];?></p>
              <input type="hidden" id="saldo_prfl" value="" /><p id="saldo_description" class="designation"><?php echo ($this->session->userdata(NAME_SESSION)['user_role']=="ROLE-003") ? "Saldo: Rp. ".number_format((float)$saldo_profile,2) : $this->session->userdata(NAME_SESSION)['user_role_id']; ?></p>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <?php echo $list_menu;?>
        </section>
      </aside>
      <div class="content-wrapper" id="list-table-view"></div>
    </div>

      <script type="text/javascript">
        $.extend( true, $.fn.dataTable.defaults, {
          "searching": true,
          "processing": true, //Feature control the processing indicator.
          "responsive": true, 
          "serverSide": true, 
          "autoWidth": true,
          "scrollX": true,
          "order": [],
          "ordering": false,
          "language": {
            "decimal":        "",
            "emptyTable":     "Data Tidak Ditemukan",
            "info":           "Menampilkan _START_ - _END_ dari _TOTAL_ data",
            "infoEmpty":      "Menampilkan 0 ke 0 dari 0 data",
            "infoFiltered":   "(pencarian dari _MAX_ jumlah data)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Menampilkan _MENU_",
            "loadingRecords": "Menunggu...",
            "processing":     "Memproses data...",
            "search":         "Cari:",
            "zeroRecords":    "Tidak ada data yang sesuai",
            "paginate": {
              "first":      "Awal",
              "last":       "Akhir",
              "next":       "Selanjutnya",
              "previous":   "Sebelumnya"
            },
            "aria": {
              "sortAscending":  ": activate to sort column ascending",
              "sortDescending": ": activate to sort column descending"
            }
          }

        });
        $(document).ready(function(){
          // $("#list-table-view").load('<?php echo base_url(); ?>source');
          $("li").click(function() {
            $("li").removeClass("active");
            $(this).addClass("active");
          });
          var saldo = <?php echo $saldo_profile; ?>;
          $("#saldo_prfl").val(saldo);
        });

        function load_menu(params){
          $.LoadingOverlay("show");
          $("#list-table-view").load(params);
          setInterval(function(){$.LoadingOverlay("hide");},300);
          // show_message('asd',1);
        }

        function show_message(perfix,status){
          var opt = 'info';
          if(status == 1){ opt = 'success';  
          }else if(status == 2){ opt = 'info';  
          }else if(status == 3){ opt = 'warning';  
          }else if(status == 4){ opt = 'danger';}

          $.notify({
                  // options
                  icon: 'glyphicon glyphicon-bell',
                  title: 'Notif:',
                  message: perfix
                  // url: 'https://github.com/mouse0270/bootstrap-notify',
                  // target: '_blank'
                },
                {
                  // settings
                  element: 'body',
                  position: 'fixed',
                  type: opt,
                  allow_dismiss: true,
                  newest_on_top: true,
                  showProgressbar: true,
                  placement: {
                    from: "bottom",
                    align: "right"
                  },
                  offset: 20,
                  spacing: 10,
                  z_index: 1031,
                  delay: 1000,
                  timer: 1000,
                  url_target: '_blank',
                  mouse_over: null,
                  animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                  },
                  onShow: null,
                  onShown: null,
                  onClose: null,
                  onClosed: null,
                  icon_type: 'class',
                  template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss"></button>' +
                                '<span data-notify="icon"></span> ' +
                                '<span data-notify="title">{1}</span> ' +
                                '<span data-notify="message">{2}</span>' +
                            '</div>' 
                });

          }


        function print_review(url){
          window.open(url);           
        }

        function check_out(id_data){
          $.ajax({
            url: '<?php echo base_url(); ?>auth/checkout',
            cache: false,
            success: function(data) {
              // console.log('token = '+data);
              // var resultType = document.getElementById('result-type');
              // var resultData = document.getElementById('result-data');

              // function changeResult(type,data){
                // $("#result-type").val(type);
                // $("#result-data").val(JSON.stringify(data));
              // }

              snap.pay(data, {
                onSuccess: function(result){
                  changeResult('success', result);
                  // console.log(result.status_message);
                  // console.log(result);
                  // $("#payment-form").submit();
                },
                onPending: function(result){
                  // changeResult('pending', result);
                  // console.log(result.status_message);
                  // $("#payment-form").submit();
                },
                onError: function(result){
                  // changeResult('error', result);
                  // console.log(result.status_message);
                  // $("#payment-form").submit();
                }
              });
            }
          });
        }

        function formatDate(date) {
          var d = new Date(date),
              month = '' + (d.getMonth() + 1),
              day = '' + d.getDate(),
              year = d.getFullYear();

          if (month.length < 2) month = '0' + month;
          if (day.length < 2) day = '0' + day;

          return [ day, month, year].join('-');
        }
        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
      </script> 
      <!-- <form id="payment-form" method="POST" action="<?php echo base_url();?>auth/confirm">
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <input type="hidden" name="result_type" id="result-type" value=""></div>
        <input type="hidden" name="result_data" id="result-data" value=""></div>
      </form> -->

  </body>
</html>