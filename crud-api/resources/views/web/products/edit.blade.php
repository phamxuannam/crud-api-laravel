<h1>Chinh Sua Product</h1>


<form action=" {{ route('products.update', $product)}}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{old('name',$product->name)}}"> <br>
    <input type="text" name="price" value="{{old('price',$product->price)}}"> <br>
    <input type="text" name="quantity" value="{{old('quantity',$product->quantity)}}"> <br>
    <input type="text" name="userId" value="{{old('userId',$product->userId)}}">
    <button type="submit">Update</button>

</form>

<style>
    form {
        width: 40%;
        max-width: 100%;
    }
    form input{
        padding: 5px 10px;
        margin-bottom: 5px;
    }
</style>