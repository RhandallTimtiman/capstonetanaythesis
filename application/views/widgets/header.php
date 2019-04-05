<div class="header">
  <img id="headerLogo" src="/assets/images/hane.png">
</div>

<div class="container-fluid">
<div class="navigation">
  <nav class="navbar navbar-inverse">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="nav navbar-nav">
        <?php foreach ($menu_items as $menu): ?>
          <li><a href="<?php echo base_url($menu['url']); ?>"><?php echo $menu['caption']; ?></a></li>
        <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </nav>
</div>
</div>
