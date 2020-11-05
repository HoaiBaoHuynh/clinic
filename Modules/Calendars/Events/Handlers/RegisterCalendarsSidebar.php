<?php

namespace Modules\Calendars\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterCalendarsSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('calendars::calendars.title.calendars'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('calendars::patient_calendars.title.patient_calendars'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.calendars.patient_calendar.create');
                    $item->route('admin.calendars.patient_calendar.index');
                    $item->authorize(
                        $this->auth->hasAccess('calendars.patient_calendars.index')
                    );
                });
                $item->item(trans('calendars::doctor_calendars.title.doctor_calendars'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.calendars.doctor_calendar.create');
                    $item->route('admin.calendars.doctor_calendar.index');
                    $item->authorize(
                        $this->auth->hasAccess('calendars.doctor_calendars.index')
                    );
                });
// append


            });
        });

        return $menu;
    }
}
