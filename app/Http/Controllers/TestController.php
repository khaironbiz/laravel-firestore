<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Firestore;

class TestController extends Controller
{
    public function __construct(Firestore $firestore)
    {
        $this->database = $firestore->database();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $path       = 'users';
        $documents  = $this->database->collection($path)->documents();
        $users      = $documents->rows();
        $data       = [
            'users'     => $users

        ];
        return view('test.test', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->database->collection('users');
        $id     = 'anisa@gmail.com';
        $data = [
            'id'        => $id,
            'nama'      => 'Anisa Fitri Laila',
            'email'     => 'anisa@gmail.com',
            'phone'     => '0817250909',
            'school'    => [
                'level'         => 'SD',
                'nama_sekolah'  => 'SD Kreativa'
            ]
        ];
        $this->database->collection('users')->document($id)->set($data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $path   = "users/$id";
        $user   = $this->database->document($path)->snapshot();
//        dd($user);
        if(! empty($user->id())){
            $data       = [
                'user'     => $user

            ];
            return view('test.show', $data);

        }else{
            dd('data tidak ditemukan');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
