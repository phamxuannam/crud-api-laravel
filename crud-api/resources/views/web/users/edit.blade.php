<h1>Chinh Sua User</h1>


<form action=" {{ route('users.update',$user)}}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{old('name',$user->name)}}"> <br>
    @error('name')
        <div class="error" style="color: red;">{{ $message }}</div>
    @enderror

    <input type="password" name="password" value="{{ old('password',$user->password)}}"> <br>
    @error('password')
        <div class="error" style="color: red;">{{ $message }}</div>
    @enderror

    <input type="text" name="age" value="{{old('age',$user->age)}}">
    @error('age')
        <div class="error" style="color: red;">{{ $message }}</div>
    @enderror

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