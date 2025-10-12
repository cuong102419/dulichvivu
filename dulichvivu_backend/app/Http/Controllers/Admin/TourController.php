<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Timeline;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class TourController extends Controller
{
    public function index()
    {
        $tours = Tour::all();
        $area = [
            'northern' => 'Miền Bắc',
            'central' => 'Miền Trung',
            'southern' => 'Miền Nam',
            'international' => 'Quốc tế'
        ];

        $departures_location = [
            'ha_noi' => 'Hà Nội',
            'da_nang' => 'Đà Nẵng',
            'ho_chi_minh' => 'Tp.Hồ Chí Minh'
        ];

        $status = [
            'pending' => ['value' => 'Chưa mở', 'class' => 'secondary'],
            'active' => ['value' => 'Hoạt động', 'class' => 'success'],
            'inactive' => ['value' => 'Ngừng hoạt động', 'class' => 'warning']
        ];

        return view('tour.list', compact('tours', 'status', 'area', 'departures_location'));
    }

    public function create()
    {
        return view('tour.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => ['required', 'unique:tours'],
            'title' => ['required', 'string', 'unique:tours'],
            'duration' => ['required'],
            'area' => ['required'],
            'departure_location' => ['required'],
            'destination' => ['required', 'string'],
            'total_day' => ['required'],
            'type' => ['required'],
            'rules' => ['required'],
            'description' => ['required']
        ], [
            'code.unique' => 'Không được trùng lặp.',
            'title.unique' => 'Không được trùng lặp.',
            'area.required' => 'Không được để trống.',
            'type.required' => 'Không được để trống.',
            'rules.required' => 'Không được để trống.',
            'description.required' => 'Không được để trống.',
        ]);

        $data['slug'] = Str::slug($data['title']);

        $tour = Tour::create($data);

        return redirect()->route('image.create', $tour->slug);
    }

    public function edit($slug)
    {
        $tour = Tour::where('slug',  operator: $slug)->firstOrFail();

        if ($tour->status == 'active') {
            alert('Lưu ý!', 'Vì tour đã được mở, bạn chỉ có thể cập nhật lịch khởi hành.', 'warning');
            return redirect()->route('departure.list', $tour->slug);
        }

        return view('tour.edit', compact('tour'));
    }

    public function update(Request $request, Tour $tour)
    {
        if ($tour->status == 'active') {
            alert('Lưu ý!', 'Vì tour đã được mở, bạn chỉ có thể cập nhật lịch khởi hành.', 'warning');
            return redirect()->route('departure.list', $tour->slug);
        }

        $data = $request->validate([
            'title' => ['required', 'string', 'unique:tours,title,' . $tour->id],
            'duration' => ['required'],
            'area' => ['required'],
            'departure_location' => ['required'],
            'destination' => ['required', 'string'],
            'total_day' => ['required'],
            'type' => ['required'],
            'rules' => ['required'],
            'description' => ['required']
        ], [
            'code.unique' => 'Không được trùng lặp.',
            'title.unique' => 'Không được trùng lặp.',
            'area.required' => 'Không được để trống.',
            'type.required' => 'Không được để trống.',
            'rules.required' => 'Không được để trống.',
            'description.required' => 'Không được để trống.',
        ]);

        $tour->update($data);

        return redirect()->route('image.edit', $tour->slug);
    }

    public function destroy(Tour $tour)
    {
        try {
            if ($tour->status == 'active') {
                alert('Lưu ý!', 'Vì tour đã được mở, bạn chỉ có thể cập nhật lịch khởi hành.', 'warning');
                return redirect()->route('departure.list', $tour->slug);
            }

            $images = Image::where('tour_id', $tour->id)->get();
            $timelines = Timeline::where('tour_id', $tour->id)->get();

            foreach ($images as $image) {
                Storage::delete($image->image_url);
                $image->delete();
            }

            foreach ($timelines as  $timeline) {
                $timeline->delete();
            }

            $tour->delete();

            alert('Thành công!', 'Xóa tour thành công.', 'success');

            return redirect()->back();
        } catch (\Throwable $th) {
            alert('Thất bại!', 'Xóa tour không thành công.', 'error');

            return redirect()->back();
        }
    }

    public function open(Tour $tour)
    {
        if ($tour->images()->count() == 0) {
            alert('Lưu ý!', 'Tour chưa có hình ảnh, bạn không thể mở tour này.', 'warning');
            return redirect()->back();
        }

        if ($tour->departures()->count() == 0) {
            alert('Lưu ý!', 'Tour chưa có lịch khởi hành, bạn không thể mở tour này.', 'warning');
            return redirect()->back();
        }

        if ($tour->timelines()->count() == 0) {
            alert('Lưu ý!', 'Tour chưa có lịch trình, bạn không thể mở tour này.', 'warning');
            return redirect()->back();
        }

        if ($tour->status != 'active') {
            $tour->status = 'active';
            $tour->save();
        }

        alert('Thành công!', 'Mở tour thành công.', 'success');

        return redirect()->back();
    }

    public function close(Tour $tour) {
        if ($tour->departures()->sum('booked') <= 0) {
            alert('Thất bại!', 'Tour đã có người đặt, không thể đóng tour.', 'error');
            return redirect()->back();
        }

        if ($tour->status != 'inactive') {
            $tour->status = 'inactive';
            $tour->save();
        }

        alert('Thành công!', 'Đóng tour thành công.', 'success');
        return redirect()->back();
    }
}
