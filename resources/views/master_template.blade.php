<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Hermo</title>

  <!-- Custom fonts for this template-->
  <link href="{{ URL::asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ URL::asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

  <link href="{{ URL::asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

</head>

  

  <?php echo $content; ?>

  <!-- Bootstrap core JavaScript-->

  <script src=" {{ URL::asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src=" {{ URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src=" {{ URL::asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ URL::asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
  <script src="{{ URL::asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ URL::asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ URL::asset('js/demo/datatables-demo.js') }}"></script>



<script type="text/javascript">
  $(document).on("click", ".open-AddBookDialog", function () {
     var iditems = $(this).data('id');
     var itemsname = $(this).data('itemname');
    var idpo = $(this).data('idpo');
     $(".modal-body #iditem").val( iditems );
       $(".modal-body #itemname").val( itemsname );
       $(".modal-body #idpo").val(idpo);
    $('#myModalEdit').modal('show');
});

   $(document).on("click", ".open-registerDialog", function () {
      var stock_items_id = $(this).data('stockitemsid');
      var category = $(this).data('category');
      var inventory_received = $(this).data('inventoryreceived');
      var items_id = $(this).data('itemsid');

      $(".modal-body #stock_items_id").val( stock_items_id );
      $(".modal-body #category").val( category );
      $(".modal-body #inventory_received").val(inventory_received);
      $(".modal-body #items_id").val(items_id);
      
    $('#RegisterInventory').modal('show');
});

</script>
</body>



</html>
