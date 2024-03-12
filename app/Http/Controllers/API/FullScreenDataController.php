<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Company;
use App\Models\Banner;
use App\Models\AboutUs;
use App\Models\ContactInfo;
use App\Models\Service;
use App\Models\ServiceDetail;
use App\Models\Client;
class FullScreenDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$rootUrl = config('app.url'); 
        $rootUrl = request()->root(); 
        $data = [
            'company' => Company::all()->map(function ($company) use ($rootUrl) {
                $company->company_logo_image = $rootUrl .'/'. $company->company_logo_image;
                return $company;
            }),
            'contact_info' => ContactInfo::where('status', 'active')->get(),
            'banner' => Banner::where('status', 'active')->get()->map(function ($banner) use ($rootUrl) {
                $banner->banner_image = $rootUrl .'/'. $banner->banner_image;
                return $banner;
            }),
            'aboutus' => AboutUs::all()->map(function ($aboutus) use ($rootUrl) {
                $aboutus->banner_image = $rootUrl .'/'. $aboutus->banner_image;
                return $aboutus;
            }),
            'service-info' => Service::where('status', 'active')->get(),
            'our-service' => ServiceDetail::where('status', 'active')->get()->map(function ($our_service) use ($rootUrl) {
                $our_service->service_detail_image = $rootUrl .'/'. $our_service->service_detail_image;
                return $our_service;
            }),
            'our-client' => Client::where('status', 'active')->get()->map(function ($our_client) use ($rootUrl) {
                $our_client->client_image = $rootUrl .'/'. $our_service->client_image;
                return $our_client;
            }),
        ];

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
