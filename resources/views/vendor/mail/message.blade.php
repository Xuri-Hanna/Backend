@component('mail::message')
# Tiêu đề Email

Nội dung email ở đây.

@component('mail::button', ['url' => 'https://yourwebsite.com'])
Bấm vào đây
@endcomponent

Cảm ơn bạn,<br>
{{ config('app.name') }}
@endcomponent
