<div class="button-back">
  <button class="click-more" onclick="window.location='//tanay-tourism.000webhostapp.com/hf/search'"> <i class="fas fa-arrow-circle-left"></i> </button>
</div>

<div class="container hotel">
    <?php foreach ($data['records'] as $key => $value): ?>
    <div id="divIdHolder" style="display: none;">
      <?php echo $value['hotel_id']; ?>
    </div>
    <div class="container hotel-info">
        <div class="row basic-info">
          <div class="col-xs-5 hotel-picture">
            <img id="hotelimg" src="<?php echo base_url('administrator/assets/images/hane/') . $value['hotel_image']; ?>">
          </div>
          <div class="col-xs-7 hotel-basic-info">
            <h1><?php echo $value['hotel_name']; ?> </h1>
            <h2> Address: <?php echo $value['address']; ?> </h2>
            <h2> Website: <?php echo $value['url']?> </h2>
            <h2> Contact: <?php echo $value['email']; ?> </h2>
          </div>
        </div>

          <div class="row price-list">
            <div class="col-xs-12 price">
              <h1> Price Range </h1>
              <h2> ₱ <?php echo $value['min_price']; ?> - ₱ <?php echo $value['max_price'] ?> </h2>
            </div>
          </div>

              <div class="container-services-rooms">
              <div class="col-xs-5 hotel-services">
                <div class="row services">
                <h1> Services Offered </h1>
                  <?php echo $value['amenities']; ?>
                </div>
              </div>
          <?php endforeach; ?>
              <div class="col-xs-7 hotel-rooms">
                <div class="row-rooms">
                    <h1> Rooms </h1>
                    <div class="room-list">
                      <div class="row">
                        <img>
                    </div>
                  </div>
                </div>
            </div>
  </div>
</div>
