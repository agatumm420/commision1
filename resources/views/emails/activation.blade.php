@component('mail::message')
    # Witaj!

    Dziękujemy za dołączenie do naszej społeczności kibiców. Kliknij poniższy link, aby aktywować swoje konto i zacząć zbierać punkty, śledząc swoją ulubioną drużynę na boisku.

    @component('mail::button', ['url' => $url])
        Aktywuj konto
    @endcomponent

    Dziękujemy,<br>
    {{ config('app.name') }}
@endcomponent
