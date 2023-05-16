

## Info 

Głównym użytkownikiem jest user2 reszta serów jest przełożona do niego.
Mecze z mecz są przeniesione do tabeli meczRuch możesz je usunąć.
Wszystkie enpointy znajdziesz w  /routes/api.php. Wyglądają tak:

### Route::post('/add-km/{user}', [KmController::class, 'add_km']);

'/add-km/{user}' jest endpoint ale należy pamiętać że wszystkie endpointy w api mają przedrostek api czyli aby się z nim połączyć trzeba zrobić request na adres:
{domena}/api/add-km/{tutaj id użytkownika(któremu chcemy doda ć punkty}
## Teraz rozpiszę jakie request przyjmuje jaki endpoint:

### /api/users:
Wysyłasz: NIC to jest GET zwykły
Otrzymujesz: Wszystkich użytkowników 10 na strone (paginacja)
### /api/users:
Wysyłasz: NIC to jest GET zwykły
Otrzymujesz: Wszystkich użytkowników 10 na strone (paginacja)
### /api/users/register:
Wysyłasz: Login, email, hasło
Otrzymujesz: Status i usera
### /users/{id} albo /api/users/{user}:
Tutaj są dwie możliwości:
1) #### jeśli GET:
Wysyłasz: Nic (ale w adresie id usera!)
Otrzymujesz: usera
2) #### jeśli PUT:
Wysyłasz: Nic (ale w adresie id usera!)
Otrzymujesz: usera
