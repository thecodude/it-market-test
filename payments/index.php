<?php
namespace Thecodude;

require_once "Config.php";

$productCode = $_POST['product_code'];

$Config = new Config();

$productDetail = $Config->productDetail();

$itemName  = $productDetail[ $productCode ]["itemName"];
$itemPrice = $productDetail[ $productCode ]["itemPrice"];


?>
<html>
<head>
    <title>IT Market 24</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Professional IT Company">
    <meta name="author" content="IT Market 24">
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/style.css"/>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div id="header">
    <div id="logo">
        <img src="../assets/images/head2.png" alt="itmarket24.com" style="width:100%;height:120px">
        <div id="logo_text">
            <h1><span class="logo_colour">Welcome to It-Market 24</span></a></h1>
            <h2>
                <marquee behavior="scroll" direction="left">Find.... Buy...or Order....</marquee>
            </h2>
        </div>
    </div>


    <nav id="menubar" class="navbar navbar-expand-lg navbar-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul id="menu" class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../service.html">Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../previous-work.html">Previous Work</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../about-us.html">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../contact-us.html">Contact Us</a>
                </li>
            </ul>
        </div>
    </nav>

</div>

<div id="formContainer">
    <div class="product-row">
        <p class="product"><?php echo $itemName; ?></p>
        <div class="price float-right"><strong>Total:</strong> <?php echo $itemPrice; ?><?php echo Config::CURRENCY; ?>
        </div>
    </div>
    <form id="paymentForm" novalidate method="post"
          action="payment.php">
        <input type="hidden" id="itemNumber" name="itemNumber"
               value="<?php echo $productCode; ?>"/> <input
                type="hidden" id="itemPrice" name="itemPrice"
                value="<?php echo $itemPrice; ?>"/> <input
                type="hidden" id="seller_id"
                value="<?php echo Config::SELLER_ID; ?>"/> <input
                type="hidden" id="publishable_key"
                value="<?php echo Config::PUBLISHABLE_KEY; ?>"/>
        <div class="field-row col2 float-left">
            <label>Card Holder Name</label> <input type="text"
                                                   class="demoInputBox required" name="cardHolderName"
                                                   id="cardHolderName">
        </div>
        <div class="field-row col2 float-right">
            <label>Email</label> <input type="email"
                                        class="demoInputBox required" name="cardHolderEmail"
                                        id="cardHolderEmail">
        </div>
        <div class="field-row">
            <label>Card Number</label> <input type="text"
                                              class="demoInputBox required" name="cardNumber"
                                              id="cardNumber">
        </div>

        <div class="field-row col2 float-left">
            <label>Card Expiry Month / Year</label> <br/> <select
                    name="expiryMonth" id="expiryMonth"
                    class="demoSelectBox required">
				<?php
				$months = Config::monthArray();
				$count  = count( $months );
				for ( $i = 0; $i < $count; $i ++ ) {
					$monthValue = $i + 1;
					if ( strlen( $i ) < 2 ) {
						$monthValue = "0" . $monthValue;
					}
					?>
                    <option
                            value="<?php echo $monthValue; ?>"><?php echo $months[ $i ]; ?></option>
					<?php
				}
				?>
            </select> <select name="expiryYear"
                              id="expiryYear" class="demoSelectBox required">
				<?php
				for ( $i = date( "Y" ); $i <= 2030; $i ++ ) {
					$yearValue = substr( $i, 2 );
					?>
                    <option
                            value="<?php echo $yearValue; ?>"><?php echo $i; ?></option>
					<?php
				}
				?>
            </select>
        </div>
        <div class="field-row">
            <label>CVV</label><br/>
            <input type="text" name="cvv" id="cvv"
                   class="demoInputBox cvv-input required">
        </div>

        <p class="sub-head">Billing Address:</p>
        <div class="field-row col2 float-left">
            <label>Address Line1</label> <input type="text"
                                                class="demoInputBox required" name="addressLine1"
                                                id="addressLine1">
        </div>
        <div class="field-row col2 float-right">
            <label>Address Line2 (Optional)</label> <input type="email"
                                                           class="demoInputBox" name="addressLine2"
                                                           id="addressLine2">
        </div>
        <div class="field-row col2 float-left">
            <label>Country</label> <input type="text"
                                          class="demoInputBox required" name="country" id="country">
        </div>
        <div class="field-row col2 float-right">
            <label>State</label> <input type="text"
                                        class="demoInputBox required" name="state" id="state">
        </div>
        <div class="field-row col2 float-left">
            <label>City</label> <input type="text"
                                       class="demoInputBox required" name="city" id="city">
        </div>
        <div class="field-row col2 float-right">
            <label>Zip</label> <input type="text"
                                      class="demoInputBox required" name="zip" id="zip">
        </div>
        <div class="clear-float">
            <input id="token" name="token" type="hidden" value="">
            <input type="button" id="submit-btn" class="btnAction"
                   value="Send Payment">
            <div id="loader">
                <img alt="loader" src="images/LoaderIcon.gif"/>
            </div>
        </div>
        <div id="error-message"></div>
    </form>
