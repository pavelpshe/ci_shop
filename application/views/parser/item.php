<div id="product-{id}" class="item-box">

    <h3>{title}</h3>

    <p><img width="250" height="200" border="0" src="<?= site_url(); ?>public/images/{image}"/></p>

    <p>{description}<br/>

    <p>
        Price on site:<b>{price}$</b>&nbsp;&nbsp;
        <input type="button" data-id="{id}" class="add-to-cart" value="+add to cart"/>
        <input type="button" class="checkout" value="Checkout"
               onclick="window.location='<?= site_url('cart/checkout'); ?>' "/>

    </p>
</div>