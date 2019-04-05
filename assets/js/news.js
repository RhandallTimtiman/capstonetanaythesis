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

var load_latest = (data) => {
  var news_list = $('.news-and-update').find('.news_list');
  if (data.response) {
    // clear all existing news
    $('#Update').html(data.data.records[0].date_posted);
    news_list.html('');
    var row = $('<div class="row news-row"></div>');
    $.each(data.data.records, function(index, value) {
      $('#Update').html('Date Updated:' + ' ' +data.data.records[0].date_posted);
      row.append(
        $('<div class="col-xs-12 col-md-6 news-item"></div>')
          .append(
            $('<div class="news-container"></div>')
              .append(
                $('<div class="news-title"></div>')
                  .html(value['title'])
              )
              .append(
                $('<div class="row"></div>')
                  .append(
                    $('<span class="col-sm-6 author-name"></span>')
                      .html(`
                        <i class="fas fa-user-circle"></i>&nbsp;
                        ${value['first_name']} ${value['last_name']}
                      `)
                  )
                  .append(
                    $('<span class="col-sm-6 date-posted"></span>')
                      .html(`
                        <i class="far fa-calendar-times"></i>&nbsp;
                        ${value['date_posted']}
                      `)
                  )
              )
              .append(
                $('<div class="news-image"></div')
                  .append(
                      $('<img id="news-picture" />').attr('src',getImageFromContent(value['content']))
                  )
              )
              .append(
                $('<div class="news-content"></div>')
                  .html(`
                    ${formatHomeNewsContent(value['content'])}...
                    <a href="${baseurl}news/details/${value['type_slug']}/${value['slug']}"
                      class="read-more" role="button">read more</a>
                  `)
              )
          )
      );

      if (
          (index+1)%2 === 0 ||
          (index+1) === parseInt(data.data.total_records)
      ) {
        news_list
          .append(row)
          .append(`
            <div class="row divider4 hidden-xs hidden-sm">
              <div class="col-md-6">
                <hr />
              </div>
              <div class="col-md-6">
                <hr />
              </div>
            </div>
          `);
        row = $('<div class="row news-row"></div>');
      }
    });
  } else {
    news_list.html('No latest news items.');
  }
}
var load_announcements = (data) => {
  var announcement_list = $('.announcement').find('.announcement-list');
  if (data.response) {
    // clear all existing news
    // $('#Update').html(data.data.records[0].date_posted);
    announcement_list.html('');
    var row = $('<div class="row news-row"></div>');
    $.each(data.data.records, function(index, value) {
      // $('#Update').html('Date Updated:' + ' ' +data.data.records[0].date_posted);
      row.append(
        $('<div class="col-xs-12 col-sm-6 news-item"></div>')
          .append(
            $('<div class="news-container"></div>')
              .append(
                $('<div class="news-title"></div>')
                  .html(value['title'])
              )
              .append(
                $('<div class="row"></div>')
                  .append(
                    $('<span class="col-sm-6 author-name"></span>')
                      .html(`
                        <i class="fas fa-user-circle"></i>&nbsp;
                        ${value['first_name']} ${value['last_name']}
                      `)
                  )
                  .append(
                    $('<span class="col-sm-6 date-posted"></span>')
                      .html(`
                        <i class="far fa-calendar-times"></i>&nbsp;
                        ${value['date_posted']}
                      `)
                  )
              )
              .append(
                $('<div class="news-image"></div')
                  .append(
                      $('<img id="news-picture" />').attr('src',getImageFromContent(value['content']))
                  )
              )
              .append(
                $('<div class="news-content"></div>')
                  .html(`
                    ${formatHomeNewsContent(value['content'])}...
                    <a href="${baseurl}news/details/${value['type_slug']}/${value['slug']}"
                      class="read-more" role="button">read more</a>
                  `)
              )
          )
      );

      if (
          (index+1)%2 === 0 ||
          (index+1) === parseInt(data.data.total_records)
      ) {
        announcement_list
          .append(row)
          .append(`
            <div class="row divider4 hidden-xs hidden-sm">
              <div class="col-md-6">
                <hr />
              </div>
              <div class="col-md-6">
                <hr />
              </div>
            </div>
          `);
        row = $('<div class="row news-row"></div>');
      }
    });
  } else {
    announcement_list.html('No latest news items.');
  }
}

var load_special = (data) => {
  var special_list = $('.special-feature').find('.special-list');
  if (data.response) {
    // clear all existing news
    // $('#Update').html(data.data.records[0].date_posted)
    special_list.html('');
    var row = $('<div class="row news-row"></div>');
    $.each(data.data.records, function(index, value) {
      // $('#Update').html('Date Updated:' + ' ' +data.data.records[0].date_posted);
      row.append(
        $('<div class="col-xs-12 col-sm-6 news-item"></div>')
          .append(
            $('<div class="news-container"></div>')
              .append(
                $('<div class="news-title"></div>')
                  .html(value['title'])
              )
              .append(
                $('<div class="row"></div>')
                  .append(
                    $('<span class="col-sm-6 author-name"></span>')
                      .html(`
                        <i class="fas fa-user-circle"></i>&nbsp;
                        ${value['first_name']} ${value['last_name']}
                      `)
                  )
                  .append(
                    $('<span class="col-sm-6 date-posted"></span>')
                      .html(`
                        <i class="far fa-calendar-times"></i>&nbsp;
                        ${value['date_posted']}
                      `)
                  )
              )
              .append(
                $('<div class="news-image"></div')
                  .append(
                      $('<img id="news-picture" />').attr('src',getImageFromContent(value['content']))
                  )
              )
              .append(
                $('<div class="news-content"></div>')
                  .html(`
                    ${formatHomeNewsContent(value['content'])}...
                    <a href="${baseurl}news/details/${value['type_slug']}/${value['slug']}"
                      class="read-more" role="button">read more</a>
                  `)
              )
          )
      );

      if (
          (index+1)%2 === 0 ||
          (index+1) === parseInt(data.data.total_records)
      ) {
        special_list
          .append(row)
          .append(`
            <div class="row divider4 hidden-xs hidden-sm">
              <div class="col-md-6">
                <hr />
              </div>
              <div class="col-md-6">
                <hr />
              </div>
            </div>
          `);
        row = $('<div class="row news-row"></div>');
      }
    });
  } else {
    special_list.html('No latest news items.');
  }
}


$(function() {
  load_news('',0,4,'','news-and-update','published', '', 'load_latest');
  load_news('',0,4,'','special-feature','published', '', 'load_special');
  load_news('',0,4,'','announcements','published','', 'load_announcements');
//  onclick="window.location='//tanay.tourism/client/news/allnews?type=news-and-update'"
  $("#buttonallnews").on('click', function(){
    window.location=`${baseurl}news/allnews/news-and-update`;
  });
  $("#buttonallannouncements").on('click', function(){
    window.location=`${baseurl}news/allnews/announcements`;
  });
  $("#buttonallspecialfeatures").on('click', function(){
    window.location=`${baseurl}news/allnews/special-feature`;
  });
});
