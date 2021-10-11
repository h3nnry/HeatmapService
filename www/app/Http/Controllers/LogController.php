<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LogPostRequest;
use App\LinkType;
use App\Log;

/**
 * Class LogController
 * @package App\Http\Controllers
 */
class LogController extends Controller
{
    /**
     * @param LogsPostRequest $request
     * @return Log
     */
    public function post(LogPostRequest $request)
    {
        $validData = $request->validated();
        $linkType = LinkType::where('type', $validData['link_type'])->first();
        $validData['link_type_id'] = $linkType->id;

        $log = new Log($validData);
        $log->save();

        if ($log) {
            return $log;
        }
    }
}