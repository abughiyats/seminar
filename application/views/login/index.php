<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/main.css">
    <!-- Font-iconassets/css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?php echo NAME_TAB_BAR;?></title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->

  </head>
  <body style=" width: 100%;
    height: auto;
    background-image: url('<?php echo base_url(); ?>assets/img/esa-unggul.jpg');
    background-size: cover;


    ">
    <!-- <section class="material-half-bg">
      <div class="cover"></div>
    </section> -->
    <section class="login-content">
      <!-- <div class="logo" style="text-align: center;"> -->
        <!-- <h1>Head Hunter</h1> -->
        <!-- <img src="<?php echo base_url(); ?>assets/images/tl.png" style="width: 45%;"> -->
      <!-- </div> -->
      <div class="login-box">
        <form class="login-form" id="login-form" action="<?php echo base_url(); ?>auth" method="POST">
          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="form-group">
            <label class="control-label" for="username">USERNAME</label>
            <input class="form-control" type="text" name="username" id="username" placeholder="username" autofocus />
          </div>
          <div class="form-group">
            <label class="control-label" for="password">PASSWORD</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="**********" />
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label class="semibold-text">
                  <!-- <input type="checkbox"><span class="label-text">Stay Signed in</span> -->
                </label>
              </div>
            </div>
          </div>
          <div class="form-group btn-container">
            <button type="button" class="btn btn-info btn-block" id="sign-in" onclick="login('login-form',1)"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label class="semibold-text">
                  <span class="label-text">belum punya akun..?</span>
                </label>
              </div>
              <p class="semibold-text mb-0"><a data-toggle="flip" style="color: #2196f3;">DAFTAR</a></p>
            </div>
          </div>
        </form>
        <form class="forget-form" id="regis-form" action="<?php echo base_url(); ?>auth/register" method="POST">
          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
          <div class="form-group">
            <label class="control-label">First Name</label>
            <input type="text" class="form-control" name="fName" placeholder="First Name">
          </div>
          <div class="form-group">
            <label class="control-label">Last Name</label>
            <input type="text" class="form-control" name="lName" placeholder="Last Name">
          </div>
          <div class="form-group">
            <label class="control-label">USER NAME</label>
            <input type="text" class="form-control" name="username" placeholder="User Name">
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="**********" />
          </div>
          <div class="form-group btn-container">
            <button type="button" onclick="login('regis-form',0)" class="btn btn-info btn-block" style="color: #2196f3;"><i class="fa fa-sign-in fa-lg fa-fw"></i>REGISTER</button>
          </div>
          <div class="form-group mt-20">
            <p class="semibold-text mb-0"><a data-toggle="flip" style="color: #2196f3;"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form>
      </div>
    </section>
  </body>

  <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/pace.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap-notify/bootstrap-notify.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function(){
    });

   function show_message(perfix,status){
      var opt = 'info';
      if(status == 1){ opt = 'success';  
      }else if(status == 2){ opt = 'info';  
      }else if(status == 3){ opt = 'warning';  
      }else if(status == 4){ opt = 'danger';}

      $.notify({
              // options
              icon: 'glyphicon glyphicon-bell',
              title: 'Pemberitahuan',
              message: perfix
              // url: 'https://github.com/mouse0270/bootstrap-notify',
              // target: '_blank'
            },
            {
              // settings
              element: '.m-content',
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
              delay: 5000,
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
                          '<div class="progress" data-notify="progressbar">' +
                            '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                          '</div>' +
                            // '<a href="{3}" target="{4}" data-notify="url"></a>' +
                        '</div>' 
            });

      }
  
    function login(params,status){
      // $("#".params).LoadingOverlay("show");
      var url = "";
      if(status){url = "<?php echo base_url(); ?>auth";
      }else{url = "<?php echo base_url(); ?>auth/register";}

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
              window.location.assign(response.url);
            }else{
              show_message(response.message,1);
            }
            $('#form-project-head').modal('hide');
          },
          error: function(response, status, xhr, $form) { 
            show_message('Gagal proses data.!',1);
            return;
          }
        });
    }
  </script>
</html>