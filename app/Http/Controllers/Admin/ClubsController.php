<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Club;
use Carbon\Carbon;
class ClubsController extends Controller
{
    public $objectName;
    public $folderView;
    public function __construct(Club $model)
    {
        $this->middleware('auth');
        $this->objectName = $model;
        $this->folderView = 'admin.clubs.';
    }
    // this function to  select all clubs
    public function index()
    {
        $clubs = $this->objectName::orderBy('classification','asc')->get();
        return view($this->folderView.'clubs',\compact('clubs'));
    }
  // to prepar to add new club
    public function create()
    {
        return view($this->folderView.'create');
    }
// this to add new recourd of club in database
    public function store(Request $request)
    {
        $mytime = Carbon::now();
        $today =  Carbon::parse($mytime->toDateTimeString())->format('Y-m-d');
        $data = $this->validate(\request(),
            [
                'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,bmp',
                'classification' => 'required',
                'club_name' => 'required|unique:clubs,club_name',
                'date_created' => 'required|date|before:'.$today,
                'tournaments' => '',
                'desc' => '',
            ]);
        if ($request['image'] != null) 
        {
            // This is Image Information ...
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            // Move Image To Folder ..
            $fileNewName = 'img_' . time() . '.' . $ext;
            $file->move(public_path('uploads/clubs_images'), $fileNewName);
            $data['image'] = $fileNewName;
        }else{
            $data['image'] = 'default_club.png'; 
        }
        $club = $this->objectName::create($data);
        $club->save();
        session()->flash('success', trans('admin.addedsuccess'));
        return redirect(url('clubs/create'));
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $club_data = $this->objectName::where('id', $id)->first();
        return view($this->folderView.'edit', \compact('club_data'));
    }
    public function update(Request $request, $id)
    {
        $data = $this->validate(\request(),
            [
                'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,bmp',
                'classification' => 'required',
                'club_name' => 'required|unique:clubs,club_name,'.$id,
                'date_created' => 'required|date',
                'tournaments' => '',
                'desc' => '',
            ]);
        if ($request['image'] != null) 
        {
            // This is Image Information ...
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            // Move Image To Folder ..
            $fileNewName = 'img_' . time() . '.' . $ext;
            $file->move(public_path('uploads/clubs_images'), $fileNewName);
            $data['image'] = $fileNewName;
        }
        $club = $this->objectName::where('id',$id)->update($data);
        session()->flash('success',  trans('admin.updatSuccess'));
        return redirect(url('clubs'));
    }
    public function destroy($id)
    {
        $club = $this->objectName::where('id', $id)->first();
        $club->delete();
        session()->flash('success',trans('admin.deleteSuccess'));
        return redirect(url('clubs'));
    }
}
