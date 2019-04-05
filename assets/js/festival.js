var load_festival = (data) => {
  var festivallist = $('.festival').find('.festival-list');
  if(data.response){
    festivallist.html('');
    var row = $('<div class="row festival-row"></div>');
    $.each(data.data.records, function(index, value) {
      row.append(
        $('<div class="col-xs-12 col-md-6 festival-item"></div>')
          .append(
            $('<div class="festival-container"></div>')
              .append(
                $('<div class="festival-title"></div>')
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
                $('<div class="festival-image"></div')
                  .append(
                      $('<img id="festival-picture" />').attr('src',getImageFromContent(value['content']))
                  )
              )
              .append(
                $('<div class="festival-content"></div>')
                  .html(`
                    ${formatHomeNewsContent(value['content'])}...
                    <a href="${baseurl}festival_cuisine/details/${value['tag']}/${value['content_slug']}"
                      class="read-more" role="button">read more</a>
                  `)
              )
          )
      );

      if (
          (index+1)%2 === 0 ||
          (index+1) === parseInt(data.data.total_records)
      ) {
        festivallist
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
      festivallist.html('No latest news items.');
    }
  };

  var load_cuisine = (data) => {
    var cuisinelist = $('.cuisine').find('.cuisine-list');
    if(data.response){
      cuisinelist.html('');
      var row = $('<div class="row cuisine-row"></div>');
      $.each(data.data.records, function(index, value) {
        row.append(
          $('<div class="col-xs-12 col-md-6 cuisine-item"></div>')
            .append(
              $('<div class="cuisine-container"></div>')
                .append(
                  $('<div class="cuisine-title"></div>')
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
                  $('<div class="cuisine-image"></div')
                    .append(
                        $('<img id="cuisine-picture" />').attr('src',getImageFromContent(value['content']))
                    )
                )
                .append(
                  $('<div class="cuisine-content"></div>')
                    .html(`
                      ${formatHomeNewsContent(value['content'])}...
                      <a href="${baseurl}festival_cuisine/details/${value['tag']}/${value['content_slug']}"
                        class="read-more" role="button">read more</a>
                    `)
                )
            )
        );

        if (
            (index+1)%2 === 0 ||
            (index+1) === parseInt(data.data.total_records)
        ) {
          cuisinelist
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
          row = $('<div class="row cuisine-row"></div>');
        }
      });
      } else {
        cuisinelist.html('No latest news items.');
      }
    };

$(function(){
  load_pages(
    // parameters
    {
      'fc': {
        'festival': {
          'searchkey': '',
          'start': 0,
          'limit': 4,
          'isShown': 1
        }
      },
    },
    // js function
    'load_festival'
  );

  load_pages(
    // parameters
    {
      'fc': {
        'cuisine': {
          'searchkey': '',
          'start': 0,
          'limit': 4,
          'isShown': 1
        }
      },
    },
    // js function
    'load_cuisine'
  );

  $("#buttonallfestival").on('click', function(){
    window.location=`${baseurl}festival_cuisine/allpages/festival`;
  });
  $("#buttonallcuisine").on('click', function(){
    window.location=`${baseurl}festival_cuisine/allpages/cuisine`;
  });
});
