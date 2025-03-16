<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aboutus;

class AboutusController extends Controller
{
    function index()
    {
        $aboutus = Aboutus::get()->first();
        return view('admin.sitesetting.update',compact('aboutus'));
    }

    public function save(Request $request)
    {
        $siteSetting = Aboutus::findOrFail(1);
    
        $data = $request->except('_token');
        
        if ($request->hasFile('organization_logo')) {
            if ($siteSetting->organization_logo) {
                deleteImages($siteSetting->organization_logo);
            }
            $logoPath = uploadImage($request->file('organization_logo'), 'sitesetting');
            $data['organization_logo'] = $logoPath; 
        }

        if ($request->hasFile('organization_favicon')) {
            if ($siteSetting->organization_favicon) {
                deleteImages($siteSetting->organization_favicon);
            }
            $faviconPath = uploadImage($request->file('organization_favicon'), 'sitesetting');
            $data['organization_favicon'] = $faviconPath;
        }
    
        $siteSetting->update($data);
    
        return redirect()->route('admin.sitesetting')->with('success', 'Site setting was updated successfully');
    }
    
}
