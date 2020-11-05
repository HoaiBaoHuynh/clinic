<?php

namespace Modules\Patient\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Patient\Entities\Listpatient;
use Modules\Patient\Entities\Detailpatient;
use Modules\Patient\Entities\LichSuMuaDV;
use Modules\Doctor\Entities\Service;
use Modules\Doctor\Entities\Listdoctor;
use Modules\Patient\Http\Requests\CreateListpatientRequest;
use Modules\Patient\Http\Requests\UpdateListpatientRequest;
use Modules\Patient\Repositories\ListpatientRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ListpatientController extends AdminBaseController
{
    /**
     * @var ListpatientRepository
     */
    private $listpatient;

    public function __construct(ListpatientRepository $listpatient)
    {
        parent::__construct();

        $this->listpatient = $listpatient;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
         
        $listpatients = $this->listpatient->all();
        return view('patient::admin.listpatients.index', compact('listpatients'));
    }

    public function search(Request $request)
    {
        if(is_null($request->key))
        {
            $listpatients = Listpatient::where('gioiTinh','like','%'.$request->chon.'%')->get();
        }
        else
        {
            $listpatients = Listpatient::where('hoTen','like','%'.$request->key.'%')
                        ->orwhere('gioiTinh','like','%'.$request->key.'%')
                        ->orwhere('cmnd','like','%'.$request->key.'%')
                        ->orwhere('sdt','like','%'.$request->key.'%')
                        ->orwhere('diaChi','like','%'.$request->key.'%')
                        ->orwhere('ghiChu','like','%'.$request->key.'%')
                        ->orwhere('ngaySinh','like','%'.$request->key.'%')
                        ->get();
        }
        return view('patient::admin.listpatients.index', compact('listpatients'));
    }


    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('patient::admin.listpatients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateListpatientRequest $request
     * @return Response
     */
    public function store(CreateListpatientRequest $request)
    {
        
        $this->listpatient->create($request->all());

        return redirect()->route('admin.patient.listpatient.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('patient::listpatients.title.listpatients')]));
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  Listpatient $listpatient
     * @return Response
     */
    public function edit(Listpatient $listpatient)
    {
        return view('patient::admin.listpatients.edit', compact('listpatient'));
    }

    public function load_detail(Listpatient $listpatient)//funtion viết cho view chi tiết bệnh nhấn
    {
        $details = DB::table('lichsukham')->join('dichvu','lichsukham.id_dichVu','=','dichvu.id')->join('nhanvien','lichsukham.id_nhanVien','=','nhanvien.id')->where('id_benhNhan',$listpatient->id)->select('lichsukham.id','id_benhNhan','id_nhanVien','id_dichVu','nhanvien.hoTen','tenDichVu','date','lichsukham.ghiChu')->get();

        //$dv = lichsuDV::where('id_benhNhan',$listpatient->id)->get();// bảng lịch sử mua Dịch Vụ
        $dv = DB::table('lichsumuadichvu')->leftjoin('dichvu','lichsumuadichvu.id_dichVu','=','dichvu.id')->where('id_benhNhan',$listpatient->id)->select('lichsumuadichvu.id','id_benhNhan','maHoaDon','id_dichVu','lichsumuadichvu.gia','date','tenDichVu')->get();

        $dsdoctor = Listdoctor::select('id','hoTen')->get();
        $DV_moi = Service::select('id','tenDichVu','gia')->get(); //bảng Dịch vụ
        $MaHD = LichSuMuaDV::select('maHoaDon')->get();
        return view('patient::admin.listpatients.detail', compact('listpatient','details','dv','dsdoctor','DV_moi','MaHD'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  Listpatient $listpatient
     * @param  UpdateListpatientRequest $request
     * @return Response
     */
    public function update(Listpatient $listpatient, UpdateListpatientRequest $request)
    {

        $this->listpatient->update($listpatient, $request->all());

        return redirect()->route('admin.patient.listpatient.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('patient::listpatients.title.listpatients')]));
    }
    
    public function Lichsukham(Request $request)
    {
        $list = new Detailpatient();
        $list->id_benhNhan = $request->input('idbenhnhan');
        $list->id_nhanVien = $request->input('dsbacsi1');
        $list->id_dichVu = $request->input('dsdichvu1');
        $list->ghiChu = $request->input('GHICHU1');
        $list->date = Carbon::now();
        $list->save();
        return redirect()->route('admin.patient.listpatient.detail',$request->idbenhnhan)->withSuccess('success','datasave');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  Listpatient $listpatient
     * @return Response
     */
    public function destroy(Listpatient $listpatient)
    {
        $this->listpatient->destroy($listpatient);
        return redirect()->route('admin.patient.listpatient.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('patient::listpatients.title.listpatients')]));
    }

    public function xoa_lichsukham(Detailpatient $moi)
    {
        
        Detailpatient::destroy($moi->id);
        return redirect()->route('admin.patient.listpatient.detail',$moi->id_benhNhan)->withSuccess('success','datasave');
        /*Detailpatient::destroy($details);
        return redirect()->route('admin.patient.listpatient.detail',$listpatient->id)->withSuccess('Xóa thành công','datadetele');*/
    }

    public function update_lichsukham(Request $request)
    {
        $lichsukham = Detailpatient::find($request->input('id_lsk'));

        $lichsukham->id_benhNhan = $request->input('idbenhnhan');
        $lichsukham->id_nhanVien = $request->input('dsbacsi');
        $lichsukham->id_dichVu = $request->input('dsdichvu');
        $lichsukham->ghiChu = $request->input('GHICHU');
        $lichsukham->date = Carbon::now();
        
        $lichsukham->save();

        return back();
    }
    public function LSmuadichvu(Request $request){
        $data = new LichSuMuaDV();
        $data->id_benhNhan = $request->get('id_benhNhan');
        $data->maHoaDon = $request->get('maHoaDon');
        $data->id_dichVu = $request->get('id_dichVu');
        $data->gia = $request->get('gia');
        $data->date = Carbon::now();
        $data->save();
        return redirect()->route('admin.patient.listpatient.detail',[$request->get('id_benhNhan')])
            ->withSuccess('Success created LichSuMuaDV.');
    }
    public function updateLSmuadichvu(Request $request){
        $update = LichSuMuaDV::find($request->idlsmua);
        $update->maHoaDon = $request->get('maHoaDon');
        $update->id_dichVu = $request->get('id_dichVu');
        $update->gia = $request->get('gia');

        $update->save();
        return redirect()->route('admin.patient.listpatient.detail',[$request->get('id_benhNhan')])
            ->withSuccess('Success update LichSuMuaDV.');

    }
    public function delete_LSmuadichvu(LichSuMuaDV $lsmuadichvu,Listpatient $listpatient){
        LichSuMuaDV::destroy($lsmuadichvu->id);

        return redirect()->route('admin.patient.listpatient.detail',[$listpatient->id])
            ->withSuccess('Success Deleted Record '.$lsmuadichvu->maHoaDon);
    }
}