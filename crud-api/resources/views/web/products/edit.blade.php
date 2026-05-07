 {{-- <h1>Chinh Sua Product</h1>
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

</form>  --}}



 <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="editModalLabel">Update Product</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form id="editProduct" enctype="multipart/form-data">
                 @csrf


                 <input type="hidden" name="id" id="edit_id">

                 <div class="modal-body">

                     <div class="mb-3">
                         <label for="name" class="col-form-label">Name:</label>
                         <input type="text" name="name" id="edit_name" value="{{ old('name') }}"
                             class="form-control">
                         <span class="text-danger error-text name_error"></span>
                     </div>

                     <div class="mb-3">
                         <label for="message-text" class="col-form-label">Price:</label>
                         <input type="number" name="price" id="edit_price" value="{{ old('price') }}"
                             class="form-control">
                         <span class="text-danger error-text price_error"></span>
                     </div>

                     <div class="mb-3">
                         <label for="message-text" class="col-form-label">Quantity:</label>
                         <input type="number" name="quantity" id="edit_quantity" value="{{ old('quantity') }}"
                             class="form-control">
                         <span class="text-danger error-text quantity_error"></span>
                     </div>

                     <div class="mb-3">
                         <label for="message-text" class="col-form-label">Account Name:</label>
                         <input type="hidden" name="userId" value="{{ Auth::id() }}">
                         <input type="text" value="{{ old('userId', Auth::user()->name) }}" class="form-control"
                             id="price" disabled>
                     </div>
                 </div>

                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Update</button>
                 </div>

             </form>
         </div>
     </div>
 </div>
