<?php

namespace Modules\Treatment\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Treatment\Entities\Listtreatment;
use Modules\Treatment\Http\Requests\CreateListtreatmentRequest;
use Modules\Treatment\Http\Requests\UpdateListtreatmentRequest;
use Modules\Treatment\Repositories\ListtreatmentRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ListtreatmentController extends AdminBaseController
{
    /**
     * @var ListtreatmentRepository
     */
    private $listtreatment;

    public function __construct(ListtreatmentRepository $listtreatment)
    {
        parent::__construct();

        $this->listtreatment = $listtreatment;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$listtreatments = $this->listtreatment->all();

        return view('treatment::admin.listtreatments.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('treatment::admin.listtreatments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateListtreatmentRequest $request
     * @return Response
     */
    public function store(CreateListtreatmentRequest $request)
    {
        $this->listtreatment->create($request->all());

        return redirect()->route('admin.treatment.listtreatment.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('treatment::listtreatments.title.listtreatments')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Listtreatment $listtreatment
     * @return Response
     */
    public function edit(Listtreatment $listtreatment)
    {
        return view('treatment::admin.listtreatments.edit', compact('listtreatment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Listtreatment $listtreatment
     * @param  UpdateListtreatmentRequest $request
     * @return Response
     */
    public function update(Listtreatment $listtreatment, UpdateListtreatmentRequest $request)
    {
        $this->listtreatment->update($listtreatment, $request->all());

        return redirect()->route('admin.treatment.listtreatment.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('treatment::listtreatments.title.listtreatments')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Listtreatment $listtreatment
     * @return Response
     */
    public function destroy(Listtreatment $listtreatment)
    {
        $this->listtreatment->destroy($listtreatment);

        return redirect()->route('admin.treatment.listtreatment.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('treatment::listtreatments.title.listtreatments')]));
    }
}
