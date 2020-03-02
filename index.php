<?php
session_start();
if (isset($_SESSION['access'])) {
  header("location:home.php");
}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="News">
    <meta name="description" content="This is news portal">
    <meta name="author" content="Stefan Diskic">
    <meta charset="utf-8">
    <title>MyNews | Login</title>
    <link rel="stylesheet" href="css/index.css">
    <script type="text/javascript" src="js/jquery.js"></script>
  </head>
  <body>

    <!--Header-->
    <header id="login">
      <div class="content">
        <div class="logo">
          <h1>MyNews</h1>
        </div>
        <div class="log">
          <form action="script/login.php" method="post">
            <div class="box">
              <label for="email">Email</label><br>
              <input type="email" required name="e" placeholder="Email..">
            </div>
            <div class="box">
              <label for="pass">Password</label><br>
              <input type="password" required name="p" placeholder="Password..">
            </div>
            <div class="box">
              <input type="submit" name="login" value="Log in">
            </div>
          </form>
        </div>

      </div>
    </header>

    <!--Wrap-->
    <section id="wrap">

      <!--Banner-->
      <section id="banner">
        <div class="content">
          <div class="welcome">
            <h4>Welcome To</h4>
            <h1>MyNews</h1>
            <p>Here The News First</p>
          </div>
        </div>
      </section>

      <!--Register-->
      <section id="register">
        <div class="content">
          <div class="reg">
            <h1 id="reghead">Create new account</h1>
            <form action="script/register.php" method="post" onsubmit="return validForm();">
              <table>
                <tr>
                  <td>
                    <input pattern="[A-Za-z]{2,}" required maxlength="20" type="text" name="fname" placeholder="First name..">
                  <td>
                    <input pattern="[A-Za-z]{2,}" required maxlength="20" type="text" name="lname" placeholder="Last name..">
                  </td>
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <input maxlength="40" required type="email" name="email" placeholder="Email..">
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <input pattern=".{6,}" required maxlength="30" type="password" name="pass" placeholder="Password..">
                  </td>
                </tr>
                <tr>
                  <td>
                    <label required for="bdate">Birthday</label>
                  </td>
                  <td colspan="2">
                    <input required id="bdate" type="date" name="bdate" value="2000-01-01">
                  </td>
                </tr>
                <tr>
                  <td>
                    <input type="radio" name="gender" value="m" checked> Male
                  </td>
                  <td>
                    <input type="radio" name="gender" value="f"> Female
                  </td>
                </tr>
                <tr>
                  <td>
                    <input type="submit" name="register" value="Sing up">
                  </td>
                </tr>
              </table>
            </form>
          </div>
        </div>
      </section>
    </section>

    <!--Footer-->
    <footer id="foot">
      <div class="content">
        <p>Copyright &copy; 2018</p>
      </div>
    </footer>

    <!--Scripts-->
    <script>
    function validForm() {
      //alert(fname+" "+lname+" "+email+" "+pass+" "+bdate+" "+gender);
      var date=document.getElementById('bdate').valueAsDate;
      var currentDate=new Date();
      year=currentDate.getFullYear()-date.getFullYear();
      if (year>=18) {
        return true;
      }else{
        document.getElementById('bdate').style.borderColor="red";
        document.getElementById('bdate').title="You are to young!"
        return false;
      }
    }
    </script>

  </body>
</html>
