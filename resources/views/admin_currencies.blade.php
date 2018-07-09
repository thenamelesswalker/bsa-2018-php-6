<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Popular Currencies</title>
</head>
<body>
<table>
    <tr>
        <th>
            id
        </th>
        <th>
            name
        </th>
        <th>
            short name
        </th>
        <th>
            actual cource
        </th>
        <th>
            actual cource date
        </th>
        <th>
            active
        </th>
    </tr>
    @foreach($currencies as $currency)
        <tr>
            <td>{{ $currency['id'] }}</td>
            <td>{{ $currency['name'] }}</td>
            <td>{{ $currency['short_name'] }}</td>
            <td>{{ $currency['actual_course'] }}</td>
            <td>{{ $currency['actual_course_date']->format('Y-m-d H-i-s') }}</td>
            <td>{{ $currency['active'] ? 'Active' : 'Inactive' }}</td>
        </tr>
    @endforeach
</table>
</body>
</html>