<?php

namespace App\Http\Controllers;

use App\Models\Reason;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReasonController extends Controller
{
    public function index()
    {
        $data['reasons'] = Reason::get();//->paginate(10);
        return view('reasons.index', $data);
    }

    public function create()
    {
        return view('reasons.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            //'alarm_id'=>'required',
            'name' => 'required',
            'expert_opinion' => 'required|min:0|max:100',
            'experts_count' => 'required',
            'priority' => 'required|integer|min:1|max:5'
        ]);
        $reason = new Reason();
        $reason->name = $request->name;
        $reason->expert_opinion = $request->expert_opinion;
        $reason->experts_count = $request->experts_count;
        $reason->priority = $request->priority;
        $reason->save();
        return redirect()->route('reasons.index')->with('success', 'Reason has been created successfully');
    }

    public function edit(Reason $reason)
    {
        return view('reasons.edit', compact('reason'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            //'alarm_id'=>'required',
            'name' => 'required',
            'expert_opinion' => 'required|integer|min:0|max:100',
            'experts_count' => 'required',
            'priority' => 'required|integer|min:1|max:5'
        ]);
        $reason = Reason::find($id);
        $reason->name = $request->name;
        $reason->expert_opinion = $request->expert_opinion;
        $reason->experts_count = $request->experts_count;
        $reason->priority = $request->priority;
        $reason->save();
        return redirect()->route('reasons.index')->with('success', 'Reason has been edited successfully');
    }

    public function destroy(Reason $reason)
    {
        $reason->delete();
        return redirect()->route('reasons.index')->with('success', 'Reason has been deleted successfully');
    }

    public function find(Request $request)
    {
        $name = $request->input('find_reason');;
        $data = Reason::get();
        $reasons = array();
        foreach ($data as $i) {
            if (Str::is('*' . $name . '*', $i->name)) {
                array_push($reasons, $i);
            }
        }
        return view('reasons.index', compact('reasons'));
    }

    public function getAttributes($id)
    {
        $i = 1;
        $result = '';
        $attributes = Reason::find($id)->attributes;
        foreach ($attributes as $attribute) {
            $result = $result . $i . '. ' . $attribute->description . "\n";
            $i++;
        }
        return $result;
    }
}
