<?php
    // submit button дарагдан хийгдэх үед 
    if(isset($_POST['submit'])){
        session_start();
        $val = $_POST['value'];
        $result = 0;
        // POST request - ээс орж ирсэн хариуг шалгаад хоосон тохиолдолд null 
        // mesaurmenta_type нь 
        $measurment_type = isset($_POST['convert_types']) ? $_POST['convert_types'] : null;
        // Хувиргах тоо нь тоо биш эсвэл хоосон тохиолдолд дэлгэцэнд 0 гэсэн тоог харуулана 
        if(!$val || !is_numeric($val) ) {
            if(floatval($val)) {
                $val = floatval($val);
            }
            else {
                $result = 0;
                $measurment_type = '';
            }
        }
        // switch statement ашиглан POST request - ээс орж ирсэн  утгын дагуу хөрвүүлнэ
        switch($measurment_type){
            case 'см':
                $result = $val * 2.54; 
                $measurment_description = 'Инч-СМ';
                break;
            case 'км':
                $result = $val / 1094;
                $measurment_description = 'Бээр-КМ';
                break;
            case 'грам':
                $result = $val * 454;
                $measurment_description = 'Паунд-ГРАМ';
                break;
            case 'ватт': 
                $result = $val * 745.7;
                $measurment_description = 'Морины хүч-Ватт';
                break;
            case 'литр': 
                $result = $val * 159;
                $measurment_description = 'Баррел-литр';
                break;
            default:
            $result = 0;
            $measurment_type = '';
            $measurment_description = '';
            break;

        }      
    }

    function displayTable($arr) {
        echo '<div class = "bottom_table">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Тайлбар</th>
                <th scope="col">Оролт</th>
                <th scope="col">Гаралт</th>
              </tr>
            </thead>
            <tbody>';
        for($i = 0; $i < count($arr); $i++) {
            $temp = $i+1;
            echo '<tr>
                  <th scope="row">'. $temp .'</th>  
                  <td>'. $arr[$i]->description . '</td>
                  <td>'. $arr[$i]->input . '</td>
                  <td>'. $arr[$i]->output . '</td>
                  </tr>';
        }
        echo '</tbody>
        </table>
        </div>';
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap сан -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel = 'stylesheet' href="./style.css" />
    <title>Form</title>
</head>
<body>
    <div class = "container"> 
        <!-- action нь хуудсын өгөгдлийг хаашаа дамжуулахыг заах бөгөөд POST method ашиглан өгөгдлийг дамжуулна -->
        <form action = "./index.php" method="post">
           <div class = "container_top"> <p>Утга хөрвүүлэх</p> </div>
           <div class = "container_middle"> 
                   <div class = "row">
                    <div class="col-sm">
                        <label for="email">Хувиргах утга:</label>
                        <input type="text" id="validationCustom01" name = "value" class="form-control" required>
                    </div>
                    <div class="col-sm">
                        <label for="text">Хувиргах төрөл</label>
                        <select name = "convert_types" class="form-select" >
                            <option selected = "selected">-сонго-</option>
                            <option value="см">Инч-СМ</option>
                            <option value="км">Бээр-КМ</option>
                            <option value="грам">Паунд-ГРАМ</option>
                            <option value="ватт">Морины хүч-Ватт</option>
                            <option value = "литр">Баррел-литр</option>
                        </select>
                    </div>
                   </div> 
                   <div class = "row">
                   <div class = "col-sm">
                    <label for = "text"> <span> Нэгжийн утга </span></label>
                    <!-- Submit товч дарсны дараа өгөгдлийг боловсруулан гаргана -->
                    <!-- Эхэлж өгөгдлийг байгаа эсэхийг isset function ашиглан шалгах ба өгөгдөл байхгүй
                     тохиолдолд хоосон string хэвлэнэ, үнэн бол үр дүн (result) - ийг хэвлэнэ ✨
                     Анх client веб руу ороход хувьсагчуудыг undefined хийлгэхгүй байхын тулд бичсэн байгаа -->
                    <input type="text" name = "output" class="form-control" id = "disabledInput" value = "<?php echo isset($result) ? $result : ''; echo " "; echo isset($measurment_type) ? $measurment_type : " "; ?>"disabled>
                   </div>
               </div>
           </div>
           <div class = "container_bottom"> 
            <div class = 'buttons'>
                 <!-- submit button нь өгөгдлийг цааш явуулана -->
                <input name = "submit" type="submit" value = 'Хувиргах'class="btn btn-primary">
                <input type="reset" value = 'Цуцлах'class="btn btn-light">
              </div>
           </div>
        </form>
       </div>
       
       <?php   
        //  unset($_SESSION["history"]);
         class Conversion {
            public $input; 
            public $output;
            public $description;
            function __construct($input, $output, $description) {
              $this->input = $input;
              $this->output = $output;
              $this->description = $description;
            }
            function get_input() {
              return $this->input;
            }
            function get_output() {
              return $this->output;
            }
            function get_description(){
              return $this->description;
            }
        }
        if(isset($_POST['submit']) && isset($result)){
            if(isset($_SESSION["history"])) {
                if(count($_SESSION["history"]) >= 5 ) {
                    array_unshift($_SESSION["history"], new Conversion($val, $result, $measurment_description));
                    array_pop($_SESSION["history"]);
                    displayTable($_SESSION["history"]);                    
                }
                else {
                array_unshift($_SESSION["history"], new Conversion($val, $result, $measurment_description));
                displayTable($_SESSION["history"]);
                }
            }
            else {
                $_SESSION["history"] = array();
                array_push($_SESSION["history"], new Conversion($val, $result, $measurment_description));
                displayTable($_SESSION["history"]);
            }
        }
       
       ?>
      
</body>

</html>