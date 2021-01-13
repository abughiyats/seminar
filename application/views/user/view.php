
        

        <!-- Breadcrumbs -->

        <div class="page-title">
          <div>
            <h1><i class="fa fa-user"></i> Profil</h1>
            <p></p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">User</a></li>
            </ul>
          </div>
        </div>

      <div class="container-fluid">
        <div class="card mb-3  ">
          <div class="card-body">
            <div class="row user">
              <div class="col-md-12">
                <div class="profile">
                  <div class="info">
                    <img class="user-img"  src="<?php echo base_url(); ?>assets/images/user.png">
                      <form id="img-profile" enctype="multipart/form-data" >
                        <div class="custom-file">
                          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                          <input type="file" class="custom-file-input" name="file_name" onchange="readURL(this);" style="display: none;"/>
                          <input class="btn btn-info" id="btn-upload" value="Upload" />
                        </div>
                      </form>
                    <h4><?php echo $this->session->userdata(NAME_SESSION)['user_name'];?></h4>
                    <p><?php echo $this->session->userdata(NAME_SESSION)['user_role_id'];?></p>
                  </div>
                  <div class="cover-image"></div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card p-0">
                  <ul class="nav nav-tabs nav-stacked user-tabs">
                    <li class="active"><a href="#user-data-seminar" data-toggle="tab">Data Seminar</a></li>
                    <li><a href="#user-settings" data-toggle="tab">Pengaturan</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-9">
                <div class="tab-content">
                  <div class="tab-pane active" id="user-data-seminar">
                    <div class="data-seminar">
                      <div class="card">
                        <h4 class="line-head">DAFTAR SEMINAR</h4>
                        <div class="table-responsive">
                          <table class="table table-hover datatable" id="table-city">
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
                  <div class="tab-pane fade" id="user-settings">
                    <div class="card user-settings">
                      <h4 class="line-head">Pengaturan User</h4>
                      <form>
                        <div class="row mb-20">
                          <div class="col-md-4">
                            <label>First Name</label>
                            <input class="form-control" type="text">
                          </div>
                          <div class="col-md-4">
                            <label>Last Name</label>
                            <input class="form-control" type="text">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-8 mb-20">
                            <label>Email</label>
                            <input class="form-control" type="text">
                          </div>
                          <div class="clearfix"></div>
                          <div class="col-md-8 mb-20">
                            <label>Mobile No</label>
                            <input class="form-control" type="text">
                          </div>
                          <div class="clearfix"></div>
                          <div class="col-md-8 mb-20">
                            <label>Office Phone</label>
                            <input class="form-control" type="text">
                          </div>
                          <div class="clearfix"></div>
                          <div class="col-md-8 mb-20">
                            <label>Home Phone</label>
                            <input class="form-control" type="text">
                          </div>
                        </div>
                        <div class="row mb-10">
                          <div class="col-md-12">
                            <button class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <script type="text/javascript">
        $("#btn-upload").click(function(){
          $(".custom-file-input").trigger('click');

        });

       function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.user-img').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
            $("#img-profile").submit();
        }
        
        $('#img-profile').on('submit',(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                 url:'<?php echo base_url('auth/uploads'); ?>',
                 type:"POST",
                 data:new FormData(this),
                 processData:false,
                 contentType:false,
                 cache:false,
                 // async:false,
                  success: function(data){
                      // alert(data);
               }
             });

            // $.ajax({
            //     url: "<?php echo base_url('auth/uploads'); ?>",
            //     type:'POST',
            //     data:formData,
            //     cache:false,
            //     contentType: false,
            //     processData: false,
            //     success:function(data){
            //         console.log("success");
            //         console.log(data);
            //     },
            //     error: function(data){
            //         console.log("error");
            //         console.log(data);
            //     }
            // });
        }));
      </script>