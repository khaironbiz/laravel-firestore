<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Kreait\Firebase\Contract\Database;
use Kreait\Firebase\Contract\Firestore;
//use Kreait\Firebase\Contract\Storage;

class UserController extends Controller
{
    public function __construct(Firestore $firestore, Database $database)
    {
//        $this->storage  = $storage;
        $this->database = $firestore->database();
        $this->firebase = $database;
        $this->users    = $database->getReference('users');

    }
    public function index()
    {

        $users      = $this->users->getValue();
        $data       = [
            'users'     => $users
        ];
        return view('test.firebase', $data);
    }
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'file' => 'required|max:20048',
        ]);

        $name   = $request->file('file')->getClientOriginalName();
        $path   = "avatars";
        $upload = $request->file('file')->storeAs($path, $name);
        $link   = Storage::url($path."/".$name);
        dd($link) ;
//        return Storage::download($path."/".$name);


    }
}
