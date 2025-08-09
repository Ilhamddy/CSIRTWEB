<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .card-body {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 20px auto;
            max-width: 800px;
        }

        .table-responsive {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .font-weight-bold {
            font-weight: bold;
        }

        .col-sm-2,
        .col-sm-10 {
            display: inline-block;
            margin-bottom: 5px;
        }

        .col-sm-2 {
            width: 100%;
            font-weight: normal;
        }

        .go-hydro {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 5px;
            color: #11AE0E;
        }
    </style>
</head>

<body>
    <div class="card-body">
        <center>
            {{-- <img src="{{ asset('img/logo.png') }}" alt=""> --}}
            <h1 class="go-hydro">GOHYDRO</h1>
            <h2>Detail Order {{ $order->trx_id }}</h2>
        </center>
        <dl class="row">
            <dt class="col-sm-2">Trx Id : {{ $order->trx_id }}</dt>
            <dt class="col-sm-2">Name : {{ $order->address->name }}</dt>
            <dt class="col-sm-2">Address : {{ $order->address->full_address }}, {{ $order->address->postal_code }}</dt>
            <dt class="col-sm-2">Subtotal : Rp. {{ number_format($order->subtotal) }}</dt>
            <dt class="col-sm-2">Shipping Cost : Rp. {{ number_format($order->shipping_cost) }}</dt>
            <dt class="col-sm-2">Total Cost : Rp. {{ number_format($order->total_cost) }}</dt>
        </dl>
        <div class="table-responsive">
            <table class="table-striped table">
                <tr>
                    <th>Name Product</th>
                    {{-- <th>Image</th> --}}
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
                @foreach ($order->orderitems as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        {{-- <td>
                            @if (Str::startsWith($item->product->image, ['http://', 'https://']))
                                <img src="{{ $item->product->image }}" width="50" alt="">
                            @else
                                <img src="{{ asset('storage/products/' . $item->product->image) }}" width="50"
                                    alt="">
                            @endif
                        </td> --}}
                        <td>{{ $item->quantity }}</td>
                        <td>Rp. {{ number_format($item->quantity * $item->product->price) }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>
