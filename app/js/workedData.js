$(document).ready(function(){
  var form = document.getElementById('sethoursform');
  console.log(form);
  form.addEventListener('submit',function(e){
    var hours = document.getElementById('sethours').value;
    httpRequest = new HttpRequest();

    httpRequest.load("app/models/setmanagerdata.php?date="+date+"&worked="+hours, function(data) {
      dom[0].innerHTML = data;
      dom[0].parentNode.className += ' grey';
    });

    e.preventDefault();
  },false);
  var e = document.getElementById("selectCalanderForm");
  var strUser = e.options;
  $(document).on('click','.date_cell', function() {
      $('#sethours').val('')
      console.log('click');
      date = $(this).attr('date');
      $("#hourVensterDate").html(date);
      dom = $(this).find('.popup_event');
      $('#setHoursVenster').css('display', 'block');
      $("#submitworkedhours, #monthSelector").click(function(event) {
        $('#setHoursVenster').css('display', 'none');
      });
      $("#closeVenster").click(function(event) {
        $("#setHoursVenster").css('display','none');
      });
  });
});
