<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Localite;
use App\Models\Region;

class LocaliteController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $data = Localite::where('deleted','=',false)->get();

            return datatables()->of($data) 
                 ->addColumn('deleted',function($row){
                        if($row->deleted == 0){
                            return 'Actif';
                        }
                        else if($row->deleted == 1) {
                            return 'Non Actif';
                        }
                    })
                ->addColumn('region', function ($row) {
                        return $row->region->libelle;
                    }) 
                        
                ->addColumn('action',function($row){
                    $btn = '<a href="'.route('localites.edit',$row->id).'" class="edit btn btn-primary"><i class="fa fa-edit"></i></a>
                                <a href="'.route('localites.delete',$row->id).'" class="edit btn btn-danger" method="post"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['deleted', 'region','action'])
                ->make(true);
        }

        return view('backend.pages.localites.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::where('deleted','=',false)->get();
        return view('backend.pages.localites.create', compact('regions'));
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
        $superficie = $request->get('superficie');
        $region = $request->get('region');

        $localites = new Localite();

        $localites->libelle = $libelle;
        $localites->superficie = $superficie;
        $localites->region_id = $region;
        $localites->deleted = false;

        $localites->save();

        return redirect()->route('localites.index')->with('creer','Localité créé');
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
        $localites = Localite::findOrFail($id);
        $regions = Region::where('deleted','=',false)->get();
        return view('backend.pages.localites.edit',compact('localites', 'regions'));
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
        $superficie = $request->get('superficie');
        $region = $request->get('region');

        $news_data = [
            'libelle'=>$libelle,
            'superficie'=>$superficie,
            'region_id'=>$region
        ];

        $localites = Localite::find($id);
        $localites->update($news_data);

        return redirect()->route('localites.index')->with('success','Modification reussie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $localites = Localite::find($id);
        $localites->deleted = true;

        $localites->update();

        return redirect()->route('localites.index')
                        ->with('success','localites supprimé avec succès');

        //return redirect()->route('')->with('success','Suppressions reussie');
    }
}
