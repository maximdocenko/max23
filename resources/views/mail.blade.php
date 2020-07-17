<p>Список ваших продуктов</p>
<table>

@foreach($products as $product)

    <tr>
        <td style="padding: 10px; border: solid 1px #333;">{{ $product->name }}</td>
        <td style="padding: 10px; border: solid 1px #333;">$ {{ $product->price }}</td>
    </tr>

@endforeach

    <tr>
        <td style="padding: 10px; border: solid 1px #333;">Total</td>
        <td style="padding: 10px; border: solid 1px #333;">$ {{ $total }}</td>
    </tr>

</table>