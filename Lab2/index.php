<?php 
    if(isset($_POST['submit'])){
        $val = $_POST['value'] ? $_POST['value'] : null;
        $result = 0;
        $measurment_type = isset($_POST['convert_types']) ? $_POST['convert_types'] : null;
        if(!$val || !is_numeric($val) ) {
            $result = 0;
            $measurment_type = '';
        }
        switch($measurment_type){
            case 'инч':
                $result = $val * 2.54; 
                break;
            case 'бээр':
                $result = $val / 1094;
                break;
            case 'паунд':
                $result = $val * 454;
                break;
            case 'морины хүч': 
                $result = $val * 746;
                break;
            case 'баррел': 
                $result = $val * 159;
                break;
            default:
            $result = 0;
            $measurment_type = '';
            break;

        }
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap san -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel = 'stylesheet' href="./style.css" />
    <title>Form</title>
</head>
<body>
    <div class = "container"> 
        <form action = "./index.php" method="post">
           <div class = "container_top"> <p>Утга хөрвүүлэх</p> </div>
           <div class = "container_middle"> 
                   <div class = "row">
                    <div class="col-sm">
                        <label for="email">Хувиргах утга:</label>
                        <input type="text" name = "value" class="form-control">
                    </div>
                    <div class="col-sm">
                        <label for="text">Хувиргах төрөл</label>
                        <select name = "convert_types" class="form-select" aria-label="Default select example">
                            <option>-сонго-</option>
                            <option value="инч">Инч-СМ</option>
                            <option value="бээр">Бээр-КМ</option>
                            <option value="паунд">Паунд-ГРАМ</option>
                            <option value="морины хүч">Морины хүч-Ватт</option>
                            <option value = "баррел">Баррелийг-литр</option>
                        </select>
                    </div>
                   </div> 
                   <div class = "row">
                   <div class = "col-sm">
                    <label for = "text"> <span> Нэгжийн утга </span></label>
                    <input type="text" name = "output" class="form-control" id = "disabledInput" value = "<?php echo isset($result) ? $result : ''; echo " "; echo $measurment_type ?>"disabled>
                   </div>
               </div>
           </div>
           <div class = "container_bottom"> 
            <div class = 'buttons'>
                <input name = "submit" type="submit" value = 'Хувиргах'class="btn btn-primary">
                <input type="reset" value = 'Цуцлах'class="btn btn-light">
              </div>
           </div>
        </form>
       </div>

    
</body>
</html>