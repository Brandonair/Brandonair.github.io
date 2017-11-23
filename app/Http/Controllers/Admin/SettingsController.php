<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class SettingsController extends BaseController
{
    /**
     * Display a listing of setting.
     *
     * @return Response
     */
    public function index()
    {
        $settings = array_filter(Setting::all(), function ($key) {
            if (strpos($key, '_descrip') !== false) { return true; }
            return false;
        });

        return $this->view('admins.settings.index')
                ->with('settings', $settings);
    }

    /**
     * Update the specified setting in storage.
     *
     * @param Setting $setting
     * @param Request $request
     *
     * @return Response
     */
    public function update(Setting $setting, Request $request)
    {
        $this->validate($request, Setting::$rules, Setting::$messages);
        $this->updateEntry($setting, $request->all());

        return redirect("/admin/settings");
    }

}
