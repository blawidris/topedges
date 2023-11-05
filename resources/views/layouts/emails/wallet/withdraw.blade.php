<body>
    <h4>Dear {{ $data['name'] }}</h4>,
    <p>Your request to withdraw ${{ $data['price_amount'] }} has been recieved.</p>
    <p>We are currently reviewing your request. This usally takes up to 30 mins, but can take up to 3 business days in
        some cases. Once review is complete, we'll email you with further details.</p>

    <p>If you have any questions, <a href="{{config('app.url')}}/contact" style="color:red; font-size:14px;">contact us</a></p>
    <p>Your order ID is {{$data['order_id']}}</p>

    <h4 style="margin-bottom: 5px;">Thank you</h4>
    <p style="font-size: 13px;color:rgb(1, 1, 66);">The {{config('app.name')}} Team</p>
</body>
