<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <div class="outer_container">
        <div class="title">
            <h3>Системд нэвтрэх</h3>
        </div>
        <form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "POST" class = "form">
            <div class="mb-3">
                <label for="text" class="form-label">И-мейл</label>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Нууц үг</label>
                <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                <label class="form-check-label" for="flexCheckIndeterminate">
                    Сануулах
                </label>
            </div>
            <div class="mb-3">
            <button type="button" class="btn btn-outline-primary">Нэвтрэх</button>
            <p class = "paragraph">Бүртгэл үүсгээгүй бол <span style ="color:#0d6efd"><a href ="./src/register.php" style="text-decoration: none;">бүртгүүлэх</a></span> дарна уу.</p>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>

<?php 
   require_once './configs/config.php';
   //Back-end authcantion
   
?>