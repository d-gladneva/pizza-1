<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SettingsRequest;
use Spatie\Valuestore\Valuestore;

class SettingsController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return View
     */
    public function index(): View
    {
        $settings = Valuestore::make(storage_path('app/settings.json'))
            ->all();

        return view('settings.edit', compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SettingsRequest $request
     * @return RedirectResponse
     */
    public function update(SettingsRequest $request): RedirectResponse
    {
        $settings = Valuestore::make(storage_path('app/settings.json'))
            ->put($request->except('_method', '_token'));

        if ($settings) {
            session()->flash('flash.banner', __('Settings was save successfully!'));
            session()->flash('flash.bannerStyle', 'success');
        }
        return redirect()->route('settings.index');
    }
}
