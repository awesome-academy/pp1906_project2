<?php

namespace App\Http\Controllers;

use App\Share;
use Illuminate\Http\Request;
use App\Services\ShareService;
use App\Http\Requests\ShareRequest;

class ShareController extends Controller
{
    protected $shareService;

    public function __construct(ShareService $shareService)
    {
        $this->shareService = $shareService;
    }

    /**
     * Store post in database.
     *
     * @param  \Illuminate\Http\ShareRequest  $request
     * @param Int $id
     * @return \Illuminate\Http\Response
     */
    public function store(ShareRequest $request, $id)
    {
        $data = $this->shareService->getShareData($request);

        $data['user_id'] = auth()->id();
        $data['post_id'] = $id;

        $storeShare = $this->shareService->store($data);

        if ($storeShare) {
            return back()->with('success', __('share.create.success'));
        }

        return back()->with('error', __('share.error'));
    }
}
