{{-- <table border="1"
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Time Created</th>
        <th>Time Updated</th>
        <th>Action</th>
    </tr>
        <td> {{$product->name}} </td>
        <td> {{$product->price}} </td>
        <td> {{$product->quantity}} </td>
        <td> {{$product->created_at}} </td>
        <td> {{$product->updated_at}} </td>
        <td> 
            <a href="{{ route('products.edit',$product)}}">Edit</a>    

            <form action="{{ route('products.destroy',$product)}}" method ="POST" id="f-delete"
            onsubmit="return confirm('Bạn chắc chắn muốn xóa không?')">
                @csrf
                @method('Delete')
                <button>Delete</button>    
            </form>
        </td>
    </tr>
</table>    

<style>
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
</style> --}}
