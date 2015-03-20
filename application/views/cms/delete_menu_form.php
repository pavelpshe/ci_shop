<div class="cms-content-wrapper">


    <?= form_open(site_url() . 'cms/dashboard/deleteProduct/' . $id . '/'); ?>

    <label for="title">Are u sure u want to delete this menu?</label><br/>
    <input type="submit" name="delete_submit" value="Delete"/>

    <input type="button" value="Back" onclick="window.location='<?= site_url(); ?>cms/dashboard/' ; "/>

    <?= form_close(); ?>

</div>