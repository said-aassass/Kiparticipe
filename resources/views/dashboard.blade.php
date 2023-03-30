@section('title')
    {{ 'Tableau de bord' }}
@endsection

@push('styles')
    <link rel="stylesheet" href="/assets/css/dashboard.css">
@endpush

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tableau de bord
        </h2>
    </x-slot>

    <div id="dashboard-container">

        <div id="event-section" class="dashboard-section">

            <a href="#" class="list-link">
                
                <i class="fa-solid fa-indent icon"></i>
                <p>événéments</p>

            </a>

            <a href="{{route('admin.event.create')}}" class="create-link">
                <span>+</span>
            </a>

        </div>

        <div id="user-section" class="dashboard-section">

            <a href="#" class="list-link">
                
                <i class="fa-solid fa-users icon"></i>
                <p>Utilisateurs</p>

            </a>

            <a href="#" class="create-link">
                <span>+</span>
            </a>

        </div>

    </div>

</x-app-layout>
