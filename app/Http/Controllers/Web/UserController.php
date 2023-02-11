<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;
use Kreait\Firebase\Contract\Firestore;
use Kreait\Firebase\Contract\Storage;

class UserController extends Controller
{
    public function __construct(Firestore $firestore, Database $database, Storage $storage)
    {
        $this->storage  = $storage;
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
}
