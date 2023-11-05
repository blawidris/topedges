@component('mail::message')

Dear {{ucfirst($trans->user->f_name)}},

We are pleased to inform you that your payment has been successfully approved.

Payment Details:
- Payment Amount: {{$trans->price_amount}}
- Payment Date: {{date("j M, Y",($trans->created_at))}}
- Transaction ID: {{$trans->order_id}}
- Payment Method: {{$trans->pay_address}}

This approval ensures that your transaction has been processed, and your payment is now complete. If you have any questions or require further assistance, please do not hesitate to reach out to our customer support team at [Customer Support Email] or [Customer Support Phone Number]. We are here to help.

Thank you for choosing [Your Company Name]. We appreciate your business and look forward to serving you in the future.

Best regards,

[Your Name]
[Your Title]
[Your Company Name]
[Your Contact Information]
Thanks,<br>
{{ config('app.name') }}
@endcomponent
