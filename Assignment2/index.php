<?php 
    /*  
        session-г эхлүүлэх бөгөөд хэрэглэгч нь нэвтэрсэн тохиолдолд 
        description.php руу шилжүүлэх болно. 
    */
    session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION["logged_in"] === true) {
        header('location: ./src/description.php');
        exit;
    }
    /*   
        config.php файлыг дуудаж ажиллуулах бөгөөд ингэснээр тухайн файлын 
        функц болон хувьсагч руу нь хандах боломжтой
    */
    require './configs/config.php';
    $username_err = $password_err = '';
    $username = $password = '';

    /*   
        сервер хүсэлт илгээх үед боловсруулж хэрэглэгчийн мэдээллийг шалгана.
    */
    if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        /* 
            Хэрэглэгчийн нэр эсвэл нууц үг хоосон тохиолдолд алдааны мэдээллийг харуулана
            үгүй бол хувьсагчид null утга олгоно.
        */
        $username_err = $_POST['username'] ? null : 'Хэрэглэгчийн нэр оруулана уу';
        $password_err = $_POST['password'] ? null : 'Нууц үг оруулана уу';
      
        if($username_err === null && $password_err === null) {
            /* 
                Орж ирсэн утгын хоосон зайг устгах ба sql injection халдлагаас хамгаалж
                тусгай тэмдэг болох (\n, \r, \, ', ") зэрэгийг устгана.
            */
            $username = $mysql_db->real_escape_string(trim($_POST['username']));
            $password = $mysql_db->real_escape_string(trim($_POST['password']));
            /* 
                query template үүсгэх ба username, болон password - ийг bind хийж өгнө.
                ингэснээр sql injection халдлагаас сэргийлэх бөгөөд зөвхөн оролтыг өгөгдлийг дамжуулана.
            */
            $sql = 'SELECT employeeid, name, email, pass FROM employee WHERE email = ?';
            if($stmt = $mysql_db->prepare($sql)) {
                $bind_username = $username;
                $stmt->bind_param('s', $bind_username);
                $stmt->execute();
                $stmt->store_result();
                if($stmt->num_rows() === 1) {
                    // Хүснэгтээс гарч ирсэн утгуудыг хувьсагчтай bind хийх ба fetch функцийг дуудан утгуудыг олгоно.
                    $stmt->bind_result($id, $employee_name, $employee_email, $hash);
                    if($stmt->fetch()) {
                        // хэрэглэгчийн password - ийг MD5 хэлбэрээр хэшилэж, хэрэглэгчийн нууц үгийг шалгана
                        if(md5($password) === $hash) {
                            $_SESSION['user'] = array(
                                'id' => $id,
                                'email' =>  $employee_email,
                                'username' => $employee_name,
                            );  
                            $_SESSION['logged_in'] = true;
                            if(isset($_POST['checkbox']) && $_POST['checkbox'] === 'checked') {
                                setcookie("username", $username, time() + (60*60*24*7));
                                setcookie("password", $password, time() + (60*60*24*7));
                            }
                            header('location: ./src/description.php');
                        }
                        else {
                            $password_err = 'Нууц үг буруу байна';
                        }
                    }
                }
                else {
                   $password_err = 'Нэвтрэх эрхгүй хэрэглэгч';
                }
                $stmt->close();
            }
            $mysql_db->close();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./styles/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
    <title>Нэвтрэх</title>
</head>

<body>
    <div class="outer_container">
        <div class="title">
            <h3>Системд нэвтрэх</h3>
        </div>
        <form name = "login_form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "POST" class = "form" onsubmit="return validateForm()">
            <div class="mb-3">
                <label for="text" class="form-label">И-мейл</label>
                <input type="text" class="form-control" name = "username" value = "<?php if(isset($_COOKIE['username'])) { echo $_COOKIE['username']; }?>">
                <span class="block" style="color: #ff0033"><?php echo $username_err;?></span>
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Нууц үг</label>
                <input type="password" class="form-control" name = "password" value = "<?php if(isset($_COOKIE['password'])) { echo $_COOKIE['password']; }?>">
                <span class="block" style="color: #ff0033"><?php echo $password_err;?></span>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name = "checkbox" value="checked" id="flexCheckIndeterminate">
                <label class="form-check-label" for="flexCheckIndeterminate">
                    Сануулах
                </label>
            </div>
            <div class="mb-3">
            <input name = "submit" type="submit" class="btn btn-outline-primary smb" value = "Нэвтрэх" >
            <p class = "paragraph">Бүртгэл үүсгээгүй бол <span style ="color:#0d6efd">бүртгүүлэх</span> дарна уу.</p>
            </div>
        </form>
    </div>

    <script src = "./script/index.js"></script>
</body>

</html>

