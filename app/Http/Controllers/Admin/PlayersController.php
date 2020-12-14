<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Player;


class PlayersController extends Controller
{
    public $objectName;
    public $folderView;




    public function __construct(Player $model)
    {
        $this->middleware('auth');
        $this->objectName = $model;
        $this->folderView = 'admin.players.';
  

    }
    // this function to  select all Coaches
    public function index()
    {
        $players = $this->objectName::orderBy('id','desc')->paginate(25);
        return view($this->folderView.'players',\compact('players'));
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
                'player_name' => 'required',
                'player_name_en' => 'required',
                'club_id' => 'required',
                'center_name' => 'required',
                'age' => 'required',                
                'desc' => '',
    
            ]);

        if ($request['image'] != null) {
            // This is Image Information ...
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();

            // Move Image To Folder ..
            $fileNewName = 'img_' . time() . '.' . $ext;
            $file->move(public_path('uploads/players_images'), $fileNewName);

            $data['image'] = $fileNewName;

        }else{
            $data['image'] = 'default_player.png';
            
        }
      
        $club = $this->objectName::create($data);
        $club->save();
     
        session()->flash('success', trans('admin.addedsuccess'));
        return redirect(url('players/create'));


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
        $player_data = $this->objectName::where('id', $id)->first();
        return view($this->folderView.'edit', \compact('player_data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate(\request(),
            [
                'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,bmp',
                'player_name' => 'required',
                'player_name_en' => 'required',
                'club_id' => 'required',
                'center_name' => 'required',
                'age' => 'required',                
                'desc' => '',
    
            ]);

        if ($request['image'] != null) {
            // This is Image Information ...
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();

            // Move Image To Folder ..
            $fileNewName = 'img_' . time() . '.' . $ext;
            $file->move(public_path('uploads/players_images'), $fileNewName);

            $data['image'] = $fileNewName;

        }

        $club = $this->objectName::where('id',$id)->update($data);

        session()->flash('success', trans('admin.updatSuccess'));
        return redirect(url('players'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $player = $this->objectName::where('id', $id)->first();
        $player->delete();
        session()->flash('success',  trans('admin.deleteSuccess'));
        return redirect(url('players'));

    }
}
