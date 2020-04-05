<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $data = $this->userService->getUserData($request);

        $updateUser = $this->userService->updateUser($id, $data);

        if ($updateUser) {
            return back()->with('success', __('user.update.success'));
        }

        return back()->with('error', __('user.error'));
    }

    /**
     * Show language changing page.
     *
     * @param  \Illuminate\Http\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function showLanguage()
    {
        return view('pages.settings.language.index');
    }

    /**
     * Change the language of website.
     *
     * @param  \Illuminate\Http\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function changeLanguage(UserRequest $request)
    {
        $currentUserId = auth()->id();
        $data = $request->only(['language']);

        $changLanguage = $this->userService->updateUser($currentUserId, $data);

        if ($changLanguage) {
            $keyLanguage = array_search(
                $data['language'],
                config('user.language')
            );
            app()->setLocale($keyLanguage);

            return back()->with('success', __('user.language.success'));
        }

        return back()->with('error', __('user.error'));
    }
}
