<h2>Our {cat_name} products:</h2>
{products}


<div id="product-{id}" class="product-box">

    <h3>{title}</h3>

    <p><img width="250" height="200" border="0" src="<?= site_url(); ?>public/images/{image}"/></p>

    <p>{description}<br/>
        <a href="<?= site_url(); ?>products/{cat_mashine}/{machine_name}">Read more...</a>

    <p> Price on site:<b>{price}$</b>&nbsp;&nbsp;
        <input type="button" data-id="{id}" class="add-to-cart" value="+add to cart"/>
    </p>
</div>
{/products}
