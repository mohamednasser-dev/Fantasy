<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;
use App\Player;
use App\Coach;
use App\Tournament;
use App\Club;


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
        $players = Player::all();
        $coaches = Coach::all();
        $tours = Tournament::all();
        $clubs = Club::all();
        
        return view($this->folderView.'create',compact('players','coaches','tours','clubs'));
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
            
            ]);
$players = $request['selected_players'];
dd($players );
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


        $news = $this->objectName::create($data);
        $news->save();

        foreach ($input['selected_players'] as $player_id) {
            $data_target['player_id'] =$player_id;
            $data_target['news_id'] =$news-id;
  
            News_target::create($data_target);

        }



       

        
        session()->flash('success',trans('admin.addedsuccess'));
        return redirect(url('news'));


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
        $news_data = $this->objectName::where('id', $id)->first();
        return view($this->folderView.'edit', compact('news_data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate(\request(),
            [
                'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,bmp',
                'title' => 'required|unique:news,title,'.$id,
                'type' => 'required',
                'club_id' => '',
                'player_id' => '',
                'coach_id' => '',
                'tour_id' => '',
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
}
