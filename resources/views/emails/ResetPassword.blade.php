@component('mail::message')
    # Resetowanie Hasła

    Otrzymaliśmy prośbę o zresetowanie hasła do Twojego konta.

    @component('mail::button', ['url' => $resetLink])
        Zresetuj Hasło
    @endcomponent

    Jeśli nie żądałeś resetowania hasła, zignoruj tę wiadomość.

    Dziękujemy,<br>
    Zespół Twojej Aplikacji
@endcomponent
