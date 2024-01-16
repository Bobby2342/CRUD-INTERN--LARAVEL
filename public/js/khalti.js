
        var config = {
            // replace the publicKey with yours
            "publicKey":"{{config('app.khalti_public_key')}}",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
                ],
            "eventHandler": {
                onSuccess (payload) {
                 $.ajax({
                        type: "POST",
                        url: "{{route('verifyPayment')}}",
                        data: {
                            'amount' :  1000,
                            'token' :  payload_token,
                            '_token' : "{{csrf_token()}}",

                        },
                        dataType: "dataType",
                        success: function (response) {

                        },
                        success:function(res){
                            console.log(res);
                        },

                        error:function(res){
                            console.log(res);
                        }
                    });

                    console.log(payload);
                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function () {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            checkout.show({amount: 1000});
        }

