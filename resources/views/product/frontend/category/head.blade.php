<!--style item product option!-->
@include('cart.common.style')
<!--script item product option!-->
@include('cart.common.script')
<!--rating item product option!-->
<link href="{{asset('product/rating/bootstrap-rating.css')}}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script type="text/javascript" src="{{asset('product/rating/bootstrap-rating.min.js')}}"></script>
<script>
    // rating
    $("input.rating-disabled").rating({
        filled: 'fa fa-star rating-color',
        empty: 'fa fa-star'
    });
    // show hide description category
    $(document).on('click', '.show-more', function(e) {
        $('.category-excerpt').removeClass('hide');
        $('.show-more').hide();
        $('.hide-more').show();
    });
    $(document).on('click', '.hide-more', function(e) {
        $('.category-excerpt').addClass('hide');
        $('.show-more').show();
        $('.hide-more').hide();
    });
    //filter product
    $(document).on('click', '.filter-title', function(e) {
        $('.block-content').show();
        $('.filter-close').show();
        $('.filter-title,.toolbar-sorter').hide();
    });
    $(document).on('click', '.filter-close', function(e) {
        $('.block-content').hide();
        $('.filter-close').hide();
        $('.filter-title,.toolbar-sorter').show();
    });
    $(document).on('click', '.filter-reset', function(e) {
        e.preventDefault();
        $(this).parent().parent().find('.filter-item.selected').removeClass('selected');
        loadSelectedFilter();
    });
    $(document).on('click', '.filter-item', function(e) {
        e.preventDefault();
        $(this).toggleClass('selected');
        loadSelectedFilter();
    });
    $(document).on('click', '.filter-remove', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $(this).parent().remove();
        $('.filter-item[data-id="' + id + '"]').removeClass('selected');

        loadSelectedFilter();
    });
    $(document).on('click', '.filter-clear', function(e) {
        e.preventDefault();
        $('.filter-item.selected').removeClass('selected');
        $('ol.filter-ol-list').html('');
    });

    function loadSelectedFilter() {
        var html = '';
        var attr_id = '';
        $.each($('.filter-item.selected'), function(i, item) {
            var id = $(this).attr('data-id');
            var title = $(this).attr('data-title');
            var keyword = $(this).parent().parent().attr('data-keyword');
            attr_id += keyword + ';' + id + ';';
            html += '<li class="item"><span class="filter-value">' + title + '</span> <a href="javascript:void(0)" class="action  filter-remove" data-id="' + id + '"><span></span></a></li>';
        });
        $('#filter-attr').val(attr_id);
        $('ol.filter-ol-list').html(html);
    }
    var time;
    $(document).on('keyup change click', '.filter-apply', function() {
        let page = $('.pagination .active a').text();
        time = setTimeout(function() {
            get_list_object(page);
        }, 500);
        return false;
    });
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        get_list_object(page);

    });

    function get_list_object(page = 1) {

        let catalogueid = $('input[name="catalogueid"]').val();
        let attr = $('input[name="attr"]').val();
        let param = {
            'page': page,
            'catalogueid': catalogueid,
            'attr': attr,
            'sort': "{{request()->get('sort')}}"
        }
        let ajaxUrl = '<?php echo route('productCategoryFrontend.filter') ?>';
        $.post(ajaxUrl, {
                page: param.page,
                catalogueid: param.catalogueid,
                attr: param.attr,
                sort: param.sort,
                "_token": $('meta[name="csrf-token"]').attr("content")
            },
            function(data) {
                $('#getListProduct').html(data);

            });
        $('.block-content').hide();
        $('.filter-close').hide();
        $('.filter-title,.toolbar-sorter').show();
    }
</script>
<style>
    /* rating */
    .fa-star {
        font-size: 20px;
    }

    .rating-color {
        color: #fbc634 !important
    }
</style>