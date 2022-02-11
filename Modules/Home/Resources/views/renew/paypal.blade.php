<!DOCTYPE html>
<html lang="en">
  <head>
    <title>{{ systemInformation()->name }} :: Pay Renew Fee</title>
    <link rel="icon" href="{{ url('public/system-images/icons/'.systemInformation()->icon) }}" type="image/png">
  </head>

  <body>
    <div id="smart-button-container" style="padding-top: 150px;">
      <div style="text-align: center;">
        <div id="paypal-button-container"></div>
      </div>
    </div>
    <script src="{{url('public/lte')}}/plugins/jquery/jquery.min.js"></script>
     <script src="https://www.paypal.com/sdk/js?client-id=AZrf8sFEVrO1j3EEajbl7KsaqYPeEflaUGtgU6B4NXBrolPeoPV0S5AJunpeCmg5XGib5ZeMmSZqKH-L&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
    <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'pill',
          color: 'gold',
          layout: 'horizontal',
          label: 'pay',
        },

        createOrder: function(data, actions) {
         return actions.order.create({
            purchase_units: [{"description":"Renew fee","amount":{"currency_code":"USD","value":30}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            $.ajax({
              url: "{{ url('registration-fee-success') }}",
              type: 'POST',
              data: {_token: "{{ csrf_token() }}", info: orderData},
            })
            .done(function(response) {
              if(response.success){
                window.open("{{ url('profile') }}", "_parent");
              }else{
                location.reload();
              }
            })
            .fail(function() {
              location.reload();
            });
          });
        },

        onError: function(err) {
          location.reload();
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
    </script>
  </body>
</html>



