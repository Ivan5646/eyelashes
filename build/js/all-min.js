$(document).ready(function(){$(".reviews_wrapper").owlCarousel({items:1,dotData:!0,nav:!0,navText:["<img src='../img/arrowLeft.png'>","<img src='../img/arrowRight.png'>"],responsiveClass:!0});var t=new Date;t.setDate(t.getDate()+1),t=t.toISOString().slice(0,10),$("#time").countdown(t,function(t){$(this).text(t.strftime("%H:%M:%S"))}),$("#time2").countdown(t,function(t){$(this).text(t.strftime("%H:%M:%S"))})});