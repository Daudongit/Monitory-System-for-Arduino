$(document).ready(function(){
    $("#selectdevice").change((e)=>{
        window.location = base_url+'/map/'+
            $('#selectdevice').val();
        }
    );
  });