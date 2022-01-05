<?php

namespace Yarscript\Admin\Http\Controllers\Auth;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Yarscript\Core\Http\Controllers\Controller as BaseController;
use Yarscript\Admin\Http\Requests\CreateSession as CreateSessionRequest;

/**
 * Class SessionController
 * @package Yarscript\Admin\Http\Controllers\Auth
 */
class SessionController extends BaseController
{
    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $request_config;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->request_config = request('request_config');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard.index');
        }

        return view($this->request_config[ 'view' ]);
    }

    /**
     * @param CreateSessionRequest $request
     * @return \Exception|RedirectResponse
     */
    public function store(CreateSessionRequest $request)
    {
        try {
            if (Auth::guard('admin')->attempt($request->credentials(['is_admin' => 1]), $request->remember())) {
                return redirect()->intended(route($this->request_config[ 'redirect' ]));
            }

            session()->flash('error', trans('admin::app.users.users.login-error'));

            return redirect()->back()->withInput();
        } catch (\Exception $e) {
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(): RedirectResponse
    {
        Auth::guard('admin')->logout();

        return redirect()->route($this->request_config[ 'redirect' ]);
    }
}
