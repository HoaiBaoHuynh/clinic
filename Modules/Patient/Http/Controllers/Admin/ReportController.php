<?php

namespace Modules\Patient\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Patient\Entities\Report;
use Modules\Patient\Http\Requests\CreateReportRequest;
use Modules\Patient\Http\Requests\UpdateReportRequest;
use Modules\Patient\Repositories\ReportRepository;
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

        return view('patient::admin.reports.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('patient::admin.reports.create');
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

        return redirect()->route('admin.patient.report.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('patient::reports.title.reports')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Report $report
     * @return Response
     */
    public function edit(Report $report)
    {
        return view('patient::admin.reports.edit', compact('report'));
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

        return redirect()->route('admin.patient.report.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('patient::reports.title.reports')]));
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

        return redirect()->route('admin.patient.report.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('patient::reports.title.reports')]));
    }
}
