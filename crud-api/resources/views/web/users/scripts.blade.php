<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //create
    $(document).on('submit', '#addUser', function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        $('.error-text').text('');
        $.ajax({
            url: "{{ route('users.store') }}",
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(res) {
                alert(res.message);
                $('#addUser')[0].reset();

                fetchUser();
            },
            error: function(err) {
                let errors = err.responseJSON.errors;
                $.each(errors, function(key, value) {
                    $('.' + key + '_error').text(value[0]);
                });
            }
        });
    });

    $(document).on('click', '.editBtn', function(e) {
        e.preventDefault();

        let userId = $(this).data('id');
        $('#editUserModal').data('id', userId);

        $('#edit_name').val($(this).data('name'));
        $('#edit_email').val($(this).data('email'));
        // $('#edit_password').val($(this).data('password'));
        $('#edit_age').val($(this).data('age'));
        $('#edit_admin').val($(this).data('admin'))

        $('#editUserModal').modal('show');

    });

    //edit
    $(document).on('submit', '#editUser', function(e) {
        e.preventDefault();

        console.log('ok');


        let id = $('#editUserModal').data('id');
        $('.error-text').text('');

        let formData = new FormData(this);

        formData.append('_method', 'PUT');

        $.ajax({
            url: "{{ route('users.update', ':id') }}".replace(':id', id),
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(res) {
                alert(res.message);
                $('#editUserModal').modal('hide');
                fetchUser();
            },
            error: function(err) {
                let errors = err.responseJSON.errors;
                $.each(errors, function(key, values) {
                    $('.' + key + '_error').text(value[0]);
                });
            }
        });
    });


    //delete
    $(document).on('click', '.deleteBtn', function(e) {
        e.preventDefault();
        if (!confirm("Bạn chắc chắn muốn xóa không?")) return;
        let id = $(this).data('id');
        $.ajax({
            url: "{{ route('users.destroy', ':id') }}".replace(':id', id),
            method: 'DELETE',
            success: function(res) {
                alert(res.message);
                fetchUser();
            },
            error: function(err) {
                alert("Lỗi: không thể xóa");
            }
        });
    });

    //show
    $(document).on('click', '.showBtn', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        $('#showUserModal').data('id', id);

        let admin = $(this).data('admin');
        console.log(admin);

        $('#show_name').val($(this).data('name'));
        $('#show_email').val($(this).data('email'));
        $('#show_age').val($(this).data('age'));
        $('#show_admin').val($(this).data('admin'));
        $('#show_created').val($(this).data('created'));

        $('#showUserModal').modal('show');
    });

    //fetch
    function fetchUser() {
        $.ajax({
            url: "{{ route('users.fetch') }}",
            method: 'GET',
            success: function(response) {
                $('#table-body').html(response);
            }
        });
    }
</script>
