window.onload = function(){
  var carousel = document.getElementById('carousel');
  var children = carousel.children;
  var positionInfo = carousel.getBoundingClientRect();
  var carouselWidth = positionInfo.width;
  var blockWidth = children[1].getBoundingClientRect().width;
  var LeftCenter = carouselWidth/2-blockWidth;
  var rightCenter = carouselWidth/2;
  var oldxValue = 0;

  function scrollHorizontally(e) {
    e = window.event || e;
    var positionInfo = carousel.getBoundingClientRect();
    var mouseX = e.pageX - positionInfo.left;
    if(e.pageX < oldxValue){
      carousel.scrollLeft -= 3;
    }else if(e.pageX > oldxValue){
      carousel.scrollLeft += 3;
    }
    oldX =  e.pageX;
  }
   carousel.addEventListener("mousedown",mousedown,false);
   carousel.addEventListener("mouseup",mouseup,false);

  function mousedown() {
     carousel.addEventListener('mousemove', scrollHorizontally,false);
  };
  function mouseup() {
    carousel.removeEventListener('mousemove', scrollHorizontally,false);
  };
}
