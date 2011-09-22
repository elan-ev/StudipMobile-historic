<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stud.IP Mobile</title>
    <link rel="stylesheet" href="<?= $plugin_path ?>/public/vendor/jquery.mobile/jquery.mobile-1.0b3.min.css" />
    <script src="<?= $plugin_path ?>/public/vendor/jquery/jquery-1.6.3.min.js"></script>
    <script src="<?= $plugin_path ?>/public/vendor/jquery.mobile/jquery.mobile-1.0b3.min.js"></script>
  </head>


  <body>

    <div data-role="page" id="<?= $page_id ?: '' ?>">

      <div data-role="header">
        <h1><?= $page_title ?: 'Stud.IP' ?></h1>
      </div><!-- /header -->
      
      <div data-role="content">
        <?= $content_for_layout ?>
      </div><!-- /content -->

<!--
      <div data-role="footer" data-id="footer" data-position="fixed">
        <h4>Page Footer</h4>
      </div><!-- /footer -->
-->
    </div>

  </body>
</html>
