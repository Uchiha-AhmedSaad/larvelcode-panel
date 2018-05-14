<script type="text/javascript">
  $('#button').on('click',function() {
    if ($('#button').text() === 'Select All') 
    {
      $('.checkboxelement').prop("checked", !$('.checkboxelement').prop("checked"));
      $('#button').text('Deselect All');
      $('.checkboxelement').attr("checked", "checked");
      $('#submitone').attr('disabled',false);
    }
    else 
    {
      $('#button').text('Select All');
      $('.checkboxelement').removeAttr("checked", "checked");
      $('#submitone').attr('disabled','disabled');
    }
  });
  $('.checkboxelement').on('click', function () {
     if ($('.checkboxelement:checked').length == 0) 
     {
      $('#submitone').attr('disabled','disabled');
     }
     else{
      $('#submitone').attr('disabled',false);
     }  
  });
  if ($('.checkboxelement:checked').length > 0) {
      $('#button').text('Deselect All');         
  }
</script>