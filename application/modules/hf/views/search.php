<div class="button-back">
  <button class="click-more" onclick="window.location='//tanay.tourism/client/hf'"> <i class="fas fa-arrow-circle-left"></i> </button>
</div>
<div class="search-page">
  <div class="container-fluid other-columns">
  <h1> <i class="fas fa-search"></i> Search Result: <?php echo $data['total_records']; ?> Hotels found</h1>
  <div class="row search-title">
    <div class="row">
    <div class="col-md-5 search-item">
      <div class="item content-container">
        <?php foreach ($data['records'] as $key => $value): ?>
          <div class="item-container">
            <div class="row">
              <div class="col-xs-5">
                <div class="item-image">
                  <img src="<?php echo ENV['api_path'].'assets/images/hane/'.$value['hotel_image']; ?>">
                </div>
              </div>
              <div class="col-xs-7">
                <div class="item-info">
                  <div class="hotel-name"><?php echo $value['hotel_name']; ?></div>
                  <div class="address"><?php echo $value['address']; ?></div>
                  <div class"page3-button">
                    <a href="//tanay-tourism.000webhostapp.com/hf/hotelinfo/<?php echo $value['hotel_id']; ?>" class="btn btn-success click-more" role="button"><i class="fas fa-search">View Hotel</i></a>
                    <button class="btn btn-danger click-more" data-long="<?php echo $value['longhitude']; ?>" data-lat="<?php echo $value['latitude']; ?>" id = "viewmap" role="button"><i class="fas fa-search">View Map</i></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="col-md-7 map-container">
      <div id="map">
      </div>
    </div>

    </div>
  </div>
</div>
