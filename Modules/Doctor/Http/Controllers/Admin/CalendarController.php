<?php

namespace Modules\Doctor\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Doctor\Entities\LichLamViec;
use Modules\Doctor\Entities\NgayLamViec;
use Modules\Doctor\Http\Requests\CreateCalendarRequest;
use Modules\Doctor\Http\Requests\UpdateCalendarRequest;
use Modules\Doctor\Repositories\CalendarRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Calendar;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CalendarController extends AdminBaseController
{
    /**
     * @var ListdoctorRepository
     */
    private $lichlamviec;

    public function __construct(CalendarRepository $lichlamviec)
    {
        parent::__construct();

        $this->lichlamviec = $lichlamviec;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    //calendar controll
    public function index(){
        $nhanvien = DB::table('nhanvien')->select('id','hoTen')->get();
        $ca = DB::table('ca')->get();
        return view('doctor::admin.calendars.index',compact('nhanvien','ca'));
    }
    public function listEventjson(){
        $events = DB::table('lichsukham')->join('benhnhan','lichsukham.id_benhNhan','=','benhnhan.id')->join('dichvu','lichsukham.id_dichVu','=','dichvu.id')->join('nhanvien','lichsukham.id_nhanVien','=','nhanvien.id')->select('lichsukham.id','benhnhan.hoTen as bn_hoTen','sdt','nhanvien.hoTen as nv_hoTen','tenDichVu','ngay_hen','tu_gio','den_gio')->get();
        $list_event = [];
        foreach ($events as $ev) {
            //ghép date + time lại
            $starts = Carbon::createFromFormat('Y-m-d H:i:s', $ev->ngay_hen.' '.$ev->tu_gio)->toDateTimeString();
            $ends = Carbon::createFromFormat('Y-m-d H:i:s', $ev->ngay_hen.' '.$ev->den_gio)->toDateTimeString();
            array_push($list_event, [
                'id' => $ev->id,
                'title' => 'Bác Sĩ: '.$ev->nv_hoTen.'
                '.'Bệnh Nhân: '.$ev->bn_hoTen.'
                '.'SĐT: '.$ev->sdt.'
                '.'Dịch Vụ: '.$ev->tenDichVu,
                'start' => $starts,
                'end' => $ends,
            ]);
        }

        return response()->json($list_event);
    }
    public function update(Request $request)
    {
        /*$event = LichLamViec::find($request->id);
        $event->id_nhanVien = $request->id_nhanVien;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->color = $request->color;
        $event->mota = $request->mota;
        $event->save();*/
        $dt = LichLamViec::find($request->id);
        $dt->id_ca = $request->id_ca;
        $dt->save();

        $id = LichLamViec::find($request->id);
        $data = NgayLamViec::find($id->id_ngaylamviec);
        $data->id_nhanVien = $request->id_nhanVien;
        $data->ngay = $request->ngay;
        $data->save();

        return response()->json(true);
    }

    public function store(Request $request)
    {
        /*LichLamViec::create($request->all());*/
        /*$data = new LichLamViec;
        $data->id_nhanVien = $request->id_nhanVien;
        $data->start = $request->start;
        $data->end = $request->end;
        $data->color = $request->color;
        $data->mota = $request->mota;
        $data->save();*/
        $id=DB::select("SHOW TABLE STATUS LIKE 'ngaylamviec'");
        $next_id=$id[0]->Auto_increment;
        $dt = new LichLamViec;
        $dt->id_ca = $request->id_ca;
        $dt->id_ngaylamviec = $next_id;
        $dt->save();

        $data = new NgayLamViec;
        $data->id_nhanVien = $request->id_nhanVien;
        $data->ngay = $request->ngay;
        $data->save();

        return response()->json(true);
    }

    public function destroy(Request $request)
    {
        $id = LichLamViec::find($request->id);
        NgayLamViec::destroy($id->id_ngaylamviec);
        LichLamViec::destroy($request->id);

        return response()->json(true);
    }
    /////////////////////////////////////////
    /*public function index()
    {
        $nhanvien = DB::table('nhanvien')->select('id','hoTen')->get();
        $events = DB::table('lichlamviec')->leftjoin('nhanvien','lichlamviec.id_nhanVien','=','nhanvien.id')->select('lichlamviec.id','hoTen','Ca','start_date','end_date')->get();
        $event_list = [];
        foreach ($events as $key => $event) {
            $event_list[] = Calendar::event(
                $event->hoTen.'
                '.$retVal = ($event->Ca == 1) ? 'Ca 1 : 7h - 11h' : (($event->Ca == 2 ) ? 'Ca 2 : 12h - 16h' : 'Ca 3 : 17h - 20h'),
                true,
                new \DateTime($event->start_date),
                new \DateTime($event->end_date),
                $event->id,
                [
                    'url' => 'calendars/edit/'.$event->id,
                    'color' => '#0080FF',
                    'allDay' => false,
                ]
            );
        }
        $calendar_details = Calendar::addEvents($event_list);

        return view('doctor::admin.calendars.index', compact('nhanvien','calendar_details'));
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    /*public function create()
    {
        return view('doctor::admin.calendars.create');
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCalendarRequest $request
     * @return Response
     */
    /*public function store(CreateCalendarRequest $request)
    {
        $data = new LichLamViec();
        $data->id_nhanVien = $request->get('id_nhanVien');
        $data->Ca = $request->get('Ca');
        $data->start_date = $request->get('start_date');
        $data->end_date = $request->get('end_date');
        $data->save();

        return redirect()->route('admin.doctor.calendar.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('doctor::calendars.title.calendars')]));
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Calendar $calendar
     * @return Response
     */
    /*public function edit(LichLamViec $lichlamviec)
    {
        $nhanvien = DB::table('nhanvien')->select('id','hoTen')->get();
        return view('doctor::admin.calendars.edit', compact('lichlamviec','nhanvien'));
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  Calendar $calendar
     * @param  UpdateCalendarRequest $request
     * @return Response
     */
    /*public function update(LichLamViec $lichlamviec, UpdateCalendarRequest $request)
    {
        $update = LichLamViec::find($lichlamviec->id);
        $update->id_nhanVien = $request->id_nhanVien;
        $update->Ca = $request->Ca;
        $update->start_date = $request->start_date;
        $update->end_date = $request->end_date;
        $update->save();

        return redirect()->route('admin.doctor.calendar.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('doctor::calendars.title.calendars')]));
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  Calendar $calendar
     * @return Response
     */
    /*public function destroy(LichLamViec $lichlamviec)
    {
        LichLamViec::destroy($lichlamviec->id);

        return redirect()->route('admin.doctor.calendar.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('doctor::calendars.title.calendars')]));
    }*/
}
