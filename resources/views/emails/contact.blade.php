@component('mail::message')
# @lang('pages.contact.titel', ['name' => $name]) <br>
@lang('pages.contact.from') {{ $name }} <br>
@lang('pages.contact.client_email') {{ $email }} <br>

@lang('pages.contact.message') <br>
{{ $message }}
@endcomponent
