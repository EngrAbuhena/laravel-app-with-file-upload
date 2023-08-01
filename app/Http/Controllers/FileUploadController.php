<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FileUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        return view('fileUpload');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'file'=>'required|mimes:jpg,png,pdf|max:2048'
        ]);

        $newFile=new File();
        if ($request->hasFile('file'))
        {
            $file=$request->file('file');
            $fileName=time().'_'.$file->getClientOriginalName();
            $filePath=$file->storeAs('files',$fileName,'public');

            $newFile->name=$fileName;
            $newFile->file_path='/storage/'.$filePath;
            $newFile->save();

            return redirect()
                ->back()
                ->with('status','File Uploaded Successfully.')
                ->with('file',$fileName);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        //
    }
}
