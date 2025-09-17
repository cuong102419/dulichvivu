<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departure;
use App\Models\Tour;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DepartureController extends Controller
{
    public function index($slug)
    {
        $tour = Tour::where('slug', $slug)->firstOrFail();

        $departures = Departure::where('tour_id', $tour->id)->orderBy('start_date', 'desc')->get();

        foreach ($departures as $departure) {
            if ($departure->end_date <= now()->toDateString() && $departure->status == 'open') {
                if ($departure->booked > 0) {
                    $departure->update(['status' => 'closed']);
                } else {
                    $departure->update(['status' => 'cancelled']);
                }
            }
        }

        $status = [
            'pending' => ['value' => 'Chưa mở', 'class' => 'badge-info'],
            'open' => ['value' => 'Đang hoạt động', 'class' => 'badge-success'],
            'closed' => ['value' => 'Kết thúc', 'class' => 'badge-secondary'],
            'cancelled' => ['value' => 'Đã hủy', 'class' => 'badge-danger']
        ];

        return view('departures.list', compact('tour', 'departures', 'status'));
    }

    public function create($slug)
    {
        $tour = Tour::where('slug', $slug)->firstOrFail();

        return view('departures.create', compact('tour'));
    }

    public function store(Request $request, Tour $tour)
    {
        $start = $request->input('start_date');
        $expectedEnd = Carbon::parse($start)->addDays($tour->total_day)->toDateString();

        $data = $request->validate([
            'start_date' => ['required', 'date', 'after_or_equal:' . now()->addDays(7)->toDateString(), Rule::unique('departures')->where(function ($query) use ($tour) {
                return $query->where('tour_id', $tour->id);
            })],
            'end_date'   => ['required', 'date'],
            'departure_time' => ['required'],
            'price_adult' => ['required'],
            'price_child' => ['required'],
            'capacity' => ['required'],
        ], [
            'start_date.after_or_equal' => 'Ngày khởi hành phải cách ngày hiện tại một tuần.',
            'start_date.unique' => 'Ngày khởi hành đã tồn tại.',
        ]);

        if ($request->end_date !== $expectedEnd) {
            return back()->withInput()->withErrors([
                'end_date' => 'Ngày kết thúc phải bằng lộ trình đã tạo.'
            ]);
        }

        $data['tour_id'] = $tour->id;
        Departure::create($data);

        alert('Thành công!', 'Thêm lịch khởi hành thành công.', 'success');
        return redirect()->route('departure.list', $tour->slug);
    }

    public function edit($slug, Departure $departure)
    {
        if ($departure->booked > 0 || $departure->status == 'open') {
            alert('Lưu ý!', 'Vì tour đã được mở, bạn chỉ có thể cập nhật số lượng.', 'warning');
        }

        if ($departure->status == 'closed') {
            return redirect()->back();
        }

        $tour = Tour::where('slug', $slug)->firstOrFail();

        return view('departures.edit', compact('departure', 'tour'));
    }

    public function update(Request $request, Tour $tour, Departure $departure)
    {
        if ($departure->booked == 0 && $departure->status != 'open') {
            $start = $request->input('start_date');
            $expectedEnd = Carbon::parse($start)->addDays($tour->total_day)->toDateString();

            $data = $request->validate([
                'start_date' => ['required', 'date', 'after_or_equal:' . now()->addDays(7)->toDateString(), Rule::unique('departures')->where(function ($query) use ($tour) {
                    return $query->where('tour_id', $tour->id);
                })->ignore($departure->id)],
                'end_date'   => ['required', 'date'],
                'departure_time' => ['required'],
                'price_adult' => ['required'],
                'price_child' => ['required'],
                'capacity' => ['required'],
            ], [
                'start_date.after_or_equal' => 'Ngày khởi hành phải cách ngày hiện tại một tuần.',
                'start_date.unique' => 'Ngày khởi hành đã tồn tại.',
            ]);

            if ($request->end_date !== $expectedEnd) {
                return back()->withInput()->withErrors([
                    'end_date' => 'Ngày kết thúc phải bằng lộ trình đã tạo.'
                ]);
            }

            // dd($data);
            $departure->update($data);

            alert('Thành công!', 'Cập nhật lịch khởi hành thành công.', 'success');
            return redirect()->route('departure.list', $tour->slug);
        } else {
            $data = $request->validate([
                'capacity' => ['required']
            ]);

            if ((int)$request->input('capacity') < (int)$departure->capacity) {
                return back()->withInput()->withErrors([
                    'capacity' => 'Không thể giảm số lượng chỗ khi tour đã mở.'
                ]);
            }

            $departure->update($data);

            alert('Thành công!', 'Cập nhật lịch khởi hành thành công.', 'success');
            return redirect()->route('departure.list', $tour->slug);
        }
    }

    public function status(Request $request, Tour $tour, Departure $departure)
    {
        if ($departure->booked == 0) {

            if ($departure->booked > 0) {
                alert('Thất bại!', 'Không thể hủy khi đã có người đặt lịch này.', 'error');
                return redirect()->back();
            }

            if ($request->action == 'cancel') {
                $departure->update(['status' => 'cancelled']);
            }

            if ($request->action == 'open') {
                $departure->update(['status' => 'open']);
            }

            alert('Thành công!', 'Cập nhật trạng thái thành công.', 'success');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function destroy(Tour $tour, Departure $departure) {
        if ($departure->booked == 0) {
            $departure->delete();

            alert('Thành công!', 'Xóa lịch trình thành công.', 'success');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
