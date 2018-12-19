@component('mail::message')



![logo](http://metalbit.co/core/img/AzulMetalicoHor.png)


##Utiliza estas credenciales para acceder a METALBIT##

@component('mail::table')
    | Usuario | Contraseña |
    |:--------|:----------|
    | {{$user->email}} | {{$password}} |
@endcomponent

@component('mail::button', ['url' => url('login').'?id='.urlencode($user->email)])
Login
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
