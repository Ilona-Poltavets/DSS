<?php

namespace App\Http\Controllers;

use App\Models\Attributes;
use Illuminate\Http\Request;

class AttributesController extends Controller
{
    public function index(){
        $data['attributes']=Attributes::get();
        return view('atributes.index');
    }
    public function create(){
        return view('attributes.create');
    }
    public function store(Request $request){
        $request->validate([
            'reason_id'=>'required',
            'description'=>'required'
        ]);
        $attribut=new Attributes();
        $attribut->reason_id=$request->reason_id;
        $attribut->description=$request->description;
        $attribut->save();
        return redirect()->route('attributes.index')->with('success','Attribut has been created successfully');
    }
    public function edit(){
        return view('attributes.index');
    }
    public function update(Request $request, $id){
        $request->validate([
            'reason_id'=>'required',
            'description'=>'required'
        ]);
        $attribut=Attributes::find($id);
        $attribut->reason_id=$request->reason_id;
        $attribut->description=$request->description;
        $attribut->save();
        return redirect()->route('attributes.index')->with('success','Attribut has been created successfully');
    }
    public function destroy(){

    }
}
