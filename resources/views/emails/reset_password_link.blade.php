<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resetuj Hasło</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8f9fa; padding: 50px;">
<div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 4px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
    <h2 style="color: #333333;">Resetuj swoje hasło</h2>
    <p style="font-size: 16px; color: #555555;">
        Witaj,
    </p>
    <p style="font-size: 16px; color: #555555;">
        Otrzymaliśmy prośbę o zresetowanie hasła do Twojego konta. Kliknij przycisk poniżej, aby zresetować hasło.
    </p>
    <div style="text-align: center; margin: 30px 0;">
        <a href="{{ url('resetuj-haslo/' . $token) }}" style="background-color: #3490dc; color: #ffffff; padding: 15px 30px; text-decoration: none; border-radius: 4px; font-size: 16px;">Resetuj Hasło</a>
    </div>
    <p style="font-size: 16px; color: #555555;">
        Jeśli nie prosiłeś o zresetowanie hasła, zignoruj ten e-mail.
    </p>
    <p style="font-size: 16px; color: #aaaaaa;">
        Dziękujemy,<br>
        Zespół
    </p>
</div>
</body>
</html>
