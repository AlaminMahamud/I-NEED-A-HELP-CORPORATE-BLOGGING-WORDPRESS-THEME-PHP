
    $(document).ready(function() {  
    var stickyNavTop = $('#top').offset().top;  


    
      
    var stickyNav = function(){  
    var scrollTop = $(window).scrollTop();  
          
    if (scrollTop>stickyNavTop ) {   
        $('#top').addClass('sticky');   
        $('.menu_modo').addClass('sticky');   
		$('#scroll_top').show();
    } else {  
        $('#top').removeClass('sticky') 
        $('.menu_modo').removeClass('sticky') 
		$('#scroll_top').hide();

    } 
}
      
    $(window).scroll(function() {  
        stickyNav();  
    });  
    });  
