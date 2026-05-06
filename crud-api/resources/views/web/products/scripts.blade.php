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
        $('#editProductModal').data('id', productId);

        $('#edit_name').val($(this).data('name')); //lấy data('name') trong editBtn(products-data.blade.php) gắn vào #edit_id
        $('#edit_price').val($(this).data('price'));
        $('#edit_quantity').val($(this).data('quantity'));

        $('#editProductModal').modal('show');

    });

    $(document).on('submit', '#editProduct', function(e) {
        e.preventDefault();

        // Lấy id đã lưu trong modal
        let id  = $('#editProductModal').data('id');   
        let formData = new FormData(this);

        formData.append('_method', 'PUT');
            
        $('.error-text').text('');

        $.ajax({
            url: '/products/' + id,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('.success_message').text(response.message); 
                $('#editProductModal').modal('hide');
                $('#editProduct')[0].reset();
                  
                getProducts();

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

    </script>