<x-guest-layout>

    {{-- Ajout du titre de la page + des styles et des scripts --}}

    @section('title')
        {{ 'Accueil' }}
    @endsection

    @push('scripts')
        <script src="/assets/js/home.js"></script>
    @endpush

    @push('styles')
        <link rel="stylesheet" href="/assets/css/home.css">
    @endpush

    <div id="home-container">

        <div class="top-container">

            <div class="main-image-container">
                <img src="assets/images/home-main-image.webp" alt="Groupe de personnes se réunissant dans la joie">
            </div>

            <div class="slogan-container">
                <h1>Bienvenue sur notre site d'événements communautaires</h1>
                <p class="lead">Organisez et découvrez des événements passionnants près de chez vous.</p>
            </div>

        </div>

        <div id="list-event-container">
    
            <h2 class="title">Evénéments à venir</h2>
    
            @if (count($events)>0)
                
                <div id="event-list">
    
                    @foreach ($events as $event)
                        <a class="event" href="event/{{$event->id}}">

                            <div class="image-container">
                                @if ($event->image)
                                    
                                    <img src="{{ asset('storage/'.$event->image) }}" alt="">

                                @endif
                            </div>

                            <div class="info-container">

                                <h3 class="event-title">{{ $event->title }}</h3>
                                <p class="event-description">@cutText($event->description)</p>
                                <div class="event-date">
                                    <p class="start-date">{{ date('d/m/Y', strtotime($event->start_time)) }}</p>
                                    <span class="date-separator">-</span>
                                    <p class="end-date">{{ date('d/m/Y', strtotime($event->end_time)) }}</p>
                                </div>

                                <button class="participate-button">
                                    Participer
                                </button>
                            </div>

                        </a>
                    @endforeach
    
                </div>
    
            @else
    
                <p class="no-event">Aucun événement n'est à venir</p>
    
            @endif
    
        </div>

    </div>



</x-guest-layout>