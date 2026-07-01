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
        <label for="currentOdometer">Current Odometer (km)</label>
        <input type="number" name="currentOdometer" id="currentOdometer" value="{{ old('currentOdometer')}}">
    </div>

    <div>
        <label for="previousOilChangeDate">Date of Previous Oil Change</label>
        <input type="date" name="previousOilChangeDate" id="previousOilChangeDate" value="{{ old('previousOilChangeDate')}}">
    </div>

    <div>
        <label for="previousOdometer">Previous Odometer (km)</label>
        <input type="number" name="previousOdometer" id="previousOdometer" value="{{ old('previousOdometer')}}">
    </div>

    <button type="submit">Check</button>

    </form>
</body>
</html>