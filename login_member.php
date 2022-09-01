  <?php

  session_start();

  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Member login Page </title>
    <link href="login_member.css" rel="stylesheet" type="text/css">
    <link href="mem_log.php">


  </head>

  <body>

    <div class="loginbox">

      <h1>Member Login </h1><br><br>

      <form action="mem_log.php">

        <p type="text_em" style="color: white;font-size: 24px;">Email Id</p>

        <input type="email" pattern="[^ @]*@[^ @]" name="email" placeholder="Enter your Email" required id="email">

        <p type="text_pa" style="color: white;font-size: 24px;">Password</p>

        <input type="password" name="password" placeholder="Password" required id="password">

        <input type="button" value="Login" name="enter" id="submit" onclick="validate()" /><br>


        <?php
        if (isset($_POST['enter'])) {
          global $db;
          $db->insert(
            'data',
            [
              'email' => 'sherwin',
              'password' => 'hi'
            ]
          );
        }

// include'mem_log.js'

        ?>

        <a href="Register.html" style="color: white;font-size: 18px;">Create a new account</a>

      </form>

    </div>


  </body>


  </html>