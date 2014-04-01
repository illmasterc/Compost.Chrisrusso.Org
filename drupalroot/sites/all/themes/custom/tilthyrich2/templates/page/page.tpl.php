<div class="container dark interior">
	<div class="row">
		<div class="small-12 columns text-center">
          <a href="<?php print check_url($front_page); ?>"><img src="<?php print $logo ?>" alt="<?php print $site_name; ?>" /></a>
		</div>
	</div>
</div>

<div class="container green interior">
	<div class="row">
		<div class="small-12 columns">
          <?php print render($title_prefix); ?>
          <h2><?php echo $title; ?></h2>
          <?php print render($title_suffix); ?>

        </div>
	</div>
</div>

<div class="container">
	<div class="row">
      <?php if ($messages): ?>
        <div id="console" class="clearfix"><?php print $messages; ?></div>
      <?php endif; ?>
      <?php if ($page['help']): ?>
        <div id="help">
          <?php print render($page['help']); ?>
        </div>
      <?php endif; ?>
      <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
      <?php print render($page['content']); ?>
	</div>
</div>

<div id="how" class="container dark interior-footer">
	<div class="row">
		<div class="small-12 large-5 columns">
			<a id="back-home" class="footer-link" href="index.html">back home</a>
		</div>
		<div class="small-12 large-3 columns end">
			<a id="back-to-top" class="footer-link" href="#">back to top</a>
		</div>
	</div>
</div>
