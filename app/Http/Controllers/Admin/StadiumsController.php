<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Stadium;

class StadiumsController extends Controller
{
    public $objectName;
    public $folderView;
    public function __construct(Stadium $model)
    {
        $this->middleware('auth');
        $this->objectName = $model;
        $this->folderView = 'admin.stadiums.';

    }
    // this function to  select all stadiums
    public function index()
    {
        $stadiums = $this->objectName::all();
        return view($this->folderView.'stadiums',\compact('stadiums'));
    }
// to prepar to add new stadium
    public function create()
    {
        return view($this->folderView.'create');
    }

// this to add new recourd of stadium in database
    public function store(Request $request)
    {
        $data = $this->validate(\request(),
            [
                'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,bmp',
                'stadium_name' => 'required|unique:stadiums,stadium_name',
                'stadium_name_en' => 'required|unique:stadiums,stadium_name_en',
            ]);
        if ($request['image'] != null) {
            // This is Image Information ...
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            // Move Image To Folder ..
            $fileNewName = 'img_' . time() . '.' . $ext;
            $file->move(public_path('uploads/stadiums_images'), $fileNewName);
            $data['image'] = $fileNewName;
        }else{
            $data['image'] = 'default_stadium.png';
        }
        $stadium = $this->objectName::create($data);
        $stadium->save();
        session()->flash('success', trans('admin.addedsuccess'));
        return redirect(url('stadiums/create'));
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
        $stadium_data = $this->objectName::where('id', $id)->first();
        return view($this->folderView.'edit', \compact('stadium_data'));
    }
    public function update(Request $request, $id)
    {
        $data = $this->validate(\request(),
            [
                'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,bmp',
                'stadium_name' => 'required|unique:stadiums,stadium_name,'.$id,
                'stadium_name_en' => 'required|unique:stadiums,stadium_name_en,'.$id,
            ]);

        if ($request['image'] != null) {
            // This is Image Information ...
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();

            // Move Image To Folder ..
            $fileNewName = 'img_' . time() . '.' . $ext;
            $file->move(public_path('uploads/stadiums_images'), $fileNewName);

            $data['image'] = $fileNewName;
        }
        $stadium = $this->objectName::where('id',$id)->update($data);
        session()->flash('success',  trans('admin.updatSuccess'));
        return redirect(url('stadiums'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stadium = $this->objectName::where('id', $id)->first();
        $stadium->delete();
        session()->flash('success', trans('admin.deleteSuccess'));
        return redirect(url('stadiums'));

    }
}
