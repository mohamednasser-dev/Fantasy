<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Club;

class ClubsController extends Controller
{
    public $objectName;
    public $folderView;
    public $flash;



    public function __construct(Club $model)
    {
        $this->middleware('auth');
        $this->objectName = $model;
        $this->folderView = 'admin.clubs.';
        $this->flash = 'Club Data Has Been ';

    }
    // this function to  select all clubs
    public function index()
    {
        $clubs = $this->objectName::all();
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
        $data = $this->validate(\request(),
            [
                'image' => 'required|nullable|image|mimes:jpg,jpeg,png,gif,bmp',
                'club_name' => 'required|unique:clubs,club_name',
                'date_created' => 'required|date',
                'tournaments' => '',
                'desc' => '',
    
            ]);

        if ($request['image'] != null) {
            // This is Image Information ...
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();

            // Move Image To Folder ..
            $fileNewName = 'img_' . time() . '.' . $ext;
            $file->move(public_path('uploads/clubs_images'), $fileNewName);

            $data['image'] = $fileNewName;

        }
        $club = $this->objectName::create($data);
        $club->save();
        session()->flash('success', 'New Club Added successfuly');
        return redirect(url('clubs'));


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
        $club_data = $this->objectName::where('id', $id)->first();
        return view($this->folderView.'edit', \compact('club_data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate(\request(),
            [
                'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,bmp',
                'club_name' => 'required|unique:clubs,club_name,'.$id,
                'date_created' => 'required|date',
                'tournaments' => '',
                'desc' => '',
            ]);

        if ($request['image'] != null) {
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

        session()->flash('success', 'Data Updated Successfully');
        return redirect(url('clubs'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $club = $this->objectName::where('id', $id)->first();
        $club->delete();
        session()->flash('success', 'Data Deleted Successfully');
        return redirect(url('clubs'));

    }
}
