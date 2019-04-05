<div class="container container-fluid all-news">
  <div class="row news-title">
<h1><i class="fas fa-newspaper"></i><?php echo $pagetitle; ?></h1>

<div class="divider">
  <hr />
</div>

<div class="divider2">
  <hr />
</div>

  </div>
</div>
<div class="container container-fluid container-items">
  <div class="all-news-container">
  </div>
  <div class="button-show">
    <button type="button" id="shownext" class="btn btn-outline-danger"> Show more </br> <i class="fas fa-angle-double-down"></i> </button>
  </div>
  <div class="lazyLoadData" style="display: none;">
    <span class="hidden-xs">Page</span>
    <span class="page_num badge">1</span> of <span class="total_pages badge">1</span>
    <span class="hidden-xs">
      (Total Records: <span class="total_records badge">1</span>)
    </span>
    <span class="slug"><?php echo $slug; ?></span>
  </div>
</div>
