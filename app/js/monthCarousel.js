window.onload = function(){
  //var months = ['januari','februear','march','april','may','june','july','august','september','oktober','november','december'];
  var carousel = document.getElementById('carousel'),
      positionInfo = carousel.getBoundingClientRect(),
      carouselWidth = positionInfo.width,
      center = carousel.clientWidth/2,
      children = carousel.children,
      oldxValue = 0;

  function scrollHorizontally(e) {
      e = window.event || e;
      var positionInfo = carousel.getBoundingClientRect();
      var mouseX = e.pageX - positionInfo.left;
      if(e.pageX < oldxValue){
        carousel.scrollLeft += 3;
      }else{
        carousel.scrollLeft -= 3;
      }
      oldxValue =  e.pageX;
      e.preventDefault();
  }

  function setcenter(e){
    carousel.removeEventListener('mousemove', scrollHorizontally,false);
    e = window.event || e;
    var positions = [];
    for (var i = 0; i < children.length; i++) {
      var left = children[i].getBoundingClientRect().left - positionInfo.left;
      var offsetCenter = center-left-65;
      positions.push(offsetCenter);
    }
    var startvalue = positions[0];
    var index = 0;

    for (var i = 0; i < positions.length; i++) {
      var tempvar = (positions[i] < 0) ? positions[i] * -1 : positions[i]
      if(tempvar < startvalue){
        startvalue = positions[i];
        index = i;
      }
    }
    animate(positions[index]);

    function animate(offset){
      var temp = 0 ;
      setInterval(function(){
        if(temp < offset){
          carousel.scrollLeft -= 1;
          temp +=1;
        }else if (temp > offset){
          carousel.scrollLeft -= -1;
          temp -= 1;
        }
      })
    }
  }

  function mousedown() {
     carousel.addEventListener('mousemove', scrollHorizontally,false);
  };

  carousel.addEventListener("mousedown",mousedown,false);
  carousel.addEventListener("mouseup",setcenter,false);


}
