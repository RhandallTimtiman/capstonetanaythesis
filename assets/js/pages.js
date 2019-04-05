var load_pages = (params, function_name) => {
  $.post(
    `${baseurl}pages/load_pages`,
    {
      params: params
    }
  ).done(function(data){
    window[function_name](data);
  });
};
