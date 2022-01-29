<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Project;
use App\Models\DaftarDataKelas;
use App\Models\ProjectDikerjakan;
use App\Models\Taskboard;

class DashboardController extends Controller
{

    public function landingpage()
    {
        return view('index',[
            'kelas' => DaftarDataKelas::where('status_publish', 'yes')->get(),
        ]);
    }
    //user //speradmin
    public function index()
    {
        return view('dashboard.index');
    }

    //user
    public function datakelas()
    {
        return view('dashboard.data-kelas');
    }

    public function statuspendaftaran()
    {
        return view('dashboard.status-pendaftaran');
    }

    public function kelassaya()
    {
        return view('dashboard.kelas-saya');
    }

    


    //trainer //anggota
    public function hometrainer()
    {
        return view('dashboard.trainer.home');
    }





    //superadmin
    public function datapendaftaran()
    {
        return view('dashboard.superadmin.data-pendaftaran');
    }

    public function datauser()
    {
        return view('dashboard.superadmin.data-user');
    }

    public function datakelasuser()
    {
        return view('dashboard.superadmin.data-kelas-user');
    }





    public function project()
    {
        return view('dashboard.page-projects-list',[
            'project' => Project::latest()->get(),
            'users' => User::all()
        ]);
    }

    public function taskboardlist()
    {

        return view('dashboard.list-taskboard',[
        'project' => Project::all(),
        'pro' => ProjectDikerjakan::where('user_id',  auth()->user()->id)->get()
        ]);

    }

    public function taskboard(Project $project)
    {
        // ddd($project->uuid);
        return view('dashboard.app-taskboard',[
            'taskboard' => Taskboard::where([['uuid', $project->uuid],['status', 'planning']])->get(),
            'inprogress' => Taskboard::where([['uuid', $project->uuid],['status', 'inprogress']])->get(),
            'completed' => Taskboard::where([['uuid', $project->uuid],['status', 'completed']])->get(),
            'task_input' => $project
        ]);
    }

    // where('uuid', $project)->get()

    public function prosestask(Request $request)
    {
        $validatedData = $request->validate([
            'task_title' => 'required | max:255',
            'deskripsi' => 'required | max:300',
            'selesai' => 'required',
            'project_id' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['uuid'] = $request->uuid;
        $validatedData['status'] = 'planning';

        Taskboard::create($validatedData);

        return redirect('/app-taskboard/'.$request->uuid)->with('succes', 'New Task Berhasil Di Tambahkan!!');
    }

    public function toprogress(Request $request, Taskboard $taskboard)
    {

        $validatedData['status'] = 'inprogress';

        Taskboard::where('id', $taskboard->id)
            ->update($validatedData);

        return redirect('/app-taskboard/'.$taskboard->uuid)->with('succes', 'Task In Progress');
    }

    public function completed(Request $request, Taskboard $taskboard)
    {

        $validatedData['status'] = 'completed';

        Taskboard::where('id', $taskboard->id)
            ->update($validatedData);

        return redirect('/app-taskboard/'.$taskboard->uuid)->with('succes', 'Task Completed');
    }

    public function deletetask(Taskboard $taskboard)
    {
        Taskboard::where('id', '=', $taskboard->id)->delete();

        return redirect('/app-taskboard/'.$taskboard->uuid)->with('succes', 'Task Berhasil Di Hapus !');
    }
}
