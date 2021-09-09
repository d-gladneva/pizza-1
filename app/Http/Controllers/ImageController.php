<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $data = Storage::disk('products')->files('1600x1064');
        $images = $this->paginate($data, 10, null, ['path' => 'images']);

        return view('images.index', compact('images'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $image
     * @return RedirectResponse
     */
    public function destroy(string $image): RedirectResponse
    {
        $count = 0;
        $directories = ['1600x1064', '600x399', '224x149'];

        foreach ($directories as $directory) {
            if (Storage::disk('products')->delete($directory.'/'.$image)) {
                $count++;
            }
        }

        if ($count == 3) {
            session()->flash('flash.banner', __('Image was delete successfully!'));
            session()->flash('flash.bannerStyle', 'success');
        }

        return redirect()->route('images.index');
    }

    /**
     * Pagination for array.
     *
     * @param $items
     * @param int $perPage
     * @param null $page
     * @param array $options
     * @return LengthAwarePaginator
     */
    public function paginate($items, $perPage = 5, $page = null, $options = []): LengthAwarePaginator
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
