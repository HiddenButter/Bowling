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
  
  
  if(isset($_POST['submit'])) {
	  
  $surname= $_POST['surname'];
  $name= $_POST['name'];
  $inputemail= $_POST['inputEmail'];
  $phone = $_POST['phone'];
  $players= $_POST['players'];
  $lane_id= $_POST['lane_id'];
  $date= $_POST['date'];
  $start= $_POST['start']; 
  $end= $_POST['end'];  
  $dscheck= $_POST['dsCheck'];
  $newsletter= $_POST['newsletter'];    
  
    // Check if surname has been entered
    if(empty($_POST['surname'])) {
      $errSurname= 'Bitte Vornamen angeben';
    }
    // Check if name has been entered
    if(empty($_POST['name'])) {
      $errName= 'Bitte Namen angeben';
    }
    // Check if email has been entered
    if(empty($_POST['inputEmail'])) {
      $errInputemail= 'Bitte E-Mail angeben';
    }
    // Check if email has been entered in valid format
    $email = test_input($_POST["inputemail"]);
    if (!filter_var($inputemail, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format";
    }
    // Check if phone number has been entered
    if(empty($_POST['phone'])) {
      $errPhone= 'Bitte Telefonnummer angeben';
    }
    // Check if player count has been entered
    if(empty($_POST['players'])) {
      $errPlayers= 'Bitte Anzahl der Spieler angeben';
    }
    // Check if lane id has been entered
    if(empty($_POST['lane_id'])) {
      $errLane_id= 'Bitte Bahnnummer angeben';
    }
    // Check if date has been entered and is valid
    if(empty($_POST['date'])) {
      $errDate = 'Bitte Datum angeben';
    }
    // Check if email has been entered and is valid
    if(empty($_POST['start'])) {
      $errStart = 'Bitte Startzeit angeben';
    }
    // Check if email has been entered and is valid
    if(empty($_POST['end'])) {
      $errEnd = 'Bitte geplante Dauer angeben';
    }
    // Check if email has been entered and is valid
    else if(empty($_POST['dsCheck'])) {
      $errDscheck = 'Bitte Datenschutzrichtlinien bestätigen';
    } else {
      echo "The form has been submitted";
    }
 if (!$errSurname && !$errName && !$errInputemail && !$emailErr && !$errPhone && !$errPlayers && !$errLane_id && !$errDate && !$errStart && !$errEnd && !$errDscheck) {
		$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
	} else {
		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
	}
}
  ?>
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
            <a class="nav-link text-white" href="index.php">Start</a>
          </li>
          <li class="nav-item mx-lg-2">
            <a class="nav-link text-white" href="#"> Reservierung </a>
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

  <div class="container mt-5">
    <h1 class="limegreen fw-bold">Reservierung Bowling</h1>
    <p>Wollen Sie bei uns einen festen Termin für unsere Bowlingbahnen reservieren?
      Kein Problem! Erledigen sie das direkt über unsere Online-Reservierung.
    </p>
  </div>

  <!--ANCHOR Registierungsgruppe -->
  <div class="container mt-5">
    <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
      <div class="form-group">
        <div class="row" id="Name">
          <div class="col">
            <label for="surname" class="form-label">Vorname</label>
            <input type="text" class="form-control" id="surname" name="surname" placeholder="Vorname" value="<?php echo htmlspecialchars($_POST['surname']); ?>">
			<?php echo "<p class='text-danger'>$errSurname</p>";?>
			
          </div>
          <div class="col">
            <label for="name" class="form-label">Nachname</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nachname" value="<?php echo htmlspecialchars($_POST['name']); ?>">
            <?php echo "<p class='text-danger'>$errName</p>";?> 
          </div>
        </div>
      </div>
      <div class="form-group mt-4">
        <label for="inputEmail"  class="form-label">E-Mail</label>
        <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" value="<?php echo htmlspecialchars($_POST['inputEmail']); ?>">
        <?php echo "<p class='text-danger'>$errEmail</p>";?>
      </div>
      <div class="form-group mt-4">
        <label for="phone"  class="form-label">Telefonnummer</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Telefonnummer" value="<?php echo htmlspecialchars($_POST['phone']); ?>">
        <?php echo "<p class='text-danger'>$errPhone</p>";?>
      </div>
      <div class="form-group mt-4">
        <div class="row">
          <div class="col">
            <label for="players" class="form-label">Anzahl Personen</label>
            <select class="form-select" id="players" name="players" placeholder="Anzahl Spieler" value="<?php echo htmlspecialchars($_POST['players']); ?>">
              <option selected disabled value="">Auswählen</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
            </select>
			<?php echo "<p class='text-danger'>$errPlayers</p>";?>
          </div>
          <div class="col">
            <label for="lane_id" class="form-label">Bahn</label>
            <select class="form-select" id="lane_id" name="lane_id" placeholder="Bahn" value="<?php echo htmlspecialchars($_POST['lane_id']); ?>">
              <option selected disabled value="">Auswählen</option>
              <option value="1">Bahn 1</option>
              <option value="2">Bahn 2</option>
              <option value="3">Bahn 3</option>
              <option value="4">Bahn 4</option>
              <option value="5">Bahn 5</option>
              <option value="6">Bahn 6</option>
              <option value="7">Bahn 7</option>
              <option value="8">Bahn 8</option>
            </select>
			<?php echo "<p class='text-danger'>$errLane_id</p>";?>
          </div>
        </div>
      </div>
      <div class="form-group mt-4">
        <div class="row">
          <div class="col">
            <label for="date" class="form-label">Datum</label>
            <input id="date" class="form-control" type="date" />
			<?php echo "<p class='text-danger'>$errDate</p>";?>
          </div>
          <div class="col">
            <label for="start" class="form-label">Startzeit</label>
            <select class="form-select" id="start" name="start" placeholder="Startzeit" value="<?php echo htmlspecialchars($_POST['start']); ?>">
              <option selected disabled value="">Auswählen</option>
              <option value="1">16:00</option>
              <option value="1">17:00</option>
              <option value="1">18:00</option>
              <option value="1">19:00</option>
              <option value="2">20:00</option>
              <option value="3">21:00</option>
              <option value="4">22:00</option>
              <option value="5">23:00</option>
              <option value="6">0:00</option>
              <option value="7">1:00</option>
              <option value="8">2:00</option>
            </select>
			<?php echo "<p class='text-danger'>$errStart</p>";?>
          </div>
          <div class="col">
            <label for="end" class="form-label">Endzeit</label>
            <select class="form-select" id="end" name="end" placeholder="Endzeit" value="<?php echo htmlspecialchars($_POST['end']); ?>">
              <option selected disabled value="">Auswählen</option>
              <option value="1">16:00</option>
              <option value="1">17:00</option>
              <option value="1">18:00</option>
              <option value="1">19:00</option>
              <option value="2">20:00</option>
              <option value="3">21:00</option>
              <option value="4">22:00</option>
              <option value="5">23:00</option>
              <option value="6">0:00</option>
              <option value="7">1:00</option>
              <option value="8">2:00</option>
            </select>
			<?php echo "<p class='text-danger'>$errEnd</p>";?>
          </div>
        </div>
      </div>
      <div class="form-check mt-5">
        <input type="checkbox" class="form-check-input" id="dsCheck" name="dsCheck" value="<?php echo htmlspecialchars($_POST['dsCheck']); ?>">
        <label class="form-check-label" for="exampleCheck1">Ich stimme den <a href="#">Datenschutzrichtlinien</a> zu.</label>
		<?php echo "<p class='text-danger'>$errDscheck</p>";?>
      </div>
      <div class="form-check mt-5">
        <input type="checkbox" class="form-check-input" id="newsletter" name="newsletter" value="<?php echo htmlspecialchars($_POST['newsletter']); ?>">
        <label class="form-check-label" for="exampleCheck1">Ich möchte Nachrichten über den Newsletter erhalten (optional).</label>
      </div>
      <div class="form-group mt-5">
      <button type="submit" class="btn btn-primary">Bestätigen</button>
	  <?php echo $result; ?>	
      </div>
    </form>
  </div>
</div>


</body>

<div class="footer py-5 bg-dark mt-5">&copy 2023 SigmaCorp</div>

</html>


