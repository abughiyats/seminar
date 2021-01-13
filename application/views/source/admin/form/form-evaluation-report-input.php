
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
      .mod-size-md{
          vertical-align: middle;
          font-size:68%; 
          width:140px;
          height:50px;
      }
      .mod-size-sm{
          vertical-align: middle;
          font-size:68%; 
          width:120px;
          height:50px;
      }
    </style>

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">HeadHunter</a>
          </li>
          <li class="breadcrumb-item">
            <a href="#">Interview</a>
          </li>
          <li class="breadcrumb-item active">Evaluation reporting</li>
        </ol>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <hr>
                <!-- <form> -->
                <div class="form-group row" style="margin-left: 3%;">
                  <label class="col-md-3 ">Job Title </label>
                  <label class="col-md-3 ">: <?php echo $project->ptName; ?> </label>
                </div>
                <div class="form-group row" style="margin-left: 3%;">
                  <label class="col-md-3 ">Candidate Name </label>
                  <label class="col-md-3 ">: <?php echo $candidate->pfFirstName." ".$candidate->pfLastName; ?> </label>
                </div>
                <div class="form-group row" style="margin-left: 3%;">
                  <label class="col-md-3 ">Date </label>
                  <input class="col-md-3 " id="datepicker" name="datepicker" placeholder="Enter Date *"/>
                </div>
                <hr>
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title" style="margin-left: 3%;">Technical Skill</h3>
                <hr>
                <div class="form-group row" style="margin-left: 5%;">
                  <label class="col-sm-3 form-label">Education</label>
                  <div class="col-sm-9">
                    <div class="btn-group rad-edu" name="ev1" data-toggle="buttons">
                      <label class="btn btn-gold-drop mod-size-md">
                         <input name="ev1" type="radio" calss="options" value="0.092" autocomplete="off">Bachelor Degree
                      </label>
                      <label class="btn btn-gold-drop mod-size-md">
                         <input name="ev1" type="radio" calss="options" value="0.131" autocomplete="off">Master Degree
                      </label>
                      <label class="btn btn-gold-drop mod-size-md">
                         <input name="ev1" type="radio" calss="options" value="0.262" autocomplete="off">Doctorate
                      </label>
                      <label class="btn btn-gold-drop mod-size-md">
                         <input name="ev1" type="radio" calss="options" value="0.515" autocomplete="off">Professor
                      </label>
                    </div>
                  </div>
                </div>

                <div class="form-group row" style="margin-left: 5%;">
                  <label class="col-sm-3 form-label">Profesional Sertification</label>
                  <div class="col-sm-9">
                    <div class="btn-group rad-pro" name="ev2" data-toggle="buttons">
                      <label class="btn btn-gold-drop mod-size-md">
                         <input name="ev2" type="radio" calss="options" value="0.198" autocomplete="off"><label> 1-2 </label> <br><label>License</label>
                      </label>
                      <label class="btn btn-gold-drop mod-size-md">
                         <input name="ev2" type="radio" calss="options" value="0.312" autocomplete="off"><label> 3-4</label> <br> <label>License</label>
                      </label>
                      <label class="btn btn-gold-drop mod-size-md">
                         <input name="ev2" type="radio" calss="options" value="0.490" autocomplete="off"><label > More Than 4 </label> <br> <label>License</label>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="form-group row" style="margin-left: 5%;">
                  <label class="col-sm-3 form-label">Experience</label>
                  <div class="col-sm-9">
                    <div class="btn-group rad-exp" name="ev3" data-toggle="buttons">
                      <label class="btn btn-gold-drop mod-size-md">
                         <input name="ev3" type="radio" calss="options" value="0.092" autocomplete="off"><label>Less Than</label> <br> <label> 3 Years</label>
                      </label>
                      <label class="btn btn-gold-drop mod-size-md">
                         <input name="ev3" type="radio" calss="options" value="0.131" autocomplete="off"><label>More Equal To 3,</label> <br><label> Less Than 6 Years</label>
                      </label>
                      <label class="btn btn-gold-drop mod-size-md">
                         <input name="ev3" type="radio" calss="options" value="0.262" autocomplete="off"><label>More Equal To 5,</label> <br><label> Less Than 9 Years</label>
                      </label>
                      <label class="btn btn-gold-drop mod-size-md">
                         <input name="ev3" type="radio" calss="options" value="0.515" autocomplete="off"><label> More Than </label> <br> <label> 8 Years </label>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title" style="margin-left: 3%;">Competencies</h3>
                <hr>
                <div class="form-group row" style="margin-left: 5%;">
                  <label class="col-sm-3 form-label">Adaptability</label>
                  <div class="col-sm-9">
                    <div class="btn-group rad-adp" name="ev4" data-toggle="buttons">
                      <label class="btn btn-gold-drop mod-size-sm">
                         <input name="ev4" type="radio" calss="options" value="0.062" autocomplete="off"><label>No Evidence Of</label> <br><label>Profeciency</label>
                      </label>
                      <label class="btn btn-gold-drop mod-size-sm">
                         <input name="ev4" type="radio" calss="options" value="0.099" autocomplete="off"><label>Marginally</label> <br><label>Proficient</label>
                      </label>
                      <label class="btn btn-gold-drop mod-size-sm">
                         <input name="ev4" type="radio" calss="options" value="0.161" autocomplete="off"><label>Proficient</label>
                      </label>
                      <label class="btn btn-gold-drop mod-size-sm">
                         <input name="ev4" type="radio" calss="options" value="0.262" autocomplete="off"><label>Exceeds</label>
                      </label>
                      <label class="btn btn-gold-drop mod-size-sm">
                         <input name="ev4" type="radio" calss="options" value="0.416" autocomplete="off"><label>Greatly</label> <br><label>Exceeds</label>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="form-group row" style="margin-left: 5%;">
                  <label class="col-sm-3 form-label">Iniative Thinking</label>
                  <div class="col-sm-9">
                    <div class="btn-group rad-ini" name="ev5" data-toggle="buttons">
                      <label class="btn btn-gold-drop mod-size-sm">
                         <input name="ev5" type="radio" calss="options" value="0.062" autocomplete="off"><label>No Evidence Of</label> <br><label>Profeciency</label>
                      </label>
                      <label class="btn btn-gold-drop mod-size-sm">
                         <input name="ev5" type="radio" calss="options" value="0.099" autocomplete="off"><label>Marginally</label> <br><label>Proficient</label>
                      </label>
                      <label class="btn btn-gold-drop mod-size-sm">
                         <input name="ev5" type="radio" calss="options" value="0.161" autocomplete="off"><label>Proficient</label>
                      </label>
                      <label class="btn btn-gold-drop mod-size-sm">
                         <input name="ev5" type="radio" calss="options" value="0.262" autocomplete="off"><label>Exceeds</label>
                      </label>
                      <label class="btn btn-gold-drop mod-size-sm">
                         <input name="ev5" type="radio" calss="options" value="0.416" autocomplete="off"><label>Greatly</label> <br><label>Exceeds</label>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="form-group row" style="margin-left: 5%;">
                  <label class="col-sm-3 form-label">Problem Solving</label>
                  <div class="col-sm-9">
                    <div class="btn-group rad-prs" name="ev6" data-toggle="buttons">
                      <label class="btn btn-gold-drop mod-size-sm">
                         <input name="ev6" type="radio" calss="options" value="0.062" autocomplete="off"><label>No Evidence Of</label> <br><label>Profeciency</label>
                      </label>
                      <label class="btn btn-gold-drop mod-size-sm">
                         <input name="ev6" type="radio" calss="options" value="0.099" autocomplete="off"><label>Marginally</label> <br><label>Proficient</label>
                      </label>
                      <label class="btn btn-gold-drop mod-size-sm">
                         <input name="ev6" type="radio" calss="options" value="0.161" autocomplete="off"><label>Proficient</label>
                      </label>
                      <label class="btn btn-gold-drop mod-size-sm">
                         <input name="ev6" type="radio" calss="options" value="0.262" autocomplete="off"><label>Exceeds</label>
                      </label>
                      <label class="btn btn-gold-drop mod-size-sm">
                         <input name="ev6" type="radio" calss="options" value="0.416" autocomplete="off"><label>Greatly</label> <br><label>Exceeds</label>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="form-group row" style="margin-left: 5%;">
                  <label class="col-sm-3 form-label">Collaboration</label>
                  <div class="col-sm-9">
                    <div class="btn-group rad-col" name="ev7" data-toggle="buttons">
                      <label class="btn btn-gold-drop mod-size-sm">
                         <input name="ev7" type="radio" calss="options" value="0.062" autocomplete="off"><label>No Evidence Of</label> <br><label>Profeciency</label>
                      </label>
                      <label class="btn btn-gold-drop mod-size-sm">
                         <input name="ev7" type="radio" calss="options" value="0.099" autocomplete="off"><label>Marginally</label> <br><label>Proficient</label>
                      </label>
                      <label class="btn btn-gold-drop mod-size-sm">
                         <input name="ev7" type="radio" calss="options" value="0.161" autocomplete="off"><label>Proficient</label>
                      </label>
                      <label class="btn btn-gold-drop mod-size-sm">
                         <input name="ev7" type="radio" calss="options" value="0.262" autocomplete="off"><label>Exceeds</label>
                      </label>
                      <label class="btn btn-gold-drop mod-size-sm">
                         <input name="ev7" type="radio" calss="options" value="0.416" autocomplete="off"><label>Greatly</label> <br><label>Exceeds</label>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-11">
            <div class="text-right">
              <div class="card-body">
                <form id="form" hidden="true">
                  <div class="form-group text-left">
                    <input type="text" class="form-control" id="asPfId" name="asPfId" value="0" />
                    <input type="text" class="form-control" id="asPtId" name="asPtId" value="0" />
                    <input type="text" class="form-control" id="asDate" name="asDate" value="0" />
                    <!--<input type="text" class="form-control" id="asEv1" name="asEv1" value="0.092" />-->
                    <!--<input type="text" class="form-control" id="asEv2" name="asEv2" value="0.198" />-->
                    <!--<input type="text" class="form-control" id="asEv3" name="asEv3" value="0.092" />-->
                    <!--<input type="text" class="form-control" id="asEv4" name="asEv4" value="0.062" />-->
                    <!--<input type="text" class="form-control" id="asEv5" name="asEv5" value="0.062" />-->
                    <!--<input type="text" class="form-control" id="asEv6" name="asEv6" value="0.062" />-->
                    <!--<input type="text" class="form-control" id="asEv7" name="asEv7" value="0.062" />-->
                    <input type="text" class="form-control" id="asEv1" name="asEv1" value="0" />
                    <input type="text" class="form-control" id="asEv2" name="asEv2" value="0" />
                    <input type="text" class="form-control" id="asEv3" name="asEv3" value="0" />
                    <input type="text" class="form-control" id="asEv4" name="asEv4" value="0" />
                    <input type="text" class="form-control" id="asEv5" name="asEv5" value="0" />
                    <input type="text" class="form-control" id="asEv6" name="asEv6" value="0" />
                    <input type="text" class="form-control" id="asEv7" name="asEv7" value="0" />
                    <input type="text" class="form-control" id="asScore" name="asScore" value="0" />
                    <input type="text" class="form-control" id="asRating" name="asRating" value="0" />
                    <input type="text" class="form-control" id="asDescription" name="asDescription" value="0" />
                  </div>
                </form>
                <div class="form-group">
                    <!--<button type="button" class="btn btn-danger">Cancel</button>-->
                    <a type="button" class="btn btn-success" onclick="saveEvaluation()">Finish</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <h2><strong>Score</strong></h2>
                  <div>
                    <input type="text" readonly class="form-control" id="score">
                  </div>
                </div>
              </div>
            </div>
          </div>


    <style type="text/css">
        
        .stars-outer {
          display: inline-block;
          position: relative;
          font-family: FontAwesome;
        }
        
        .stars-outer::before {
          content: "\f006 \f006 \f006 \f006 \f006";
        }
        
        .stars-inner {
          position: absolute;
          top: 0;
          left: 0;
          white-space: nowrap;
          overflow: hidden;
          /*width: 0;*/
        }
        
        .stars-inner::before {
          content: "\f005 \f005 \f005 \f005 \f005";
          color: #f8ce0b;
        }
        
        .attribution {
          font-size: 12px;
          color: #444;
          text-decoration: none;
          text-align: center;
          position: fixed;
          right: 10px;
          bottom: 10px;
          z-index: -1;
        }
        .attribution:hover {
          color: #1fa67a;
        }

    </style>

          <div class="col-md-3">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <h2><strong>Ranking</strong></h2>
                    <div class="stars-outer">
                      <div class="stars-inner"></div>
                    </div>
                  <!--<div class="progress">-->
                    <!--<div class="progress-bar progress-bar-striped" id="pgrsRating" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><label id="textPgrs">0</Label></div>-->
                    <!--<div class="progress-bar fa-start" id="pgrsRating" ><label id="textPgrs">0</Label></div>-->
                  <!--</div>-->
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <h3><i>Comments</i></h3>
                  <div>
                  <textarea class="form-control" id="description"></textarea>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <script type="text/javascript">
          var idPt =  <?php echo $project->ptId; ?>;
          var idPf =  <?php echo $candidate->pfId; ?>;

          $(document).ready(function() {
             calculation();

            $('#datepicker').datepicker({
                format: "dd-MM-yyyy",
                autoclose:true
            }).on("change", function() {
                calculation();
            });
            
            $('input:radio[name="ev1"]').change(function() {
                $("#asEv1").val(this.value);
                calculation();
            });
            $('input:radio[name="ev2"]').change(function() {
                $("#asEv2").val(this.value);
                calculation();
            });
            $('input:radio[name="ev3"]').change(function() {
                $("#asEv3").val(this.value);
                calculation();
            });
            $('input:radio[name="ev4"]').change(function() {
                $("#asEv4").val(this.value);
                calculation();
            });
            $('input:radio[name="ev5"]').change(function() {
                $("#asEv5").val(this.value);
                calculation();
            });
            $('input:radio[name="ev6"]').change(function() {
                $("#asEv6").val(this.value);
                calculation();
            });
            $('input:radio[name="ev7"]').change(function() {
                $("#asEv7").val(this.value);
                calculation();
            });

            $('#description').keypress(function() {
                $("#asDescription").val(this.value);
            });

          });

        function saveEvaluation(){
          var url = "<?php echo base_url(); ?>source/AsessmentReport/update";
            calculation();
           // ajax adding data to database
            $.ajax({
              url : url,
              type: "POST",
              data: $('#form').serialize(),
              dataType: "JSON",
              success: function(data){
                // alert(data)
                 //if success close modal and reload ajax table
                 // alert("success");
                  $('#list-table-view').load("<?php echo base_url(); ?>source/Interview/index/"+idPt).attr('href');

                  // table.ajax.reload( null, false );
              },
              error: function (jqXHR, textStatus, errorThrown){
                  alert('Error adding / update data');
                  return;
              }
            });
        }

        function calculation(){
          $("#asPfId").val(idPf);
          $("#asPtId").val(idPt);
          $("#asRating").val(idPf);
          $('#asDate').val($('#datepicker').val());
          var ev1 = $("#asEv1").val()*0.074 ;
          var ev2 = $("#asEv2").val()*0.074 ;
          var ev3 = $("#asEv3").val()*0.237 ;
          var ev4 = $("#asEv4").val()*0.110 ;
          var ev5 = $("#asEv5").val()*0.154 ;
          var ev6 = $("#asEv6").val()*0.240 ;
          var ev7 = $("#asEv7").val()*0.110 ;
          var total = ev1+ev2+ev3+ev4+ev5+ev6+ev7;

          // $("#score").val(total.toFixed(3));
          $("#asScore").val(total);

          $("#score").val(total.toFixed(3)*1000);
          $("#asRating").val(total);
          
          var wd = ((total.toFixed(3)/0.452)*100).toFixed();
          $(".stars-inner").css("width",wd+"%");
        //   $('.progress-bar').text(((total.toFixed(3)/0.452)*100).toFixed()+'%');
        //   $('.progress-bar').css('width', ((total.toFixed(3)/0.452)*100).toFixed()+'%').attr('aria-valuenow', ((total.toFixed(3)/0.452)*100).toFixed());  

        }
        </script>