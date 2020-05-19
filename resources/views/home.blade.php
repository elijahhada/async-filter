@extends('layouts.app')

@section('content')
    <div class="container">
        @include('filter_search')

        <div class="row table_headers mt-3 mb-3">
            <div class="col-1">
                #
            </div>
            <div class="col-4">
                Компания
            </div>
            <div class="col-3">
                Владелец
            </div>
            <div class="col-4">
                Email
            </div>
        </div>
        <hr>
        <div class="table_items_container">
            @foreach($companies as $company)
                <div class="content_item">
                    <div class="row table_items">
                        <div class="col-1">
                            {{ $company->id }}
                        </div>
                        <div class="col-4">
                            {{ $company->name }}
                        </div>
                        <div class="col-3">
                            {{ $company->user->name }}
                        </div>
                        <div class="col-3">
                            {{ $company->user->email }}
                        </div>
                        <div class="col-1 arrows">
                            <i class="fa fa-caret-down"></i>
                        </div>
                    </div>
                    <div class="services_container">
                        <p class="services_title">Услуги компании {{ $company->name }}</p>
                        <div class="row services">
                            @foreach($company->services as $key => $service)
                                <div class="col-1">
                                    {{ $key + 1 }}
                                </div>
                                <div class="col-1">
                                    @if($key==0)
                                        <i class="fa fa-cart-plus"></i>
                                    @elseif($key==1)
                                        <i class="fa fa-car"></i>
                                    @else
                                        <i class="fa fa-university"></i>
                                    @endif
                                </div>
                                <div class="col-10">
                                    {{ $service->name }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
<script>
$(document).ready(function() {
    $(".content_item").click(function() {
        $(this).children(".services_container").toggle("slow", function() {});
        
        if($(this).children().children().children('i').attr('class')=='fa fa-caret-down'){
            $(this).children().children().children('i').attr('class', 'fa fa-caret-up');
        }else{
            $(this).children().children().children('i').attr('class', 'fa fa-caret-down');
        }
    });

    $('#search_button').click(function() {
        let query = $("#search_string").val();
        fetch_companies(query);
    });

    $('#refresh_button').click(function() {
        let query = '';
        fetch_companies(query);
        $('#search_string').val('');
    });

    function fetch_companies(query = ''){
        $.ajax({
            url:"{{ url('/search') }}",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data){
                $('.table_items_container').html(data.data);
                $(".content_item").click(function() {
                    $(this).children(".services_container").toggle("slow", function() {});
                    
                    if($(this).children().children().children('i').attr('class')=='fa fa-caret-down'){
                        $(this).children().children().children('i').attr('class', 'fa fa-caret-up');
                    }else{
                        $(this).children().children().children('i').attr('class', 'fa fa-caret-down');
                    }
                });
            }
        })
    }
});
</script>
@endsection