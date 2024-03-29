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
        $request->validate([
            'name' => 'required',
            'img' => 'required|image',
            'description' => 'required',
        ]);
        $input = $request->all();
   
        if ($img = $request->file('img')) {
            $destinationPath = 'img/';
            $profileImage = date('YmdHis') . "." . $img->getClientOriginalExtension();
            $img->move($destinationPath, $profileImage);
            $input['img'] = "$profileImage";
        }

        Service::create($input);
      
        return redirect('/services')->with('success','Service created successfully.');
    }

//   public function store(Request $request)
//   {

// $request->img->storeAs("public/img", $request->img->getClientOriginalName());
// $name = $request->name;
//     $description = $request->description;
//     $service = Service::create([
//       'name' => $name,
//       'img' => $request->img->getClientOriginalName(),
//       'description' => $description,
//     ]);
//     // dd($service);
//     return redirect('/services');
//   }



  public function edit($service)
  {
    $Service = Service::findOrFail($service);
    return view('admin.services.edit', ['services' => $Service]);
    // dd($service);
  }

  public function update($service, Request $request)
  {

    $Service = Service::findOrFail($service);
    $request->validate([
      'name' => 'required',
      'img' => 'required|image',
      'description' => 'required',
  ]);
  $input = $request->all();

  if ($img = $request->file('img')) {
      $destinationPath = 'img/';
      $profileImage = date('YmdHis') . "." . $img->getClientOriginalExtension();
      $img->move($destinationPath, $profileImage);
      $input['img'] = "$profileImage";
  }else{
      unset($input['img']);
  }
     
  $Service->update($input);

  return redirect('/services')
                  ->with('success','Service updated successfully');
// $request->img->storeAs("public/img", $request->img->getClientOriginalName());

//     $Service = Service::findOrFail($service);
//     $Service->update([
//       'name' => $request->name,
//       'img'=>$request->img->getClientOriginalName(),

//       'description' => $request->description,
//     ]);
//     return redirect('/services');
//     // dd($service);
  }


  public function destroy($service)
  {
    // Service::where('id',$service)->delete();
    // post::findOrfail($postId)->delete();

    Service::findOrFail($service)->delete();
    return redirect('/services');
  }
  public function search(Request $request){
    {
        $output="";
         
         $users = Service::where('name','like', '%' .$request->search. '%')->orWhere('description','like', '%' .$request->search. '%')->get();

         foreach($users as $users)
         {
            $output.=
            '<tr>
            <td> '.$users->id.' </td>
            <td> '.$users->name.' </td>
            <td> <img src="img/'.$users->img .'" width="75"> </td>

            <td> '.$users->description.' </td>
          
            <td>
             '.' 
            <a href="" class="btn btn-outline-success">'.'Edit</a>
            '.'
            <a href="" class="btn btn-outline-success">'.'Delete</a>
            '.' </td>
            
            </tr>';
         }

         return response($output);
        }
         
 }
}
