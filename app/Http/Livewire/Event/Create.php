<?php

namespace App\Http\Livewire\Event;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $location;
    public $startTime;
    public $endTime;
    public $maxAttendees;
    public $image;
    public string $imageName = "";


    public function render()
    {

        return view('livewire.event.create');
    }


    public function updateImage(){

        if($this->validate([
            'image' => 'nullable|mimes:jpeg,jpg,bmp,png,webp|max:3072',
        ])){
            $this->imageName = $this->image->getClientOriginalName();
        }

    }


    public function messages()
    {
        return [
            'image.max' => 'File size must not exceed 3Mo',
        ];
    }


    /**
    * Register a new bird
    */
    public function create(){

        $this->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:2500',
            'image' => 'required|mimes:jpeg,jpg,bmp,png,webp|max:3072',
            'startTime' => 'required|date',
            'endTime' => 'required|date|after_or_equal:start_date',
            'location' => 'required|string|max:255',
            'maxAttendees' => 'required|int|max:10000'
        ],
        [
            'title.required' => 'Vous devez renseigner un titre',
            'title.max' => 'Le titre ne doit pas dépasser 255 caractères',
            'description.required' => 'Vous devez renseigner une description',
            'description.max' => 'La description ne doit pas dépasser 2500 caractères',
            'image.required' => 'Vous devez ajouter une image',
            'image.mime' => "Format d'image incorrecte",
            'image.max' => "La taille de l'image ne doit pas dépasser 3Mo",
        ]);

        $event = Event::create([
            "title" => $this->title,
            "description" => $this->description,
            "image" => $this->image ? $this->image->store('events', 'public') : null,
            "start_time"=>$this->startTime,
            "end_time"=>$this->endTime,
            "location"=>$this->location,
            "max_attendees"=>$this->maxAttendees,
            "user_id"=>Auth::user()->id,
        ]);

        return redirect()->route("dashboard")->with("success", "Event created !");

    }
}
