<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $data = Region::where('deleted','=',false)->get();

            return datatables()->of($data) 
                 ->addColumn('deleted',function($row){
                        if($row->deleted == 0){
                            return 'Actifs';
                        }
                        else if($row->deleted == 1) {
                            return 'Non Actif';
                        }
                    }) 
                        
                ->addColumn('action',function($row){
                    $btn = '<a href="'.route('regions.edit',$row->id).'" class="edit btn btn-primary"><i class="fa fa-edit"></i></a>
                                <a href="'.route('regions.delete',$row->id).'" class="edit btn btn-danger" method="post"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['deleted','action'])
                ->make(true);
        }

        return view('backend.pages.regions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.regions.create');
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

        $regions = new Region();

        $regions->libelle = $libelle;
        $regions->superficie = $superficie;
        $regions->deleted = false;

        $regions->save();

        return redirect()->route('regions.index')->with('creer','Localité créé');
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
        $regions = Region::findOrFail($id);
        return view('backend.pages.regions.edit',compact('regions'));
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
        //echo $superficie;die();
        $regions = Region::find($id);
        $news_data = [
            'libelle'=>$libelle,
            'superficie'=>$superficie
        ];

        //var_dump($news_data);die();
        $regions->save($news_data);
        var_dump($regions);die();

        return redirect()->route('regions.index')->with('success','Modification reussie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $regions = Region::find($id);
        $regions->deleted = true;

        $regions->update();

        return redirect()->route('regions.index')
                        ->with('success','regions supprimé avec succès');

        //return redirect()->route('')->with('success','Suppressions reussie');
    }
}
