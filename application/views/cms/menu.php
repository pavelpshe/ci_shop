<h3>Menu managment-Edit site main nav</h3>
<?php if ($this->session->flashdata('feedback') == TRUE): ?>

    <p class="flash_data"><?= $this->session->flashdata('feedback'); ?></p>

<?php endif; ?>

<input type="button" value="Add menu item"
       onclick="window.location='<?= site_url(); ?>cms/menu/addMenu/';"/>
<ul>
    {menu}
    <li>
        {link}
        <a href="<?= site_url(); ?>cms/menu/editMenu/{id}">Edit</a>
        <a href="<?= site_url(); ?>cms/menu/deleteMenu/{id}">Delete</a>

    </li>
    {/menu}
</ul>