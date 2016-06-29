function HttpRequest() {}

HttpRequest.prototype.load = function(url,div, callback) {
    var self = this;
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET", url);
    xmlhttp.send();
    if (xmlhttp.readyState == 1){
      div = typeof div == 'function' ||  div == '' ? 'body' : div;
      var loadingElement = this.setLoadAnimation();
      console.log(div);
      document.querySelector(div).appendChild(loadingElement);
    }
    xmlhttp.addEventListener('readystatechange', function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            self.removeLoadAnimation(loadingElement);
          if (callback) {
            callback(xmlhttp.responseText);
          }
        }
    });
};
HttpRequest.prototype.removeLoadAnimation = function(div){
  div.parentNode.removeChild(div);
};
HttpRequest.prototype.setLoadAnimation = function(){
  var loader = document.createElement("img"),
      loadholder = document.createElement('div');
  loader.setAttribute("src", "app/img/progress-bar.gif");
  loadholder.id = 'loading';
  loadholder.appendChild(loader);
  return loadholder;
};
