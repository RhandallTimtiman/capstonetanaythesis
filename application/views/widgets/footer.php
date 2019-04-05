<div class="container-fluid footer">
  <div class="row news-row">
    <div class="col-xs-12 col-sm-4 logo">
      <img src="<?php echo base_url('assets/images/tanay.png'); ?>">
    </div>
    <div class="col-xs-12 col-sm-4 site-map">
      <ul>
      <?php foreach ($menu_items as $menu): ?>
        <li><a href="<?php echo base_url($menu['url']); ?>"><?php echo $menu['caption']; ?></a></li>
      <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>
