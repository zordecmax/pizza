@component('mail::message')
# New Order on Pizza.com.md

Delivery time: {{$data['delivered']}}<br>
<table style="width: 100%">
    @foreach($data['items'] as  $item)
        <tr>
            <td>{{$item['name']}}</td>
            <td>{{$item['price']}} Mdl</td>
            <td>{{$item['qty']}}</td>
            <td>{{$item['qty'] * $item['price']}} Mdl</td>
            <td><img src="{{$item['image']}}" width="150"> </td>
        </tr>
    @endforeach
    <tr>
        <td colspan="5"><strong>Total:</strong> {{$data['bill2']}} Mdl</td>
    </tr>

</table>


# Your contact info:
Your name: {{$data['name']}}<br>
Your phone: {{$data['phone']}}<br>
Your email: {{$data['email']}}<br>
Your comment: {{$data['comment']}}<br>
{{--@component('mail::button', ['url' => ''])--}}
{{--Button Text--}}
{{--@endcomponent--}}

Thanks, for order<br>
{{ config('app.name') }}
@endcomponent
