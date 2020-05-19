$(document).ready(function() {
    $(".table_items_container").click(function() {
        $(this).children(".services_container").toggle("slow", function() {});
    });

    $('#search_button').click(function() {
        let query = $("#search_string").val();
        fetch_companies(query);
    });

    function fetch_companies(query = ''){
        $.ajax({
            url:"{{ route('main') }}",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data){
                $('.table_items_container').html(data.data);
            }
        })
    }
});