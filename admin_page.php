<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/admin_page.css" rel="stylesheet" type="text/css">
  <title>Admin login</title>
  <script src="admin_page.js"></script>
</head>

<body>

  <p class="p1">sHeights</p>

  <div class="loginbox">

    <h1>Admin Login </h1>

    <br> <br>

    <form>
      <p type="text_em">Email Id</p>
      <input type="email" name="email" placeholder="Enter your Email" required id="email">
      <p type="text_pa">Password</p>
      <input type="password" name="password" placeholder="Password" required id="password">
      <p type="text_pa">Pin</p>
      <input type="password" name="pin" placeholder="Pin" required id="pin">
      <br> <br>
      <input type="button" value="Login" id="submit" onclick="validate()" /><br>
    </form>
  </div>

</body>

</html>