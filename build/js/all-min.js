$(document).ready(function(){$(".reviews").owlCarousel({items:1,dotData:!0,nav:!0}),$("#time").countdown("2018/01/01",function(t){$(this).text(t.strftime("%H:%M:%S"))})});