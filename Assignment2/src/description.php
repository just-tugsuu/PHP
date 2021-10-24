<?php 
    session_start();
    include './helper/function.php';
    require '../configs/config.php';
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
        <h3 class ="header"> Форм баталгаажуулалт</h3>
        <p>Хэрхэн login form дээр нэвтэрсэн хүмүүсийн мэдээллийг cookie дотор хадгалах уу ? тэгэхээр дараагийн удаа нэвтэрхэд хэрэглэгчийн мэдээлэл бөглөгдсөн байна.</p>
       </div>
       <div class = "text-area">
       <textarea class="form-control" placeholder = "Та сэтгэгдэлээ бичнэ үү"  maxlength="200" name = "comment"></textarea>
       <input name = "submit" type="submit" class="btn btn-primary" value = "Илгээх">
       </div>
       </form>
    </div>
    <div class = "comment-section">
        
    </div>

</body>
</html>

<?php 
       if(isset($_POST['submit'])) {
        InsertData($mysql_db, $_POST['comment'], $_SESSION['email']);
       }
?>