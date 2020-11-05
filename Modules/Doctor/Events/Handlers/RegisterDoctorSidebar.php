<?php

namespace Modules\Doctor\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterDoctorSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('doctor::doctors.title.doctors'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('doctor::listdoctors.title.listdoctors'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.doctor.listdoctor.create');
                    $item->route('admin.doctor.listdoctor.index');
                    $item->authorize(
                        $this->auth->hasAccess('doctor.listdoctors.index')
                    );
                });
                $item->item(trans('doctor::categories.title.categories'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.doctor.category.create');
                    $item->route('admin.doctor.category.index');
                    $item->authorize(
                        $this->auth->hasAccess('doctor.categories.index')
                    );
                });
                $item->item(trans('doctor::reports.title.reports'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.doctor.report.create');
                    $item->route('admin.doctor.report.index');
                    $item->authorize(
                        $this->auth->hasAccess('doctor.reports.index')
                    );
                });
                $item->item(trans('doctor::services.title.services'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.doctor.service.create');
                    $item->route('admin.doctor.service.index');
                    $item->authorize(
                        $this->auth->hasAccess('doctor.services.index')
                    );
                });
                $item->item(trans('doctor::calendars.title.calendars'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.doctor.calendar.create');
                    $item->route('admin.doctor.calendar.index');
                    $item->authorize(
                        $this->auth->hasAccess('doctor.calendars.index')
                    );
                });
// append





            });
        });

        return $menu;
    }
}
