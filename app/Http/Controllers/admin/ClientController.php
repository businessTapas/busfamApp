<?php
// app/Http/Controllers/API/ClientController.php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Exception;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public $page = 'All Clients';
    public function index(Request $request)
    {
        $data = Client::orderBy('id', 'desc')->get();
       // return $data;
        if ($request->ajax()) {
            return DataTables::of($data)
                 ->addColumn('action', function ($row) {
                     $actionBtn = view('admin.client.button', ['item' => $row, 'route'=>'client', 'page' => $this->page]);
                     return $actionBtn;
                 })
                 ->rawColumns(['action'])
                ->make(true);
        }
        return view ('admin.client.index');
        
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
                  if (!File::exists("assets/client_images")) {
                    File::makeDirectory("assets/client_images");
                  }
                  $request->image->move(public_path('assets/client_images'), $imageName);
                  $fullPath = 'assets/client_images/' . $imageName;
                }
                $request->merge([
                    'client_image' =>  $fullPath,
                ]);
                Client::create($request->toarray());
                return response()->json([
                    'success' => 'Service Detail Saved Successfully'
                ], 201);
            } catch (Exception $e) {
                return response()->json(['errors' => $e->getMessage()],false);
            }
        }
    }

    public function show($clientId)
    {
        $clientdata = Client::where('id', $clientId)->first();
        return view('admin.client.show', compact('clientdata'));
    }

    public function edit($clientId)
    {
  
      $clientdata = Client::where('id', $clientId)->first();
      return view('admin.client.edit', compact('clientdata'));
    }

    public function update(Request $request, $clientId)
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
                  if (!File::exists("assets/client_images")) {
                    File::makeDirectory("assets/client_images");
                  }
                  $request->image->move(public_path('assets/client_images'), $imageName);
                  $fullPath = 'assets/client_images/' . $imageName;
                }
               
                // Find the user to edit
                $clientdata = Client::where('id', $clientId)->first();

                if ($clientdata) {
                    if($fullPath == null || $fullPath == '') {
                        $fullPath = $clientdata->client_image;
                    } else {
                        $path = public_path($clientdata->client_image);

                        if (File::exists($path)) {
                            File::delete($path);
                        }
                    }
                    $request->merge([
                        'client_image' =>  $fullPath,
                    ]);
                    $clientdata->update($request->toarray());                
                return response()->json(['data' => $request->all(), 'success' => "Service Detail Updated successfully."]);
                exit;
            }

            } catch (Exception $e) {
                return response()->json(['errors' => $e->getMessage()],500);
            }
        }
    }

    public function destroy($clientId)
    {
        
        $clientdata = Client::where('id', $clientId)->first();

        if ($clientdata->client_image != null || $clientdata->client_image != '') {
            $path = public_path($clientdata->client_image);

            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $clientdata->delete();
        return response()->json(['success' => 'Record deleted successfully']);
    }
}
