            $(document).ready(function($){
				$(".tab:first").addClass("tabs-current").show();
					  $(".tab a").click(function() {
                      $(".tab a").removeClass("tabs-current");
                      $(".tab").removeClass("tabs-current");
                      $(this).addClass("tabs-current");
                      $("#cats").hide();
                      var activeTab = $(this).attr("href");
                      $(activeTab).fadeIn();
                      return false;
                    });
                  });
             