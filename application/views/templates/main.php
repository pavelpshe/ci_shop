<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?= $title; ?></title>
    <script>var CI_ROOT="<?=site_url(); ?>";</script>
    <link rel="stylesheet" href="<?=  site_url("public/css/style.css"); ?>" type="text/css" />
  </head>
  <body>
    <div class="site-wrapper">
      <div class="header"> 
        <h3>CI SHOP</h3>
        
        <ul>
          <li><a href="<?= site_url(); ?>">Home</a></li>
          
          <li><a href="<?= site_url('products'); ?>/">Products</a></li>
          
          <?php if(!empty($menu)): ?>
            <?= $menu; ?>
          <?php endif; ?>
          
          <?php if(isset($is_login) && $is_login==false): ?>
          
          <li><a href="<?= site_url('user/login'); ?>">Login</a></li>
          <li><a href="<?= site_url('user/register'); ?>">Register</a></li>
              
          <?php else: ?>
            <li>
              welcome
              
              <a href="<?= site_url('user/edit'); ?>/">
                <b><?= $this->session->userdata('name'); ?></b>
              </a>
              <?php if($is_admin==true): ?> 
              <a href="<?=site_url().'cms/dashboard/'; ?>">CMS Dashboard</a>
              <?php endif; ?>
              </li>
              <li><a href="<?= site_url('user/logout'); ?>/">Logout</li>
            <?php endif; ?>
            <li id="cart-item">
            <a href="<?= site_url('cart/checkout'); ?>/">
            <li><img width="20" height="20" border="0"src="<?=site_url(); ?>public/images/cart.png"/></li>
            <?php if($this->cart->total_items() > 0): ?>
              <span><?= $this->cart->total_items(); ?></span>
              <?php endif; ?>
        </a>
        </li>
        </ul>
         
              
      </div>
      <?php if(!empty($content)): ?>      
        
        <div class="page-content"><?= $content; ?></div>
        
      <?php else: ?>
      <br/><i>no content...</i>
      <?php endif; ?>   
      <br /><br />
      
      <div class="footer">
        
        she shop &copy; <?= date("Y"); ?>
        
      </div>     
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
    <script type="text/javascript" src="<?= site_url('public/js/cart.js'); ?>"></script>   
  </body>
</html>