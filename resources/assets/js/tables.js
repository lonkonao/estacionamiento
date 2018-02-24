<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datatables.data') !!}',
        columns: [
        { data: 'id', name: 'id' },
        { data: 'fechaLlegada', name: 'fechaLlegada' },
        { data: 'operador', name: 'operador' },

    ]
});
});
</script>