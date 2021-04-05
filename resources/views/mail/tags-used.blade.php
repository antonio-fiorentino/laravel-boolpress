@component('mail::message')
# Nuovi tag usati!

i nuovi tag
@foreach ($tags as $tag)
* {{$tag->name}}
@endforeach

@component('mail::button', ['url' => ''])
premimi
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
