@component('mail::message')
# New Order contacts data

@foreach($data as $key => $value)
@if(is_array($value))
@foreach($value as  $subKey =>$subValue)
    @if(is_array($subValue))
        @foreach($subValue as $item)
            {{$item}}
        @endforeach    
    @else
    {{ $subKey }} => {{ $subValue }}<br>
    @endif
@endforeach
@else
{{ $key }} => {{$value}}<br>
@endif
@endforeach

{{--@component('mail::button', ['url' => ''])--}}
{{--Button Text--}}
{{--@endcomponent--}}

Thanks, for order<br>
{{ config('app.name') }}
@endcomponent
