<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .f-create {
            width: 40%;
            max-width: 100%;
        }

        .f-create input {
            padding: 5px 10px;
            margin-bottom: 5px;
        }

        table {
            margin-top: 20px;
            width: 100%;
        }

        table tr {
            text-align: center;
        }

        table tr th {
            background-color: rgb(0, 195, 255);
            padding: 5px;
            font-weight: bold;
            font-size: 25px;
        }

        table tr td {
            padding: 3px;
            font-weight: bold;
            font-size: 20px;
        }

        table tr td a {
            text-decoration: none;
            color: black;
        }

        a:hover {
            color: rgb(0, 68, 255);
            pointer-events: painted;
        }
    </style>

    <title>Document</title>
</head>

<body>

    <table border="1" <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Age</th>
        <th>Time Created</th>
        <th>Time Updated</th>
        <th>Action</th>
        </tr>
        <tr>
            <td> {{ $user->name }} </td>
            <td> {{ $user->email }} </td>
            <td> {{ $user->age }} </td>
            <td> {{ $user->created_at }} </td>
            <td> {{ $user->updated_at }} </td>
            <td>
                <a class="btn btn-info btn-sm" href="{{ route('users.edit', $user) }}">Edit</a>

                {{-- <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $user->id }}"
                    data-url="{{ route('users.destroy', $user) }}">Delete</button> --}}

                <form action="{{ route('users.destroy', $user) }}" method ="POST" id="f-delete"
                    onsubmit="return confirm('Bạn chắc chắn muốn xóa không?')">

                    @csrf
                    @method('Delete')
                    <button>Delete</button>
                </form>
            </td>
        </tr>
    </table>

</body>

{{-- <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click', '.btn-delete', function() {
        if (!confirm("Bạn có chắc muốn xóa không?")) return;

        let id = $(this).data('id');
        let url = $(this).data('url');

        $.ajax({
            type: 'DELETE',
            url: url,
            success: function(res) {
                alert(res.message);
                $("#row-" + id);
            },
            error: function(err) {
                console.log(err.responseText);
                alert(error.status);
            }
        });
    });
</script> --}}

</html>
