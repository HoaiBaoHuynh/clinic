<?php

namespace Modules\Doctor\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Doctor\Entities\Report;
use Modules\Doctor\Http\Requests\CreateReportRequest;
use Modules\Doctor\Http\Requests\UpdateReportRequest;
use Modules\Doctor\Repositories\ReportRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ReportController extends AdminBaseController
{
    /**
     * @var ReportRepository
     */
    private $report;

    public function __construct(ReportRepository $report)
    {
        parent::__construct();

        $this->report = $report;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$reports = $this->report->all();

        return view('doctor::admin.reports.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('doctor::admin.reports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateReportRequest $request
     * @return Response
     */
    public function store(CreateReportRequest $request)
    {
        $this->report->create($request->all());

        return redirect()->route('admin.doctor.report.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('doctor::reports.title.reports')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Report $report
     * @return Response
     */
    public function edit(Report $report)
    {
        return view('doctor::admin.reports.edit', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Report $report
     * @param  UpdateReportRequest $request
     * @return Response
     */
    public function update(Report $report, UpdateReportRequest $request)
    {
        $this->report->update($report, $request->all());

        return redirect()->route('admin.doctor.report.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('doctor::reports.title.reports')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Report $report
     * @return Response
     */
    public function destroy(Report $report)
    {
        $this->report->destroy($report);

        return redirect()->route('admin.doctor.report.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('doctor::reports.title.reports')]));
    }
}
