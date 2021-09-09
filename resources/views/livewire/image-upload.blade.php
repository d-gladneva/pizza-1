<form class="-my-2 mb-8" wire:submit.prevent="submit">
    <div x-data="{imageName: null, imagePreview: null}" class="col-span-6 sm:col-span-4">
        <input type="file" class="hidden" accept="image/png, image/jpeg"
               wire:model="image"
               x-ref="image"
               x-on:change="
                            imageName = $refs.image.files[0].name;
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                imagePreview = e.target.result;
                            };
                            reader.readAsDataURL($refs.image.files[0]);
               "
               wire:change="$set('show', true)"
        />

        @if(! $errors->has('image'))
        <div class="mb-4" x-show="imagePreview">
            <span class="block h-48 w-auto"
                  x-bind:style="'background-size: contain; background-repeat: no-repeat; background-position: center left; background-image: url(\'' + imagePreview + '\');'">
            </span>
        </div>
        @endif

        <button class="ml-3 sm:ml-0 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" type="button" x-on:click.prevent="$refs.image.click()">
            {{ __('Upload Image') }}
        </button>
        @if($show)
            <button type="submit" class="inline-flex items-center ml-1 px-4 py-2 bg-gray-800 rounded font-bold text-white hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" wire:loading.attr="disabled" wire:target="image">
                {{ __('Save') }}
            </button>
        @endif

        <x-jet-input-error for="image" class="mt-2" />
    </div>
</form>
