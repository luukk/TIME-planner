window.onload = function(){
  var carousel = document.getElementById('carousel'),
      positionInfo = carousel.getBoundingClientRect(),
      carouselWidth = positionInfo.width,
      center = carousel.clientWidth/2,
      children = carousel.children,
      childInfo = children[0].getBoundingClientRect(),
      oldxValue = 0,
      positions = [],
      isTouchSupported = 'ontouchstart' in window,
      startEvent = isTouchSupported ? 'touchstart' : 'mousedown',
      moveEvent = isTouchSupported ? 'touchmove' : 'mousemove',
      endEvent = isTouchSupported ? 'touchend' : 'mouseup';

  function setChildWidth(){
    for (var i = 0; i < children.length; i++) {
      children[i].style.width = parseInt(carouselWidth/3) + "px";
    }
  }
  setChildWidth();
  function scrollHorizontally(e) {
      touchobj = e.pageX == undefined ? e.changedTouches[0].pageX : e.pageX,
      positionInfo = carousel.getBoundingClientRect(),
      mouseX = touchobj - positionInfo.left;
      if(e.pageX > positionInfo.right || e.pageX < positionInfo.left || e.pageY > positionInfo.bottom || e.pageY < positionInfo.top){
        setcenter();
      }
      if(touchobj < oldxValue){
        carousel.scrollLeft += 3;
      }else{
        carousel.scrollLeft -= 3;
      }
      oldxValue =  touchobj;
      e.preventDefault();
  }
  function setcenter(startDate){
    window.removeEventListener(moveEvent, scrollHorizontally,false);
    e = window.event || e;
    positions = [];
    for (var i = 0; i < children.length; i++) {
      var month = carousel.children[i].innerHTML;
      var left = children[i].getBoundingClientRect().left - positionInfo.left -childInfo.width;
      positions.push({month:month, offset: left});
    }
    var startvalue = positions[0].offset < 0 ? positions[0].offset *-1 : positions[0].offset;
    var index = 0;
    for (var i = 0; i < positions.length; i++) {
      var tempvar = (positions[i].offset < 0) ? positions[i].offset * -1 : positions[i].offset;
      if(tempvar < startvalue){
        startvalue = tempvar;
        index = i;

    }
  }
  start = typeof startDate === 'number' ? animate(positions,index,startDate) : animate(positions,index,Infinity);
}
function animate(object,month,startPosition){
  var offset = object[month].offset,
    scrollCount = 0,
    scrollInterval = setInterval(function(){
      if(scrollCount != offset){
        scrollCount = offset < scrollCount ? scrollCount -= 1 : scrollCount +=1;
        direction = offset < scrollCount ? carousel.scrollLeft -=1 : carousel.scrollLeft+1;
        carousel.scrollLeft = direction;
        blockCarousel();
      }
      if(scrollCount === offset){
        clearInterval(scrollInterval);
        if(startPosition == Infinity){
            getData(object[month+1]);
        }else{
          getData(object[startPosition]);
        }
        restore();
        }
    });
  }
  function setStartPosition(){
    var monthNames = ["January", "February", "March","April", "May", "June", "July","August", "September", "October","November", "December"],
        currentMonth = new Date().getMonth(),
        width = children[0].getBoundingClientRect().width;
        setcenter(currentMonth);
    for (var i = 0; i < positions.length; i++) {
      if(positions[i].month === monthNames[currentMonth]){
        carousel.scrollLeft = positions[i].offset -width ;
      }
    }
  }
  setStartPosition();

  function getData(month){
    selectedMonth = new Date().toUTCString().split(' ')[2],
    checkMonth = month.month;
    httpRequest = new HttpRequest();
    httpRequest.load("app/models/carouselOutput.php?date="+checkMonth, function(data) {
      data = JSON.parse(data);
      document.querySelector('.earnings').innerHTML = "&euro;"+data.earned;
      document.querySelector('.hours').innerHTML = data.hours_worked;
    });
  }
  function infinCarousel(){
    var test = carousel.scrollLeft > 1280-450 ? children.length : ((carousel.scrollLeft < 450)) ? 0 : null;
        load = test === 0 ? 11 : 0,
        childWidth = children[0].getBoundingClientRect().width;
        scrollDirection = test === 0 ? childWidth *2 +8 : - (childWidth *2 +8);
    if(test != null){
      for (var i = 0; i < 2; i++) {
        children[load].style.marginRight = '4px';
        carousel.insertBefore(children[load],children[test]);
     }
      carousel.scrollLeft += scrollDirection;
    }
  }

function mousedown() {
  window.addEventListener(moveEvent, scrollHorizontally,false);
};
function mouseup(){
  carousel.addEventListener(endEvent,setcenter,false);
  carousel.addEventListener(endEvent,infinCarousel,false);
}
function restore(){
  carousel.addEventListener(startEvent, mousedown,false);
  carousel.addEventListener(endEvent,setcenter,false);
}
function blockCarousel(){
  carousel.removeEventListener(startEvent, mousedown,false);
  carousel.removeEventListener(endEvent,setcenter,false);
}
carousel.addEventListener(startEvent,mousedown,false);
carousel.addEventListener(endEvent,mouseup,false);
infinCarousel();

}
