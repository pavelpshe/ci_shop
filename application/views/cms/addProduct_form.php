<div class="cms-content-wrapper">
  <h3>Add new Product:</h3>
  <div class="error_display"><?php echo validation_errors(); ?></div>

<?= form_open(site_url().'cms/dashboard/addProduct/'); ?>
<?= $categories; ?><br /><br />
<label for= "title">Title</label><br />
<input type="text" name="title" value="<?= set_value('title'); ?>" /><br />
<label for="description">Description:</label><br />
<textarea rows="15" cols="40" name="description"><?= set_value('description'); ?></textarea><br /><br />
<label for= "price">Price</label><br />
<input type="text" name="price" value="<?= set_value('price'); ?>" /><br />
<label for="file_image">Product image:</label><br />
<input type="file" name="userfile" /><br />

<input type="checkbox" name="visibility" checked="checked" value="1" />
<br><br />
<input type="submit" name="submit"  id="submit" value="Save product" />

<?= form_close(); ?>

</div>