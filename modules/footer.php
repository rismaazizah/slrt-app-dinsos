</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Dinas Sosial P3AP2KB &copy; Kabupaten Banjar 2023</span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>



<!-- Bootstrap core JavaScript-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="../assets/library/sbadmin/vendor/jquery/jquery.min.js"></script>
<script src="../assets/library/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- <script src="../assets/library/sbadmin/js/demo/chart-pie-demo.js"></script> -->
<!-- <script src="../assets/library/sbadmin/js/demo/chart-bar-demo.js"></script> -->

<!-- Core plugin JavaScript-->
<script src="../assets/library/sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../assets/library/sbadmin/js/sb-admin-2.min.js"></script>

<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>


<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js" integrity="sha512-RtZU3AyMVArmHLiW0suEZ9McadTdegwbgtiQl5Qqo9kunkVg1ofwueXD8/8wv3Af8jkME3DDe3yLfR8HSJfT2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $(document).ready(function() {
    $(".select2").select2({
      placeholder: "Pilih ...",
      theme: "bootstrap",
    });
  });
</script>

<script>
  $(document).ready(function() {
    $('#mytable').DataTable({
      "autoWidth": false,
      "buttons": [{
          extend: 'pdfHtml5',
          exportOptions: {
            columns: ':not(:last-child)',
          },
          alignment: "center",
          customize: function(doc) {
            doc.content[1].table.widths =
              Array(doc.content[1].table.body[0].length + 1).join('*').split('');
          }
        },
        "colvis"
      ],
    }).buttons().container().appendTo('#mytable_wrapper .col-md-6:eq(0)');
  });
</script>

<script>
  $(document).ready(function() {
    $('#mytable2').DataTable({
      "autoWidth": false,
    }).buttons().container().appendTo('#mytable2_wrapper .col-md-6:eq(0)');
  });
</script>

</body>

</html>
<?php
ob_end_flush();
?>