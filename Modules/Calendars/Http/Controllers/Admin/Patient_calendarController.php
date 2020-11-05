<?php

namespace Modules\Calendars\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Calendars\Entities\Patient_calendar;
use Modules\Calendars\Http\Requests\CreatePatient_calendarRequest;
use Modules\Calendars\Http\Requests\UpdatePatient_calendarRequest;
use Modules\Calendars\Repositories\Patient_calendarRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Calendar;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Patient_calendarController extends AdminBaseController
{
    /**
     * @var Patient_calendarRepository
     */
    private $patient_calendar;

    public function __construct(Patient_calendarRepository $patient_calendar)
    {
        parent::__construct();

        $this->patient_calendar = $patient_calendar;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('calendars::admin.patient_calendars.index', compact(''));
    }

    public function Patient_Events(){
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

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('calendars::admin.patient_calendars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatePatient_calendarRequest $request
     * @return Response
     */
    public function store(CreatePatient_calendarRequest $request)
    {
        $this->patient_calendar->create($request->all());

        return redirect()->route('admin.calendars.patient_calendar.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('calendars::patient_calendars.title.patient_calendars')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Patient_calendar $patient_calendar
     * @return Response
     */
    public function edit(Patient_calendar $patient_calendar)
    {
        return view('calendars::admin.patient_calendars.edit', compact('patient_calendar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Patient_calendar $patient_calendar
     * @param  UpdatePatient_calendarRequest $request
     * @return Response
     */
    public function update(Patient_calendar $patient_calendar, UpdatePatient_calendarRequest $request)
    {
        $this->patient_calendar->update($patient_calendar, $request->all());

        return redirect()->route('admin.calendars.patient_calendar.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('calendars::patient_calendars.title.patient_calendars')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Patient_calendar $patient_calendar
     * @return Response
     */
    public function destroy(Patient_calendar $patient_calendar)
    {
        $this->patient_calendar->destroy($patient_calendar);

        return redirect()->route('admin.calendars.patient_calendar.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('calendars::patient_calendars.title.patient_calendars')]));
    }
}
