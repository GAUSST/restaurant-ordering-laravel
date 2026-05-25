@component('mail::message')
Cher {{ $client->prenom }} {{ $client->nom }},

{{ config('app.name') }} vous remerçie pour votre inscription sur notre site web.
Noter que vous pouver retourner sur votre compte en cliquant sur ce boutton si-dessous.

@component('mail::button', ['url' => $url, 'color' => 'success'])
Retourner sur votre compte
@endcomponent

Nous seront ravi de vous avoir dans l'un de nos merveilleux restaurant bientôt, Merci.<br>
<strong>{{ config('app.name') }}</strong>
@endcomponent
