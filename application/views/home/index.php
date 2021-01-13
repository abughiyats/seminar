<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>SEMINAR || ESA UNGGUL</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">

  <!-- Favicon -->
  <link href="<?php echo base_url(); ?>assets/img/favicon.ico" rel="icon">
  <link href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?php echo base_url(); ?>assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?php echo base_url(); ?>assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">



  <!-- Required JavaScript Libraries -->
  <script src="<?php echo base_url(); ?>assets/lib/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/lib/jquery/jquery-migrate.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/lib/superfish/hoverIntent.js"></script>
  <script src="<?php echo base_url(); ?>assets/lib/superfish/superfish.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/lib/tether/js/tether.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/lib/stellar/stellar.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/lib/counterup/counterup.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/lib/waypoints/waypoints.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/lib/easing/easing.js"></script>
  <script src="<?php echo base_url(); ?>assets/lib/stickyjs/sticky.js"></script>
  <script src="<?php echo base_url(); ?>assets/lib/parallax/parallax.js"></script>
  <script src="<?php echo base_url(); ?>assets/lib/lockfixed/lockfixed.min.js"></script>

  <!-- Template Specisifc Custom Javascript File -->
  <script src="<?php echo base_url(); ?>assets/js/custom-2.js"></script>

  <script src="<?php echo base_url(); ?>assets/contactform/contactform.js"></script>

  <style type="text/css"> a{color: #ffffff;}
.bg-primary {
    background-color: #6c757d!important;
}</style>
  </head>

  <body>
  <!-- Page Content
    ================================================== -->
    <!-- Hero -->

  <section class="hero">
    <div class="container text-center">
      <div class="row">
        <div class="col-md-12">
          <!-- <a class="hero-brand" href="index.html" title="Home"><img alt="Bell Logo" src="<?php echo base_url(); ?>assets/img/logo.png"></a> -->
        </div>
      </div>

      <div class="col-md-12">
        <h1>
            SEMINAR ESA UNGGUL
          </h1>
        <a class="btn btn-full" href="#about">LIHAT JADWAL</a>
      </div>
    </div>

  </section>
  <!-- /Hero -->

  <!-- Header -->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <!-- <a href="index.html"><img src="<?php echo base_url(); ?>assets/img/logo-nav.png" alt="" title="" /></img></a> -->
        <!-- Uncomment below if you prefer to use a text image -->
        <h1><a href="#hero">SEMINAR UEU</a></h1>
      </div>

      <nav class="nav social-nav pull-right d-none d-lg-inline">
        <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-linkedin"></i></a> <a href="#"><i class="fa fa-envelope"></i></a>
      </nav>
    </div>
  </header>
  <!-- #header -->

  <!-- About -->

  <section class="about" id="about">
    <div class="container text-center">
      <h2>
        <u>JADWAL SEMINAR</u> 
      </h2>
      <div class="row stats-row">
        <div class="stats-col text-center col-md-4 col-sm-6">
          <div class="circle">
            <span class="stats-no" data-toggle="counter-up"><?php echo $count_seminar; ?></span> SEMINAR HARI INI
          </div>
        </div>
        <div class="stats-col text-center col-md-4 col-sm-6">
          <div class="circle">
            <span class="stats-no" data-toggle="counter-up"><?php echo $count_peserta; ?></span> PESERTA SEMINAR
          </div>
        </div>
        <div class="stats-col text-center col-md-4 col-sm-6">
          <div class="circle">
            <span class="stats-no" data-toggle="counter-up"><?php echo $count_total; ?></span> TOTAL SEMINAR
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /About -->
  <!-- Parallax -->

  <div class="block bg-primary block-pd-lg block-bg-overlay text-center" data-bg-img="#" data-settings='{"stellar-background-ratio": 0.6}' data-toggle="parallax-bg">
    <h2>
      JADWAL SEMINAR
    </h2>
    <table class="table datatable" id="table-seminar">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Tema</th>
          <th scope="col">Pembicara</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Peserta</th>
          <th scope="col">Harga</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $i = 1;
          if($list_seminar){
            foreach ($list_seminar as $seminar) {
              echo "<tr>";
                echo "<th scope='row'>".$i."</th>";
                echo "<td>".$seminar->seminar_title."</td>";
                echo "<td>".$seminar->seminar_pembicara."</td>";
                echo "<td>".date("d-m-Y H:i", strtotime($seminar->seminar_target_date))."</td>";
                echo "<td>".$seminar->seminar_qouta."</td>";
                echo "<td>"."Rp " . number_format($seminar->seminar_price,0,',','.')."</td>";
                echo '<td> <a href="'.base_url("login").'" title="DAFTARKAN" ><i class="fa fa-edit"></i></a></td>';
              echo "</tr>";

              $i++;
            } 
          }else{
              echo "<tr> kosong";
              echo "</tr>";

          }
        ?>
      </tbody>
    </table>
    <!-- <p>
      This is the most powerful theme with thousands of options that you have never seen before.
    </p> -->
    <!-- <img alt="Bell - A perfect theme" class="gadgets-img hidden-md-down" src="<?php echo base_url(); ?>assets/img/gadgets.png"> -->
  </div>
<!-- 
  <section class="team" id="team">
    <div class="container">
      <h2 class="text-center">
        PEMBICARA
      </h2>
 -->
      <!-- <div class="row">

        <div class="col-sm-3 col-xs-6">
          <div class="card card-block">
            <a href="#"><img alt="" class="team-img" src="<?php echo base_url(); ?>assets/img/team-1.jpg">
              <div class="card-title-wrap">
                <span class="card-title">Sergio Fez</span> <span class="card-text">Art Director</span>
              </div>

              <div class="team-over"> -->
                <!-- <h4 class="hidden-md-down">
                  Connect with me
                </h4> -->

                <!-- <nav class="social-nav"> -->
                  <!-- <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-linkedin"></i></a> <a href="#"><i class="fa fa-envelope"></i></a> -->
                <!-- </nav> -->
                <!-- <p>
                  Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
                </p> -->
      <!--         </div>
            </a>
          </div>
        </div> -->
<!-- 
      </div>
    </div>
  </section> -->

  <section class="cta">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-sm-12 text-lg-left text-center">
          <h2>
            DAFTARKAN SEKARANG JUGA
          </h2>
        </div>

        <div class="col-lg-3 col-sm-12 text-lg-right text-center">
          <a class="btn btn-ghost" href="<?php echo base_url("login"); ?>">MASUK</a>
        </div>
      </div>
    </div>
  </section>

  <footer class="site-footer">
    <div class="bottom">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-xs-12 text-lg-left text-center">
            <p class="copyright-text">
              © UEU SEMINAR
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>


      <script type="text/javascript">
        $.extend( true, $.fn.dataTable.defaults, {
          "searching": false,
          "processing": false, //Feature control the processing indicator.
          "responsive": false, 
          "serverSide": false, 
          "autoWidth": true,
          "scrollY": 200,
          "scrollX": true,
          "order": [],
          "ordering": false,
          "language": {
            "decimal":        "",
            "emptyTable":     "Data Tidak Ditemukan",
            "info":           "Menampilkan _START_ - _END_ dari _TOTAL_ Jadwal Seminar",
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
          $('#table-seminar').DataTable();
        });

        function formatDate(date) {
          var d = new Date(date),
              month = '' + (d.getMonth() + 1),
              day = '' + d.getDate(),
              year = d.getFullYear();

          if (month.length < 2) month = '0' + month;
          if (day.length < 2) day = '0' + day;

          return [ day, month, year].join('-');
        }
      </script>

  <a class="scrolltop" href="#"><span class="fa fa-angle-up"></span></a>

</body>
</html>
