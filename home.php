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
$catID;
if (isset($_GET['catId'])) {
  $catID=$_GET['catId'];
}else {
  $catID=-1;
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
      <a href="script/category.php?id=-1">All</a>
<?php
$categorys=Post::getAllCatagorys();
foreach ($categorys as $cat) {?>
      <a href="script/category.php?id=<?php echo $cat['category_id']; ?>"><?php echo $cat['name']; ?></a>
<?php  }?>
    </nav>
    <!--MAIN-->
    <div class="postBtn">
      <a href="post.php">Click here to make post</a>
    </div>
<?php
$posts=Post::getPostByCategory($catID);
foreach ($posts as $post) {
 ?>
    <section class="main" id="<?php echo $post['post_id']; ?>">
      <div class="content">
        <section class="box-post">
          <div class="text">
            <h1><?php echo $post['title']; ?></h1>
            <p><?php echo $post['text']; ?></p>
          </div>

          <div class="btn-bar">
            <i class="fa fa-commenting com"></i>
            <form action="script/delete_post.php" method="post">
              <input type="hidden" name="postId" value="<?php echo $post['post_id']; ?>">
              <input type="hidden" name="admin" value="<?php echo $user->admin; ?>">
              <input type="submit" name="delPost" value="Delete">
            </form>
          </div>

          <div class="comment-box">
            <div class="post">
              <a class="name" href="#"><?php echo $user->firstName; ?></a>
              <form action="script/commenting.php" method="post">
                <input type="hidden" name="userId" value="<?php echo $user->userId; ?>">
                <input type="hidden" name="postId" value="<?php echo $post['post_id']; ?>">
                <textarea name="comment" rows="8" cols="80" placeholder="Writte Comment..."></textarea>
                <input type="submit" name="subComment" value="Post Comment">
              </form>
            </div>

            <?php
            $comments=Comment::getCommentForId($post['post_id']);
            foreach ($comments as $comm) { ?>
            <div class="comment">
              <a class="name" href="#"><?php echo $comm['user_id']; ?></a>
              <form action="script/delete_comment.php" method="post">
                <input type="hidden" name="commId" value="<?php echo $comm['comm_id'];?>">
                <input type="hidden" name="ownerId" value="<?php echo $comm['user_id'];?>">
                <input type="hidden" name="admin" value="<?php echo $user->admin; ?>">
                <input type="hidden" name="userId" value="<?php echo $user->userId; ?>">
                <input type="submit" name="delComm" value="Remove">
              </form>
              <div class="com">
                <p><?php echo $comm['text']; ?></p>
              </div>
            </div>
          <?php } ?>

          </div>
        </section>
      </div>
    </section>
<?php
}
 ?>
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
