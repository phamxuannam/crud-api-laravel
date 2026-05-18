<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //event khi nhấn submit
    $(document).on('submit', '#addProduct', function(e) {
        e.preventDefault(); //tắt hoạt động mặc định của button khi submit là reload page, và tự xử lý = ajax

        let formData = new FormData(this); //map data trong input vào form object có dạng object {key: value}
        $('.error-text').text(''); //reset class error-text 

        //create
        $.ajax({
            url: "{{ route('products.store') }}", //url: route
            method: 'POST', //method request
            data: formData, //data request
            contentType: false, //để browser tự gen content-type, bắt buộc khi sử dụng FormData
            processData: false, //tắt tự động chuyển data sang jquery String, giữ nguyên data dạng object
            success: function(response) { //khi success 
                //$('.success_message').text(response.message);
                // $('#addProductModal').modal('hide'); //ẩn form create
                alert(response.message);
                $('#addProduct')[0].reset(); //reset id addProduct

                getProducts(); //fetch Product(chỉ load mỗi tbody của table) k phải load toàn bộ
            },
            error: function(err) { //khi errror
                let errors = err.responseJSON.errors; //lấy message error ở trong validate
                $.each(errors, function(key, value) { //mỗi errors có dạng 'name' => 'error message'
                    $('.' + key + '_error').text(value[
                        0
                    ]); //get class key_error trong form addProduct và lấy errrors message
                });
            }
        })

    });

    //open form edit and get data form click 'editBtn'
    $(document).on('click', '.editBtn', function(e) {

        // Lưu id vào modal để dùng sau
        let productId = $(this).data('id'); //lấy prId trong data-id (.editBtn) 

        $('#editProductModal').data('id',
            productId); //gắn prId vào id trong #editProductModal để lát lấy ra dùng

        $('#edit_name').val($(this).data(
            'name')); //lấy data('name') trong editBtn(products-data.blade.php) gắn vào #edit_id

        $('#edit_price').val($(this).data('price'));
        $('#edit_quantity').val($(this).data('quantity'));

        $('#editProductModal').modal('show'); //show #editProductModal khi click vào .editBtn 

    });

    //edit
    $(document).on('submit', '#editProduct', function(e) {
        e.preventDefault();

        console.log('submit edit');

        // Lấy id đã lưu trong modal ở trên
        let id = $('#editProductModal').data('id');
        let formData = new FormData(this);

        formData.append('_method', 'PUT'); //thêm method PUT vào form để fake request từ POST sang PUt

        $('.error-text').text('');

        $.ajax({
            url: "{{ route('products.update', ':id') }}".replace(':id', id),
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                // $('.success_message').text(response.message);
                alert(response.message);
                $('#editProductModal').modal('hide'); //sau khi thành công thì ẩn #editProductModal
                $('#editProduct')[0].reset();

                getProducts();

            },
            error: function(err) {
                let errors = err.responseJSON.errors;
                $.each(errors, function(key, value) {
                    $('.' + key + '_error').text(value[0]);
                });
            }
        })
    });

    $(document).on('click', '.deleteBtn', function() {
        if (!confirm('Bạn có chắc muốn xóa không?')) return;
        let id = $(this).data('id');
        $.ajax({
            url: "{{ route('products.destroy', ':id') }}".replace(':id', id),
            method: 'DELETE',
            contentType: false,
            processData: false,
            success: function(res) {
                $('#row' + id)
                    .remove(); //khi delete thành công thì xóa row + id của product vừa xóa
                getProducts();
                alert(res.message);
            },
            error: function() {
                alert("Lỗi, Không thể xóa sản phẩm.");
            }
        });


    });


    //fetch products, load mỗi tbody mà k load hết
    function getProducts() {
        $.ajax({
            url: "{{ route('products.fetch') }}",
            method: 'GET',
        }).done(function(response) {

            $('#table-body').html(
                response); //thay #table-body bằng HTML trong response mà không cần reload cả trang

        }).fail(function(error) {
            $('#table-body').html(error.message("lỗi"));
        });

        // setTimeout(function() {
        //     $('.success_message').text('');
        // }, 2000);
    }
</script>
