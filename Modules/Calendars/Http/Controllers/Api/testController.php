<?php

namespace Modules\Calendars\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class testController extends Controller
{
	public function index(){
		$sv = [1,2,3,4,5,6];
		return response()->json($sv);
	}
}