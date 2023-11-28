<div>
    <h5>Dear {{ Auth::user()->f_name . ' ' . Auth::user()->l_name }}</h5>
    <p>
        We are writing to inform you that your recent deposit of [amount] failed to process.
    </p>
    <p>
        We apologize for any inconvenience this may cause.
    </p>
    <p>
        To resolve this issue, please contact our customer support team using the live chat feature on our website. Our
        team will be able to assist you in completing your deposit.
    </p>
    <p>
        Please click on the following link to access our live chat: [live chat link]
    </p>
        Thank you for your understanding.
    </p>
    <h6>Sincerely,</h6>
    <span>The {{ config('app.name') }} Team</span>
</div>
