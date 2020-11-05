<?php

namespace Modules\Doctor\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Doctor\Entities\Listdoctor;
use Modules\Doctor\Http\Requests\CreateListdoctorRequest;
use Modules\Doctor\Http\Requests\UpdateListdoctorRequest;
use Modules\Doctor\Repositories\ListdoctorRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ListdoctorController extends AdminBaseController
{
    /**
     * @var ListdoctorRepository
     */
    private $listdoctor;

    public function __construct(ListdoctorRepository $listdoctor)
    {
        parent::__construct();

        $this->listdoctor = $listdoctor;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $listdoctors = $this->listdoctor->all();

        return view('doctor::admin.listdoctors.index', compact('listdoctors'));
    }
    public function timkiem(Request $request){
        if (is_null($request->tukhoa)) {
            $loc = $request->loc;
            $listdoctors = Listdoctor::where('phanLoai','like',"%$loc%")->get();
        }else{
            $tukhoa = $request->tukhoa;
            $listdoctors = Listdoctor::where('hoTen','like',"%$tukhoa%")->orWhere('ngaySinh','like',"%$tukhoa%")->orWhere('gioiTinh','like',"%$tukhoa%")->orWhere('chuyenMon','like',"%$tukhoa%")->orWhere('phanLoai','like',"%$tukhoa%")->get();
        }
        
        return view('doctor::admin.listdoctors.index',compact('listdoctors'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('doctor::admin.listdoctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateListdoctorRequest $request
     * @return Response
     */
    public function store(CreateListdoctorRequest $request)
    {
        $listdoctor = new Listdoctor();
        $listdoctor->hoTen = $request->input('hoTen');
        $listdoctor->ngaySinh = $request->input('ngaySinh');
        $listdoctor->gioiTinh = $request->input('gioiTinh');
        if($request->hasFile('Avatar')){
            $file = $request->file('Avatar');
            $extension = $file->getClientOriginalName();
            $file->move('assets/images',$extension);
            $listdoctor->Avatar = $extension;
        }

        $listdoctor->phanLoai = $request->input('phanLoai');
        $listdoctor->chuyenMon = $request->input('chuyenMon');
        $listdoctor->diaChi = $request->input('diaChi');

        $listdoctor->save();
        //$this->listdoctor->create($request->all());

        return redirect()->route('admin.doctor.listdoctor.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('doctor::listdoctors.title.listdoctors')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Listdoctor $listdoctor
     * @return Response
     */
    public function edit(Listdoctor $listdoctor)
    {
        return view('doctor::admin.listdoctors.edit', compact('listdoctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Listdoctor $listdoctor
     * @param  UpdateListdoctorRequest $request
     * @return Response
     */
    public function update(Listdoctor $listdoctor, UpdateListdoctorRequest $request)
    {
        $editdoctor = Listdoctor::find($listdoctor->id);
        $editdoctor->hoTen = $request->get('hoTen');
        $editdoctor->ngaySinh = $request->get('ngaySinh');
        $editdoctor->gioiTinh = $request->get('gioiTinh');
        $editdoctor->ngaySinh = $request->get('ngaySinh');
        if($request->hasFile('Avatar')){
            $file = $request->file('Avatar');
            $extension = $file->getClientOriginalName();
            $file->move('assets/images/',$extension);
            $editdoctor->Avatar = $extension;
        }
        $editdoctor->phanLoai = $request->get('phanLoai');
        $editdoctor->chuyenMon = $request->get('chuyenMon');
        $editdoctor->diaChi = $request->get('diaChi');

        $editdoctor->save();
        /*$this->listdoctor->update($listdoctor, $request->all());*/

        return redirect()->route('admin.doctor.listdoctor.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('doctor::listdoctors.title.listdoctors')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Listdoctor $listdoctor
     * @return Response
     */
    public function destroy(Listdoctor $listdoctor)
    {
        $this->listdoctor->destroy($listdoctor);

        return redirect()->route('admin.doctor.listdoctor.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('doctor::listdoctors.title.listdoctors')]));
    }
}
