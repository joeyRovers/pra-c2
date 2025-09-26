<x-layouts.app>

    <x-slot:introduction_text>
        <p>
            <img src="img/afbl_logo.png" align="right" width="100" height="100">
            {{ __('introduction_texts.contact_line_1') }}
        </p>
        <p>{{ __('introduction_texts.contact_line_2') }}</p>
        <p>{{ __('introduction_texts.contact_line_3') }}</p>
    </x-slot:introduction_text>

    <x-slot:title>
        Contact
    </x-slot:title>

    {{-- Succesmelding na versturen --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Contactformulier --}}
    <form method="POST" action="{{ route('contact.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Naam</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Bericht</label>
            <textarea class="form-control" name="message" id="message" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Verstuur</button>
    </form>

</x-layouts.app>
