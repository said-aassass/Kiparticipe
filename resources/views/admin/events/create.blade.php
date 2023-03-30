<x-app-layout>

    @section('title')
        {{ 'Créer événement' }}
    @endsection

    @push('styles')
        <link rel="stylesheet" href="/assets/css/form.css">
    @endpush

    @push('styles')
        <link rel="stylesheet" href="/assets/css/create-event.css">
    @endpush

    <livewire:event.create />

</x-app-layout>