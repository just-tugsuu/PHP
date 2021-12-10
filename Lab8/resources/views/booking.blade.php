<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href=" {{asset('css/styleBook.css')}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:wght@400;700&display=swap" rel="stylesheet">
    <title>Нислэг захиалга</title>
</head>

<body>
    <div class="CustomContainer">

        <div class="row">
            <div class="col-sm-9">
                <div class="header">
                    <h3> Нислэг захиалга </h3>
                </div>
                <form>
                    <div class="row">
                        <div class="col">
                            <label> Нислэгийн дугаар: </label>
                            <input type="text" name="pet_owner" class="form-control" />
                        </div>
                        <div class="col">
                            <label for="text"> Төрсөн огноо: </label>
                            <input type="date" name="pet_birth" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label> Зорчигчийн овог нэр: </label>
                            <input type="text" name="pet_owner" class="form-control" />
                        </div>
                        <div class="col">
                            @csrf
                            <div class="btn-container">
                                <input name="submit" type="submit" value='Хайх' class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </form>
                <div class = "message">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-check-square" viewBox="0 0 16 16">
  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
  <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z"/>
</svg>
                    <p> Захиалга баталгаажсан. Таны захиалгын дугаар 112</p>

                </div>
            </div>
        </div>

    </div>
</body>

</html>