<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
// use App\Models\Contact;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(){
        $services = Service :: all();
        return view('user.contact',['services'=>$services]);
    }

    public function contact_us(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject'=>'required',
            'message' => 'required'
         ]);

         Contact::create($request->all());

         return redirect('contact')->with('message', 'Thanks for contacting us! We will be in touch with you shortly.');
    }

    public function get_messages(){

        $contacts=Contact::orderBy('id','desc')->paginate(10);

        return view("get_messages",['contacts'=>$contacts]);
    }

    public function delete_message($id){
        Contact::destroy($id);
        // echo "deleted";

        return redirect('get_messages')->with('message', 'Message Deleted Successfully');
    }

    public function adminContacts(){
        $contacts = Contact :: all();
        return view('admin.contacts.index',['contacts'=>$contacts]);
    }

    public function search(Request $request){
        {
            $output="";
             
             $users = Contact::where('name','like', '%' .$request->search. '%')->orWhere('email','like', '%' .$request->search. '%')->orWhere('subject','like', '%' .$request->search. '%')->orWhere('massage','like', '%' .$request->search. '%')->get();
    
             foreach($users as $users)
             {
                $output.=
                '<tr>
                <td> '.$users->id.' </td>
                <td> '.$users->name.' </td>
                <td> '.$users->email.' </td>
                <td> '.$users->subject.' </td>
                <td> '.$users->massage.' </td>
               
               
                
                </tr>';
             }
    
             return response($output);
            }
             
     }
}
