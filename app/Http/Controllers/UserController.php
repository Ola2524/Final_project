<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role','!=','worker')->get();
        return view('admin.users.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            ["name"=>"required|min:5|max:50",
            "city"=>" required|string",
            "country"=>" required|string",
            "street"=>"required|string",
            "email"=>"required|unique:users",
        ]);
        $input = $request->all();


        $input = $request->all();
        //dd($input);
        User::create($input);
        return redirect('user')->with('flash_message', 'User Addedd!');


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
 
       

        $user = User::find($id);
        return view('admin.users.edit',['users'=>$user]);
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
        $request->validate(
            ["name"=>"required|min:5|max:50",
            "city"=>" required|string",
            "country"=>" required|string",
            "street"=>"required|string",
            "email"=>"required|unique:users",
        ]);
        $input = $request->all();
        $user = User::find($id);
        $input = $request->all();
        $user->update($input);
        
        return redirect('user')->with('flash_message', 'user Updated!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('user')->with('flash_message', 'User deleted!');  
    }

    public function search(Request $request){
        {
            $output="";
             
             $users = User::where('name','like', '%' .$request->search. '%')->where('role','user')->orwhere('role','admin')->get();
             
             foreach($users as $users)
             {
                $output.=
                '<tr>
                <td> '.$users->id.' </td>
                <td> '.$users->name.' </td>
                <td> <img src="img/'.$users->img .'" width="75"> </td>
                <td> '.$users->city.' </td>
                <td> '.$users->country.' </td>
                <td> '.$users->street.' </td>
                <td> '.$users->email.' </td>
                <td> '.$users->role.' </td>
                <td> '.$users->points.' </td>
                <td>
                 '.'
                <a href="'.url("/user/" . $users->id . "/edit") .'" class="btn btn-outline-success">'.'Edit</a>

                <form method="POST" action="'.url("/user" . "/" . $users->id).'" accept-charset="UTF-8" style="display:inline">
                      '.method_field('DELETE') 
                      .csrf_field().'
                      <button type="submit" class="btn btn-outline-danger" title="Delete Student" onclick="return confirm("Confirm delete?")"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                  </form>
                '.' </td>
                
                </tr>';
             }
    
             return response($output);
            }
             
     }
     public function removeUser($id){
        $users= User::findOrFail($id);
       
        $users->update([
          'points' => 0,
        ]);
     //    dd($users);
        return redirect('/user');
     }
    }
