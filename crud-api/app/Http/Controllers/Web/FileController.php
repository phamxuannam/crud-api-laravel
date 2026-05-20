<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\FileRequest;
use App\Models\File;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){ 
        if(Auth::user()->hasRole('area_manager')){
        }
        $files = File::latest()->get();
        return view('web.files.index', [
            'files' => $files
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('web.files.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FileRequest $request)
    {
        $validated = $request->validated();

        $description = $validated['description'];
        $owner = $validated['user_id'];
        $fileUpload = $request->file('file');
        $original_name = $fileUpload->getClientOriginalName();
        $filter_filename = $fileUpload->getClientOriginalExtension();
        $file_name_stored = Str::uuid() . '-' . $filter_filename;
        $path = $fileUpload->storeAs('uploads/'. Auth::id(),$file_name_stored);
        $visibility = Auth::user()->hasRole('area_manager') ? $visibility = $validated['visibility'] : 1;

        try{
            File::create([
                'original_name' => $original_name,
                'file_name'     => $file_name_stored,
                'file_path'     => $path,
                'mime_type'     => $fileUpload->getMimeType(),
                'size'          => $fileUpload->getSize(),
                'description'   => $description,
                'visibility'    => $visibility,
                'user_id'       => $owner,
            ]);
        } catch(Exception $e){
            Storage::delete($path);
            throw $e;
        }
       
        return redirect()->route('files.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('web.files.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
