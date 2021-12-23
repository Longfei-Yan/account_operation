<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $license['title'] }}</title>
    <style>
        body{
            width: 50%;
            margin: 0 auto;
        }
        .header{
            text-align: center;
        }
        .content{

        }
        .content table{
            width: 100%;
        }
        .content table td{

        }
        .footer{
            text-align: center;
        }
    </style>
</head>
<body>
<div class="header">
    <h1>{{ $license['title'] }}</h1>
    <img src="{{ $license['logo'] }}" alt="">
</div>

<div class="content">
    <table>
        @if (!empty($goods))

            <tr>
                @foreach ($goods as $item)
                <td>
                    <img src="{{ $item['thumbnail'] }}" alt="">
                    <h3>{{ $item['title'] }}</h3>
                    <p>{{ $item['description'] }}</p>
                </td>
                @endforeach
            </tr>

        @else
            Not Data
        @endif
    </table>
</div>

<div class="footer">
    <p>{{ $license['address'] }}</p>
</div>
</body>
</html>
