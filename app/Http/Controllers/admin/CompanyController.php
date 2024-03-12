<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use Exception;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $page = 'Company';
    public function index(Request $request)
    {
        $data = company::orderBy('id', 'desc')->get();
       // return $data;
        if ($request->ajax()) {
            return DataTables::of($data)
                 ->addColumn('action', function ($row) {
                     $actionBtn = view('admin.company.button', ['item' => $row, 'route'=>'company', 'page' => $this->page]);
                     return $actionBtn;
                 })
                 ->rawColumns(['action'])
                ->make(true);
        }
        return view ('admin.company.index');
        
    }

    /**
     * Show the form for creating a new resource.
     */

     public function store(Request $request)
     {
         $validate = Validator::make($request->all(), [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'company_name' => 'required',
                      
         ]);
 
         if ($validate->fails()) {
             return response()->json(['errors' => $validate->errors()], 422);
         } else {
             try {
                $fullPath = null;
                if ($request->hasFile('image')) {
                  $imageName = time() . '.' . $request->file('image')->extension();
                  if (!File::exists("assets/company_images")) {
                    File::makeDirectory("assets/company_images");
                  }
                  $request->image->move(public_path('assets/company_images'), $imageName);
                  $fullPath = 'assets/company_images/' . $imageName;
                }
                $request->merge([
                    'company_logo_image' =>  $fullPath,
                ]);
                //return $request;
                Company::create($request->toarray());
                 return response()->json([
                     'success' => 'company Saved Successfully'
                 ], 201);
             } catch (Exception $e) {
                 return response()->json(['errors' => $e->getMessage()],false);
             }
         }
     }

     public function show($companyid)
     {
   
       $companydata = Company::where('id', $companyid)->first();
       return view('admin.company.show', compact('companydata'));
     }

     public function edit($companyid)
     {
   
       $companydata = Company::where('id', $companyid)->first();
       return view('admin.company.edit', compact('companydata'));
     }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $companyid)
    {
        $validate = Validator::make($request->all(), [
            'company_name' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json(['errors' => $validate->errors()], 422);
        } else {
            try {

                $fullPath = null;
                if ($request->hasFile('image')) {
                  $imageName = time() . '.' . $request->file('image')->extension();
                  if (!File::exists("assets/company_images")) {
                    File::makeDirectory("assets/company_images");
                  }
                  $request->image->move(public_path('assets/company_images'), $imageName);
                  $fullPath = 'assets/company_images/' . $imageName;
                }
               
                // Find the user to edit
                $companydata = Company::where('id', $companyid)->first();

                if ($companydata) {
                    if($fullPath == null || $fullPath == '') {
                        $fullPath = $companydata->company_logo_image;
                    } else {
                        $path = public_path($companydata->company_logo_image);

                        if (File::exists($path)) {
                            File::delete($path);
                        }
                    }
                    $request->merge([
                        'company_logo_image' =>  $fullPath,
                    ]);
                    $companydata->update($request->toarray());                
                return response()->json(['data' => $request->all(), 'success' => "company Updated successfully."]);
                exit;
            }

            } catch (Exception $e) {
                return response()->json(['errors' => $e->getMessage()],500);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($companyid)
    {
        $companydata = Company::where('id', $companyid)->first();

        if ($companydata->company_logo_image != null || $companydata->company_logo_image != '') {
            $path = public_path($companydata->company_logo_image);

            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $companydata->delete();
        return response()->json(['success' => 'Record delete successfully']);


    }
}
