<table>
    <thead>
        <tr>
            <th style="font-weight: bold">Order Id</th>
            <th style="font-weight: bold">Trx Id</th>
            <th style="font-weight: bold">Name</th>
            <th style="font-weight: bold">Email</th>
            <th style="font-weight: bold">Address</th>
            <th style="font-weight: bold">Subtotal</th>
            <th style="font-weight: bold">Shipping Cost</th>
            <th style="font-weight: bold">Total Cost</th>
            <th style="font-weight: bold">Payment Method</th>
            <th style="font-weight: bold">Courier</th>
            <th style="font-weight: bold">Number Resi</th>
            <th style="font-weight: bold">Status</th>
            <th style="font-weight: bold">Transaction Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->trx_id }}</td>
                <td>{{ $data->address->name }}</td>
                <td>{{ $data->user->email }}</td>
                <td>{{ $data->address->full_address }}</td>
                <td>{{ $data->subtotal }}</td>
                <td>{{ $data->shipping_cost }}</td>
                <td>{{ $data->total_cost }}</td>
                <td>{{ $data->payment_name }}</td>
                <td>{{ $data->shipping_service }}</td>
                <td>{{ $data->shipping_resi }}</td>
                <td>{{ $data->status }}</td>
                <td>{{ $data->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
