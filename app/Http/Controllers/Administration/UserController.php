<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profil;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$users = User::where('deleted',0)->get();
        
        if(request()->ajax()){
            $data = User::where('deleted','=',false)->get();

            return datatables()->of($data) 
                 ->addColumn('deleted',function($row){
                        if($row->deleted == 0){
                            return 'Actif';
                        }
                        else if($row->deleted == 1) {
                            return 'Non Actif';
                        }
                    }) 
                        
                ->addColumn('action',function($row){
                    $btn = '<a href="'.route('users.edit',$row->id).'" class="edit btn btn-primary"><i class="fa fa-edit"></i></a>
                                <a href="#" class="edit btn btn-danger"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['deleted','action'])
                ->make(true);
        }

        return view('backend.pages.users.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profils = Profil::where('deleted', 1)->get();
        return view('backend.pages.users.create', compact('profils'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required',
            'prenom' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'same:confirm-password'
        ]);
       // $profils= $request->get('profil');
        $input = $request->all();
        //dd($profils);
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
       
        
        return redirect()->route('users.get')->with('creer','Utilisateur créé');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeUser(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required',
            'prenom' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'same:confirm-password'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
       
        
        return view('backend.pages.login');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.pages.users.edit',compact('user'));
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
        $statut = $request->get('statut');

        $u = ['status'=>$statut];

        $user = User::find($id);
        $user->update($u);

        return redirect()->route('users.get')->with('success','Modification reussie');
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
