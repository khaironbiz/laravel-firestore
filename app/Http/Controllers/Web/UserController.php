<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{

    public function index()
    {
        $database   = app('firebase.database');
        $db_user    = $database->getReference('users');
        $users      = $db_user->getValue();
        $data       = [
            'users'     => $users
        ];
        return view('users.firebase', $data);
    }
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $storage = app('firebase.storage');

        $validatedData = $request->validate([
            'file' => 'required|max:20048',
        ]);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = uniqid() . '_' . $file->getClientOriginalName();

            // Upload the file to Google Cloud Storage
            Storage::disk()->put($filename, file_get_contents($file), 'public');

            // Optionally, you can generate a public URL to the uploaded file
            $url = Storage::disk('gcs')->url($filename);

            return response()->json(['message' => 'File uploaded successfully', 'url' => $url]);
        }

        return response()->json(['message' => 'No file uploaded'], 400);
//
//        $name   = $request->file('file')->getClientOriginalName();
//        $path   = "avatars";
//        $upload = $request->file('file')->storeAs($path, $name);
//        $link   = Storage::url($path."/".$name);
//        dd($link) ;
////        return Storage::download($path."/".$name);
    }
}
