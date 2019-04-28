<div class="content" id="wrapper">
    <p class="buyfromuscontenttitle"> Buy From Us </p>
    <div class="shipping">

        <form method="post" action="<?php // echo htmlspecialchars($_SERVER[PHP_SELF]); ?>"
              onsubmit="return submit_shipping_form();">
            <div class="shipping_left">
                <h2 class="shippingh3"> Contact Information </h2>
                <input name="email" id="email" placeholder="Enter Email" type="text" required>
                <span id="emailErr" class="error"></span>
                <h2 class="shippingh3"> Shipping address </h2>
                <div class="shipping_one_line">
                    <input type="text" id="fname" name="fname" placeholder="Enter First name" required>
                    <span id="fnameErr" class="error"></span>
                    <input type="text" id="lname" name="lname" placeholder="Enter Last name" required>
                    <span id="lnameErr" class="error"></span>
                </div>
                <input type="text" name="address" id="address" placeholder="Enter Address" required>
                <span id="addressErr" class="error"></span>
                <input type="text" name="apartment" id="apartment" placeholder="Enter Apartment, suite, etc." required>
                <span id="apartmentErr" class="error"></span>
                <input type="text" name="city" id="city" placeholder="Enter City" required>
                <span id="cityErr" class="error"></span>
                <div class="shipping_one_line">
                    <select name="language">
                        <option value="English" selected>English</option>
                        <option value="Spanish">Spanish</option>
                    </select>
                    <input type="text" name="postal" id="postal" placeholder="Enter Postal Code" required>
                    <span id="postalErr" class="error"></span>
                </div>
                <button class="shippingsend" id="button">PLACE ORDER</button>
                <button class="shippingsend" id="button" onclick="clear_cart()">CLEAR CART</button>
            </div>
            <div class="shipping_right">
                <div class="shipping_right">
                    <div class="shipping_table">
                        <?php
                        $cart_items = $_SESSION['cart'];
                        if (!empty($cart_items)) {

                            echo "
                                
                            <div class=\"shipping_table_data\">
                                <h5> ID </h5>
                            </div>
                            <div class=\"shipping_table_data\">
                                <h5> Name </h5>
                            </div>
                            <div class=\"shipping_table_data\">
                                <h5> Units </h5>
                            </div>
                            <div class=\"shipping_table_data\">
                                <h5> Price </h5>
                            </div>
                            ";

                            foreach ($cart_items as $product_id => $quantity) {
                                $details = $all_products[$product_id - 1];

                                $each_cart_item = "
                                    <div class=\"shipping_table_data\">
                                        <img src=\"%s\">
                                    </div>
                                    <div class=\"shipping_table_data\">
                                        <p> %s </p>
                                    </div>
                                    <div class=\"shipping_table_data\">
                                        <p> %d </p>
                                    </div>
                                    <div class=\"shipping_table_data\">
                                        <p> %f </p>
                                    </div>
                                ";

                            $_SESSION['total'] += $details['price_per_unit'] *  $quantity['quantity'];
                                echo sprintf(
                                    $each_cart_item,
                                    base_url() . $details['product_picture'],
                                    $details['product_name'],
                                    $quantity['quantity'],
                                    $details['price_per_unit'] * $quantity['quantity']
                                );
                            }

                            $total_line = "
                            <div class=\"shipping_table_data\">
                                <p> Total </p>
                            </div>
                            <div class=\"shipping_table_data\">
                                <p> </p>
                            </div>
                            <div class=\"shipping_table_data\">
                                <p> USD </p>
                            </div>
                            <div class=\"shipping_table_data\">
                                <p> %s </p>
                            </div>";

                            echo sprintf($total_line, $_SESSION['total']);
                        } else {
                            echo "Cart is empty";
                        }


                        ?>

                    </div>
                </div>
            </div>
            <!--            <p> --><?php //echo $order_status; ?><!-- </p>-->

        </form>

    </div>
</div>
