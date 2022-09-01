<?php

$username = 'root';
$password = '';
$server = 'localhost';
$db = 'member_login';

$con = mysqli_connect($server, $username, $password, $db);

if ($con) {
    //echo"connected";

?>
    <script>
        function validate() {

            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            if (email == "" || password == "") {
                alert("Please enter all credentials properly");
                return;
            }
              location.href="mem_log.php";
        }
        alert('connected u can sleep now')
    </script>
<?php



} else {
    echo "check code";
}
?>
