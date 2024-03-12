<?php
// app/Http/Controllers/API/BannerController.php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Exception;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    public $page = 'Banner';
    public function index(Request $request)
    {
        $data = Banner::orderBy('id', 'desc')->get();
       // return $data;
        if ($request->ajax()) {
            return DataTables::of($data)
                 ->addColumn('action', function ($row) {
                     $actionBtn = view('admin.banner.button', ['item' => $row, 'route'=>'banner', 'page' => $this->page]);
                     return $actionBtn;
                 })
                 ->rawColumns(['action'])
                ->make(true);
        }
        return view ('admin.banner.index');
        
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validate->fails()) {
            return response()->json(['errors' => $validate->errors()], 422);
        } else {
            try {
                $fullPath = null;
                if ($request->hasFile('image')) {
                  $imageName = time() . '.' . $request->file('image')->extension();
                  if (!File::exists("assets/banner_images")) {
                    File::makeDirectory("assets/banner_images");
                  }
                  $request->image->move(public_path('assets/banner_images'), $imageName);
                  $fullPath = 'assets/banner_images/' . $imageName;
                }
                $request->merge([
                    'banner_image' =>  $fullPath,
                ]);
                Banner::create($request->toarray());
                return response()->json([
                    'success' => 'Banner Saved Successfully'
                ], 201);
            } catch (Exception $e) {
                return response()->json(['errors' => $e->getMessage()],false);
            }
        }
    }

    public function show($bannerid)
    {
        $bannerdata = Banner::where('id', $bannerid)->first();
        return view('admin.banner.show', compact('bannerdata'));
    }

    public function edit($bannerid)
    {
  
      $bannerdata = Banner::where('id', $bannerid)->first();
      return view('admin.banner.edit', compact('bannerdata'));
    }

    public function update(Request $request, $bannerid)
    {
       
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validate->fails()) {
            return response()->json(['errors' => $validate->errors()], 422);
        } else {
            try {

                $fullPath = null;
                if ($request->hasFile('image')) {
                  $imageName = time() . '.' . $request->file('image')->extension();
                  if (!File::exists("assets/banner_images")) {
                    File::makeDirectory("assets/banner_images");
                  }
                  $request->image->move(public_path('assets/banner_images'), $imageName);
                  $fullPath = 'assets/banner_images/' . $imageName;
                }
               
                // Find the user to edit
                $bannerdata = Banner::where('id', $bannerid)->first();

                if ($bannerdata) {
                    if($fullPath == null || $fullPath == '') {
                        $fullPath = $bannerdata->banner_image;
                    } else {
                        $path = public_path($bannerdata->banner_image);

                        if (File::exists($path)) {
                            File::delete($path);
                        }
                    }
                    $request->merge([
                        'banner_image' =>  $fullPath,
                    ]);
                    $bannerdata->update($request->toarray());                
                return response()->json(['data' => $request->all(), 'success' => "Banner Updated successfully."]);
                exit;
            }

            } catch (Exception $e) {
                return response()->json(['errors' => $e->getMessage()],500);
            }
        }
    }

    public function destroy($bannerid)
    {
        
        $bannerdata = Banner::where('id', $bannerid)->first();

        if ($bannerdata->banner_image != null || $bannerdata->banner_image != '') {
            $path = public_path($bannerdata->banner_image);

            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $bannerdata->delete();
        return response()->json(['success' => 'Record delete successfully']);
    }
}
