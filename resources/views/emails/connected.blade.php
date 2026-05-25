@component('mail::message')
{{ ( date('H') > 18 ) ? 'Bonjour' : 'Bonsoir'}} Mr {{ $client->prenom }} {{ $client->nom }},

Quelqu'un Vient de se connecté à votre compte.
Si cela est bien vous ignorez ce mail, dans le cas contraire veillez 
changer votre mot de passe au plus vite en cliquant sur le boutton 
ci-dessous.

@component('mail::button', ['url' => $url, 'color' => 'success'])
Changer le mot de passe
@endcomponent

Nous seront ravi de vous accueillir dans l'un de nos merveilleux restaurant, Merci.<br>
<strong>{{ config('app.name') }}</strong>
@endcomponent