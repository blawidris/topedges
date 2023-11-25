@component('mail::message')
Dear Admin,

This is to inform you that you have a new user onboard.

Find below his details:

Name: {{ucfirst($user->f_name)}} {{ucfirst($user->l_name)}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
