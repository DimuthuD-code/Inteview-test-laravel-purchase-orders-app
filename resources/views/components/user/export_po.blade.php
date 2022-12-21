<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>ZONE</th>
            <th>REGION</th>
            <th>TERRITORY</th>
            <th>DISTRIBUTOR</th>
            <th>SKU CODE</th>
            <th>SKU NAME</th>
            <th>UNIT PRICE</th>
            <th>QUANTITY</th>
            <th>TOTAL PRICE</th>
            <th>CREATED AT</th>
            <th>UPDATED AT</th>
        </tr>
    </thead>
    <tbody>
        @foreach($export_pos as $export_po)
        <tr>
            <td>{{ $export_po->id }}</td>
            <td>{{ $export_po->zone }}</td>
            <td>{{ $export_po->region }}</td>
            <td>{{ $export_po->territory }}</td>
            <td>{{ $export_po->distributor }}</td>
            <td>{{ $export_po->sku_code }}</td>
            <td>{{ $export_po->sku_name }}</td>
            <td>{{ $export_po->unit_price }}</td>
            <td>{{ $export_po->quantity }}</td>
            <td>{{ $export_po->total_price }}</td>
            <td>{{ $export_po->created_at }}</td>
            <td>{{ $export_po->updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>