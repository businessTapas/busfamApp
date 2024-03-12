<?php
// app/Http/Controllers/API/ServiceController.php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Exception;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public $page = 'Service';
    public function index(Request $request)
    {
        $data = Service::orderBy('id', 'desc')->get();
       // return $data;
        if ($request->ajax()) {
            return DataTables::of($data)
                 ->addColumn('action', function ($row) {
                     $actionBtn = view('admin.service.button', ['item' => $row, 'route'=>'service', 'page' => $this->page]);
                     return $actionBtn;
                 })
                 ->rawColumns(['action'])
                ->make(true);
        }
        return view ('admin.service.index');
        
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json(['errors' => $validate->errors()], 422);
        } else {
            try {
               
                Service::create($request->toarray());
                return response()->json([
                    'success' => 'Service Saved Successfully'
                ], 201);
            } catch (Exception $e) {
                return response()->json(['errors' => $e->getMessage()],false);
            }
        }
    }

    public function show($serviceid)
    {
        $servicedata = Service::where('id', $serviceid)->first();
        return view('admin.service.show', compact('servicedata'));
    }

    public function edit($serviceid)
    {
  
      $servicedata = Service::where('id', $serviceid)->first();
      return view('admin.service.edit', compact('servicedata'));
    }

    public function update(Request $request, $serviceid)
    {
       
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json(['errors' => $validate->errors()], 422);
        } else {
            try {

               
                $servicedata = Service::where('id', $serviceid)->first();

                
                    $servicedata->update($request->toarray());                
                return response()->json(['data' => $request->all(), 'success' => "Service Updated successfully."]);
                exit;

            } catch (Exception $e) {
                return response()->json(['errors' => $e->getMessage()],500);
            }
        }
    }

    public function destroy($serviceid)
    {
        
        $servicedata = Service::where('id', $serviceid)->first();

        
        $Servicedata->delete();
        return response()->json(['success' => 'Record delete successfully']);
    }
}
