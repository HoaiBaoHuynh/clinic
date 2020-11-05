<?php

return [
    'calendars.patient_calendars' => [
        'index' => 'calendars::patient_calendars.list resource',
        'create' => 'calendars::patient_calendars.create resource',
        'edit' => 'calendars::patient_calendars.edit resource',
        'destroy' => 'calendars::patient_calendars.destroy resource',
    ],
    'calendars.doctor_calendars' => [
        'index' => 'calendars::doctor_calendars.list resource',
        'create' => 'calendars::doctor_calendars.create resource',
        'edit' => 'calendars::doctor_calendars.edit resource',
        'destroy' => 'calendars::doctor_calendars.destroy resource',
    ],
// append


];
