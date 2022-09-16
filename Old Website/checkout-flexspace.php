<<<<<<< HEAD
<?php
// retrieve product name
if (isset($_GET['submit'])) {
    $productName = $_REQUEST['productName'];
}

// pricing
if ($productName === 'Virtual Office') {
    $priceGross = 3700000;
    $subtotal = 3363636;
    $productCode = 'VO';
} elseif ($productName === 'Virtual Office & Company Establishment (PT)') {
    $priceGross = 10900000;
    $subtotal = 9909091;
    $productCode = 'VOPT';
} elseif ($productName === 'Virtual Office & Company Establishment (CV)') {
    $priceGross = 8900000;
    $subtotal = 8090909;
    $productCode = 'VOCV';
} elseif ($productName === 'Flex Space') {
    $priceGross = 0;
    $subtotal = 0;
    $productCode = 'FS';
}

// date for trsId
date_default_timezone_set("Asia/Jakarta");

// transaction id
$transactionId = $productCode . '-' . date("mds") . mt_rand(10, 99);

$tax = $priceGross - $subtotal;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPAZE | Checkout</title>

    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- favicon -->
    <link rel="shortcut icon" href="assets/img/spaze-logo.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="assets/img/spaze-logo.png">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&family=Quicksand:wght@300;400;500;600;700&display=swap">

    <!-- Vendor CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/vendor/aos/aos.css">
    <link rel="stylesheet" href="assets/vendor/remixicon/remixicon.css">

    <script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- midtrans things -->
    <!-- <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-4vrwRDkuGUZtU4iO"></script> -->
    <script src="https://app.midtrans.com/snap/snap.js" data-client-key="Mid-client-DsRzWSOi58B13U3D"></script>

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/checkout.css">
</head>

