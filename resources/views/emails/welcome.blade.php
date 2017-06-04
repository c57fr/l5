@component('mail::message')

# Bienvenue, {{ $user->username }} !


Ce site est ton site...

- 1 / Tout y est modifiable selon tes souhaits
- 2 / En utilisant la puissance de Git.


@component('mail::button', ['url' => 'http://c57.fr'])
c57.fr
@endcomponent


@component('mail::panel', ['url' => ''])
Encore bienvenue dans l'équipe C57.fr
@endcomponent


@Bi1tô,<br><br>
{{ config('app.name') }}
@endcomponent
