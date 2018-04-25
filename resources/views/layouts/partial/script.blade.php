
<script src="{{asset('Backend/js/jquery-2.1.1.min.js')}}"></script>
<script src="{{asset('Backend/public/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('Backend/js/dataTables.bootstrap.js')}}"></script>
<script type="text/javascript">
    $(".table").DataTable(

            {
                "bInfo" : false,
                "aLengthMenu": [[5, 7, 10, -1], [5, 7, 10, "All"]],
                "pageLength": 5,
                "oLanguage":{
                    "sLengthMenu": "Afficher _MENU_  slider par page",
                    "sSearch" : "Rechercher ",
                    "zeroRecords": "No Data Found",
                    "info": "Total",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtered from _MAX_ total records)",

                }

            }
    );
</script>
