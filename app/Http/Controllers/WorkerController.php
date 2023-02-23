<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = Worker::latest()->paginate(5);
     
        return view('admin.workers.index',compact('workers')) ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.workers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'national_id' => 'required',
            'name' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone_number' => 'required',
            'email' => 'required',
            'age' => 'required',
            'city' => 'required',
            'country' => 'required',
            'street' => 'required',
        ]);
        $input = $request->all();
        // dd($input); 
   
        if ($img = $request->file('img')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $img->getClientOriginalExtension();
            $img->move($destinationPath, $profileImage);
            $input['img'] = "$profileImage";
        }

        Worker::create($input);
      
        return redirect()->route('workers')->with('success','Worker created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function edit(Worker $worker)
    {
        return view('admin.workers.edit',compact('worker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Worker $worker)
    {
        $request->validate([
            'national_id' => 'required',
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'age' => 'required',
            'city' => 'required',
            'country' => 'required',
            'street' => 'required',
        ]);
        $input = $request->all();
   
        if ($img = $request->file('img')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $img->getClientOriginalExtension();
            $img->move($destinationPath, $profileImage);
            $input['img'] = "$profileImage";
        }else{
            unset($input['img']);
        }
        $worker->update($input);
     
        return redirect()->route('workers')
                        ->with('success','Worker updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Worker $worker)
    {
        $worker->delete();
      
        return redirect()->route('workers')->with('success','Worker deleted successfully');
    }
}
