<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Хайлт</title>
</head>

<body>
    <!-- action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="search-bar" method = "POST" -->
    <form class="outer">
        <div class="middle">
            <div class="inner">
                <div class="checkboxs">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Petname">
                        <label class="form-check-label" for="inlineRadio1">Pet name</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Owner">
                        <label class="form-check-label" for="inlineRadio2">Owner</label>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id = "searchBar"name="">
                    <br> <br>
                    <div class = "result">
                    <ul class="list-group list-group-flush">
                         <!-- <li class="list-group-item">An item</li>
                         <li class="list-group-item">A second item</li>
                         <li class="list-group-item">A third item</li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
        
    </form>
    <script src = "./scripts/index.js"></script> 
</body>

</html>