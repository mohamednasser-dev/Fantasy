<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tournament;
use App\Gwalat;



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
        // $gwalat_with_tour_id =$this->objectName::where('tour_id',$id)
        //                     ->where('status','started')
        //                     ->get();
        // if(count($gwalat_with_tour_id) ==0){
        //     return view($this->folderView.'create');
        // }else{
        //     session()->flash('danger', trans('admin.last_gwla_not_ended'));
        //     return back();
        // }
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
        return redirect(url('tournaments/create'));


    }
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
    public function destroy($id)
    {
        $tournament = $this->objectName::where('id', $id)->first();
        $tournament->delete();
        session()->flash('success',trans('admin.deleteSuccess'));
        return redirect(url('tournaments'));

    }
    public function change_tour_status($status,$tour_id,$type)
    {
        //to end tour should end last tour of classif first ....
        $tours_with_classif =$this->objectName::where('classification',$type)
                            ->where('status','started')
                            ->get();
        //to end tour should end all gwalat of this tour first ....
        $gwalat_with_tour_id =Gwalat::where('tour_id',$tour_id)
                            ->where('status','started')
                            ->get();
        //if this toyr_status is in start mode  or inproges to change status...
        if($status == 'started'){
            if(count($gwalat_with_tour_id) ==0){
                $data['status'] = 'ended';
            }else{
                session()->flash('danger', trans('admin.gwla_should_end_first'));
                return back();
            }
        }else if($status == 'inprogres'){
            if(count($tours_with_classif) ==0){
                $data['status'] = 'started';
            }else{
                session()->flash('danger', trans('admin.tour_should_end_first'));
                return back();
            }
        }
        $gwalat = $this->objectName::where('id',$tour_id)->update($data);
        session()->flash('success', trans('admin.tour_status_change_success'));
        return back();
    }
    // This functions of tournament gawalat CRUD
    public function gwalat($id)
    {
        $gwalat_data = Gwalat::where('tour_id', $id)->get();
        $tour_id=$id;
        return view('admin.tournaments.gwalat.gwalat', compact('gwalat_data','tour_id'));
    }
    public function create_gawla($id)
    {
        return view('admin.tournaments.gwalat.create', compact('id'));
    }
    public function store_gawla(Request $request)
    {
        $data = $this->validate(\request(),
            [
                'name' => 'required',
                'tour_id' => 'required',
            ]);
        $tournament = Gwalat::create($data);
        $tournament->save();
        session()->flash('success',  trans('admin.addedsuccess'));
        return back();
    }
    public function destroy_gawla($id)
    {
        $Gwala = Gwalat::where('id', $id)->first();
        $Gwala->delete();
        session()->flash('success',trans('admin.deleteSuccess'));
        return back();
    }
    public function change_gwla_status($status,$id,$tour_id)
    {
        $gwalat_with_tour_id =Gwalat::where('tour_id',$tour_id)
                            ->where('status','started')
                            ->get();
        if($status == 'started'){
            $data['status'] = 'ended';
        }else if($status == 'inprogres'){
            if(count($gwalat_with_tour_id) ==0){
                $data['status'] = 'started';
            }else{
                session()->flash('danger', trans('admin.gwla_should_end_first'));
                return back();
            }
        }
        $gwalat = Gwalat::where('id',$id)->update($data);
        session()->flash('success', trans('admin.gwla_status_change_success'));
        return back();
    }
   
}
