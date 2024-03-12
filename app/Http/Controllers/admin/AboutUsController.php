<?php
// app/Http/Controllers/API/AboutUsController.php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Exception;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class AboutUsController extends Controller
{
    public $page = 'AboutUs';
    public function index(Request $request)
    {
        $data = AboutUs::orderBy('id', 'desc')->get();
       // return $data;
        if ($request->ajax()) {
            return DataTables::of($data)
                 ->addColumn('action', function ($row) {
                     $actionBtn = view('admin.AboutUs.button', ['item' => $row, 'route'=>'aboutus', 'page' => $this->page]);
                     return $actionBtn;
                 })
                 ->rawColumns(['action'])
                ->make(true);
        }
        return view ('admin.AboutUs.index');
        
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
                  if (!File::exists("assets/aboutus_images")) {
                    File::makeDirectory("assets/aboutus_images");
                  }
                  $request->image->move(public_path('assets/aboutus_images'), $imageName);
                  $fullPath = 'assets/aboutus_images/' . $imageName;
                }
                $request->merge([
                    'aboutus_image' =>  $fullPath,
                ]);
                AboutUs::create($request->toarray());
                return response()->json([
                    'success' => 'About Us Saved Successfully'
                ], 201);
            } catch (Exception $e) {
                return response()->json(['errors' => $e->getMessage()],false);
            }
        }
    }

    public function show($aboutusid)
    {
        $aboutusdata = AboutUs::where('id', $aboutusid)->first();
        return view('admin.AboutUs.show', compact('aboutusdata'));
    }

    public function edit($aboutusid)
    {
  
      $aboutusdata = AboutUs::where('id', $aboutusid)->first();
      return view('admin.AboutUs.edit', compact('aboutusdata'));
    }

    public function update(Request $request, $aboutusid)
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
                  if (!File::exists("assets/aboutus_images")) {
                    File::makeDirectory("assets/aboutus_images");
                  }
                  $request->image->move(public_path('assets/aboutus_images'), $imageName);
                  $fullPath = 'assets/aboutus_images/' . $imageName;
                }
               
                // Find the user to edit
                $aboutusdata = AboutUs::where('id', $aboutusid)->first();

                if ($aboutusdata) {
                    if($fullPath == null || $fullPath == '') {
                        $fullPath = $aboutusdata->aboutus_image;
                    } else {
                        $path = public_path($aboutusdata->aboutus_image);

                        if (File::exists($path)) {
                            File::delete($path);
                        }
                    }
                    $request->merge([
                        'aboutus_image' =>  $fullPath,
                    ]);
                    $aboutusdata->update($request->toarray());                
                return response()->json(['data' => $request->all(), 'success' => "AboutUs Updated successfully."]);
                exit;
            }

            } catch (Exception $e) {
                return response()->json(['errors' => $e->getMessage()],500);
            }
        }
    }

    public function destroy($aboutusid)
    {
        
        $aboutusdata = AboutUs::where('id', $aboutusid)->first();

        if ($aboutusdata->aboutus_image != null || $aboutusdata->aboutus_image != '') {
            $path = public_path($aboutusdata->aboutus_image);

            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $aboutusdata->delete();
        return response()->json(['success' => 'Record delete successfully']);
    }
}
