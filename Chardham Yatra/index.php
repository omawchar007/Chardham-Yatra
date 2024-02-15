<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chardham Yatra</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap');
    .navbar-brand {
      color: #ffd100; 
      font-family: 'Noto Serif', serif;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/om/Chardham Yatra/index.php">Chardham Yatra</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/om/Chardham Yatra/index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/om/Chardham Yatra/about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/om/Chardham Yatra/pricing.php">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/om/Chardham Yatra/contact.php">Contact</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container mt-4">
  <h1>Welcome to Chardham Yatra</h1>
  <img src="https://www.chardhamtour.in/wp-content/uploads/2018/02/chardham-heli-service.png" alt="Chardham" width="900">
  <br>
  <p>Embark on a spiritual journey to the holy Chardham sites nestled in the lap of the Himalayas. Explore the sacred temples of Yamunotri, Gangotri, Kedarnath, and Badrinath, and experience the divine aura of these revered destinations.</p>
  <p>Our expertly curated tours offer you a seamless and memorable pilgrimage experience. Whether you seek spiritual enlightenment or simply wish to immerse yourself in the tranquility of the Himalayas, Chardham Yatra is your gateway to a transformative journey.</p>

  <h2>Plan Your Journey</h2>
  <p>Fill out the form below to inquire about our Chardham Yatra packages:</p>

  <?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "chardham yatra";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate form data
    if (empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['email']) || empty($_POST['age']) || empty($_POST['dham'])) {
        echo '<div class="container mt-4">';
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
        echo '<strong>Error! </strong>Please fill in all the required fields.';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';
        echo '</div>';
    } else {
        // Retrieving form data
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $dhams = isset($_POST['dham']) ? implode(', ', $_POST['dham']) : '';

        // Inserting data into the 'trip' table
        $sql = "INSERT INTO trip (first_name, last_name, email, age, dhams) VALUES ('$first_name', '$last_name', '$email', '$age', '$dhams')";

        if (mysqli_query($conn, $sql)) {
            echo '<div class="container mt-4">';
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
            echo '<strong>Success! </strong>' . $first_name . '! Thank you for submitting the form.';
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
            echo '<span aria-hidden="true">&times;</span>';
            echo '</button>';
            echo '</div>';
            echo '</div>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

// Close connection
mysqli_close($conn);
?>


  <form action="/om/Chardham Yatra/index.php" method="post">
    <div class="form-group">
      <div class="row">
        <div class="col">
          <input type="text" name="first_name" class="form-control" placeholder="First name">
        </div>
        <div class="col">
          <input type="text" name="last_name" class="form-control" placeholder="Last name">
        </div>
      </div>
      <div class="form-group row mt-3">
        <label for="colFormLabel" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" name="email" class="form-control" id="colFormLabel" placeholder="Enter your email">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Select Age</label>
        <div class="col-sm-10">
          <select class="form-control" name="age" id="ageSelection">
            <option value="0-18">0 - 18</option>
            <option value="19-30">19 - 30</option>
            <option value="31-50">31 - 50</option>
            <option value="51+">51+</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Select Dhams</label>
        <div class="col-sm-10">
          <div class="form-check">
            <input class="form-check-input" name="dham[]" type="checkbox" id="badrinathCheckbox" value="Badrinath">
            <label class="form-check-label" for="badrinathCheckbox">
              Badrinath
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" name="dham[]" type="checkbox" id="kedarnathCheckbox" value="Kedarnath">
            <label class="form-check-label" for="kedarnathCheckbox">
              Kedarnath
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" name="dham[]" type="checkbox" id="gangotriCheckbox" value="Gangotri">
            <label class="form-check-label" for="gangotriCheckbox">
              Gangotri
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" name="dham[]" type="checkbox" id="yamunotriCheckbox" value="Yamunotri">
            <label class="form-check-label" for="yamunotriCheckbox">
              Yamunotri
            </label>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary" >Submit</button>
    </div>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
