@component('mail::message')
# Your order has been confirmed

Hi Sajjad, <br>
Your order OID19584522 has been placed. <br>
You will be updated with another mail after your item(s) has been shipped.

@component('mail::button', ['url' => ''])
Order Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
