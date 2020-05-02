<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

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
     * @param  \Illuminate\Http\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function showLanguage()
    {
        return view('pages.settings.language.index');
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
                'html' => view('pages.blocks.widgets.search_people_block', compact('searchResult'))->render()
            ]);
        }
    }
}
