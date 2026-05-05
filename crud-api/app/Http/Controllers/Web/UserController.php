<?php

namespace App\Http\Controllers\Web;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(2);
        return view('web.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('web.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('web.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        $data = $request->validate([
            'name' => ['min:5'],
            'age'   => ['numeric', 'min:1'],
            'password' => [Password::min(10)->mixedCase()->numbers()->symbols()]
        ],[
            'name.min'     => 'Tên ít nhất phải là 5 ký tự.',
            'age.numeric'  => 'Tuổi phải là số.',
            'age.min'      => 'Ít nhất phải 1 tuổi.',
            'password.min' => 'Password ít nhất phải là 10 ký tự.',
            'password.mixed_case' => 'password phải có ký tự hoa và thường.',
            'password.numbers'    => 'password phải có số.',
            'password.symbols'    => 'password phải có ký tự đặc biệt.'  
        ]);
        $user->update($data);

        return redirect()->route('users.index', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, Request $request)
    {
        $user->delete();
        // return response()->json([
        //     'message' => 'successed.'
        // ]); 
        if($request->ajax()){
            return response()->json([
                'message'=>'successed.'
            ]);
        }
        return redirect()->route('users.index');
    }
}