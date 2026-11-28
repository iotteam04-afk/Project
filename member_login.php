  <?php 
  session_start();

require_once __DIR__ . '/config.php';

  


  

  if(isset($_SESSION['user_id'])){
     $user_id = $_SESSION['user_id'];
  }else{
     $user_id = '';
  }

  
  if (isset($_POST['enter'])) {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $conn->prepare('SELECT id, username, password FROM data WHERE email = ?');
    $stmt->execute([$email]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row && password_verify($password, $row['password'])) {
      session_regenerate_id(true);
      $_SESSION['user_id'] = $row[ 'id'];
      $_SESSION['username'] = $row[ 'username'];
      header('Location: home.php');
      exit;
    } 
    $_SESSION['status'] = 'Wrong email or password';
    header('Location: member_login.php');
    exit;
  }


  ?>


  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Member login Page </title>
    <link href="css/login.css" rel="stylesheet" type="text/css">

  </head>

  <body>

    <div class="loginbox">

      <h1>Member Login </h1><br><br>
      <?php if (!empty($_SESSION['status'])): ?>
        <p style="color: #ff8080; font-size: 18px;"><?= e($_SESSION['status']) ?></p>
        <?php unset($_SESSION['status']); ?>
      <?Php endif; ?>

      <form action="" method="POST">

        <p type="text_em" style="color: white;font-size: 24px;">Email Id</p>

        <input type="email" name="email" placeholder="Enter your Email" required>

        <p type="text_pa" style="color: white;font-size: 24px;">Password</p>

        <input type="password" name="password" placeholder="Password" required>

        <input type="submit" value="Login" name="enter"><br>

        <a href="Register.php" style="color: white;font-size: 18px;">Create a new account</a>

      </form>

    </div>


  </body>


  </html>