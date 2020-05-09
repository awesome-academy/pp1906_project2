<?php

namespace App\Http\Controllers;

use App\Services\ActivityService;

class ActivityController extends Controller
{
    protected $activityService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ActivityService $activityService)
    {
        $this->activityService = $activityService;
    }

    /**
     * Get latest activities.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLatestActivity()
    {
        $activities = $this->activityService->getLatestActivities(auth()->user());
        $activitiesCount = $activities->count();
        $html = '';

        if ($activitiesCount > 0) {
            $html = view('pages.blocks.widgets.activity_feed_block', compact('activities'))->render();
        }

        return response()->json([
            'status' => true,
            'html' => $html,
            'count' => $activitiesCount,
        ]);
    }
}
