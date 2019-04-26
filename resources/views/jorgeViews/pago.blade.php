@extends('base')
@section('content')

        <div class="row">
            <div class="col m7 s9 offset-m2">
                <div class="card grey lighten-3" style="color: black; margin-top: 10px" align="center">
                    <p class="card-title">Ya casi!</p>
                    <p class="card-content">Estás a un paso de terminar con tu compra!</p><br>
                    <hr>
                    <br>
                    <p>Haz clic en el botón de PayPal para continuar con tu compra</p>
                    <p class="lead">
                    <div id="paypal-button-container"></div>
                    </p>
                </div>
            </div>
        </div><br><br><br><br><br>
    @endsection

        @section('js')
    <script>
        paypal.Button.render({
            // Set your environment
            env: 'sandbox', // sandbox | production
            // Specify the style of the button
            style: {
                label: 'checkout',  // checkout | credit | pay | buynow | generic
                size:  'small', // small | medium | large | responsive
                shape: 'rect',   // pill | rect
                color: 'black'   // gold | blue | silver | black
            },
            // PayPal Client IDs - replace with your own
            // Create a PayPal app: https://developer.paypal.com/developer/applications/create
            client: {
                sandbox:    'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',
                production: '<insert production client id>'
            },
            // Wait for the PayPal button to be clicked
            payment: function(data, actions) {
                return actions.payment.create({
                    payment: {
                        transactions: [
                            {
                                amount: {
                                    total: '{{$subtotal}}',
                                    currency: 'MXN'
                                }
                            }
                        ]
                    },
                    description: 'Id de cliente: '+'{{$cliente}}',

                });
            },
            // Wait for the payment to be authorized by the customer
            onAuthorize: function(data, actions) {
                return actions.payment.execute().then(function() {
                    alert('Gracias por tus compra!');
                    location.href = '{{url('generarPedido')}}';
                });
            }
        }, '#paypal-button-container');
    </script>
            @endsection

