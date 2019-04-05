var load_image = (searchkey, start, limit, id, hane) => {
  $.post(
    `${baseurl}hf/get_rooms`,
    {
      searchkey: searchkey,
      start: start,
      limit: limit,
      id: id,
      hane:hane
    }
  ).done(function(data){
    var image_list = $('.hotel-rooms').find('.room-list');
    if(data.response){
      image_list.html('');
      var row = $('<div class="row"></div>');

      $.each(data.data.records, function(index, value){
        row.append(
          $('<img/>').attr("src",`${admin_path}assets/images/hane/${value['room_image']}`)
        );
        image_list.append(row);
      });
    }

  });
}

$(function(){
  var id = $('#divIdHolder').html();
  load_image('',0,6,'',id);

});
