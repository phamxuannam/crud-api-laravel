<h1>Danh Sach User</h1>
<table border="1" class="table table-bordered"
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Age</th>
        <th>Time Created</th>
        <th>Time Updated</th>
        <th>Action</th>
    </tr>
    @foreach ($users as $user)
        <tr>
            <td> {{$user->name}} </td>
            <td> {{$user->email}} </td>
            <td> {{$user->age}} </td>
            <td> {{$user->created_at}} </td>
            <td> {{$user->updated_at}} </td>
            <td> 
                <a href="{{ route('users.edit',$user) }}">Edit</a>    

                <form action="{{ route('users.destroy',$user) }}" method ="POST" id="f-delete" 
                onsubmit="return confirm('Bạn chắc chắn muốn xóa không?')">
                    @csrf
                    @method('Delete')
                    <button>Delete</button>    
                </form>
            </td>
        </tr>
    @endforeach
</table>   
 <div class="mt-4 d-flex justify-content-center">
    {{ $users->links() }}
</div>

<style>
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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">