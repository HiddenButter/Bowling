<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sigma Club</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/de1dfde38e.js" crossorigin="anonymous"></script>
</head>
<body>
 <?php
 ini_set('display_errors', 1); 
 ini_set('display_startup_errors', 1); 
 error_reporting(E_ALL);
 
 
require __DIR__ . '/config/dbCredentials.php';
$servername = DB_TEST_HOST;
$dbname = DB_TEST_DB;
$username = DB_TEST_USER;
$password = DB_TEST_PASSWORD;

try
{
	$pdo = new PDO('mysql:host='.$servername.';dbname='.$dbname, $username, $password, array( PDO::MYSQL_ATTR_SSL_CA=>'sqlca.pem'));
}
catch(PDOException $e)
{
	echo $e->getMessage();
}
?>
  <!--ANCHOR Navigationsleiste-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark pt-lg-3 sticky-top">
    <div class="container">
      <a class="navbar-brand fw-bold fs-2" href="#"
        >Sigma<span class="limegreen">Club</span></a
      >
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-4">
          <li class="nav-item mx-lg-2">
            <a class="nav-link text-white" href="#">Start</a>
          </li>
          <li class="nav-item mx-lg-2">
            <a class="nav-link text-white" href="reservierung.php"> Reservierung </a>
          </li>
          <li class="nav-item mx-lg-2">
            <a class="nav-link text-white" href="impressum.php">Über uns</a>
          </li>
          <li class="d-flex align-items-center mx-lg-2 mt-2 mt-lg-0">
            <a
              href="http://www.facebook.de"
              target="_blank"
              class="icon-link text-white"
              ><i class="fab fa-facebook fa-lg me-2 mx-lg-2"></i
            ></a>
            <a
              href="http://www.twitter.de"
              target="_blank"
              class="icon-link text-white"
              ><i class="fab fa-twitter fa-lg mx-2"></i
            ></a>
            <a
              href="http://www.instagram.de"
              target="_blank"
              class="icon-link text-white"
              ><i class="fab fa-instagram fa-lg mx-2"></i
            ></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!--ANCHOR Carousel Darstellung-->
  <div
  id="carouselExampleFade"
  class="carousel slide carousel-fade"
  data-bs-ride="carousel"
>
<div class="carousel-indicators">
  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
</div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="8000">
      <div
        class="slider-image"
        style="background-image: url('Bilder/Bowlingbahn.jpg')"
      ></div>
      <div class="carousel-caption d-none d-md-block">
        <h5>Bowlinganlagen</h5>
        <p>Spielen sie auf unseren tuniererpropten Bowlingbahnen!</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="8000">
      <div
        class="slider-image"
        style="background-image: url('Bilder/Billiard.jpg')"
      ></div>
      <div class="carousel-caption d-none d-md-block">
        <h5>Billiard</h5>
        <p>Nutzen Sie unsere professionellen Billiardtische!</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="8000">
      <div
        class="slider-image"
        style="background-image: url('Bilder/Dart.jpg')"
      ></div>
      <div class="carousel-caption d-none d-md-block">
        <h5>Dart</h5>
        <p>Oder haben Sie Spaß mit unseren hochwertigen Dartscheiben!</p>
      </div>
    </div>
  </div>
  <button
    class="carousel-control-prev"
    type="button"
    data-bs-target="#carouselExampleFade"
    data-bs-slide="prev"
  >
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button
    class="carousel-control-next"
    type="button"
    data-bs-target="#carouselExampleFade"
    data-bs-slide="next"
  >
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!--ANCHOR Website Infos -->
<div class="container mt-5">
  <h1 class="limegreen fw-bold">Entdecken sie unsere Club-Angebote!</h1>
  <p>
    Willkommen in unserer Bowlinganlage mit Billard und Dart! Hier können Sie einen unvergesslichen Abend mit Freunden oder der Familie verbringen.

Unsere Bowlingbahnen sind modern und bieten eine tolle Atmosphäre für eine Partie Bowling. Unsere Pinsetter sind schnell und zuverlässig, so dass Sie sich voll und ganz auf Ihr Spiel konzentrieren können. Außerdem steht Ihnen eine große Auswahl an Bowlingbällen zur Verfügung, die für jede Handgröße und Spielstärke geeignet sind.

Wir bieten auch eine Vielzahl von Billardtischen, die für Anfänger und Fortgeschrittene geeignet sind. Hier können Sie mit Freunden eine Partie spielen oder einfach entspannen und einen Snack genießen.
  </p>
  <p>
    Dart ist ebenfalls Teil unseres Angebots. Unsere elektronischen Dartboards bieten viele verschiedene Spielmodi und sind eine großartige Möglichkeit, eine Pause von anderen Spielen zu machen oder Ihre Fähigkeiten zu verbessern.

Neben unseren Spielmöglichkeiten bieten wir auch eine Bar mit einer großen Auswahl an Getränken und Snacks. Hier können Sie zwischen Spielen entspannen und sich mit Freunden unterhalten.

Kommen Sie zu uns und erleben Sie einen unvergesslichen Abend in unserer Bowlinganlage mit Billard und Dart. Wir freuen uns darauf, Sie bald bei uns begrüßen zu dürfen!
  </p>
</div>


</body>

<!--ANCHOR Fußleiste-->
<div class="footer py-5 bg-dark mt-5">&copy 2023 SigmaCorp</div>

</html>
