$(document).ready(function()
   { 


    // fillter

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
    });
    
$(".filter-button").on("click", function() {
  $(".filter-button").removeClass("active"); // remove "active" class from all elements
  $(this).addClass("active"); // add "active" class to the clicked element
});
  
});
