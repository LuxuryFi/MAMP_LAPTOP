$(document).ready(function () {

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#img-preview').attr('src', e.target.result).show();
      }
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }


  $('input[type=file]').change(function(){
     readURL(this);
  });
 

  //Cần xóa cache trình duyệt

 // CKEDITOR.replace('description');

 CKEDITOR.replace('description', {
  //đường dẫn đến file ckfinder.html của ckfinder
         filebrowserBrowseUrl: 'assets/ckfinder/ckfinder.html',
         //đường dẫn đến file connector.php của ckfinder
         filebrowserUploadUrl: 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
 }) ;




});