<div class="content">
    <div class="breadcrumb">
        <img src="<?php echo base_url();?>imgsay\home-banner.jpg" alt="Home Page">
        <h6 id="breadcrumbh6">Home --> Buy from us </h6>
        <h2 id="breadcrumbh4">BUY FROM US</h2>
    </div>
    <div class="buyfromuscontent" id="wrapper">
        <div>
            <p class="buyfromuscontenttitle"> Buy From Us </p>
        </div>
        <div class="buyfromustable">

            <?php foreach ($products as $products_item): ?>

                <div class="buyfromustabledata">
                    <img src="<?php echo base_url().$products_item['product_picture']; ?> " alt="mug">
                    <p> <?php echo $products_item['price_per_unit']; ?> </p>
                    <p> <?php echo $products_item['product_description']; ?> </p>
                    <button class="buytablebutton" id="<?php echo $products_item['product_id'] ?>" onclick="show_pop_up(this.id)"> ADD TO CART</button>
                </div>


            <?php endforeach; ?>

        </div>
    </div>
</div>
<div id="mymodal" class="modal">
    <div class="modal-content">
        <div class="modal_title">
            <h4> Add to Cart </h4>
            <span class="close">&times;</span>
        </div>
        <p></p>
        <div>
            <div class="modal-content-left">
                <img id="mymodelimg" src="<?php echo base_url()?>imgsay/franela1.jpg">
            </div>
            <div class="modal-content-right">
                <h4> Product Quantity </h4>
                <input type="number" min="0" name="quantity" placeholder="1" id="product_quantity">
                <h5> Note: Choose a quantity greater than 0 </h5>
                <button class="add_to_cart_close" id="button" onclick="close_modal()">Close</button>
                <button class="add_to_cart_add" id="button" onclick="add_product_quantity_to_cart()">Add to Cart
                </button>
                <p id="product_id" style="display: none"></p>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function hello() {
        alert("hi");
    }
    function add_product_quantity_to_cart() {
        product_id = document.getElementById('product_id').innerHTML;
        quantity = document.getElementById('product_quantity').value;
        window.location.href = "buyfromus/update/" + product_id + "/" + quantity;
    }

    function close_modal() {
        var modal = document.getElementById('mymodal');
        modal.style.display = "none";
    }

    function show_pop_up(button_id) {
        var modal = document.getElementById('mymodal');
        var span = document.getElementsByClassName("close")[0];
        var modalimg = document.getElementById('mymodelimg');

        modal.style.display = "block";
        document.getElementById('product_id').innerHTML = button_id;
        switch (button_id) {
            case "2":
                modalimg.src = "<?php echo base_url()?>imgsay/franela1.jpg";
                modalimg.alt = "shirt";
                break;
            case "1":
                modalimg.src = "<?php echo base_url()?>imgsay/taza1.png";
                modalimg.alt = "cup";
                break;
            case "4":
                modalimg.src = "<?php echo base_url()?>imgsay/franela2.jpg";
                modalimg.alt = "shirt";
                break;
            case "3":
                modalimg.src = "<?php echo base_url()?>imgsay/taza2.png";
                modalimg.alt = "cup";
                break;
            case "6":
                modalimg.src = "<?php echo base_url()?>imgsay/franela3.jpg";
                modalimg.alt = "shirt";
                break;
            case "5":
                modalimg.src = "<?php echo base_url()?>imgsay/taza3.png";
                modalimg.alt = "cup";
                break;
            default:
        }

        span.onclick = function (event) {
            modal.style.display = "none";
        }


        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    }
</script>

<div class="footer">
    <div class="footerleft">
        <h2 id="footerh2"> View shopping cart </h2>
        <h6 id="footerh6"> You can the products that you added to your cart </h6>
    </div>
    <div class="footerright">
        <button id="cartbuy" onclick="location.href = '<?php echo base_url();?>index.php/buyfromus2';">SUBMIT</button>
    </div>
</div>
