<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Direction;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $data = Service::where('deleted','=',false)->get();

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
                    $btn = '<a href="'.route('services.edit',$row->id).'" class="edit btn btn-primary"><i class="fa fa-edit"></i></a>
                                <a href="#" class="edit btn btn-danger"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['deleted','action'])
                ->make(true);
        }

        return view('backend.pages.services.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.services.create');
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

        $services = new Service();

        $services->libelle = $libelle;
        $services->commentaire = $commentaire;
        $services->deleted = 1;

        $services->save();

        return redirect()->route('services.index')->with('creer','Service créée');
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
        //
        $services = Service::findOrFail($id);
        return view('backend.pages.services.edit',compact('services'));
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
        $libelle = $request->get('libelle');
        $commentaire = $request->get('commentaire');

        $news_data = [
            'libelle'=>$libelle,
            'commentaire'=>$commentaire
        ];

        $services = Service::find($id);
        $services->update($news_data);

        return redirect()->route('services.index')->with('success','Modification r&eacute;ussie');
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
        $direction = Service::find($id);
        $direction->deleted = true;

        $direction->update();

        return redirect()->route('services.index')->with('success','Suppression r&eacute;ussie');
    }
}
