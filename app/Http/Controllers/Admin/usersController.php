<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class usersController extends Controller
{
    public $objectName;
    public $folderView;


    public function __construct(User $model)
    {
        $this->middleware('auth');
        $this->objectName = $model;
        $this->folderView = 'admin.users.';

    }
    public function index()
    {
        $users = $this->objectName::paginate(10);
        // dd($categories);
        return view($this->folderView.'users',compact('users'));

    }

    public function destroy($id)
    {
        $user = $this->objectName::where('id', $id)->first();
        $user->delete();
        session()->flash('success',trans('admin.deleteSuccess'));
        return redirect(url('users'));

    }
}
