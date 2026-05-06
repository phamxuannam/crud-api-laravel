<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel= "stylesheet"
        href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>Document</title>
    {{-- <style>
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
    </style> --}}

</head>

<body>

    {{-- <h1>Tao San Pham</h1> --}}

    {{-- <form id="f-create" action="{{ route('products.store') }}"> --}}

    {{-- <input type="text" name="name" value="{{ old('name') }}" placeholder="Name">
    <div class="error text-danger" data-error="name"></div>

    <input type="text" name="price" value="{{ old('price') }}" placeholder="Price">
    <div class="error text-danger" data-error="price"></div>

    <input type="text" name="quantity" value="{{ old('quantity') }}" placeholder="Quantity">
    <div class="error text-danger" data-error="quantity"></div> --}}

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

    {{-- <input type="text" value="{{ old('userId', Auth::user()->name) }}" disabled>
    <input type="hidden" name="userId" value="{{ Auth::id() }}">

    <button type="submit">Create</button> --}}

    {{-- </form> --}}


    {{-- <h1>Danh Sach San Pham</h1>

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
    </script> --}}

    <div class="container bg-light py-4">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2 class="d-flex justify-content-between">
                    <span> <i class="lab la-amazon"></i> Product Management </span>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#addProductModal">Add Product</button>
                </h2>
                <h4 class="text-success my-4 success_message"></h4>
                {{-- <input type="text" name="search" placeholder=""> --}}
                <div class="table-data">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Updated At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            @include('web.products.products-data')
                        </tbody>
                    </table>
                    {{-- <div class="mt-4 d-flex justify-content-center">
                        {{ $products->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>


    @include('web.products.create');
    @include('web.products.edit');

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //event khi nhấn submit
        $(document).on('submit', '#addProduct', function(e) {

            e.preventDefault();

            let formData = new FormData(this);
            $('.error-text').text('');

            //create
            $.ajax({
                url: "{{ route('products.store') }}",
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('.success_message').text(response.message);
                    $('#addProductModal').modal('hide');
                    $('#addProduct')[0].reset();
                    //location.reload();

                    getProducts();

                    //
                    setTimeout(function() {
                        $('.success_message').text('');
                    }, 2000);

                },
                error: function(err) {
                    let errors = err.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        $('.' + key + '_error').text(value[0]);
                    });
                }
            })

        });

        //open form edit and get data form click 'editBtn'
        $(document).on('click', '.editBtn', function(e) {

            // Lưu id vào modal để dùng sau
            let productId = $(this).data('id');

            $('#edit_name').val($(this).data(
                'name')); //lấy data('name') trong editBtn(products-data.blade.php) gắn vào #edit_id
            $('#edit_price').val($(this).data('price'));
            $('#edit_quantity').val($(this).data('quantity'));

            $('#editProductModal').modal('show');

        });

        $(document).on('click', '#editProduct', function(e) {
            e.preventDefault();

            // Lấy id đã lưu trong modal
            let id = $('#editProductModal').data('id');

            let formData = new FormData(this);

            $.ajax({
                url: '/products/' + id,
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(res) {
                    $('#editProductModal').modal('hide');
                    $('#editProduct')[0].reset();
                },
                error: function(err) {
                    let errors = err.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        $('.' + key + '_error').text(value[0]);
                    });
                }
            })
        });






        //fetch products, khi add product và hiển thị mà không reload
        function getProducts() {
            $.ajax({
                url: "{{ route('products.fetch') }}",
                method: 'GET',
                success: function(response) {
                    $('#table-body').html(response);
                }
            });
        }






        //
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>

</body>

</html>

{{-- <form action="{{ route('products.destroy',$product) }}" method ="POST" class="f-delete"
                    onsubmit="return confirm('Bạn chắc chắn muốn xóa không?')">
                    @csrf
                    @method('Delete')
                    <button onclick="deleteProduct({{ $product->id }})" >Delete</button>    
</form> --}}
