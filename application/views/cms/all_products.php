<div class="cms-content-wrapper">

    <h2>Products Managment</h2>
    <i>Edit your content</i><br/><br/>

    <?php if ($this->session->flashdata('feedback') == TRUE): ?>

        <p class="flash_data"><?= $this->session->flashdata('feedback'); ?></p>

    <?php endif; ?>

    <input type="button" onclick="window.location='<?= site_url(); ?>cms/dashboard/addProduct/';"
           value="Add new product"/>
    {products}

    <h3>{name}</h3>
    <ul>
        {items}
        <li>
            {title}&nbsp;&nbsp;
            <a href="#">Edit</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="<?= site_url(); ?>cms/dashboard/deleteProduct/{prg_id}/">Delete</a>
        </li>
        {/items}
    </ul>
    {/products}
</div>