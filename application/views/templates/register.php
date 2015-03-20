<h3>Log in</h3>

<div class="error_display"><?php echo validation_errors(); ?></div>

<?= form_open(site_url() . 'user/register/'); ?>
<label for="name">Name:</label><br/>
<input type="text" name="name" value="<?= set_value('name'); ?>"/><br/>
<label for="email">Email:</label><br/>
<input type="text" name="email" value="<?= set_value('email'); ?>"/><br/>
<label for="password">Password:</label><br/>
<input type="password" name="password"/><br/>
<label for="re_password">Confirm Password:</label><br/>
<input type="password" name="re_password"/><br/>
<input type="submit" name="submit" value="Sign up"/>
<?= form_close(); ?>
