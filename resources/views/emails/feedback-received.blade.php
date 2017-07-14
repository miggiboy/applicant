@component('mail::message')
# Новое письмо через форму обратной связи

## От: {{ $senderName }} <br>
## Контактные данные: {{ $senderMailOrPhone }}<br><br>
---------------------------------------------
{{ $feedbackBody }}

Отправлено:

{{-- @component('mail::button', ['url' => ''])
Пометить как прочитанное
@endcomponent --}}

{{ config('app.name') }}, 2017
@endcomponent
