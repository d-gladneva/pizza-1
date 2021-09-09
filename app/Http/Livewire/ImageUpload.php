<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageUpload extends Component
{
    use WithFileUploads;

    public $image;
    public $show = false;

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:4096',
        ]);
    }

    public function submit()
    {
        $filename = $this->image->getClientOriginalName();
        $intervention = Image::make($this->image);

        if ($intervention->width() == 1600 and $intervention->height() == 1064) {
            $this->image->storeAs('1600x1064', $filename, 'products');
        }
        else {
            $large = $intervention;
            $large->fit(1600, 1064)
                ->save(Storage::disk('products')->path('1600x1064/').$filename,
                98, 'jpg');
        }

        $medium = $intervention;
        $medium->fit(600, 399)
            ->save(Storage::disk('products')->path('600x399/').$filename,
            98, 'jpg');

        $small = $intervention;
        $small->fit(224, 149)
            ->save(Storage::disk('products')->path('224x149/').$filename,
            98, 'jpg');

        session()->flash('flash.banner', __('Image was upload successfully!'));
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('images.index');
    }

    public function render()
    {
        return view('livewire.image-upload');
    }
}
