<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Club;
use App\User_club;
use Illuminate\Database\QueryException;
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
        $users = $this->objectName::where('type','user')->paginate(10);
        // dd($categories);
        return view($this->folderView.'users',compact('users'));
    }
    public function destroy($id)
    {
        $user = $this->objectName::where('id', $id)->first();
        $user->delete();
        session()->flash('success',trans('admin.deleteSuccess'));
        return back();
    }
    // monitor page functions
     public function all_editors()
    {
        $users = $this->objectName::where('type','editor')
        ->Orwhere('type','monitor')
        ->orderBy('type', 'ASC')
        ->get();
        return view($this->folderView.'editors',compact('users'));
    }
    public function create_editor()
    {
        return view($this->folderView.'create');
    }
    public function store_editor(Request $request)
    {
             $data = $this->validate(\request(),
            [
                    'name' => 'required|unique:users',
                    'type' => 'required',
                    'email' => 'required|unique:users',
                    'password' => 'required|min:6|confirmed',
                    'password_confirmation' => 'required|min:6', 
                ]);

            if($request['password'] != null  && $request['password_confirmation'] != null ){
                $data['password'] = bcrypt(request('password'));
                $user = User::create($data);
                $user->save();
                session()->flash('success', trans('admin.addedsuccess'));
                return redirect(url('editors/create'));
            }
    }
    public function monitor_Clubs($user_id)
    {
        $clubs = User_club::where('user_id',$user_id)->get();
        return view('admin.users.monitors.monitor_clubs',compact('clubs','user_id'));
    }
    public function create_monitor_clubs($id)
    {
        $user_id =$id;
        $selected_user = User::where('id',$user_id)->first();
        $user_clubs = User_club::where('type',$selected_user->type)->get();
        if(count($user_clubs)!=0){
             $clubArray;
             $i=0;
            foreach ($user_clubs as $monitor_clubs) {
               $clubArray[$i]= $monitor_clubs->club_id;
               $i++;
            }
            $first_clubs = Club::where('classification','1st')
            ->whereNotIn('id',$clubArray)->get();
            $second_clubs = Club::where('classification','2nd')
            ->whereNotIn('id',$clubArray)->get();
        }else{
            $first_clubs = Club::where('classification','1st')->get();
            $second_clubs = Club::where('classification','2nd')->get();
        }
        return view('admin.users.monitors.create_monitor_clubs',compact('user_id','first_clubs','second_clubs'));
    }
    public function store_monitor_clubs(Request $request)
    {  
           $request->validate([
             'user_id' => 'required',
             'selectedClubs' => 'required'
               ]);
            $input = $request->all();
            $user_id = $input['user_id'];
            $selected_user = User::where('id',$user_id)->first();
          // for saving selected monitor`s clubs ....
            // dd($input['selectedClubs']);
           foreach ($input['selectedClubs'] as $club_id) 
           {
              $monitor_club_data['user_id']=$user_id ;
              $monitor_club_data['club_id']=$club_id ;
              $monitor_club_data['type']=$selected_user->type;
              try{
                   $User_clubs = User_club::create($monitor_club_data);
                   $User_clubs->save();
                 }catch(QueryException $ex){
                    return $this->sendResponse(403,'لقد تم اختيار النادى من قبل');                 
                 }
            }
            session()->flash('success', trans('admin.addedsuccess'));
            return redirect(url('monitor_Clubs/'.$user_id));
    }
    public function destroy_monitor_club($club_id)
    {
        $user_club = User_club::where('club_id', $club_id)->first();
        $user_club->delete();
        session()->flash('success',trans('admin.deleteSuccess'));
        return back();
    }
}
