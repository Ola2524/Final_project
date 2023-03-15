<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\WorkerService;

class WorkerServController extends Controller
{
    public function index(){
      $worker_services = WorkerService::paginate(7);
      
        return view('admin.worker-services.index',['worker_services'=>$worker_services]);
    }

    public function delete($id){
        WorkerService::findOrFail($id)->delete();
        return redirect('/AdminWorkerserv')->withSuccess(__('worker Servrice deleted successfully.'));
    }

    public function restore($id) 
    {
        WorkerService::where('id', $id)->withTrashed()->restore();

        return redirect()->route('admin.worker-services.index', ['status' => 'archived'])
            ->withSuccess(__('User restored successfully.'));

}
public function restoreAll() 
{
    WorkerService::onlyTrashed()->restore();

    return redirect('/AdminWorkerserv')->withSuccess(__('All users restored successfully.'));
}






}
