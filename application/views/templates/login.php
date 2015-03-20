<h3>Log in</h3>

<div class="error_display"><?php echo validation_errors(); ?></div>

<?= form_open(site_url() . 'user/login/'); ?>
<label for="email">Email:</label><br/>
<input type="text" name="email" value="<?= set_value('email'); ?>"/><br/>
<label for="password">Password:</label><br/>
<input type="password" name="password"/><br/>
<input type="submit" name="submit" value="Sign in"/>
<?= form_close(); ?>
