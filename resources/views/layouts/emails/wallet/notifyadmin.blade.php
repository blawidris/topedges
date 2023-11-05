@component('mail::message')

Dear Elisa,

I hope this message finds you well. I am writing to inform you that we have received a request from a user to deposit payment to their account. Below, you will find the details of the request:

User Name: {{ucfirst($trans->user->f_name)}} {{ucfirst($trans->user->l_name)}} <br>
Request Type: {{$trans->type}} <br>
Amount: ${{$trans->price_amount}} <br>
Date of Request: {{date("d-M-Y",strtotime($trans->created_at))}}

We have reviewed the request and found it to be in accordance with our policies and guidelines.

Please take the necessary actions to process this request as soon as possible. If you require any additional information or if there are any concerns or questions regarding this request, please do not hesitate to contact me at [Your Contact Information].

Thank you for your prompt attention to this matter. We appreciate your dedication to ensuring our users' transactions are handled efficiently.

Best regards, <br>
Elisa Magret <br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
