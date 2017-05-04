@component('mail::message')

# Hello, {{ $user->username }}

The body of your message.

<ul>
  <li>1 / ...</li>
  <li>2 / ...</li>
  <li>3 / ...</li>
</ul>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
