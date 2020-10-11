<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Match;
use Carbon\Carbon;

class MatchesController extends Controller
{
    public $objectName;
    public $folderView;
    public $flash;
    

    public function __construct(Match $model)
    {
        $this->middleware('auth');
        $this->objectName = $model;
        $this->folderView = 'admin.matches.';
        $this->flash = 'match Data Has Been ';
    }
    // this function to  select all Coaches
    public function index()
    {
        $matches = $this->objectName::all();
        return view($this->folderView.'matches',\compact('matches'));
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
                    'home_club_id' => 'required',
                    'away_club_id' => 'required|not_in:'.$request->home_club_id,
                    'time' => 'required',
                    'date' => 'required|after:'.$today,          
                    'stadium_id' => 'required',
                    'tour_id' => 'required',
                ]);
            
            $club = $this->objectName::create($data);
            $club->save();
            session()->flash('success', 'New match Added successfuly');
            return redirect(url('matches'));
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
        $match_data = $this->objectName::where('id', $id)->first();
        return view($this->folderView.'edit', \compact('match_data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate(\request(),
            [
                'home_club_id' => 'required',
                'away_club_id' => 'required|not_in:'.$request->home_club_id,
                'time' => 'required',
                'date' => 'required',  
                'home_score' => 'required',  
                'away_score' => 'required',                                
                'stadium_id' => 'required',
                'tour_id' => 'required',
                'status' => 'required',
            ]);

        $club = $this->objectName::where('id',$id)->update($data);

        session()->flash('success', 'Data Updated Successfully');
        return redirect(url('matches'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $match = $this->objectName::where('id', $id)->first();
        $match->delete();
        session()->flash('success', 'Data Deleted Successfully');
        return redirect(url('matches'));

    }
}
