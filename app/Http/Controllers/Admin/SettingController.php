<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\UploadImageTrait;
use App\Models\Setting; // Example model
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use UploadImageTrait;
    
    public function index()
    {
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('admin.settings.create');
    }




    //} Example store method
    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'messenger' => 'nullable|string|max:255',
            'telegram' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'address' => 'nullable|string',
        ]);
    
        $data = $request->all();

    // Handle logo upload
    if ($request->hasFile('logo')) {
        $data['logo'] = $this->uploadImage($request->file('logo'), 'settingImages');
    }

    // Handle favicon upload
    if ($request->hasFile('favicon')) {
        $data['favicon'] = $this->uploadImage($request->file('favicon'), 'settingImages');
    }

    Setting::create($data);

    return redirect()->route('admin.settings.index')
                     ->with('success', 'Setting created successfully.');
}
    
    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'messenger' => 'nullable|string|max:255',
            'telegram' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'address' => 'nullable|string',
        ]);
    
        $data = $request->all();

    // Handle logo upload
    if ($request->hasFile('logo')) {
        if ($setting->logo) {
            $this->deleteImage($setting->logo, 'settingImages');
        }
        $data['logo'] = $this->uploadImage($request->file('logo'), 'settingImages');
    }

    // Handle favicon upload
    if ($request->hasFile('favicon')) {
        if ($setting->favicon) {
            $this->deleteImage($setting->favicon, 'settingImages');
        }
        $data['favicon'] = $this->uploadImage($request->file('favicon'), 'settingImages');
    }

    $setting->update($data);

    return redirect()->route('admin.settings.index')
                     ->with('success', 'Setting updated successfully.');
}
}
