window.onload = function(){
  var carousel = document.getElementById('carousel'),
      positionInfo = carousel.getBoundingClientRect(),
      carouselWidth = positionInfo.width,
      center = carousel.clientWidth/2,
      children = carousel.children,
      childInfo = children[0].getBoundingClientRect(),
      oldxValue = 0,
      positions = [];

  function setChildWidth(){
    for (var i = 0; i < children.length; i++) {
      children[i].style.width = parseInt(carouselWidth/3) + "px";
    }
  }
  setChildWidth();
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
  function setcenter(startDate){
    carousel.removeEventListener('mousemove', scrollHorizontally,false);
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
    setcenter(new Date().getMonth());
    var monthNames = ["January", "February", "March","April", "May", "June", "July","August", "September", "October","November", "December"],
        currentMonth = new Date().getMonth(),
        width = children[0].getBoundingClientRect().width;
    for (var i = 0; i < positions.length; i++) {
      if(positions[i].month === monthNames[currentMonth]){
        carousel.scrollLeft = positions[i].offset -width ;
      }
    }
  }
  setStartPosition();

  function getData(month){
    selectedMonth = new Date().toUTCString().split(' ')[2];
    var checkMonth = month.month;
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
  carousel.addEventListener('mousemove', scrollHorizontally,false);
};
function mouseup(){
  carousel.addEventListener("mouseup",setcenter,false);
  carousel.addEventListener("mouseup",infinCarousel,false);
}
function restore(){
  carousel.addEventListener('mousedown', mousedown,false);
  carousel.addEventListener("mouseup",setcenter,false);
}
function blockCarousel(){
  carousel.removeEventListener('mousedown', mousedown,false);
  carousel.removeEventListener("mouseup",setcenter,false);
}
carousel.addEventListener("mousedown",mousedown,false);
carousel.addEventListener("touchstart", handleStart, false);


carousel.addEventListener("mouseup",mouseup,false);
  infinCarousel();
}
