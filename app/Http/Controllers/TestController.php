<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUser;
use App\Http\Requests\User\UpdateUser;
use App\Models\User;
use Google\Cloud\Firestore\FirestoreClient;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Kreait\Firebase\Contract\Firestore;
use Kreait\Firebase\Contract\Storage;

class TestController extends Controller
{
    public function __construct(Firestore $firestore, Storage $storage)
    {
        $this->database = $firestore->database();
        $this->storage = $storage;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users      = $this->database->collection('users')
                        ->where('berat_badan','>',10)
                        ->documents();
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
        $data =[
            'user'     => new User(),
        ];
        return view('test.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUser $request)
    {
        $validated = $request->validated();
        $data_input = [
            'nama'          => $request->nama,
            'email'         => $request->email,
            'phone'         => (int)$request->phone,
            'nik'           => ($request->nik),
            'dob'           => strtotime($request->dob),
            'berat_badan'   => ($request->berat_badan)*1,
            'created_at'    => time()
        ];
//        var_dump($data_input);
        $user   = $this->database->collection('users')->newDocument();
        $create = $user->set($data_input);
        if($create){
            return redirect()->route('user.index');
        }
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
        $firestore = new FirestoreClient();
        $document = $firestore->document('users/'.$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, $id)
    {
        $data_user  = $this->database->document('users/'.$id)->snapshot();
//        dd($data_user);
        $input = $request->all();
        $data_update = [
            'nama'          => $request->nama,
            'email'         => $request->email,
            'phone'         => ($request->phone)*1,
            'nik'           => ($request->nik)*1,
            'dob'           => strtotime($request->dob),
            'berat_badan'   => ($request->berat_badan)*1,
            'created_at'    => ($data_user['created_at'])*1,
            'updated_at'    => time()
        ];
        $user = app('firebase.firestore')
            ->database()
            ->collection('users')
            ->document($id);
        $update = $user->set($data_update);
        if($update){
            return redirect()->route('user.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user       = app('firebase.firestore')->database()->collection('users')->document($id);
        $destroy    = $user->delete();
        if($destroy){
            return redirect()->route('user.index');
        }

    }

    public function storeFile(Request $request)
    {
        $file = $request->file('file');
        $filename = null;
        $folder = "upload";
        $name = !is_null($filename) ? $filename : Str::random(25);

        return $file->storeAs(
            $folder,
            $name . "." . $file->getClientOriginalExtension(),
            'gcs'
        );
    }

}
