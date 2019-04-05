var load_news = (searchkey, start, limit, id, slug, status, newsslug, function_name) => {
  $.post(
    `${baseurl}news/load_news`,
    {
      searchkey: searchkey,
      start: start,
      limit: limit,
      id: id,
      slug: slug,
      status: status,
      newsslug: newsslug
    }
  ).done(function(data){
    window[function_name](data);
  });
}

load_latest = (data) => {
  var news_list = $('.container-items').find('.all-news-container');
  if(data.response) {
    var row = $('<div class="news-all"></div>');
    $.each(data.data.records, function(index, value){
      row.append(
        `<div class="row news-row">
          <div class="item-container">
            <div class="news-title">
              ${value['title']}
            </div>

            <div class="row">
              <span class="author-name">
                <i class="fas fa-user-circle"></i> ${value['first_name']} ${value['last_name']}
              </span>
              <span class="date-posted">
                <i class="far fa-calendar-times"></i> ${value['date_posted']}
              </span>
            </div>

            <div class="news-content">
              ${formatHomeNewsContent(value['content'])} ...
              <a href="${baseurl}news/details/${value['type_slug']}/${value['slug']}" class="read-more" role="button">read
                more</a>
            </div>
          </div>
        </div>`
      );
      news_list.append(row);
    });
    var total_records = data.data.total_records;
    var total_pages = parseInt(total_records / items_per_page);
    total_pages = (total_records % items_per_page > 0) ? ++total_pages : total_pages;
    var page_num = parseInt($('.page_num').text());
    $('.total_records').text(total_records);
    $('.page_num').text(page_num);
  } 
}

$(function() {
  var slugholder = $('.slug').html().toString();
  load_news('',0,5,'',slugholder,'published', '', 'load_latest');

  $('#shownext').on('click', function(){
    var total_records = parseInt($('.total_records').text());
    var total_pages = parseInt(total_records / items_per_page);
    total_pages = (total_records % items_per_page > 0) ? ++total_pages : total_pages;
    var page_num = parseInt($('.page_num').text());
    if (page_num != total_pages){
      load_news('',((page_num) * items_per_page), items_per_page,'',slugholder,'published', '', 'load_latest');
    } else{
      $('#shownext').hide();
    }
    page_num++;
    $('.page_num').html(page_num);
  });
});
