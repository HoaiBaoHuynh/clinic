<?php

namespace Modules\Doctor\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Doctor\Entities\Service;
use Modules\Doctor\Entities\ServiceCB;
use Modules\Doctor\Http\Requests\CreateServiceRequest;
use Modules\Doctor\Http\Requests\UpdateServiceRequest;
use Modules\Doctor\Repositories\ServiceRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ServiceController extends AdminBaseController
{
    /**
     * @var ServiceRepository
     */
    private $service;

    public function __construct(ServiceRepository $service)
    {
        parent::__construct();

        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $services = $this->service->all();

        return view('doctor::admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $tenDichVu = Service::select('id','tenDichVu')->get();
        $Keys = Service::select('maSo')->get();
        $num_id = Service::count() + 1;

        return view('doctor::admin.services.create', compact('tenDichVu','Keys','num_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateServiceRequest $request
     * @return Response
     */
    public function store(CreateServiceRequest $request)
    {    
        //insert vao bang cdvombo
        if (!is_null($request->dvDinhKem)) {
            $leng = count($request->dvDinhKem);
            $bien = $request->dvDinhKem;
            for($i = $leng - 1; $i >= 0; $i--){
                $dvcombo = new ServiceCB();
                $dvcombo->id_dichvu = $request->get('maSo');
                $dvcombo->status = $bien[$i];
                $dvcombo->save();
            }
        }

        $service = new Service();
        $service->maSo = $request->get('maSo');
        $service->tenDichVu = $request->get('tenDichVu');
        $service->chiTiet = $request->get('chiTiet');
        $service->ghiChu = $request->get('ghiChu');
        $num = $request->gia;
        for ($i=0; $i < count($num) ; $i++) {
            $num = str_replace(",","", $num);
        }
        $service->gia = $num;
        if (!is_null($request->dvDinhKem)) {
            $dv = Service::select('id','tenDichVu')->get();
            $lengs = count($request->dvDinhKem);
            $biens = $request->dvDinhKem;
            foreach ($dv as $key) {
                for ($i = $lengs - 1; $i >= 0; $i--) {
                    if ($key->id == $biens[$i]) {
                        $mang[] = $key->tenDichVu;
                    }
                }
            }
            $dvDK = implode(",",$mang);
            $service->dvDinhKem = $dvDK;
        }

        $service->save();

        return redirect()->route('admin.doctor.service.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('doctor::services.title.services')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Service $service
     * @return Response
     */
    public function edit(Service $service)
    {
        $comboDV = ServiceCB::select('id_dichvu','status')->get();
        $DichVu = Service::select('id','tenDichVu')->get();
        $Keys = Service::select('maSo')->get();

        return view('doctor::admin.services.edit', compact('service','DichVu','comboDV','Keys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Service $service
     * @param  UpdateServiceRequest $request
     * @return Response
     */
    public function update(Service $service, UpdateServiceRequest $request)
    {
        if (!is_null($request->dvDinhKem)) {
            $cbdichvu = ServiceCB::all();
            $leng = count($request->dvDinhKem);
            $biens = $request->dvDinhKem;
            $arr = [];
            foreach ($cbdichvu as $cbdv) {
                array_push($arr, $cbdv->id_dichvu);
            }
            if (in_array($request->maSo, $arr)) {
                foreach ($cbdichvu as $cbdv) {
                    if ($cbdv->id_dichvu == $request->maSo) {
                        ServiceCB::destroy($cbdv->id);
                    }
                }
                for($i = $leng - 1; $i >= 0; $i--){
                    $dvcombo = new ServiceCB();
                    $dvcombo->id_dichvu = $request->get('maSo');
                    $dvcombo->status = $biens[$i];
                    $dvcombo->save();
                }
            }else{
                foreach ($cbdichvu as $cbdv) {
                    if ($cbdv->id_dichvu == $request->oldnumber) {
                        ServiceCB::destroy($cbdv->id);
                    }
                }
                for($i = $leng - 1; $i >= 0; $i--){
                    $dvcombo = new ServiceCB();
                    $dvcombo->id_dichvu = $request->get('maSo');
                    $dvcombo->status = $biens[$i];
                    $dvcombo->save();
                }
            }
        }else{
            $cbdichvu = ServiceCB::all();
            foreach ($cbdichvu as $cbdv) {
                if ($cbdv->id_dichvu == $request->oldnumber) {
                    ServiceCB::destroy($cbdv->id);
                }
            }
        }

        $service = Service::find($service->id);

        $service->maSo = $request->get('maSo');
        $service->tenDichVu = $request->get('tenDichVu');
        $service->chiTiet = $request->get('chiTiet');
        $service->ghiChu = $request->get('ghiChu');
        $num = $request->gia;
        for ($i=0; $i < count($num) ; $i++) {
            $num = str_replace(",","", $num);
        }
        $service->gia = $num;
        if (!is_null($request->dvDinhKem)) {
            $dv = Service::select('id','tenDichVu')->get();
            $lengs = count($request->dvDinhKem);
            $biens = $request->dvDinhKem;
            foreach ($dv as $key) {
                for ($i = $lengs - 1; $i >= 0; $i--) {
                    if ($key->id == $biens[$i]) {
                        $mang[] = $key->tenDichVu;
                    }
                }
            }
            $dvDK = implode(",",$mang);
            $service->dvDinhKem = $dvDK;
        }else{
            $service->dvDinhKem = "";
        }

        $service->save();

        return redirect()->route('admin.doctor.service.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('doctor::services.title.services')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Service $service
     * @return Response
     */
    public function destroy(Service $service)
    {
        $this->service->destroy($service);

        return redirect()->route('admin.doctor.service.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('doctor::services.title.services')]));
    }
}
