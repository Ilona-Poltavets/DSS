<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index(){
        $data['attributes']=Attribute::get();
        return view('attributes.index',$data);
    }
    public function create(){
        return view('attributes.create');
    }
    public function store(Request $request){
        $request->validate([
            'reason_id'=>'required',
            'description'=>'required'
        ]);
        $attribut=new Attribute();
        $attribut->reason_id=$request->reason_id;
        $attribut->description=$request->description;
        $attribut->save();
        return redirect()->route('attribute.index')->with('success','Attribut has been created successfully');
    }
    public function edit(Attribute $attribute){
        return view('attributes.edit', compact('attribute'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'reason_id'=>'required',
            'description'=>'required'
        ]);
        $attribut=Attribute::find($id);
        $attribut->reason_id=$request->reason_id;
        $attribut->description=$request->description;
        $attribut->save();
        return redirect()->route('attribute.index')->with('success','Attribut has been created successfully');
    }
    public function destroy(Attribute $attribute){
        $attribute->delete();
        return redirect()->route('attribute.index')->with('success','Reason has been deleted successfully');
    }
}
