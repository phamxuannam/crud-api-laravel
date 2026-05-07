@foreach ($products as $i => $product)
    <tr id="row-">
        <th scope="row">{{ $i + 1 }}</th>
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->quantity }}</td>
        <td>{{ $product->created_at }}</td>
        <td>{{ $product->updated_at }}</td>
        <td>
            {{-- lấy name, price, quantity của products vào trong btn edit --}}
            <a href="#" class="btn btn-sm btn-success editBtn" data-id={{ $product->id }}
                data-name={{ $product->name }} data-price={{ $product->price }} data-quantity={{ $product->quantity }}>
                <i class="las la-edit"></i>
            </a>

            <a href="#" class="btn btn-sm btn-danger deleteBtn" data-id={{ $product->id }}>
                <i class="las la-times"></i>
            </a>
        </td>
    </tr>
@endforeach
