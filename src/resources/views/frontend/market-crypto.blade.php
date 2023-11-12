@extends('layouts.frontend')
@section('content')
<div class="container-fluid mtb15">
    <div class="row">
      <div class="col-md-12">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
          <div class="tradingview-widget-container__widget"></div>
          <script src="https://embed.tawk.to/_s/v4/app/630c16bea60/js/twk-main.js" charset="UTF-8" crossorigin="*"></script><script src="https://embed.tawk.to/_s/v4/app/630c16bea60/js/twk-vendor.js" charset="UTF-8" crossorigin="*"></script><script src="https://embed.tawk.to/_s/v4/app/630c16bea60/js/twk-chunk-vendors.js" charset="UTF-8" crossorigin="*"></script><script src="https://embed.tawk.to/_s/v4/app/630c16bea60/js/twk-chunk-common.js" charset="UTF-8" crossorigin="*"></script><script src="https://embed.tawk.to/_s/v4/app/630c16bea60/js/twk-runtime.js" charset="UTF-8" crossorigin="*"></script><script src="https://embed.tawk.to/_s/v4/app/630c16bea60/js/twk-app.js" charset="UTF-8" crossorigin="*"></script><script async="" src="https://embed.tawk.to/62eb883437898912e9612e48/1g9k0o42k" charset="UTF-8" crossorigin="*"></script><script type="text/javascript" src="/tradingview/external-embedding/embed-widget-screener.js" async="">
              {
                "width": "100%",
                  "height": 900,
                    "defaultColumn": "overview",
                      "screener_type": "crypto_mkt",
                        "displayCurrency": "BTC",
                          "colorTheme": "dark",
                            "locale": "en"
              }
            </script>
        </div>
        <!-- TradingView Widget END -->
      </div>
    </div>
  </div>
@endsection