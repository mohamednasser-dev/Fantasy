<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News_category;


class CategoryController extends Controller
{
    public $objectName;
    public $folderView;



    public function __construct(News_category $model)
    {
        $this->middleware('auth');
        $this->objectName = $model;
        $this->folderView = 'admin.categories.';


    }
    public function index()
    {
        $categories = $this->objectName::paginate(10);
        // dd($categories);
        return view($this->folderView.'categories',compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->folderView.'createCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate(\request(),
            [
                'name' => 'required|unique:news_categories',
            ]);

        $cat = $this->objectName::create($data);
        $cat->save();
        session()->flash('success', trans('admin.addedsuccess'));
        return redirect(url('categories/create'));


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
        $cat_data = $this->objectName::where('id', $id)->first();
        return view($this->folderView.'editCategory', compact('cat_data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate(\request(),
            [
                'name' => 'required|unique:news_categories,name,'.$id,
            ]);

        $cat = $this->objectName::where('id',$id)->update($data);

        session()->flash('success',  trans('admin.updatSuccess'));
        return redirect(url('categories'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = $this->objectName::where('id', $id)->first();
        $cat->delete();
        session()->flash('success',trans('admin.deleteSuccess'));
        return redirect(url('categories'));

    }
}
