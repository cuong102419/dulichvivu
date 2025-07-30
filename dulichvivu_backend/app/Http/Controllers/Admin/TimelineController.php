<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Timeline;
use App\Models\Tour;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function create($slug)
    {
        $tour = Tour::where('slug', $slug)->firstOrFail();

        if ($tour->timelines()->count() > 0) {
            alert('Lưu ý!', 'Tour đã có lộ trình, bạn không thể thêm.', 'warning');
            return redirect()->route('timeline.edit', $tour->slug);
        }

        return view('timeline.create', compact('tour'));
    }

    public function store(Request $request, Tour $tour)
    {
        $titles = $request->input('title');
        $descriptions = $request->input('description');

        foreach ($titles as $index => $title) {
            Timeline::create([
                'tour_id' => $tour->id,
                'title' => $title,
                'description' => $descriptions[$index]
            ]);
        }

        return redirect()->route('departure.list', $tour->slug);
    }

    public function edit($slug)
    {
        $tour = Tour::where('slug', $slug)->firstOrFail();

        if ($tour->status == 'active') {
            alert('Lưu ý!', 'Vì tour đã được mở, bạn chỉ có thể cập nhật lịch khởi hành.', 'warning');
            return redirect()->route('departure.list', $tour->slug);
        }

        $timelines = Timeline::where('tour_id', $tour->id)->get();

        $count = count($timelines);

        return view('timeline.edit', compact('tour', 'timelines', 'count'));
    }

    public function update(Request $request, Tour $tour)
    {
        $titles = $request->input('title');
        $descriptions = $request->input('description');

        if ($tour->status == 'active') {
            alert('Lưu ý!', 'Vì tour đã được mở, bạn chỉ có thể cập nhật lịch khởi hành.', 'warning');
            return redirect()->route('departure.list', $tour->slug);
        }

        if (count($titles) > $tour->total_day || count($descriptions) > $tour->total_day) {
            alert('Thất bại!', 'Bạn cần xóa lộ trình thừa.', 'error');
            return redirect()->back();
        }

        $timelines = Timeline::where('tour_id', $tour->id)->get();

        foreach ($timelines as $timeline) {
            $timeline->delete();
        }

        if (count($titles) == count($descriptions)) {
            foreach ($titles as $index => $title) {
                Timeline::create([
                    'tour_id' => $tour->id,
                    'title' => $title,
                    'description' => $descriptions[$index]
                ]);
            }
        }

        return redirect()->route('departure.list', $tour->slug);
    }

    public function destroy(Tour $tour)
    {
        if ($tour->status == 'active') {
            alert('Lưu ý!', 'Vì tour đã được mở, bạn chỉ có thể cập nhật lịch khởi hành.', 'warning');
            return redirect()->route('departure.list', $tour->slug);
        }

        $extra = Timeline::where('tour_id', $tour->id)
            ->skip($tour->total_day)
            ->take(PHP_INT_MAX)
            ->get();

        foreach ($extra as $timeline) {
            $timeline->delete();
        }

        alert('Thành công!', 'Đã xoá hết lộ trình thừa.', 'success');
        return redirect()->back();
    }
}