<body>

    <header class="header pt-4 pb-3">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center me-2">
                <img src="assets/img/spaze-logo-white.png" alt="SPAZE" class="pt-1">
            </a>

            <h1 class="h2">Buy Now <i class="ri ri-shopping-cart-2-line"></i></h1>
        </div>
    </header>

    <div class="container main-container">
        <div class="row justify-content-between gap-4">
            <section class="col-md-7">
                <div class="card py-2 px-3">
                    <div class="card-body">
                        <header class="section-header d-flex justify-content-between align-items-center">
                            <h2 class="h5"><i class="ri ri-contacts-line me-2"></i> Customer Details</h2>
                        </header>

                        <hr class="mt-0">

                        <form method="post">

                            <!-- hidden form -->
                            <input type="hidden" id="transactionId" name="transactionId" value="<?= $transactionId ?>">
                            <!-- <input type="hidden" id="location" name="location" value="Spaze Grogol"> -->

                            <div class="row mb-4">
                                <div class="col-sm-12 col-md-6">
                                    <label for="fName" class="form-label">First Name*</label>
                                    <input type="text" name="fName" id="fName" class="form-control" placeholder="your first name...">
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label for="lName" class="form-label">Last Name*</label>
                                    <input type="text" name="lName" id="lName" class="form-control" placeholder="your last name...">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-sm-12 col-md-6">
                                    <label for="email" class="form-label">Email*</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="example@mail.com">
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label for="phoneNumber" class="form-label">Phone Number*</label>
                                    <input type="tel" name="phoneNumber" id="phoneNumber" class="form-control" aria-describedby="phoneHelp" placeholder="+62 -">
                                    <div class="form-text" id="phoneHelp">Make sure it is connected to WhatsApp</div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="address" class="form-label">Address</label>
                                <input name="address" id="address" class="form-control" style="resize: none;" placeholder="Jl. Gatot Subroto no. 32">
                            </div>

                            <div class="row mb-4">
                                <div class="col-sm-12 col-md-6">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" name="city" id="city" class="form-control" placeholder="Jakarta Selatan">
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label for="state" class="form-label">State</label>
                                    <input type="text" name="state" id="state" class="form-control" placeholder="DKI Jakarta">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-sm-12 col-md-6">
                                    <label for="zip" class="form-label">ZIP Code</label>
                                    <input type="text" name="zip" id="zip" class="form-control" placeholder="15111">
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label for="country" class="form-label">Country</label>
                                    <input type="text" name="country" id="country" class="form-control" placeholder="Indonesia">
                                </div>
                            </div>
                    </div>
                </div>
            </section>

            <section class="col mb-3">
                <div class="card py-2 px-2">
                    <div class="card-body">
                        <h2 class="card-title h5"><i class="ri ri-shopping-basket-line mr-2"></i> Product Details</h2>

                        <hr class="mt-0">

                        <select name="productName" id="productName" class="form-select mb-3">
                            <option value="">-- Select Flex Space Services --</option>
                            <option value="Flexible Workspace">Flexible Workspace</option>
                            <option value="Meeting Room">Meeting Room</option>
                            <option value="Livestreaming Studio">Livestreaming Studio</option>
                        </select>

                        <div class="">
                            <select name="location" id="location" class="form-select w-100 mb-3" required>
                                <option hidden selected>-- Choose Location --</option>
                                <option value="Spaze Grogol">Spaze Grogol</option>
                                <option value="Spaze Permata Hijau">Spaze Permata Hijau</option>
                                <option value="Spaze Tanah Abang">Spaze Tanah Abang</option>
                            </select>

                            <select name="terms" id="terms" class="form-select w-100" onchange="changePrice();" required>
                                <option value="">-- Choose Terms --</option>
                                <option value="1 Hour">1 Hour</option>
                                <option value="10 Hours">10 Hours</option>
                                <option value="30 Hours">30 Hours</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="my-3 row g-1">
                    <div class="col-9">
                        <input type="text" name="promoCode" id="promoCode" class="form-control" placeholder="Promo Code">
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary w-100">Apply</button>
                    </div>
                </div>

                <div class="card mt-3 p-2 mb-3">
                    <div class="card-body">
                        <header class="section-header d-flex justify-content-between align-items-center">
                            <h2 class="h5"><i class="ri ri-bill-line mr-2"></i> Summary</h2>
                        </header>

                        <hr class="mt-0 mb-1">

                        <div class=" row mb-1">
                            <label for="subtotal" class="col-form-label small-label col-4">Subtotal</label>
                            <div class="col-8">
                                <input type="text" name="subtotal" id="subtotal" readonly class="form-control-plaintext text-end rupiah">
                            </div>
                        </div>

                        <div class="row mb-1">
                            <label for="discount" class="col-form-label small-label col-4">Discount</label>
                            <div class="col-8">
                                <input type="text" name="discount" id="discount" readonly class="form-control-plaintext text-end rupiah">
                            </div>
                        </div>

                        <div class="row">
                            <label for="tax" class="col-form-label small-label col-4">Tax (11%)</label>
                            <div class="col-8">
                                <input type="text" name="tax" id="tax" readonly class="form-control-plaintext text-end rupiah">
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <label for="priceGross" class="col-form-label fw-bold col-3">Total</label>
                            <div class="col-9">
                                <input type="text" id="priceGrossDisplay" readonly class="form-control-plaintext form-control-lg text-end fw-bold rupiah">
                                <input type="hidden" name="priceGross" id="priceGross">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button class="btn-primary btn" name="submit" type="button" id="submit-form">Procceed to Payment</button>
                    <button class="btn btn-secondary">Cancel</button>
                </div>
                </form>
            </section>
        </div>

        <!-- faq -->
        <?php include 'includes/faq.html'; ?>
    </div>

    <!-- Modal TAC -->
    <?php include 'includes/tnc.html'; ?>



    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="includes/payment.js"></script>


    <script>
        // change price function
        function changePrice() {
            let terms = $("#terms :selected").text();
            let subtotal
            let priceGross

            if (terms == "1 Hour") {
                subtotal = 150000;
                priceGross = 166500;
            } else if (terms == "10 Hours") {
                subtotal = 1200000;
                priceGross = 1332000;
            } else if (terms == "30 Hours") {
                subtotal = 3000000;
                priceGross = 3330000;
            } else {
                subtotal = 0;
                priceGross = 0;
            }

            $("#subtotal").val(subtotal);
            $("#priceGross").val(priceGross);
            $("#priceGrossDisplay").val(priceGross);
            $("#tax").val(priceGross - subtotal);
        }
        // autonumeric
        const autoNumericRupiah = {
            currencySymbol: 'Rp ',
            decimalPlaces: '0',
            decimalCharacter: ',',
            digitGroupSeparator: '.',
            watchExternalChanges: true,
            unformatOnSubmit: true
        }
        new AutoNumeric.multiple('.rupiah', autoNumericRupiah);
    </script>

