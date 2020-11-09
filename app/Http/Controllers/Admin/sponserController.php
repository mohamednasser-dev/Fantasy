<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sponser_image;
class sponserController extends Controller
{
    public $objectName;
    public $folderView;
    public function __construct(Sponser_image $model)
    {
        $this->middleware('auth');
        $this->objectName = $model;
        $this->folderView = 'admin.sponsers.';
    }
    // this function to  select all clubs
    public function index()
    {
        $sponsers = $this->objectName::all();
        return view($this->folderView.'sponsers',\compact('sponsers'));
    }
	// to prepar to add new sponser
    public function create()
    {
        return view($this->folderView.'create');
    }
	// this to add new recourd of sponser in database
    public function store(Request $request)
    {
        $data = $this->validate(\request(),
            [
                'image' => 'required|image|mimes:jpg,jpeg,png,gif,bmp',
            ]);
        if ($request['image'] != null) 
        {
            // This is Image Information ...
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            // Move Image To Folder ..
            $fileNewName = 'img_' . time() . '.' . $ext;
            $file->move(public_path('uploads/sponser_images'), $fileNewName);
            $data['image'] = $fileNewName;
        }
        $sponser = $this->objectName::create($data);
        $sponser->save();
        session()->flash('success', trans('admin.addedsuccess'));
        return redirect(url('sponsers/create'));
    }
    public function destroy($id)
    {
        $sponser = $this->objectName::where('id', $id)->first();
        $sponser->delete();
        session()->flash('success',trans('admin.deleteSuccess'));
        return redirect(url('sponsers'));
    }
}
