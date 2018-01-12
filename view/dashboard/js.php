    <!-- Jquery Core Js -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="../assets/plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="../assets/plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="../assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Validation Plugin Js -->
    <script src="../assets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- JQuery Steps Plugin Js -->
    <script src="../assets/plugins/jquery-steps/jquery.steps.js"></script>

    <!-- Validation Plugin Js -->
    <script src="../assets/plugins/scrollreveal/scrollreveal.min.js"></script>

    <!-- Jquery Spinner Plugin Js -->
    <script src="../assets/plugins/jquery-spinner/js/jquery.spinner.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../assets/plugins/node-waves/waves.js"></script>

    <!-- Select Plugin Js -->
    <script src="../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

      <!-- Jquery Spinner Plugin Js -->
    <script src="../assets/plugins/jquery-spinner/js/jquery.spinner.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- SweetAlert Plugin Js -->
    <script src="../assets/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="../assets/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Custom Js -->
    <script src="../assets/js/admin.js"></script>
    <script src="../assets/js/pages/forms/form-wizard.js"></script>
    <script src="../assets/js/pages/tables/jquery-datatable.js"></script>
    <script src="../assets/js/pages/examples/sign-in.js"></script>
    <script src="../assets/js/pages/forms/basic-form-elements.js"></script>
    <script src="../assets/js/pages/forms/advanced-form-elements.js"></script>
    <script src="../assets/js/pages/forms/form-wizard.js"></script>

    <!-- Demo Js -->
    <script src="../assets/js/demo.js"></script>

<script>
        jQuery(document).ready(function($){
            $('.delete-link').on('click',function(){
                var getLink = $(this).attr('href');
                swal({
                        title: "PERHATIAN !",
                        text: "Anda yakin akan menghapus data ?",
                        type: "warning",
                        html: true,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Hapus',
                        showCancelButton: true,
                        cancelButtonText: 'Jangan',
                        closeOnConfirm: true
                        },function(){
                        swal("Deleted!", "Your imaginary file has been deleted!", "success");
                        window.location.href = getLink
                    })
                return false;
            });
        });
</script>
<script>
        jQuery(document).ready(function($){
            $('.lanjut-link').on('click',function(){
                var getLink = $(this).attr('href');
                swal({
                        title: "PERHATIAN !",
                        text: "Pelanggan sudah membayar ?",
                        type: "warning",
                        html: true,
                        confirmButtonColor: '#03A9F4',
                        confirmButtonText: 'Ya',
                        showCancelButton: true,
                        cancelButtonText: 'Belum',
                        closeOnConfirm: true
                        },function(){
                        swal("Deleted!", "Your imaginary file has been deleted!", "success");
                        window.location.href = getLink
                    })
                return false;
            });
        });
    </script>
