<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
        .error{
            /* display: inline; */
        }
        .f-create {
            width: 40%;
            max-width: 100%;
        }
        .f-create input{
            padding: 5px 10px;
            margin-bottom: 5px;
        }

        .table-bordered {
            margin-top: 20px; 
            width: 100%;
            border: 1 solid black;
        }
        .table-bordered tr {
            text-align: center;
        }
        .table-bordered tr th {
            background-color: rgb(0, 195, 255);
            padding: 5px;
            font-weight: bold;
            font-size: 25px;
        }
        .table-bordered tr td {
            padding: 3px;
            font-weight: bold;
            font-size: 20px;
        }
        .table-bordered tr td a{
            font-size: 20px;
            text-decoration: none;
            margin-top: 5px; 
            color: black;
        }
        a:hover{
            color: rgb(0, 119, 255);
            pointer-events: painted;
        }

    </style>

</head>
<body>
    
<h1>Tao San Pham</h1>

<form action=" {{ route('products.store')}}" method="POST" class="f-create">
    @csrf

    <input type="text" name="name" value="{{old('name')}}" placeholder="Name"> <br>
    @error('name')
        <div class="error" style="color: red;">{{ $message }}</div>
    @enderror

    <input type="text" name="price" value="{{old('price')}}" placeholder="Price"> <br>
    @error('price')
        <div class="error" style="color: red;">{{ $message }}</div>
    @enderror

    <input type="text" name="quantity" value="{{old('quantity')}}" placeholder="Quantity"> <br>
    @error('quantity')
        <div class="error" style="color: red;">{{ $message }}</div>
    @enderror

    <input type="text" value="{{old('userId',Auth::user()->name)}}" disabled> <br>
    <input type="hidden" name="userId" value="{{ Auth::id() }}">
    {{-- @error('userId')
        <div class="error" style="color: red;">{{ $message }}</div>
    @enderror --}}
    <button type="submit">Create</button>

</form>


<h1>Danh Sach San Pham</h1>
<table border="1" class="table table-bordered"
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Time Created</th>
        <th>Time Updated</th>
        <th>Action</th>
    </tr>
    @foreach ($products as $product)
        <tr id="row-{{ $product->id }}">
            <td> {{$product->name}} </td>
            <td> {{$product->price}} </td>
            <td> {{$product->quantity}} </td>
            <td> {{$product->created_at}} </td>
            <td> {{$product->updated_at}} </td>
            <td> 
                <a href="{{ route('products.edit',$product)}}">Edit</a>   

                <button class="btn-delete" data-id="{{ $product->id }}">
                    Delete</button>
            </td>
        </tr>
    @endforeach
   
</table>        
<div class="mt-4 d-flex justify-content-center">
    {{ $products->links() }}
</div>


<script>
// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });

// $(document).on('click', '.btn-delete', function () {
//     let id = $(this).data('id');

//     $.ajax({
//         url: '/products/' + id,
//         type: 'DELETE',
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },
//         success: function () {
//             $('#row-' + id).remove();
//         }
//     });
// });

$(document).on('click', '.delete-btn', function() {
   
    let id = $(this).data('id'); 
    
    let url = `/products/${id}`; 

    if (confirm("Bạn có chắc muốn xóa không？")) {
        $.ajax({
            url: url,
            type: 'DELETE',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(res) {
                $(`#product-row-${id}`).remove(); 
            }
        });
    }
});
</script>
</body>
</html>

  {{-- <form action="{{ route('products.destroy',$product) }}" method ="POST" class="f-delete"
                    onsubmit="return confirm('Bạn chắc chắn muốn xóa không?')">
                    @csrf
                    @method('Delete')
                    <button onclick="deleteProduct({{ $product->id }})" >Delete</button>    
                </form> --}}