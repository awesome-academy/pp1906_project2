<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Change Language in database.
     *
     * @param  \Illuminate\Http\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function showLanguage()
    {
        return view('pages.settings.language.index');
    }

    public function changeLanguage(UserRequest $request)
    {
        $currentUserId = auth()->id();
        $data = $request->only(['language']);
        $changLanguage = $this->userService->update($currentUserId, $data);

        if ($changLanguage) {
            $keyLanguage = array_search(
                $data['language'],
                config('setting.language')
            );
            app()->setLocale($keyLanguage);

            return back()->with('success', __('user.success'));
        }

        return back()->with('error', __('user.error'));
    }
}
