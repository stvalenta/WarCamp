<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
    <?php
    // define variables and set to empty values
    $nameErr = $emailErr = $genderErr = "";
    $name = $email = $gender = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["name"])) {
        $nameErr = "Name is required";
      } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
          $nameErr = "Only letters and white space allowed";
        }
      }
      
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
      }
        
      
      if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
      } else {
        $gender = test_input($_POST["gender"]);
      }
    }
    
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    ?>
    <div class="m-3 p-3 text-left col-md-5">
    <h2>PHP Form Validation Example</h2>
    <p><span class="text-danger">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
      <div class="alert alert-secondary">
        <label for="name">Name:</label>
       <input type="text" name="name" value="<?php echo $name;?>">
      <span class="text-danger">* <?php echo $nameErr;?></span>
      <br><br>
      <label for="email">Email:</label>
      <input type="text" name="email" value="<?php if ($emailErr == ""){ echo $email; } ?>">
      <span class="text-danger">* <?php echo $emailErr;?></span>
      <br><br>
      Gender:
      <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
      <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
      <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
      <span class="error text-danger">* <?php echo $genderErr;?></span>
      <br><br>
      <input type="submit" name="submit" value="Submit" class="btn btn-primary">
      <br><br>  
    </form>
    <div class="alert alert-success">
    <?php
    if (($name && $email && $gender) && ($emailErr == "")){
    echo "<h2>Your Input:</h2>";
    echo "name: " . $name;
    echo "<br><br>";
    echo "email: " . $email;
    echo "<br>";
    echo "<br>";
    echo "gender: " . $gender;
    echo "<br><br>";

    if(isset($_POST) && !empty($_POST)) {
    var_dump($_POST);
  }
  }
    ?>
</div>
</div>

</body>
</html>