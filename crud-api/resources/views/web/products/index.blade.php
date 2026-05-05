<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
        .error {
            /* display: inline; */
        }

        .f-create {
            width: 40%;
            max-width: 100%;
        }

        .f-create input {
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

        .table-bordered tr td a {
            text-decoration: none;
            color: black;
        }

        a:hover {
            color: rgb(0, 68, 255);
            pointer-events: painted;
        }
    </style>

</head>

<body>

    <h1>Tao San Pham</h1>

    <form id="f-create" action="{{ route('products.store') }}">

        <input type="text" name="name" value="{{ old('name') }}" placeholder="Name">
        <div class="error text-danger" data-error="name"></div>

        <input type="text" name="price" value="{{ old('price') }}" placeholder="Price">
        <div class="error text-danger" data-error="price"></div>

        <input type="text" name="quantity" value="{{ old('quantity') }}" placeholder="Quantity">
        <div class="error text-danger" data-error="quantity"></div>

        {{-- <form action="">
        {{-- <input type="text" name="name" value="{{old('name')}}" placeholder="Name"> --}}
        {{-- @error('name')
            <div class="error" style="color: red;">{{ $message }}</div>
        @enderror --}}

        {{-- <input type="text" name="price" value="{{old('price')}}" placeholder="Price">  --}}
        {{-- @error('price')
            <div class="error" style="color: red;">{{ $message }}</div>
        @enderror --}}


        {{-- <input type="text" name="quantity" value="{{old('quantity')}}" placeholder="Quantity">  --}}
        {{-- @error('quantity')
            <div class="error" style="color: red;">{{ $message }}</div>
        @enderror 
    </form>     --}}

        <input type="text" value="{{ old('userId', Auth::user()->name) }}" disabled>
        <input type="hidden" name="userId" value="{{ Auth::id() }}">

        <button type="submit">Create</button>

    </form>


    <h1>Danh Sach San Pham</h1>

    <table border="1" class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Time Created</th>
                <th>Time Updated</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="table-body">
            @include('web.products._table')
        </tbody>

    </table>

    <div class="mt-4 d-flex justify-content-center pagination-wrapper">
        {{ $products->links() }}
    </div>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //delete
        $(document).on('click', '.btn-delete', function() {

            if (!confirm('Bạn có chắc muốn xóa không?')) return;

            let id = $(this).data('id');
            let url = $(this).data('url');

            $.ajax({
                url: url,
                type: 'DELETE',
                success: function(res) {
                    alert(res.message);
                    $('#row-' + id).remove();
                },
                error: function(err) {
                    console.log(err.responseText);
                    alert('lỗi: ' + err.status);
                }

            });
        });

        //create
        $('#f-create').submit(function(e) {
            e.preventDefault();

            let form = $(this);
            let url = form.attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                data: form.serialize(),

                success: function(res) {
                    alert('Thêm thành công');
                    location.reload();
                    $('#f-create')[0].reset();
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;

                        $('.error').text('');

                        $.each(errors, function(key, value) {
                            $(`.error[data-error="${key}"]`).text(value[0]);
                        });
                    }
                }
            });
        });

        //paginate, load mỗi tbody
        $(document).on('click', '.pagination-wapper a', function(e) {
            e.preventDefault();

            let url = $(this).attr('href');

            $.get(url, function(res) {
                $('#table-body').html(res.rows);
                $('#pagination').html(res.pagination);
            });
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
