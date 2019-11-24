@component('mail::message')
# Your order has been confirmed

Dear Customer, <br>
Your order {{ $order->order_number }} has been placed. <br>
Total payable amount is Tk {{ $order->total_price }} .<br>
You will be updated with another mail after your item(s) has been shipped.

@component('mail::button', ['url' => route('payment',[$order->customer_id,$order->id])])
Make Payment
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
