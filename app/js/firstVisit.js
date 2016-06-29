$(document).ready(function(){
  httpRequest = new HttpRequest;
  httpRequest.load('app/models/firstlogin.php','body',function(callback){
    var first_login = callback;

if(first_login == 1){
    document.body.innerHTML +='<div id="setupBackground"><div id="setup" class="col-md-offset-5"><h1>Welcome</h1><form id="setupForm" method="GET"><label for="salary">uurloon</label><input type="text" name="salary" id="salary"><input type="submit" id="submitSetupForm"></form></div></div>';
    setupForm = document.getElementById('setupForm');
    setupForm.addEventListener('submit',function(e){
      var salary = document.getElementById('salary').value;
      httpRequest = new HttpRequest();
        httpRequest.load('app/models/setSetup.php?salary='+salary,'body',function(callback){
          if(callback == 'succes'){
            document.getElementById('setupBackground').className += 'hide';
          }
      })
      e.preventDefault();
    })
  }
})
});
