<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profil;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $data = Profil::where('deleted','=',false)->get();

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
                    $btn = '<a href="'.route('profils.edit',$row->id).'" class="edit btn btn-primary"><i class="fa fa-edit"></i></a>
                                <a href="'.route('profils.delete',$row->id).'" class="edit btn btn-danger" method="post"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['deleted','action'])
                ->make(true);
        }

        return view('backend.pages.profils.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.profils.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $libelle = $request->get('libelle');
        $commentaire = $request->get('commentaire');

        $profils = new Profil();

        $profils->libelle = $libelle;
        $profils->commentaire = $commentaire;
        $profils->deleted = false;

        $profils->save();

        return redirect()->route('profils.index')->with('creer','Profil créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $profils = Profil::findOrFail($id);
        // return view('backend.pages.profils.show',compact('profils'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profils = Profil::findOrFail($id);
        return view('backend.pages.profils.edit',compact('profils'));
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
        $libelle = $request->get('libelle');
        $commentaire = $request->get('commentaire');

        $news_data = [
            'libelle'=>$libelle,
            'commentaire'=>$commentaire
        ];

        $profils = Profil::find($id);
        $profils->update($news_data);

        return redirect()->route('profils.index')->with('success','Modification reussie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profil = Profil::find($id);
        $profil->deleted = true;

        $profil->update();

        return redirect()->route('profils.index')
                        ->with('success','Profil supprimé avec succès');

        //return redirect()->route('')->with('success','Suppressions reussie');
    }
}
