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

</head>

<body>

    {{-- <script>
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
    </script>  --}}

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
                    <div class="mt-4 d-flex justify-content-center">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('web.products.create');
    @include('web.products.edit');
    @include('web.products.scripts');


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>

</body>

</html>
