<?php
require "script/class/users_class.php";
require "script/class/post_class.php";
require "script/class/comment_class.php";

session_start();
if (isset($_POST['btnLogout'])) {
  session_destroy();
  header("location:index.php");
}
if (!(isset($_SESSION['access']) && $_SESSION['access'] == 'ok')) {
  header("location:index.php");
}

if (isset($_SESSION['user_id'])) {
  $user = User::getUserById($_SESSION['user_id']);
}else {
  die("User do not exsist!");
}
if (!$user->admin) {
  die("Only user email=admin1@admin.com pass=admin123 can access this page!");
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
    <title>MyNews | Home</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="js/jquery.js"></script>
  </head>
  <body>
    <!--HEADER-->
    <header class="top-bar">
      <div class="toggle-box">
        <i class="fa fa-bars"></i>
      </div>
      <div class="content">
        <div class="logo">
          <h1>MyNews</h1>
        </div>
        <div class="logout-box">
          <a href="index.php"><?php echo $user->firstName; ?></a>
          <hr>
          <form action="" method="post">
            <input class="btn1" type="submit" name="btnLogout" value="Log out">
          </form>
        </div>
      </div>
    </header>

    <!--NAV-->
    <nav class="slidenav">
      <a href="#">All</a>
<?php
$categorys=Post::getAllCatagorys();
foreach ($categorys as $cat) {?>
      <a href="#"><?php echo $cat['name'] ?></a>
<?php  }?>
    </nav>

    <!--MAIN-->
<div class="main-post">
  <div class="content">
    <?php if (isset($_COOKIE['notify'])) {?>
      <div class="note"><?php echo $_COOKIE["notify"]; ?></div>
    <?php setcookie('notify','',time()-3600,'/'); } ?>
    <form class="post-form" action="script/posting.php" method="post">
      <label for="categoryId">Choose Category:</label>
      <select name="categoryId" title="Category">
        <?php
        $categorys=Post::getAllCatagorys();
        foreach ($categorys as $cat) {?>
        <option value="<?php echo $cat['category_id']; ?>"><?php echo $cat['name']; ?></option>
      <?php } ?>
      </select>
      <input type="text" name="title" placeholder="Title..">
      <textarea name="text" rows="8" cols="80" placeholder="Writte here.."></textarea>
      <input type="submit" name="subPost" value="UPLOAD">
    </form>
  </div>
</div>

    <!--FOOTER-->
    <footer class="foot">
      <div class="content">
        <p>Copyright &copy; 2018</p>
      </div>
    </footer>

    <script>
      $(document).ready(function() {
        $(".toggle-box").click(function() {
          $(".slidenav").slideToggle(1000);
        });
        $(".com").click(function() {
          $("#<?php echo ""?> .comment-box").slideToggle(500);
        })
      });
    </script>

  </body>
</html>
