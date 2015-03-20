<!doctype html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>ci shop cms</title>
    <link rel="stylesheet" href="<?= site_url("public/css/cms_style.css"); ?>" type="text/css"/>
</head>
<body>
<div class="cms-wrapper">
    <div class="cms-header">
        <ul>
            <li><a href="<?= site_url('cms/dashboard/'); ?>/">Product Managment</a></li>
            <li><a href="<?= site_url('cms/menu'); ?>/">Menu Managment</a></li>
            <li><a href="<?= site_url('cms/content'); ?>/">Content Managment</a></li>
            <li><a href="<?= site_url('cms/dashboard/orders'); ?>/">View orders</a></li>
            <li><a href="<?= site_url(); ?>/">Back to site</a></li>
        </ul>
    </div>
    <div class="cms-content">
        <?php if (!empty($content)): ?>
            <?= $content; ?>
        <?php endif; ?>
    </div>
    <br/>

    <div class="cms-footer">
        ci shop &copy;
    </div>
</body>
</html>