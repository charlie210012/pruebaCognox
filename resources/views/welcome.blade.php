<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MIBANCA| MIBANCA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{env('APP_URL')}}/storage/assets/img/logo.png" rel="icon">
  <link href="{{env('APP_URL')}}/storage/assets/img/logo.png" rel="apple-touch-icon">

  
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <link href="{{env('APP_URL')}}/storage/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="{{env('APP_URL')}}/storage/assets/css/style.css" rel="stylesheet">
</head>

<body>


  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="{{ url('/') }}">Prueba Técnica Cognox - MIBANCA</a></h1>
     
      

      <a href="{{ route('login') }}" class="get-started-btn scrollto">Iniciar Sesion</a>

    </div>
  </header>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h2>Esta es la prueba técnica desarrollada por Carlos Andrés Arévalo Cortes para su ingreso a cognox en este link encontrará el repositorio donde podrá ver el código, para iniciar con la prueba de clic en <a href="{{ route('login') }}">iniciar sesión</a> </h2>
          
          <div class="d-lg-flex">
            <a target="_blank" href="https://github.com/charlie210012/pruebaCognox.git" class="btn-get-started scrollto">Repositorio</a>
        
          </div>
          
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{env('APP_URL')}}/storage/assets/img/img1.svg" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section>
</body>

</html>