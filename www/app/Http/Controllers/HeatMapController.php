<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\HeatMapByLinkRequest;
use App\Http\Requests\HeatMapByPageTypeRequest;
use App\Http\Requests\HeatMapByCustomerRequest;
use App\Log;
use App\LinkType;

/**
 * Class HeatMapController
 * @package App\Http\Controllers
 */
class HeatMapController extends Controller
{
    /**
     * @param HeatMapByLinkRequest $request
     * @return mixed
     */
    public function linkHits(HeatMapByLinkRequest $request)
    {
        $validData = $request->validated();

        return Log::where('link', $validData['link'])->where('created_at', '>=', $validData['from'])
            ->where('created_at', '<=', $validData['to'])
            ->count();
    }

    /**
     * @param HeatMapByPageTypeRequest $request
     * @return mixed
     */
    public function pageTypeHits(HeatMapByPageTypeRequest $request)
    {
        $validData = $request->validated();

        return LinkType::withCount([
            'logs' => function ($query) use ($validData) {
            $query->where('logs.created_at', '>=', $validData['from'])
                ->where('logs.created_at', '<=', $validData['to']);
                }])
            ->get();
    }

    /**
     * @param HeatMapByCustomerRequest $request
     * @return mixed
     */
    public function customerJourney(HeatMapByCustomerRequest $request)
    {
        $validData = $request->validated();

        return Log::where('customer_id', $validData['customer_id'])
            ->with('linkType')
            ->paginate();
    }

    /**
     * @param HeatMapByCustomerRequest $request
     * @return mixed
     */
    public function customersWitsSameJourney(HeatMapByCustomerRequest $request)
    {
        $validData = $request->validated();

        return array_column(Log::getCustomersWithSameJourney($validData['customer_id']), 'customer_id');
    }


}