$("#selectImage").change(function(){
  if (this.files && this.files[0]) {
    $('#image').removeClass('d-none');
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#image').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);
  }
});