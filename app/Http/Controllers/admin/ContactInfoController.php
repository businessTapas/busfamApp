<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Models\ContactInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use Exception;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class ContactInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $page = 'Contact Info';
    public function index(Request $request)
    {
        $data = ContactInfo::orderBy('id', 'desc')->get();
       // return $data;
        if ($request->ajax()) {
            return DataTables::of($data)
                 ->addColumn('action', function ($row) {
                     $actionBtn = view('admin.contact-info.button', ['item' => $row, 'route'=>'contact', 'page' => $this->page]);
                     return $actionBtn;
                 })
                 ->rawColumns(['action'])
                ->make(true);
        }
        return view ('admin.contact-info.index');
        
    }

    /**
     * Show the form for creating a new resource.
     */

     public function store(Request $request)
     {
         $validate = Validator::make($request->all(), [
            'type' => 'required',
            'info' => 'required',
                      
         ]);
 
         if ($validate->fails()) {
             return response()->json(['errors' => $validate->errors()], 422);
         } else {
             try {
                
                //return $request;
                ContactInfo::create($request->toarray());
                 return response()->json([
                     'success' => 'Contact Saved Successfully'
                 ], 201);
             } catch (Exception $e) {
                 return response()->json(['errors' => $e->getMessage()],false);
             }
         }
     }

     public function show($contactid)
     {
   
       $contactdata = ContactInfo::where('id', $contactid)->first();
       return view('admin.contact-info.show', compact('contactdata'));
     }

     public function edit($contactid)
     {
   
       $contactdata = ContactInfo::where('id', $contactid)->first();
       return view('admin.contact-info.edit', compact('contactdata'));
     }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $contactid)
    {
        $validate = Validator::make($request->all(), [
            'type' => 'required',
            'info' => 'required',
            'status' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json(['errors' => $validate->errors()], 422);
        } else {
            try {

                $contactdata = ContactInfo::where('id', $contactid)->first();

                    $contactdata->update($request->toarray());                
                return response()->json(['data' => $request->all(), 'success' => "contact Updated successfully."]);
                exit;

            } catch (Exception $e) {
                return response()->json(['errors' => $e->getMessage()],500);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($contactid)
    {
        $contactdata = ContactInfo::where('id', $contactid)->first();

        if ($contactdata->contact_logo_image != null || $contactdata->contact_logo_image != '') {
            $path = public_path($contactdata->contact_logo_image);

            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $contactdata->delete();
        return response()->json(['success' => 'Record delete successfully']);


    }
}