</body>

=======
<?php
// retrieve product name
if (isset($_GET['submit'])) {
    $productName = $_REQUEST['productName'];
}

// pricing
if ($productName === 'Virtual Office') {
    $priceGross = 3700000;
    $subtotal = 3363636;
    $productCode = 'VO';
} elseif ($productName === 'Virtual Office & Company Establishment (PT)') {
    $priceGross = 10900000;
    $subtotal = 9909091;
    $productCode = 'VOPT';
} elseif ($productName === 'Virtual Office & Company Establishment (CV)') {
    $priceGross = 8900000;
    $subtotal = 8090909;
    $productCode = 'VOCV';
} elseif ($productName === 'Flex Space') {
    $priceGross = 0;
    $subtotal = 0;
    $productCode = 'FS';
}

// date for trsId
date_default_timezone_set("Asia/Jakarta");

// transaction id
$transactionId = $productCode . '-' . date("mds") . mt_rand(10, 99);

$tax = $priceGross - $subtotal;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPAZE | Checkout</title>

    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- favicon -->
    <link rel="shortcut icon" href="assets/img/spaze-logo.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="assets/img/spaze-logo.png">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&family=Quicksand:wght@300;400;500;600;700&display=swap">

    <!-- Vendor CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/vendor/aos/aos.css">
    <link rel="stylesheet" href="assets/vendor/remixicon/remixicon.css">

    <script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- midtrans things -->
    <!-- <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-4vrwRDkuGUZtU4iO"></script> -->
    <script src="https://app.midtrans.com/snap/snap.js" data-client-key="Mid-client-DsRzWSOi58B13U3D"></script>

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/checkout.css">
</head>

