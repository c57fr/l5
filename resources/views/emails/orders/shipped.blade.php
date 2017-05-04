@component('mail::message')
# Introduction

Your order has been shipped!

@component('mail::button', ['url' => $url])
View Order
@endcomponent

Next Steps:

- Track Your Order On Our Website
- Pre-Sign For Delivery


Thanks,<br>
{{ config('app.name') }}
@endcomponent
