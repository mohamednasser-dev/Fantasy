<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;
use App\Player;
use App\Coach;
use App\Tournament;
use App\Club;
use App\Match;
use App\News_target;



class NewsController extends Controller
{
    public $objectName;
    public $folderView;




    public function __construct(news $model)
    {
        $this->middleware('auth');
        $this->objectName = $model;
        $this->folderView = 'admin.news.';


    }
    // this function to  select all news
    public function index()
    {
        $news = $this->objectName::paginate(10);
        return view($this->folderView.'news',compact('news'));
    }

  // to prepar to add new news
    public function create()
    {
        // To view Target  Data ...
        
        $players = Player::all();
        $coaches = Coach::all();
        $tours = Tournament::all();
        $clubs = Club::all();
        $matches = Match::where('status','not started')->get();
        
        return view($this->folderView.'create',compact('players','coaches','tours','clubs','matches'));
    }

// this to add new recourd of news in database
    public function store(Request $request)
    {

        $data = $this->validate(\request(),
            [
                'image' => 'required|image|mimes:jpg,jpeg,png,gif,bmp',
                'title' => 'required|unique:news,title',
                'news_category_id' => 'required',
                'key_words' => 'required',
                'description' => 'required',

                'selected_players' => '',
                'selected_coaches' => '',
                'selected_clubs' => '',
                'selected_tours' => '',
                'selected_matches' => '',
            
            ]);
// $players = $request['selected_players'];

        if ($request['image'] != null) {
            // This is Image Information ...
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();

            // Move Image To Folder ..
            $fileNewName = 'img_' . time() . '.' . $ext;
            $file->move(public_path('uploads/news'), $fileNewName);

            $data['image'] = $fileNewName;

        }

//to save new news in DB ...
        $news = $this->objectName::create($data);
        $news->save();

        // To save news targets to DB by model & target_id  ...
if($request['selected_players']>0){
        foreach ($request['selected_players'] as $player_id) {
            $data_target['target_id'] =$player_id;
            $data_target['news_id'] =$news->id;
            $data_target['model'] ='App\Player::';
  
            News_target::create($data_target);
        }}
        if($request['selected_coaches']>0){
        foreach ($request['selected_coaches'] as $coach_id) {
            $data_target['target_id'] =$coach_id;
            $data_target['news_id'] =$news->id;
            $data_target['model'] ='App\Coach::';
  
            News_target::create($data_target);
        }}
        if($request['selected_clubs']>0){
        foreach ($request['selected_clubs'] as $club_id) {
            $data_target['target_id'] =$club_id;
            $data_target['news_id'] =$news->id;
            $data_target['model'] ='App\Club::';
  
            News_target::create($data_target);
        }}
        if($request['selected_tours']>0){
        foreach ($request['selected_tours'] as $tour_id) {
            $data_target['target_id'] =$tour_id;
            $data_target['news_id'] =$news->id;
            $data_target['model'] ='App\Tournament::';
  
            News_target::create($data_target);
        }}
        if($request['selected_matches']>0){
        foreach ($request['selected_matches'] as $match_id) {
            $data_target['target_id'] =$match_id;
            $data_target['news_id'] =$news->id;
            $data_target['model'] ='App\Match::';
  
            News_target::create($data_target);
        }}

        session()->flash('success',trans('admin.addedsuccess'));
        return redirect(url('news/create'));


    }


    public function edit($id)
    {
        $news_data = $this->objectName::where('id', $id)->first();
        $news_target = News_target::where('news_id', $id)->get();

        // To view Target  Data ...
        $players = Player::all();
        $coaches = Coach::all();
        $tours = Tournament::all();
        $clubs = Club::all();
        $matches = Match::where('status','not started')->get();
        
        return view($this->folderView.'edit',compact('news_data','players','coaches','tours','clubs','matches','news_target'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate(\request(),
            [
                'image' => 'sometimes|image|mimes:jpg,jpeg,png,gif,bmp',
                'title' => 'required|unique:news,title,'.$id,
                'news_category_id' => 'required',
                'key_words' => 'required',
                'description' => 'required',

            ]);
        if ($request['image'] != null) {
            // This is Image Information ...
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();

            // Move Image To Folder ..
            $fileNewName = 'img_' . time() . '.' . $ext;
            $file->move(public_path('uploads/news'), $fileNewName);

            $data['image'] = $fileNewName;

        }

        $news = $this->objectName::where('id',$id)->update($data);

// To save news targets to DB by model & target_id  ...


        if($request['selected_players']>0){
        foreach ($request['selected_players'] as $player_id) {
            $data_target['target_id'] =$player_id;
            $data_target['news_id'] =$id;
            $data_target['model'] ='App\Player::';

            News_target::create($data_target);
        }}
        if($request['selected_coaches']>0){
        foreach ($request['selected_coaches'] as $coach_id) {
            $data_target['target_id'] =$coach_id;
            $data_target['news_id'] =$id;
            $data_target['model'] ='App\Coach::';

            News_target::create($data_target);
        }}
        if($request['selected_clubs']>0){
        foreach ($request['selected_clubs'] as $club_id) {
            $data_target['target_id'] =$club_id;
            $data_target['news_id'] =$id;
            $data_target['model'] ='App\Club::';

            News_target::create($data_target);
        }}
        if($request['selected_tours']>0){
        foreach ($request['selected_tours'] as $tour_id) {
            $data_target['target_id'] =$tour_id;
            $data_target['news_id'] =$id;
            $data_target['model'] ='App\Tournament::';

            News_target::create($data_target);
        }}
        if($request['selected_matches']>0){
        foreach ($request['selected_matches'] as $match_id) {
            $data_target['target_id'] =$match_id;
            $data_target['news_id'] =$id;
            $data_target['model'] ='App\Match::';

            News_target::create($data_target);
        }}


        session()->flash('success',  trans('admin.updatSuccess'));
        return redirect(url('news'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = $this->objectName::where('id', $id)->first();
        $news->delete();
        session()->flash('success', trans('admin.deleteSuccess'));
        return redirect(url('news'));

    }
    public function destroyTarget($id)
    {
        $News_target = News_target::where('id', $id)->first();
        $News_target->delete();
        session()->flash('success', trans('admin.deleteSuccess'));
        return back();

    }
    
}
