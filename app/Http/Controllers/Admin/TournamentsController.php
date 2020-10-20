<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tournament;


class TournamentsController extends Controller
{
    public $objectName;
    public $folderView;




    public function __construct(Tournament $model)
    {
        $this->middleware('auth');
        $this->objectName = $model;
        $this->folderView = 'admin.tournaments.';


    }
    // this function to  select all tournaments
    public function index()
    {
        $tournaments = $this->objectName::all();
        return view($this->folderView.'tournaments',\compact('tournaments'));
    }

  // to prepar to add new tournament
    public function create()
    {
        return view($this->folderView.'create');
    }

// this to add new recourd of tournament in database
    public function store(Request $request)
    {
        $data = $this->validate(\request(),
            [
                'tour_name' => 'required|unique:tournaments,tour_name',
                'classification' => 'required',

            ]);

        $tournament = $this->objectName::create($data);
        $tournament->save();
        session()->flash('success',  trans('admin.addedsuccess'));
        return redirect(url('tournaments'));


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
        $tournament_data = $this->objectName::where('id', $id)->first();
        return view($this->folderView.'edit', \compact('tournament_data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate(\request(),
            [
                'tour_name' => 'required|unique:tournaments,tour_name,'.$id,
                'classification' => 'required',

            ]);



        $tournament = $this->objectName::where('id',$id)->update($data);

        session()->flash('success', trans('admin.updatSuccess'));
        return redirect(url('tournaments'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tournament = $this->objectName::where('id', $id)->first();
        $tournament->delete();
        session()->flash('success',trans('admin.deleteSuccess'));
        return redirect(url('tournaments'));

    }
}
