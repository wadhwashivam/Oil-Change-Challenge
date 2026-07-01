<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Oil Change Result</title>
</head>
<body>
    <h1>
        {{ $check->is_due ? 'This car is due for an oil change.' : 'This car is not due for an oil change yet.' }}
    </h1>

    <ul>
        <li>Current Odometer: {{ $check->current_odometer }} km</li>
        <li>Previous Oil Change Date: {{ $check->previous_oil_change_date->format('M d, Y') }}</li>
        <li>Odometer at Previous Oil Change: {{ $check->previous_odometer }} km</li>
    </ul>

    <a href="/">Check another car</a>
</body>
</html>