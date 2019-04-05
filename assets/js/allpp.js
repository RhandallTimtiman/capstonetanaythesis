load_allpeopleplaces = (data) => {
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
              <a href="${baseurl}people_places/details/${value['tag']}/${value['content_slug']}"
                class="read-more" role="button">read more</a>
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

$(function(){
  var slugholder = $('.slug').html().toString();
  load_pages(
    // parameters
    {
      'pp': {
        [slugholder] : {
          'searchkey': '',
          'start': 0,
          'limit': 5,
          'isShown': 1
        }
      },
    },
    // js function
    'load_allpeopleplaces'
  );

  $('#shownext').on('click', function(){
    var total_records = parseInt($('.total_records').text());
    var total_pages = parseInt(total_records / items_per_page);
    total_pages = (total_records % items_per_page > 0) ? ++total_pages : total_pages;
    var page_num = parseInt($('.page_num').text());
    if (page_num != total_pages){
      load_pages(
        // parameters
        {
          'hca': {
            [slugholder] : {
              'searchkey': '',
              'start': ((page_num) * items_per_page),
              'limit': items_per_page,
              'isShown': 1
            }
          },
        },
        // js function
        'load_allpeopleplaces'
      );
    } else{
      $('#shownext').hide();
    }
    page_num++;
    $('.page_num').html(page_num);
  });

});
