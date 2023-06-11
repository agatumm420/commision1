

## Info 

Głównym użytkownikiem jest user2 reszta serów jest przełożona do niego.
Mecze z mecz są przeniesione do tabeli meczRuch możesz je usunąć.
Wszystkie enpointy znajdziesz w  /routes/api.php. Wyglądają tak:

### Route::post('/add-km/{user}', [KmController::class, 'add_km']);

'/add-km/{user}' jest endpoint ale należy pamiętać że wszystkie endpointy w api mają przedrostek api czyli aby się z nim połączyć trzeba zrobić request na adres:
{domena}/api/add-km/{tutaj id użytkownika(któremu chcemy doda ć punkty}
## Teraz rozpiszę jakie request przyjmuje jaki endpoint:

### /api/users:
**Wysyłasz**: NIC to jest GET zwykły

**Otrzymujesz**: Wszystkich użytkowników 10 na strone (paginacja)
### /api/users:
**Wysyłasz**: NIC to jest GET zwykły

**Otrzymujesz**: Wszystkich użytkowników 10 na strone (paginacja)
### /api/users/register:
**Wysyłasz**: (w jsonie) 

    'login':'przykladowy.login',
    'email':'przykladowy@email.com',
    'hasło':'przykladoweHaslo'

**Otrzymujesz**: Status i usera
###  /api/users/{user}:
Tutaj są 3 możliwości:
1) #### jeśli GET:
**Wysyłasz***: Nic (ale w adresie id usera!)

**Otrzymujesz**: usera
2) #### jeśli PUT:
--przez to można zmienić/odzyskać hasło --- 

**Wysyłasz**: (w jsonie):
        
    login : przykladowy.login
    password: nowe.hasło
    email: nowy.email



**Otrzymujesz**: usera

3) #### jeśli DELETE: 
   (w adresie jest id usera)

**Wysyłasz**: nic
**Odbierasz**   :
    
    'message':'User deleted'
### /add-km/{user}
dodaje km uzytkownikowi

**Wysyłasz**: (w jsonie)
    
    'street':'ul.Przypadkowa',
    'house':'4',
    'zip_code': '31-158',
    'city':'Przypadkowo'

**Otrzymujesz**: (json)

    'km': '666'
    


