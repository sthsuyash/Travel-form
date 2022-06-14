<!-- php code  -->
<?php
$insert = false;

if (isset($_POST['name'])) {
  // set connection variables
  $server = 'localhost';
  $username = 'root';
  $password = '';

  // create a database connection
  $con = mysqli_connect($server, $username, $password);

  // check for connection success
  if (!$con) {
    die('Connection to this database failed due to ' . mysqli_connect_error());
  }
  // echo 'Success connecting to the database.';

  // initialize variables
  $name = $age = $email = $phone = $suggestion = '';

  // collect post variables from the form
  $name = $_POST['name'];
  $age = $_POST['age'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $suggestion = $_POST['suggestion'];

  $sql = "INSERT INTO `tripdata`.`trip` (`name`, `age`, `phone`, `email`, `suggestion`, `date`) VALUES ('$name', '$age', '$phone', '$email', '$suggestion', current_timestamp())";
  // echo $sql;

  // execute the query
  if ($con->query($sql) == true) {
    // echo 'Successfully inserted.';

    // flag for successful insertion
    $insert = true;
  } else {
    echo "ERROR: $sql <br/> $con->error";
  }

  // close the connection
  $con->close();
}
?>

<!-- html -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome to Travel form</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <img class="bg" src="bg.jpg" alt="background" />
    <div class="container">
      <h1>Welcome to Prime Travel Form</h1>
      <p>
        Enter your details and submit the form to confirm your participation in
        the trip.
      </p>
        <?php if ($insert == true) {
          echo '<p class="submitted-msg">Thank You for submitting your form!</p>';
        } ?>

      <!-- form for submission -->
      <form method="POST" action="<?php echo htmlspecialchars(
        $_SERVER['PHP_SELF']
      ); ?>" >
        <!-- name input -->
        <input
          type="text"
          name="name"
          id="name"
          placeholder="Enter your name"
        />
        <!-- end -->

        <!-- age input -->
        <input type="text" name="age" id="age" placeholder="Enter your age" />
        <!-- end -->

        <!-- gender input -->
        <!-- <label for="gender">Gender: </label>
        <input type="radio" name="gender" id="male" value="male" />
        Male
        <input type="radio" name="gender" id="female" value="female" />
        Female
        <input type="radio" name="gender" id="others" value="others" />
        Others -->
        <!-- end -->

        <!-- phone number -->
        <input
          type="tel"
          name="phone"
          id="phone"
          placeholder="Enter your phone number"
        />
        <!-- end -->

        <!-- email -->
        <input
          type="email"
          name="email"
          id="email"
          placeholder="Enter your email address"
        />
        <!-- end -->

        <!-- suggestion -->
        <textarea
          name="suggestion"
          id="suggestion"
          cols="30"
          rows="10"
          placeholder="Suggestions"
        ></textarea>
        <!-- end -->

        <div class="btn-container">
          <button class="btn">Submit</button>
          <button class="btn" type="reset">Reset</button>
        </div>
      </form>
    </div>
    <script src="index.js"></script>
  </body>
</html>

