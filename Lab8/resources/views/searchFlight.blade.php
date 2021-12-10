<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/styleFlight.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:wght@400;700&display=swap" rel="stylesheet">
    <title>Нислэг хайлт</title>
</head>

<body>
    <div class="CustomContainer">
        <form method="post" action="searchflight">
            <div class="row">
                <div class="col-sm-9">
                    <div class="header">
                        <h3> Нислэг хайх </h3>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label> Хаанаас: </label>
                            <select class="form-select" aria-label="Default select example">
                                <option value="-сонго-">Departure City</option>
                                <option value="Инч-СМ">UBN</option>
                                <option value="Бээр-КМ">MEL</option>
                                <option value="Паунд-ГРАМ">HKG</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="text"> Нисэх өдөр: </label>
                            <input type="date" name="pet_birth" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label> Хаанаас: </label>
                            <select class="form-select" aria-label="Default select example">
                                <option value="-сонго-">Arrival</option>
                                <option value="Инч-СМ">UBN</option>
                                <option value="Бээр-КМ">MEL</option>
                                <option value="Паунд-ГРАМ">HKG</option>
                            </select>
                        </div>

                        <div class="col">
                            <label> Хүний тоо: </label>
                            <input type="text" name="pet_owner" class="form-control" />
                        </div>
                    </div>

                    <div class="btn-container">
                        @csrf
                        <input name="submit" type="submit" value='Хайх' class="btn btn-primary">
                    </div>
        </form>

        @if(isset($responseBody))
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Хаанаас</th>
                    <th scope="col">Хаашаа</th>
                    <th scope="col">Нисэх өдөр</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
              @if(count($responseBody) >= 1)
                @foreach($responseBody as $d => $data )
                <tr>
                    <th scope="row" id ="row">{{ $data['flightNumber']; }}</th>
                    <td> {{ $data['departureAirport']; }}</td>
                    <td> {{ $data['arraivalAirport']; }}</td>
                    <td> {{ $data['passengerNumber']; }}</td>
                    <td> <button type="button"  id ="btn_book" class="btn btn-warning"> <a href = "booking/{{$data['flightNumber']}}"> Захиалах </a> </button></td>
                </tr>
                @endforeach
              @endif
            </tbody>
        </table>
        @endif
    </div>

    </div>

    </div>

    <script src = "{{asset('js/app.js')}}"></script>
</body>

</html>