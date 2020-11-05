<?php

namespace Modules\Patient\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterPatientSidebar implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    public function handle(BuildingSidebar $sidebar)
    {
        $sidebar->add($this->extendWith($sidebar->getMenu()));
    }

    /**
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('patient::patients.title.patients'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('patient::listpatients.title.listpatients'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.patient.listpatient.create');
                    $item->route('admin.patient.listpatient.index');
                    $item->authorize(
                        $this->auth->hasAccess('patient.listpatients.index')
                    );
                });
                $item->item(trans('patient::reports.title.reports'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.patient.report.create');
                    $item->route('admin.patient.report.index');
                    $item->authorize(
                        $this->auth->hasAccess('patient.reports.index')
                    );
                });
                $item->item(trans('patient::reports.title.reports'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.patient.report.create');
                    $item->route('admin.patient.report.index');
                    $item->authorize(
                        $this->auth->hasAccess('patient.reports.index')
                    );
                });// append
            });
        });

        return $menu;
    }
}
