var width = 100;
var perfData = window.performance.timing; // The PerformanceTiming interface represents timing-related performance information for the given page.
var EstimatedTime = -(perfData.loadEventEnd - perfData.navigationStart);
var time = parseInt((EstimatedTime/1000)%60)*100;

console.log(perfData);
console.log(EstimatedTime);
console.log(time);

// Percentage Increment Animation
var PercentageID = "#load-page-bar",
		start = 0,
		end = 100,
    durataion = time;
        
animateValue(PercentageID, start, end, durataion);
		
function animateValue(id, start, end, duration) {
  
	var range = end - start,
      current = start,
      increment = end > start? 1 : -1,
      stepTime = Math.abs(Math.floor(duration / range)),
      obj = $(id);
    
	var timer = setInterval(function() {
        current += increment;
        console.log(current);
        $('#load-page-bar').attr('aria-valuenow', current).css({
            width: current + '%'
        }).html(parseFloat(current) + '%');

		// $('#precent').html(current + "%");
        // // Loadbar Animation
        // $(".loadbar").css({
        //   width: current + "%"
        // });
        
        // // Loadbar Glow Animation
        // $(".glow").css({
        //   width: current + "%"
        // });

      //obj.innerHTML = current;
		if (current == end) {
			clearInterval(timer);
		}
	}, stepTime);
}

// Fading Out Loadbar on Finised
setTimeout(function(){
  $('.preloader-wrap').fadeOut();
}, time);
