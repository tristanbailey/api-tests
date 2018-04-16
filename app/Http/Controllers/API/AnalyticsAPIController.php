<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateanalyticsAPIRequest;
use App\Http\Requests\API\UpdateanalyticsAPIRequest;
use App\Models\Analytics;
use App\Repositories\analyticsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AnalyticsController
 * @package App\Http\Controllers\API
 */

class AnalyticsAPIController extends AppBaseController
{
    /** @var  analyticsRepository */
    private $analyticsRepository;

    public function __construct(analyticsRepository $analyticsRepo)
    {
        $this->analyticsRepository = $analyticsRepo;
    }

    /**
     * Display a listing of the analytics.
     * GET|HEAD /analytics
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->analyticsRepository->pushCriteria(new RequestCriteria($request));
        $this->analyticsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $analytics = $this->analyticsRepository->all();

        return $this->sendResponse($analytics->toArray(), 'Analytics retrieved successfully');
    }

    /**
     * Store a newly created analytics in storage.
     * POST /analytics
     *
     * @param CreateanalyticsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateanalyticsAPIRequest $request)
    {
        $input = $request->all();

        $analytics = $this->analyticsRepository->create($input);

        return $this->sendResponse($analytics->toArray(), 'Analytics saved successfully');
    }

    /**
     * Display the specified analytics.
     * GET|HEAD /analytics/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var analytics $analytics */
        $analytics = $this->analyticsRepository->findWithoutFail($id);

        if (empty($analytics)) {
            return $this->sendError('Analytics not found');
        }

        return $this->sendResponse($analytics->toArray(), 'Analytics retrieved successfully');
    }

    /**
     * Update the specified analytics in storage.
     * PUT/PATCH /analytics/{id}
     *
     * @param  int $id
     * @param UpdateanalyticsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateanalyticsAPIRequest $request)
    {
        $input = $request->all();

        /** @var analytics $analytics */
        $analytics = $this->analyticsRepository->findWithoutFail($id);

        if (empty($analytics)) {
            return $this->sendError('Analytics not found');
        }

        $analytics = $this->analyticsRepository->update($input, $id);

        return $this->sendResponse($analytics->toArray(), 'analytics updated successfully');
    }

    /**
     * Remove the specified analytics from storage.
     * DELETE /analytics/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var analytics $analytics */
        $analytics = $this->analyticsRepository->findWithoutFail($id);

        if (empty($analytics)) {
            return $this->sendError('Analytics not found');
        }

        $analytics->delete();

        return $this->sendResponse($id, 'Analytics deleted successfully');
    }
}
