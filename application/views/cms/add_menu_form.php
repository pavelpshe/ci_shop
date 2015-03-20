<div class="cms-content-wrapper">
  <h3>Add new Menu:</h3>
  <div class="error_display"><?php echo validation_errors(); ?></div>

<?= form_open(site_url().'cms/menu/addMenu/'); ?>

<label for= "title">Title</label><br />
<input type="text" name="title" value="<?= set_value('title'); ?>" /><br />

<label for="link">Link:</label><br />
<input type="text" name="link" value="<?= set_value('link'); ?>" /><br />




<input type="submit" name="submit"  id="submit" value="Save menu" />
<input type="button" value="Back" onclick="window.location='<?= site_url(); ?>cms/menu/';" />
<?= form_close(); ?>

</div>