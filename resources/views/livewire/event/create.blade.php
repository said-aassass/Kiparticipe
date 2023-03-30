<div id="" x-data="">

    <h1 class="form-title">
        Enregistrer un nouvel événement
    </h1>
    
    <form enctype="multipart/form-data" wire:submit.prevent="create" id="create-event-form">

        @csrf

        <div class="">

            <div class="form-section">
                <label for="title">Titre :</label>
                <input type="text" wire:model="title" id="title" class="form-input">
                @error('title') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-section">
                <label for="description">Description :</label>
                <textarea name="description" id="description" wire:model="description" cols="30" rows="10" class="form-input"></textarea>
                @error('description') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="file-section"          
            x-data="{ isUploading: false, progress: 0 }"
            x-on:livewire-upload-start="isUploading = true"
            x-on:livewire-upload-finish="isUploading = false"
            x-on:livewire-upload-error="isUploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress">

                <div class="file-selection">

                    <label>Image :</label>
                    <div class="file-input-container">
                        <button x-on:click="document.getElementById('image').click()" type="button" class="">Parcourir</button>
                        {{-- <div wire:loading wire:target="image" class="m-auto">Uploading...</div> --}}
                        <div class=""> 
                            <input type="file" accept="*" class="hidden" name="image" wire:model="image" id="image">  
                        </div>
                    </div>

                </div>

                <!-- Progress Bar -->
                <div x-show="isUploading" class="progress-bar-container">
                    <progress max="100" x-bind:value="progress" class="progress-bar"></progress>
                </div>

            </div>
                
            @error('image') <span class="error">{{ $message }}</span> @enderror

            <div class="file-preview">
                @if ($image && !$errors->get('image'))
                    <img src="{{ $image->temporaryUrl() }}" class="w-[15em] m-auto">
                    <span class="text-center">{{ $imageName }}</span>
                @endif
            </div>


        </div>


        <div class="form-section">
            <label for="location">Localisation :</label>
            <input type="text" wire:model="location" id="location" class="form-input">
            @error('location') <span class="error">{{ $message }}</span> @enderror
        </div>


        <div class="form-section">
            <label for="startTime">Début :</label>
            <input type="date" wire:model="startTime" id="startTime" class="form-input">
            @error('startTime') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-section">
            <label for="endTime">Fin :</label>
            <input type="date" wire:model="endTime" id="endTime" class="form-input">
            @error('endTime') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-section">
            <label for="maxAttendees">Partcipants maximum :</label>
            <input type="number" wire:model="maxAttendees" id="maxAttendees" class="form-input">
            @error('maxAttendees') <span class="error">{{ $message }}</span> @enderror
        </div>

    
        <div class="submit-container">
            <button type="submit">Créer l'événement</button>
        </div>

    </form>
    
</div>