</div>
<!-- jQuery library -->
<script src="../assets/modernizr-3.5.0.min.js"></script>
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="../assets/bootstrap.min.js"></script>
<script src="vendor/jquery-creditcardvalidator/jquery.creditCardValidator.js"></script>
<script src="assets/js/validation.js"></script>


<!-- 2Checkout JavaScript library -->
<script src="//www.2checkout.com/checkout/api/2co.min.js"></script>
<script>
    // A success callback of TCO token request
    var success = function (data) {
        // Set the token in the payment form
        $('#paymentForm #token').val(data.response.token.token);

        $("#error-message").hide();
        $("#error-message").html("");

        // Submit the form with TCO token
        $('#paymentForm').submit();
    };

    // A Error callback of TCO token request.
    var error = function (data) {
        var errorMsg = "";
        if (data.errorCode === 200) {
            tokenRequest();
        } else {
            errorMsg = data.errorMsg;
            $("#error-message").show();
            $("#error-message").html(errorMsg);
            $("#submit-btn").show();
            $("#loader").hide();
        }
    };

    function tokenRequest() {
        var valid = validate();
        if (valid == true) {
            $("#submit-btn").hide();
            $("#loader").css("display", "inline-block");
            var args = {
                sellerId: $('#seller_id').val(),
                publishableKey: $('#publishable_key').val(),
                ccNo: $("#cardNumber").val(),
                cvv: $("#cvv").val(),
                expMonth: $("#expiryMonth").val(),
                expYear: $("#expiryYear").val()
            };

            // Request 2Checkout token
            TCO.requestToken(success, error, args);
        }
    }

    $(function () {
        TCO.loadPubKey('sandbox');

        $("#submit-btn").on('click', function (e) {
            tokenRequest();
            return false;
        });
    });
</script>

<div id="footer">
    <p><a href="../index.html">Home</a> | <a href="../service.html">Services</a> | <a href="../previous-work.html">Previous
            Work</a> |<a href="../about-us.html">About Us</a> | <a href="../contact-us.html">Contact Us</a> | <a
                href="../terms-of-service.html" target="_blank">Terms of Service</a> | <a href="../privacy-policy.html"
                                                                                          target="_blank">Privecy
            Policy</a>
    </p>

    <p>
        <span style="text-align:right">Follow Us On</span>

        <a target="_blank" href="https://www.linkedin.com/company/31225542/admin/">
            <span class="visually-hidden"><img src="../assets/images/Linkedinicon.png"
                                               style="width:30px;height:30px"></span></a>

        <a target="_blank" href="https://www.instagram.com/coreyscott01234/">
            <span class="visually-hidden"><img src="../assets/images/icons8-instagram-480.png"
                                               style="width:30px;height:30px"></span></a>

        <a target="_blank" href="https://www.youtube.com/channel/UC4pAkkilqBk70iOqLxJ-SpQ/featured">
            <img src="../assets/images/youtube.png" style="width:35px;height:35px"></a>

        <a target="_blank" href="https://twitter.com/Market24It">
            <span class="visually-hidden"><img src="../assets/images/icons8-twitter-240.png"
                                               style="width:35px;height:35px"></span></a>

        <a target="_blank" href="https://www.facebook.com/pg/itmarket24.co/about/?ref=page_internal">
            <span class="visually-hidden"><img src="../assets/images/icons8-facebook-256.png"
                                               style="width:35px;height:35px"></span></a>

        <a target="_blank" href="https://www.pinterest.com/itmarket24/">
            <img src="../assets/images/icons8-pinterest-256.png" style="width:35px;height:35px"></a>


    </p>
</div>
</body>
</html>
