
<table border="1"
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Age</th>
        <th>Time Created</th>
        <th>Time Updated</th>
        <th>Action</th>
    </tr>
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
</table>   

<style>
    .f-create {
        width: 40%;
        max-width: 100%;
    }
    .f-create input{
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
    table tr td a{
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