$(document).ready(function(){
  $("#searchbar").keyup(function(){
    var download = $('#searchbar').val();
    if (download == "") {
      $("#display_results").html('');
    }else{
    	console.log(download)
      $.ajax({
        url:"cores/search-downloads.php",
        type:"GET",
        data:{key: download},
        success:function(data){
          $('#display_results').html(data);
        }  
      });
    }
  });
});

function selected(){
  $("#searchbar").text(value);
  $("#display_results").hide();
}