<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function create($slug)
    {
        $tour = Tour::where('slug', $slug)->firstOrFail();

        if ($tour->images()->count() > 0) {
            alert('Lưu ý!', 'Tour đã có hình ảnh, bạn không thể thêm.', 'warning');
            return redirect()->route('image.edit', $tour->slug);
        }

        return view('images.create', compact('tour'));
    }

    public function upload(Request $request, $fileName)
    {
        $uploadFiles = [];
        if ($request->hasFile($fileName)) {
            $files = is_array($request->file($fileName)) ? $request->file($fileName) : [$request->file($fileName)];

            foreach ($files as $file) {
                $path = $file->store('images/tours');
                $uploadFiles[]  = $path;
            }
        }

        return $uploadFiles;
    }

    public function store(Request $request, Tour $tour)
    {
        $images = $request->file('images');

        if (!empty($images)) {
            $paths = $this->upload($request, 'images');

            foreach ($paths as $path) {
                Image::create([
                    'tour_id'  => $tour->id,
                    'image_url' => $path
                ]);
            }

            return response()->json([
                'success' => true,
                'paths' => $paths,
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Không có file nào được gửi lên',
        ], 400);
    }

    public function edit($slug)
    {
        $tour = Tour::where('slug', $slug)->firstOrFail();

        if ($tour->status == 'active') {
            alert('Lưu ý!', 'Vì tour đã được mở, bạn chỉ có thể cập nhật lịch khởi hành.', 'warning');
            return redirect()->route('departure.list', $tour->slug);
        }

        $images = Image::select('image_url')->where('tour_id', $tour->id)->get();

        return view('images.edit', compact('tour', 'images'));
    }

    public function update(Request $request, Tour $tour)
    {
        $images = $request->file('images');

        if (!empty($images)) {

            $oldImages = Image::where('tour_id', $tour->id)->get();

            foreach ($oldImages as $item) {
                Storage::delete($item->image_url);
                $item->delete();
            }

            $paths = $this->upload($request, 'images');

            foreach ($paths as $path) {
                Image::create([
                    'tour_id'  => $tour->id,
                    'image_url' =>  $path
                ]);
            }

            return response()->json([
                'success' => true,
                'paths' => $paths,
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Không có file nào được gửi lên',
        ], 400);
    }
}
