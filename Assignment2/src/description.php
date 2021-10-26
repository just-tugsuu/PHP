<?php 
    session_start();
    require '../configs/config.php';
    include './helper/function.php';
    Redirect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href = "../styles/description-page.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
    <title>Description</title>
</head> 
<body>
    <div class = "container-sm">
       <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
       <div class = "box-description">
        <h4 class ="header"> Форм баталгаажуулалт</h4>
       </div>
       <div class = "text-area">
       <textarea class="form-control" placeholder = "Та сэтгэгдэлээ бичнэ үү"  maxlength="200" name = "comment"></textarea>
       <div class = "buttons">
            <input name = "submit" type="submit" class="btn btn-primary" value = "Илгээх">
            <input name = "logout" type="submit" class="btn btn-light logout" value = "Гарах">
       </div>
       </div>
       </form>
    </div>
    <?php 
       if($_SERVER['REQUEST_METHOD'] === 'GET' ||$_SERVER['REQUEST_METHOD'] === 'POST') {
          if(isset($_POST['submit'])) {
            InsertData($mysql_db, $_POST['comment'], $_SESSION['user']['email']);
          }
          showComments($mysql_db);
       }
       if(isset($_POST['logout'])) {
           logout();
       }
      
?>
</body> 
</html>

