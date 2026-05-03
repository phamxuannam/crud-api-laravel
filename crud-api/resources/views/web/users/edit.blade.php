<h1>Chinh Sua User</h1>


<form action=" {{ route('users.update',$user)}}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{old('name',$user->name)}}"> <br>
    <input type="password" name="password" value="{{ old('password',$user->password)}}"> <br>
    <input type="text" name="age" value="{{old('age',$user->age)}}">
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