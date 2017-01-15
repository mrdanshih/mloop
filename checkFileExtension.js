$(document).ready( function () {
  $("fileUploadForm").submit( function(submitEvent) {
    // get the file name, possibly with path (depends on browser)
    var filename = $("#file_input").val();

    // Use a regular expression to trim everything before final dot
    var extension = filename.replace(/^.*\./, '').toLowerCase();

    if($.inArray(extension, ['mp3','aac','wav','m4a']) == -1) {
      alert('invalid!!');
      submitEvent.preventDefault();
    }else{
      break;
    }

}
