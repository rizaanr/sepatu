  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url('assets/')?>vendor/jquery-easing/jquery.easing.min.js"></script>

  
<script>
  function bacaGambar(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#view_gambar').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#preview_gambar").change(function(){
    bacaGambar(this);
  });
</script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url('assets/')?>js/sb-admin-2.min.js"></script>
  
  <script src="<?=base_url('assets/')?>vendor/select2/select2.min.js"></script>
  <script>
    // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
  </script>


</body>

</html>
