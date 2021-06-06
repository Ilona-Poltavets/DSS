<?php

namespace App\Http\Controllers;

use App\Models\Reason;
use App\Models\Attribute;
use Illuminate\Http\Request;

class ReasonController extends Controller
{
    public function index(){
        $data['reasons']=Reason::get();
        return view('reasons.index',$data);
    }
    public function create(){
        return view('reasons.create');
    }
    public function store(Request $request){
        $request->validate([
            //'alarm_id'=>'required',
            'name'=>'required',
            'expert_opinion'=>'required|between:0,100',
            'experts_count'=>'required',
            'priority'=>'required'
        ]);
        $reason=new Reason();
        $reason->name=$request->name;
        $reason->expert_opinion=$request->expert_opinion;
        $reason->experts_count=$request->experts_count;
        $reason->priority=$request->priority;
        $reason->save();
        return redirect()->route('reasons.index')->with('success','Reason has been created successfully');
    }
    public function edit(Reason $reason){
        return view('reasons.edit', compact('reason'));
    }
    public function update(Request $request, $id){
        $request->validate([
            //'alarm_id'=>'required',
            'name'=>'required',
            'expert_opinion'=>'required',
            'experts_count'=>'required',
            'priority'=>'required'
        ]);
        $reason=Reason::find($id);
        $reason->name=$request->name;
        $reason->expert_opinion=$request->expert_opinion;
        $reason->experts_count=$request->experts_count;
        $reason->priority=$request->priority;
        $reason->save();
        return redirect()->route('reasons.index')->with('success','Reason has been edited successfully');
    }
    public function destroy(Reason $reason){
        $reason->delete();
        return redirect()->route('reasons.index')->with('success','Reason has been deleted successfully');
    }
}
