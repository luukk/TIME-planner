window.onload = function(){
  //var months = ['januari','februear','march','april','may','june','july','august','september','oktober','november','december'];
  var carousel = document.getElementById('carousel');
  var positionInfo = carousel.getBoundingClientRect();
  var carouselWidth = positionInfo.width;
  var center = carousel.clientWidth/2;
  var children = carousel.children;
  var oldxValue = 0;

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
    console.log('well met');
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
      carousel.scrollLeft -= positions[index];
  }

  function mousedown() {
     carousel.addEventListener('mousemove', scrollHorizontally,false);
  };

  carousel.addEventListener("mousedown",mousedown,false);
  carousel.addEventListener("mouseup",setcenter,false);
}
