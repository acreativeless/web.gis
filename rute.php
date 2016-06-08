<!DOCTYPE html>
<html>
<head>
  <title>Marking Beberapa Lokasi dengan XML</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="WebGIS ini dibuat untuk uji coba">
  <meta name="keywords" content="webgis, mall, surakarta, marking, xml, geolocation">
  <meta name="author" content="Bengkel Tekno">

  <link rel="icon" href="assets/img/logo.ico">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <nav class="navbar navbar-fixed-top navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">WebGIS</a>
      </div>

      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.php">Beranda</a></li>
          <li><a href="lokasi.php">Lokasi</a></li>
          <li class="active"><a href="#">Rute</a></li>
          <li><a href="about.php">Tentang</a></li>
        </ul>
      </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->

  <div class="container">
    <div class="page-header">
      <h1>WebGIS Mall se-Surakarta</h1>
    </div>

    <p>Cari sendiri untuk fitur ini yaa :D</p>

    <hr>

    <footer>
      <p>&copy; 2016 <a href="../avistudcorp.blogspot.co.id">AVISTUD Creativeless</a></p>
    </footer>
  </div>

  <script language='JavaScript' type="text/javascript">
    var txt="   belanja biar bahagia  |";
    var kecepatan=100;var segarkan=null;function bergerak() { document.title=txt;
    txt=txt.substring(1,txt.length)+txt.charAt(0);
    segarkan=setTimeout("bergerak()",kecepatan);}bergerak();
  </script>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/offcanvas.js"></script>
</body>
</html>
