<?php

namespace App\Http\Controllers;

use App\Action\Top\InitAction;
use App\Models\TodoList;

class TopController extends Controller
{
    public function init(InitAction $action)
    {
        return response()->json($action());
    }
}
