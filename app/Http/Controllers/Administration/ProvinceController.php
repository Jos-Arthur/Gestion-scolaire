<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Province;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $data = Province::where('deleted','=',false)->get();

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
                    $btn = '<a href="'.route('provinces.edit',$row->id).'" class="edit btn btn-primary"><i class="fa fa-edit"></i></a>
                                <a href="'.route('provinces.delete',$row->id).'" class="edit btn btn-danger" method="post"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['deleted', 'region','action'])
                ->make(true);
        }

       return view('backend.pages.provinces.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::where('deleted','=',false)->get();
        return view('backend.pages.provinces.create', compact('regions'));
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
        $chef_lieu=$request->get('chef_lieu');
        $commentaire = $request->get('commentaire');
        $region = $request->get('region');

        $provinces = new Province();

        $provinces->libelle = $libelle;
        $provinces->chef_lieu = $chef_lieu;
        $provinces->commentaire = $commentaire;
        $provinces->region_id = $region;
        $provinces->deleted = false;

        $provinces->save();

        return redirect()->route('provinces.index')->with('creer','Province créée');
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
        $provinces = Province::findOrFail($id);
        $regions = Province::findOrFail($provinces->region_id);
        //$regions = Region::where('deleted','=',false)->get();
        //dd($regions);
        //dd($provinces);
        return view('backend.pages.provinces.edit',compact('provinces', 'regions'));
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
        $chef_lieu = $request->get('chef_lieu');
        $commentaire = $request->get('commentaire');

        $news_data = [
            'libelle'=>$libelle,
            'chef_lieu'=> $chef_lieu,
            'commentaire'=>$commentaire
        ];

        $provinces = Province::find($id);
        $provinces->update($news_data);

        return redirect()->route('provinces.index')->with('success','Modification r&eacute;ussie');
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
        $provinces = Province::find($id);
        $provinces->deleted = true;

        $provinces->update();

        return redirect()->route('provinces.index')->with('success','Suppression r&eacute;ussie');
    }
}
