<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\Entities\Customer;
use Modules\Admin\Entities\Service;

class ServiceController extends Controller
{


    public function index($per_page = null)
    {

        if ($per_page === 'all') {
            $row_count =Service::latest()->count();
            $services = Service::latest()->paginate($row_count);
        } elseif ($per_page == 'default') {
            $services = Service::latest()->paginate(20);
            $per_page = null;
        } else {
            $services = Service::latest()->paginate($per_page);
        }
        return view('admin::service.index', compact('services', 'per_page'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::service.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validateForm($request);

        $image_name = $this->saveFile($request->image, 'UPLOAD_SERVICE_IMAGES');



        try {
            Service::create([
                'title_fa' => $request->title_fa,
                'title_en' => $request->title_en,
                'image' => $image_name,
                'short_description_fa' => $request->short_description_fa,
                'short_description_en' => $request->short_description_en,


            ]);
            alert()->success('خدمات شما اضافه شد.', 'با تشکر');
        } catch (\Throwable $e) {
            dd($e->getMessage());
//            alert()->error('متاسفانه عملیات با خطا مواجه شد.', 'خطا');
        }

        return redirect()->back();


    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin::service.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {

        $this->validateForm($request,true);

        if ($request->has('image')) {
            Storage::delete('public/images/services/' . $service->image);
            $image_name = $this->saveFile($request->image, 'UPLOAD_SERVICE_IMAGES');
        } else {
            $image_name = $service->image;
        }



        $service->update([
            'title_fa' => $request->title_fa,
            'title_en' => $request->title_en,
            'short_description_fa' => $request->short_description_fa,
            'short_description_en' => $request->short_description_en,
            'image' => $image_name,

        ]);


        alert()->success('خدمات شما با موفقیت ویرایش شد.', 'با تشکر');

        return redirect()->route('admin.services.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     */
    public function destroy($id)
    {
        try {
            $service = Service::find($id);
            Storage::delete('public/images/services/' . $service->image);
            $service->delete();
            return \response()->json([1, 'حذف با موفقیت انجام شد']);
        } catch (\Expectation $e) {
            Log::error($e->getMessage());
            return \response()->json([0, 'خطا در انجام عملیات']);
        }


    }

    public function GroupRemove(Request $request)
    {
        $ids = $request->id;
        $ids = explode(',', $ids);
        try {

            foreach ($ids as $id) {
                $service = Service::find($id);
                Storage::delete('public/images/services/' . $service->image);
                $service->delete();

            }
            return \response()->json([1, 'حذف با موفقیت انجام شد']);
        } catch (\Expectation $e) {
            Log::error($e->getMessage());
            return \response()->json([0, 'خطا در انجام عملیات']);
        }
    }

    public function validateForm(Request $request)
    {
        $request->validate([
            'title_fa' =>'required' ,
            'title_en' =>'nullable' ,
            'short_description_fa' =>'nullable' ,
            'short_description_en' =>'nullable' ,
            'image' => ['nullable', 'image'],


        ]);
    }
    public function saveFile($file, $env)
    {
        if (is_file($file)) {
            $destination_path = env($env);
            $new_file = $file;
            $file_name = time() . "." . $new_file->getClientOriginalExtension();
            $path = $file->storeAs($destination_path, $file_name);
            return $file_name;
        };
        return 'File Not Found';
    }
}
