<h1>Chinh Sua Product</h1>


<form action=" {{ route('products.update', $product)}}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{old('name',$product->name)}}"> <br>
    @error('name')
        <div class="error" style="color: red;">{{ $message }}</div>
    @enderror

    <input type="text" name="price" value="{{old('price',$product->price)}}"> <br>
    @error('price')
        <div class="error" style="color: red;">{{ $message }}</div>
    @enderror

    <input type="text" name="quantity" value="{{old('quantity',$product->quantity)}}"> <br>
    @error('quantity')
        <div class="error" style="color: red;">{{ $message }}</div>
    @enderror

    <input type="text" value="{{old('userId',Auth::user()->name)}}" disabled>
    <input type="hidden" name="userId" value="{{old('userId',Auth::id())}}">
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