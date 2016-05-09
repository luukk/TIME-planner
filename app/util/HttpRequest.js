function HttpRequest() {}

HttpRequest.prototype.load = function(url, callback) {

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET", url);
    xmlhttp.send();
    if (xmlhttp.readyState == 1){
      document.getElementById('loading').className += 'show';
    }
    xmlhttp.addEventListener('readystatechange', function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          document.getElementById('loading').classList.remove("show");
          if (callback) {
              callback(xmlhttp.responseText);
          }
        }
    });
};
