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
                    <button class="buytablebutton" id="%d" onclick="show_pop_up(this.id)"> ADD TO CART</button>
                </div>


            <?php endforeach; ?>

        </div>
    </div>
</div>
