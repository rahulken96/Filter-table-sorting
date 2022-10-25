<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.28.14/js/jquery.tablesorter.min.js"></script>
<script src="https://www.jqueryscript.net/demo/Simple-jQuery-Dropdown-Table-Filter-Plugin-ddtf-js/ddtf.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/floatthead/1.4.0/jquery.floatThead.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('#js-sort-table').tablesorter().floatThead();
        //$("#js-sort-table").filterTable('-', 'GD');
        $('.js-filter-drop').change(function() {
            $('#js-sort-table tbody tr').hide();
            var filters = $('.js-filter-drop').filter(function() {
                return $(this).val() != '0';
            });
            var showSelector = '#js-sort-table tbody tr';
            filters.each(function(index) {
                showSelector += '[' + $(this).data('target') + '="' + $(this).val() + '"]';
            });
            $(showSelector).show();
        });
        $(".js-csv").on('click', function(event) {
            exportTableToCSV.apply(this, [$('#js-sort-table'), 'export-86-87-league.csv']);
        });
    });
</script>
