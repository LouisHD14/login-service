<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coding AG Check In</title>
    <link rel="stylesheet" href="css/index.css">

    <style>
    .error, .success {
      color: red; /* Change the text color to red */
      font-weight: bold; /* Make the text bold */
      font-size: 25px; /* Increase the font size */
      margin: 15px 0; /* Add some margin to the top and bottom */
      padding: 15px; /* Add some padding */
      border-radius: 25px;
      background-color: #ffe6e6; /* Add a light red background color */
      border: 2px solid red
    }
    .success {
      color: green; /* Change the text color to green for success messages */
      background-color: #b7fcb9;
      border-color: green;
    }

    </style>
</head>
<body>
    <div class="login-page">
        <div class="form">
          <form class="login-form" action="php/login.php" method="post">
            <div class="login-text">LOGIN</div>
            <div>
              <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
              <?php } ?>
              <?php if (isset($_GET['success'])) { ?>
                <p class="success"><?php echo $_GET['success']; ?></p>
              <?php } ?>
            <input type="text" placeholder="Name" name="uname"/>
            <input type="password" placeholder="Password" name="password"/>
            <button type="submit">login</button>
          </form>
        </div>
        <a href="./php/signup-site.php">
            <button>Create an account</button>
          </a>
      </div>
</body>
</html>
