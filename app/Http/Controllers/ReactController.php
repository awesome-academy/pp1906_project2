<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReactRequest;
use App\Models\Post;
use App\Services\ReactService;

class ReactController extends Controller
{
    protected $reactService;

    public function __construct(ReactService $reactService)
    {
        $this->reactService = $reactService;
    }

    /**
     * Store React in database.
     *
     * @param  \Illuminate\Http\ReactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReactRequest $request)
    {
        $data = $request->only([
            'type',
            'reactable_id',
        ]);

        $post = Post::findOrFail($data['reactable_id']);
        $data['reactable_type'] = 'App\Models\Post';
        $data['user_id'] = auth()->id();
        $react = $this->reactService->updateReact($data);

        if ($react) {
            return response()->json([
                'status' => true,
                'count_react' => $post->reacts->count(),
                'view' => view('pages.blocks.modals.react_user', compact('post'))->render(),
            ]);
        }

        return response()->json([
            'status' => false,
        ]);
    }
}
