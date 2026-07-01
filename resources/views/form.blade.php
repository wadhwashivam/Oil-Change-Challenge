<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oil Change Check</title>
</head>
<body>
    <h1>Oil Change Check</h1>
    @if ($errors->any())
        <div style="color: red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/check" method="POST">
    @csrf

    <div>
        <label for="current_odometer">Current Odometer (km)</label>
        <input type="number" name="current_odometer" id="current_odometer" value="{{ old('current_odometer')}}">
    </div>

    <div>
        <label for="previous_oil_change_date">Date of Previous Oil Change</label>
        <input type="date" name="previous_oil_change_date" id="previous_oil_change_date" value="{{ old('previous_oil_change_date')}}">
    </div>

    <div>
        <label for="previous_odometer">Previous Odometer (km)</label>
        <input type="number" name="previous_odometer" id="previous_odometer" value="{{ old('previous_odometer')}}">
    </div>

    <button type="submit">Check</button>

    </form>
</body>
</html>