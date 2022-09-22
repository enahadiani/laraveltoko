$('#saku-datatable').on('click', '#btn-refresh', function(){
    if(typeof dataTable === 'object'){
        console.log('refresh list-data');
        dataTable.ajax.reload(); 
    }
});