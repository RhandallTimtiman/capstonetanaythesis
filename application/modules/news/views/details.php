<div class="container-fluid news-and-update">
        <div class="news-title">
          <?php echo $details['title']; ?>
        </div>

        <div class="row">
          <span class="col-sm-6 author-name">
            <i class="fas fa-user-circle"></i> <?php echo $details['first_name'] . ' ' . $details['last_name']; ?>
          </span>
          <span class="col-sm-6 date-posted">
            <i class="far fa-calendar-times"></i> <?php echo $details['date_posted']; ?>
          </span>
        </div>

        <div class="news-content">
          <?php echo $details['content']; ?>
        </div>
</div>
