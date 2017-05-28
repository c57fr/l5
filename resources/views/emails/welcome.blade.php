@component('mail::message')

# Hello, {{ $user->username }}

The body of your message.

- 1 / ...
- 2 / ...
- 3 / ...

@component('mail::button', ['url' => 'http://c57.fr'])
c57.fr
@endcomponent


@component('mail::panel', ['url' => ''])
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores at facere, impedit ipsa similique tempore veritatis. Architecto commodi cumque, doloremque exercitationem facere natus nostrum perspiciatis quidem quis, quo temporibus, ullam?
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
