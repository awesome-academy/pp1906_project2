<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\PasswordRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Show show user information settings.
     *
     * @return Response
     */
    public function showInformation()
    {
        $currentUser = auth()->user();

        return view('pages.settings.personal.index', compact('currentUser'));
    }

    /**
     * Show language changing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLanguage()
    {
        return view('pages.settings.language.index');
    }

    /**
     * Show password changing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showEditPassword()
    {
        return view('pages.settings.password.index');
    }

    /**
     * Update the user password.
     *
     * @param  app\Http\Requests\UserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(PasswordRequest $request)
    {
        if (!(Hash::check($request->current_password, auth()->user()->password))) {
            // The passwords matches
            return back()->with('error', __('password.update.not_match'));
        }

        if (strcmp($request->current_password, $request->new_password) == 0) {
            //Current password and new password are same
            return back()->with('error', __('password.update.not_same'));
        }

        //Change Password
        $newPassword = bcrypt($request->new_password);

        $updatePassword = $this->userService->updateUser(auth()->id(), ['password' => $newPassword]);

        if ($updatePassword) {
            return back()->with('success', __('password.update.success'));
        } else {
            return back()->with('error', __('password.error'));
        }
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function updateInformation(UserRequest $request)
    {
        $currentUserId = auth()->id();

        $data = $this->userService->getUserData($request);

        $updateUser = $this->userService->updateUser($currentUserId, $data);

        if ($updateUser) {
            return back()->with('success', __('user.information.success'));
        }

        return back()->with('error', __('user.error'));
    }

    /**
     * Change the language of website.
     *
     * @param  \Illuminate\Http\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function updateLanguage(UserRequest $request)
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

    /**
     * Get list of people on searching.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSearchPeopleList(Request $request)
    {
        if ($request->ajax()) {
            $inputString = $request->name;

            $searchResult = $this->userService->getSearchPeopleList($inputString);

            return response()->json([
                'count' => $searchResult->count(),
                'html' => view('pages.blocks.widgets.search_people_block', compact('searchResult'))->render()
            ]);
        }
    }
}
