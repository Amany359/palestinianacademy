<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Traits\UploadImageTrait;
class SectionController extends Controller


{
    use UploadImageTrait; // Use the UploadImageTrait  
    // عرض جميع الأقسام
    public function index()
    {
        $sections = Section::all();
        return view('admin.sections.index', compact('sections'));
    }

    // عرض نموذج إنشاء قسم جديد
    public function create()
    {
        return view('admin.sections.create');
    }

    // حفظ قسم جديد
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'nullable|url',
        ]);

        // رفع الصورة باستخدام طريقة uploadImage
        $imagePath = $this->uploadImage($request->file('image'), 'sectionImages');

        // إنشاء قسم جديد
        Section::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'link' => $request->link,
        ]);

        return redirect()->route('admin.sections.index')->with('success', 'تم إنشاء القسم بنجاح');
    }

    // عرض نموذج تعديل قسم
    public function edit(Section $section)
    {
        return view('admin.sections.edit', compact('section'));
    }

    // تحديث بيانات القسم
    public function update(Request $request, Section $section)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'nullable|url',
        ]);

        // إذا تم رفع صورة جديدة
        if ($request->hasFile('image')) {
            // حذف الصورة القديمة باستخدام طريقة deleteImage
            if ($section->image) {
                $this->deleteImage($section->image, 'sectionImages');
            }

            // رفع الصورة الجديدة باستخدام طريقة uploadImage
            $imagePath = $this->uploadImage($request->file('image'), 'sectionImages');
        } else {
            $imagePath = $section->image;
        }

        // تحديث بيانات القسم
        $section->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'link' => $request->link,
        ]);

        return redirect()->route('admin.sections.index')->with('success', 'تم تحديث القسم بنجاح');
    }

    // حذف قسم
    public function destroy(Section $section)
    {
        // حذف الصورة باستخدام طريقة deleteImage
        if ($section->image) {
            $this->deleteImage($section->image, 'sectionImages');
        }

        // حذف القسم
        $section->delete();

        return redirect()->route('admin.sections.index')->with('success', 'تم حذف القسم بنجاح');
    }

    /**
     * Handle image upload
     *
     * @param \Illuminate\Http\UploadedFile $image
     * @param string $folder
     * @return string $filename
     */
    public function uploadImage($image, $folder = 'sectionImages')
    {
        // Generate unique filename
        $filename = time() . '.' . $image->getClientOriginalExtension();

        // Save the image to the specified folder in public
        $image->move(public_path($folder), $filename);

        return $filename;
    }

    /**
     * Delete an existing image
     *
     * @param string $filename
     * @param string $folder
     * @return bool
     */
    public function deleteImage($filename, $folder = 'sectionImages')
    {
        $path = public_path($folder . '/' . $filename);

        if (File::exists($path)) {
            return File::delete($path);
        }

        return false;
    }
}
