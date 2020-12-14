<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Coach;
class CoachesController extends Controller
{
    public $objectName;
    public $folderView;
    public function __construct(Coach $model)
    {
        $this->middleware('auth');
        $this->objectName = $model;
        $this->folderView = 'admin.coaches.';
    }
    // this function to  select all Coaches
    public function index()
    {
        $coaches = $this->objectName::all();
        return view($this->folderView.'coaches',\compact('coaches'));
    }
  // to prepar to add new club
    public function create()
    {
        return view($this->folderView.'create');
    }
// this to add new recourd of club in database
    public function store(Request $request)
    {
        $club_id= $request->club_id;
        $data = $this->validate(\request(),
            [
                'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,bmp',
                'coach_name' => 'required|unique:coaches,coach_name',
                'coach_name_en' => 'required|unique:coaches,coach_name_en',
                'club_id' => 'required|unique:coaches,club_id',
                'age' => 'required',                
                'desc' => '',
                'center_name' => '',
            ]);
        if ($request['image'] != null) {
            // This is Image Information ...
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            // Move Image To Folder ..
            $fileNewName = 'img_' . time() . '.' . $ext;
            $file->move(public_path('uploads/coaches_images'), $fileNewName);
            $data['image'] = $fileNewName;
        }else{
            $data['image'] = 'default_coach.png';
        }
        $club = $this->objectName::create($data);
        $club->save();
        session()->flash('success',trans('admin.addedsuccess'));
        return redirect(url('coaches/create'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coach_data = $this->objectName::where('id', $id)->first();
        return view($this->folderView.'edit', \compact('coach_data'));
    }
    public function update(Request $request, $id)
    {
        $data = $this->validate(\request(),
            [
                'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,bmp',
                'coach_name' => 'required|unique:coaches,coach_name,'.$id,
                'coach_name_en' => 'required|unique:coaches,coach_name_en,'.$id,
                'age' => 'required',
                'club_id' => 'required',
                'desc' => '',
                'center_name' => '', 
            ]);
        if ($request['image'] != null) {
            // This is Image Information ...
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            // Move Image To Folder ..
            $fileNewName = 'img_' . time() . '.' . $ext;
            $file->move(public_path('uploads/coaches_images'), $fileNewName);
            $data['image'] = $fileNewName;
        }
        $club = $this->objectName::where('id',$id)->update($data);
        session()->flash('success',  trans('admin.updatSuccess'));
        return redirect(url('coaches'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coach = $this->objectName::where('id', $id)->first();
        $coach->delete();
        session()->flash('success', trans('admin.deleteSuccess'));
        return redirect(url('coaches'));
    }
}
