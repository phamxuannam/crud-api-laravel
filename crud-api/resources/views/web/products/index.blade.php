
<h1>Tao San Pham</h1>
<form action=" {{ route('products.store')}}" method="POST" id="f-create">
    @csrf

    <input type="text" name="name" placeholder="Name"> <br>
    <input type="text" name="price" placeholder="Price"> <br>
    <input type="text" name="quantity" placeholder="Quantity"> <br>
    <input type="text" name="userId" placeholder="UserId">
    <button type="submit">Create</button>

</form>

<h1>Danh Sach San Pham</h1>
<table border="1"
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Time Created</th>
        <th>Time Updated</th>
        <th>Action</th>
    </tr>
    @foreach ($products as $product)
        <tr>
            <td> {{$product->name}} </td>
            <td> {{$product->price}} </td>
            <td> {{$product->quantity}} </td>
            <td> {{$product->created_at}} </td>
            <td> {{$product->updated_at}} </td>
            <td> 
                <a href="{{ route('products.edit',$product)}}">Edit</a>    

                <form action="{{ route('products.destroy',$product)}}" method ="POST" id="f-delete">
                    @csrf
                    @method('Delete')
                    <button>Delete</button>    
                </form>
            </td>
        </tr>
    @endforeach
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