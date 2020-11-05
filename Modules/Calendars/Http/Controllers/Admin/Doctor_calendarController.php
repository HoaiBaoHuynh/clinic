<?php

namespace Modules\Calendars\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Calendars\Entities\LichLamViec;
use Modules\Calendars\Entities\NgayLamViec;
use Modules\Calendars\Http\Requests\CreateDoctor_calendarRequest;
use Modules\Calendars\Http\Requests\UpdateDoctor_calendarRequest;
use Modules\Calendars\Repositories\Doctor_calendarRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Calendar;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Doctor_calendarController extends AdminBaseController
{
    /**
     * @var Doctor_calendarRepository
     */
    private $doctor_calendar;

    public function __construct(Doctor_calendarRepository $doctor_calendar)
    {
        parent::__construct();

        $this->doctor_calendar = $doctor_calendar;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $nhanvien = DB::table('nhanvien')->select('id','hoTen')->get();
        $ca = DB::table('ca')->get();
        return view('calendars::admin.doctor_calendars.index', compact('nhanvien','ca'));
    }

    public function LoadEvents(){
        $events = DB::table('lichlamviec')->join('ca','lichlamviec.id_ca','=','ca.id')->join('ngaylamviec','lichlamviec.id_ngaylamviec','=','ngaylamviec.id')->join('nhanvien','ngaylamviec.id_nhanVien','=','nhanvien.id')->select('lichlamviec.id','ca.id as id_ca','ca','ngaylamviec.id_nhanVien','hoTen','chuyenMon','ngay')->get();
        $list_event = [];
        foreach ($events as $ev) {
            //ghép date + time lại
            $starts = Carbon::createFromFormat('Y-m-d H:i:s', $ev->ngay.' '.$retVal = ($ev->ca == 1) ? '07:00:00': (($ev->ca == 2 ) ? '12:00:00' : '16:00:00'))->toDateTimeString();
            $ends = Carbon::createFromFormat('Y-m-d H:i:s', $ev->ngay.' '.$retVal = ($ev->ca == 1) ? '11:00:00': (($ev->ca == 2 ) ? '16:00:00' : '20:00:00'))->toDateTimeString();
            array_push($list_event, [
                'id' => $ev->id,
                'id_ca' => $ev->id_ca,
                'id_nhanVien' => $ev->id_nhanVien,
                'title' => $ev->hoTen.'
                '.'Chuyên môn: '.$ev->chuyenMon,
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
        return view('calendars::admin.doctor_calendars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateDoctor_calendarRequest $request
     * @return Response
     */
    public function StoreEvents(Request $request)
    {

        $data = new NgayLamViec();
        $data->id_nhanVien = $request->id_nhanVien;
        $data->ngay = $request->ngay;
        $data->save();

        /*$id=DB::select("SHOW TABLE STATUS LIKE 'ngaylamviec'");
        $next_id=$id[0]->Auto_increment;*/
        $id = DB::table('ngaylamviec')->where('id_nhanVien',$request->id_nhanVien)->where('ngay',$request->ngay)->select('id')->get();
        $leng = count($request->id_ca);
        $bien = $request->id_ca;
        for($i = $leng - 1 ; $i >= 0; $i-- ){
            $dt = new LichLamViec;
            $dt->id_ca = $request->id_ca;
            $dt->id_ngaylamviec = $id;
            $dt->save();
        }

        return response()->json(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Doctor_calendar $doctor_calendar
     * @return Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  Doctor_calendar $doctor_calendar
     * @param  UpdateDoctor_calendarRequest $request
     * @return Response
     */
    public function UpdateEvents(Request $request)
    {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  Doctor_calendar $doctor_calendar
     * @return Response
     */
    public function DestroyEvents(Request $request)
    {
        $id = LichLamViec::find($request->id);
        NgayLamViec::destroy($id->id_ngaylamviec);
        LichLamViec::destroy($request->id);

        return response()->json(true);
    }
}
