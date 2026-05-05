@foreach ($products as $product)
    <tr id="row-{{ $product->id }}">
        <td> {{ $product->name }} </td>
        <td> {{ $product->price }} </td>
        <td> {{ $product->quantity }} </td>
        <td> {{ $product->created_at }} </td>
        <td> {{ $product->updated_at }} </td>
        <td>
            <a class="btn btn-info btn-sm" href="{{ route('products.edit', $product) }}">Edit</a>

            {{-- <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $product->id }}" 
                    data-url="{{ route('products.destroy', $product) }}"> Delete </button> --}}

            <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $product->id }}"
                data-url=" {{ route('products.destroy', $product) }}"> Delete
            </button>
        </td>
    </tr>
@endforeach
