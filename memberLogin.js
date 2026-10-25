function validate() {

  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  if(email == "" || password==""){
    alert("enter all credentials properly");
    return;
  }
   location.href="home.php";
}