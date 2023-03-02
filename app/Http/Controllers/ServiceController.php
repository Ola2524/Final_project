<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
  public function index()
  {
    $services = Service::all();
    return view('admin.services.services', ['services' => $services]);
  }


  public function create()
  {
    return view('admin.services.create');
  }

  public function store(Request $request)
  {

$request->img->storeAs("public/img", $request->img->getClientOriginalName());
$name = $request->name;
    $description = $request->description;
    $service = Service::create([
      'name' => $name,
      'img' => $request->img->getClientOriginalName(),
      'description' => $description,
    ]);
    // dd($service);
    return redirect('/services');
  }



  public function edit($service)
  {
    $Service = Service::findOrFail($service);
    return view('admin.services.edit', ['services' => $Service]);
    // dd($service);
  }

  public function update($service, Request $request)
  {
$request->img->storeAs("public/img", $request->img->getClientOriginalName());

    $Service = Service::findOrFail($service);
    $Service->update([
      'name' => $request->name,
      'img'=>$request->img->getClientOriginalName(),

      'description' => $request->description,
    ]);
    return redirect('/services');
    // dd($service);
  }


  public function destroy($service)
  {
    // Service::where('id',$service)->delete();
    // post::findOrfail($postId)->delete();

    Service::findOrFail($service)->delete();
    return redirect('/services');
  }
}
