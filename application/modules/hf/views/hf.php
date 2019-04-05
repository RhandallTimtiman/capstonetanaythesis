<div class="container hane-finder">
  <div class="hane-search">
    <div class="search-container">
      <img src="assets/images/hane.png">
      <form class="example" method="POST" action="<?php echo base_url('hf/search'); ?>">
        <input type="text" placeholder="find a hotel.." name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
        <div class="container price-label-range">
          <div align="center" class="container price-label">
            <h3 id="priceLabel">Sample</h3>
          </div>
          <div align="center" class="container price-list">
            <input type="range" min="1" max="15000" value="7500" class="slider" id="est_price" name="est_price">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php if (!empty($err_msg)): echo $err_msg; endif; ?>