<body>

    <header class="header pt-4 pb-3">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center me-2">
                <img src="assets/img/spaze-logo-white.png" alt="SPAZE" class="pt-1">
            </a>

            <h1 class="h2">Buy Now <i class="ri ri-shopping-cart-2-line"></i></h1>
        </div>
    </header>

    <div class="container main-container">
        <div class="row justify-content-between gap-4">
            <section class="col-md-7">
                <div class="card py-2 px-3">
                    <div class="card-body">
                        <header class="section-header d-flex justify-content-between align-items-center">
                            <h2 class="h5"><i class="ri ri-contacts-line me-2"></i> Customer Details</h2>
                        </header>

                        <hr class="mt-0">

                        <form method="post">

                            <!-- hidden form -->
                            <input type="hidden" id="transactionId" name="transactionId" value="<?= $transactionId ?>">
                            <!-- <input type="hidden" id="location" name="location" value="Spaze Grogol"> -->

                            <div class="row mb-4">
                                <div class="col-sm-12 col-md-6">
                                    <label for="fName" class="form-label">First Name*</label>
                                    <input type="text" name="fName" id="fName" class="form-control" placeholder="your first name...">
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label for="lName" class="form-label">Last Name*</label>
                                    <input type="text" name="lName" id="lName" class="form-control" placeholder="your last name...">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-sm-12 col-md-6">
                                    <label for="email" class="form-label">Email*</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="example@mail.com">
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label for="phoneNumber" class="form-label">Phone Number*</label>
                                    <input type="tel" name="phoneNumber" id="phoneNumber" class="form-control" aria-describedby="phoneHelp" placeholder="+62 -">
                                    <div class="form-text" id="phoneHelp">Make sure it is connected to WhatsApp</div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="address" class="form-label">Address</label>
                                <input name="address" id="address" class="form-control" style="resize: none;" placeholder="Jl. Gatot Subroto no. 32">
                            </div>

                            <div class="row mb-4">
                                <div class="col-sm-12 col-md-6">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" name="city" id="city" class="form-control" placeholder="Jakarta Selatan">
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label for="state" class="form-label">State</label>
                                    <input type="text" name="state" id="state" class="form-control" placeholder="DKI Jakarta">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-sm-12 col-md-6">
                                    <label for="zip" class="form-label">ZIP Code</label>
                                    <input type="text" name="zip" id="zip" class="form-control" placeholder="15111">
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label for="country" class="form-label">Country</label>
                                    <input type="text" name="country" id="country" class="form-control" placeholder="Indonesia">
                                </div>
                            </div>
                    </div>
                </div>
            </section>

            <section class="col mb-3">
                <div class="card py-2 px-2">
                    <div class="card-body">
                        <h2 class="card-title h5"><i class="ri ri-shopping-basket-line mr-2"></i> Product Details</h2>

                        <hr class="mt-0">

                        <select name="productName" id="productName" class="form-select mb-3">
                            <option value="">-- Select Flex Space Services --</option>
                            <option value="Flexible Workspace">Flexible Workspace</option>
                            <option value="Meeting Room">Meeting Room</option>
                            <option value="Livestreaming Studio">Livestreaming Studio</option>
                        </select>

                        <div class="">
                            <select name="location" id="location" class="form-select w-100 mb-3" required>
                                <option hidden selected>-- Choose Location --</option>
                                <option value="Spaze Grogol">Spaze Grogol</option>
                                <option value="Spaze Permata Hijau">Spaze Permata Hijau</option>
                                <option value="Spaze Tanah Abang">Spaze Tanah Abang</option>
                            </select>

                            <select name="terms" id="terms" class="form-select w-100" onchange="changePrice();" required>
                                <option value="">-- Choose Terms --</option>
                                <option value="1 Hour">1 Hour</option>
                                <option value="10 Hours">10 Hours</option>
                                <option value="30 Hours">30 Hours</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="my-3 row g-1">
                    <div class="col-9">
                        <input type="text" name="promoCode" id="promoCode" class="form-control" placeholder="Promo Code">
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary w-100">Apply</button>
                    </div>
                </div>

                <div class="card mt-3 p-2 mb-3">
                    <div class="card-body">
                        <header class="section-header d-flex justify-content-between align-items-center">
                            <h2 class="h5"><i class="ri ri-bill-line mr-2"></i> Summary</h2>
                        </header>

                        <hr class="mt-0 mb-1">

                        <div class=" row mb-1">
                            <label for="subtotal" class="col-form-label small-label col-4">Subtotal</label>
                            <div class="col-8">
                                <input type="text" name="subtotal" id="subtotal" readonly class="form-control-plaintext text-end rupiah">
                            </div>
                        </div>

                        <div class="row mb-1">
                            <label for="discount" class="col-form-label small-label col-4">Discount</label>
                            <div class="col-8">
                                <input type="text" name="discount" id="discount" readonly class="form-control-plaintext text-end rupiah">
                            </div>
                        </div>

                        <div class="row">
                            <label for="tax" class="col-form-label small-label col-4">Tax (11%)</label>
                            <div class="col-8">
                                <input type="text" name="tax" id="tax" readonly class="form-control-plaintext text-end rupiah">
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <label for="priceGross" class="col-form-label fw-bold col-3">Total</label>
                            <div class="col-9">
                                <input type="text" id="priceGrossDisplay" readonly class="form-control-plaintext form-control-lg text-end fw-bold rupiah">
                                <input type="hidden" name="priceGross" id="priceGross">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button class="btn-primary btn" name="submit" type="button" id="submit-form">Procceed to Payment</button>
                    <button class="btn btn-secondary">Cancel</button>
                </div>
                </form>
            </section>
        </div>

        <!-- faq -->
        <?php include 'includes/faq.html'; ?>
    </div>

    <!-- Modal TAC -->
    <?php include 'includes/tnc.html'; ?>



    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="includes/payment.js"></script>


    <script>
        // change price function
        function changePrice() {
            let terms = $("#terms :selected").text();
            let subtotal
            let priceGross

            if (terms == "1 Hour") {
                subtotal = 150000;
                priceGross = 166500;
            } else if (terms == "10 Hours") {
                subtotal = 1200000;
                priceGross = 1332000;
            } else if (terms == "30 Hours") {
                subtotal = 3000000;
                priceGross = 3330000;
            } else {
                subtotal = 0;
                priceGross = 0;
            }

            $("#subtotal").val(subtotal);
            $("#priceGross").val(priceGross);
            $("#priceGrossDisplay").val(priceGross);
            $("#tax").val(priceGross - subtotal);
        }
        // autonumeric
        const autoNumericRupiah = {
            currencySymbol: 'Rp ',
            decimalPlaces: '0',
            decimalCharacter: ',',
            digitGroupSeparator: '.',
            watchExternalChanges: true,
            unformatOnSubmit: true
        }
        new AutoNumeric.multiple('.rupiah', autoNumericRupiah);
    </script>

</body>

>>>>>>> 74fb2cee (update)
</html>