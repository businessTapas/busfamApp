<?php
// app/Http/Controllers/API/ServiceDetailController.php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Exception;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class ServiceDetailController extends Controller
{
    public $page = 'Service Detail';
    public function index(Request $request)
    {
        $data = ServiceDetail::orderBy('id', 'desc')->get();
       // return $data;
        if ($request->ajax()) {
            return DataTables::of($data)
                 ->addColumn('action', function ($row) {
                     $actionBtn = view('admin.service-details.button', ['item' => $row, 'route'=>'ServiceDetail', 'page' => $this->page]);
                     return $actionBtn;
                 })
                 ->rawColumns(['action'])
                ->make(true);
        }
        return view ('admin.service-details.index');
        
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validate->fails()) {
            return response()->json(['errors' => $validate->errors()], 422);
        } else {
            try {
                $fullPath = null;
                if ($request->hasFile('image')) {
                  $imageName = time() . '.' . $request->file('image')->extension();
                  if (!File::exists("assets/serviceDetail_images")) {
                    File::makeDirectory("assets/serviceDetail_images");
                  }
                  $request->image->move(public_path('assets/serviceDetail_images'), $imageName);
                  $fullPath = 'assets/serviceDetail_images/' . $imageName;
                }
                $request->merge([
                    'service_detail_image' =>  $fullPath,
                ]);
                ServiceDetail::create($request->toarray());
                return response()->json([
                    'success' => 'Service Detail Saved Successfully'
                ], 201);
            } catch (Exception $e) {
                return response()->json(['errors' => $e->getMessage()],false);
            }
        }
    }

    public function show($serviceDetailId)
    {
        $serviceDetaildata = ServiceDetail::where('id', $serviceDetailId)->first();
        return view('admin.service-details.show', compact('serviceDetaildata'));
    }

    public function edit($serviceDetailId)
    {
  
      $serviceDetaildata = ServiceDetail::where('id', $serviceDetailId)->first();
      return view('admin.service-details.edit', compact('serviceDetaildata'));
    }

    public function update(Request $request, $serviceDetailId)
    {
       
        $validate = Validator::make($request->all(), [
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validate->fails()) {
            return response()->json(['errors' => $validate->errors()], 422);
        } else {
            try {

                $fullPath = null;
                if ($request->hasFile('image')) {
                  $imageName = time() . '.' . $request->file('image')->extension();
                  if (!File::exists("assets/serviceDetail_images")) {
                    File::makeDirectory("assets/serviceDetail_images");
                  }
                  $request->image->move(public_path('assets/serviceDetail_images'), $imageName);
                  $fullPath = 'assets/serviceDetail_images/' . $imageName;
                }
               
                // Find the user to edit
                $serviceDetaildata = ServiceDetail::where('id', $serviceDetailId)->first();

                if ($serviceDetaildata) {
                    if($fullPath == null || $fullPath == '') {
                        $fullPath = $serviceDetaildata->service_detail_image;
                    } else {
                        $path = public_path($serviceDetaildata->service_detail_image);

                        if (File::exists($path)) {
                            File::delete($path);
                        }
                    }
                    $request->merge([
                        'service_detail_image' =>  $fullPath,
                    ]);
                    $serviceDetaildata->update($request->toarray());                
                return response()->json(['data' => $request->all(), 'success' => "Service Detail Updated successfully."]);
                exit;
            }

            } catch (Exception $e) {
                return response()->json(['errors' => $e->getMessage()],500);
            }
        }
    }

    public function destroy($serviceDetailId)
    {
        
        $serviceDetaildata = ServiceDetail::where('id', $serviceDetailId)->first();

        if ($serviceDetaildata->service_detail_image != null || $serviceDetaildata->service_detail_image != '') {
            $path = public_path($serviceDetaildata->service_detail_image);

            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $serviceDetaildata->delete();
        return response()->json(['success' => 'Record deleted successfully']);
    }
}
