$(document).ready(function () {
    $("#submit-form").click(function () {
        $("#submit-form").attr('disabled', 'disabled');

        let transactionId = $('#transactionId').val();
        let fName = $('#fName').val();
        let lName = $('#lName').val();
        let email = $('#email').val();
        let phoneNumber = $('#phoneNumber').val();
        let address = $('#address').val();
        let city = $('#city').val();
        let state = $('#state').val();
        let zip = $('#zip').val();
        let country = $('#country').val();
        let productName = $('#productName').val();
        let location = $('#location').val();
        let terms = $('#terms').val();
        let promoCode = $('#promoCode').val();
        let priceGross = parseInt($('#priceGross').val());

        if (transactionId != '' && fName != '' && lName != '' && email != '' && phoneNumber != '' &&
            productName != '' && location != '' && terms != '' && priceGross != '') {
            $.ajax({
                type: "POST",
                url: "includes/customer-data.php",
                data: {
                    transactionId: transactionId,
                    fName: fName,
                    lName: lName,
                    email: email,
                    phoneNumber: phoneNumber,
                    address: address,
                    city: city,
                    state: state,
                    zip: zip,
                    country: country,
                    productName: productName,
                    location: location,
                    terms: terms,
                    promoCode: promoCode,
                    priceGross: priceGross
                },
                cache: false,
                success: function (responses) {
                    console.log(responses)
                    $("#tacModal").modal('show');
                    $("#submit-form").removeAttr('disabled');

                    // pay button midtrans
                    $("#pay-button").click(function () {
                        window.snap.pay(responses);
                    });
                },
                error: function (xhr, status, error) {
                    console.error(xhr);
                }

            });
        } else {
            alert('Please fill up the forms!');
            $('#submit-form').removeAttr('disabled');
        }
    });
});

$(document).ready(function() {
    $("#applyPromo").click(function() {
        let productName = $("#productName").val();
        let promoCode = $("#promoCode").val();
        let subtotal = $("#subtotal");
        let discount = $("#discount");
        let tax = $("#tax");
        let total = $("#priceGrossDisplay");
        let priceGross = $("#priceGross");

        if (productName === "Virtual Office & Company Establishment (PT)" && promoCode == "BERANIBERBISNIS") {
            discount.val("Rp 818.182");
            tax.val("Rp 909.091");
            total.val("Rp 10.000.000");
            priceGross.val(10000000);
        } else if (productName === "Virtual Office & Company Establishment (CV)" && promoCode == "BERANIBERBISNIS") {
            discount.val("Rp 363.636");
            tax.val("Rp 772.727");
            total.val("Rp 8.500.000");
            priceGross.val(8500000);
        }
    });
});