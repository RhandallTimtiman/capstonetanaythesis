var load_history = (data) => {
  var historylist = $('.history-updates').find('.history-list-items');
  if(data.response){
    historylist.html('');
    var row = $('<div class="row history-row"></div>');
    $.each(data.data.records, function(index, value){
      row.append(
        $('<div class="col-xs-12 col-sm-6 history-item">')
          .append(
            $('<div class="history-container"></div>')
              .append(
                $('<div class="history-title"></div>')
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
                    <a href="${baseurl}hca/details/${value['tag']}/${value['content_slug']}"
                      class="read-more" role="button">read more</a>
                  `)
              )
          )
      );
      if (
          (index+1)%2 === 0 ||
          (index+1) === parseInt(data.data.total_records)
      ) {
        historylist
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
    })
  } else {
    historylist.html('Failed to load articles...');
  }
};

var load_ca = (data) => {
  var historylist = $('.culture-arts-updates').find('.culture-arts-list');
  if(data.response){

    historylist.html('');
    var row = $('<div class="row history-row"></div>');
    $.each(data.data.records, function(index, value){
      row.append(
        $('<div class="col-xs-12 col-sm-6 history-item">')
          .append(
            $('<div class="history-container"></div>')
              .append(
                $('<div class="history-title"></div>')
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
                    <a href="${baseurl}hca/details/${value['tag']}/${value['content_slug']}"
                      class="read-more" role="button">read more</a>
                  `)
              )
          )
      );
      if (
          (index+1)%2 === 0 ||
          (index+1) === parseInt(data.data.total_records)
      ) {
        historylist
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
    })
  } else {
    historylist.html('Failed to load articles...');
  }
};

$(function(){
  load_pages(
    // parameters
    {
      'hca': {
        'history': {
          'searchkey': '',
          'start': 0,
          'limit': 4,
          'isShown': 1
        }
      },
    },
    // js function
    'load_history'
  );

  load_pages(
    // parameters
    {
      'hca': {
        'culture': {
          'searchkey': '',
          'start': 0,
          'limit': 4,
          'isShown': 1
        },
        'arts': {
          'searchkey': '',
          'start': 0,
          'limit': 4,
          'isShown': 1
        },
      }
    },
    // js function
    'load_ca'
  );

  $("#buttonallhistory").on('click', function(){
    window.location=`${baseurl}hca/allpages/history`;
  });
  $("#buttonallculture").on('click', function(){
    window.location=`${baseurl}hca/allpages/culture`;
  });
  $("#buttonallarts").on('click', function(){
    window.location=`${baseurl}hca/allpages/arts`;
  });
});
