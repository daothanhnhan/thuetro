<div class="gb-search-center_vyhofoco">
    <div class="icons-search" id="search-click">
    <i class="fa fa-search" aria-hidden="true"></i>

    <div class="search">
        <div class="search-frm">
            <form role="search" method="post" class="search-form" action="/search-product/0">
                <input type="text" class="search-field" placeholder="Tìm kiếm sản phẩm..." name="q">
                <button type="button" class="close-search"><i class="fa fa-close" aria-hidden="true"></i></button>
            </form>
        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function () {
        //-----------------search-----------------------
        $('#search-click').on('click', function(e) {
            if( $(e.target).is('#search-click, i')){
                $('.close-search').fadeIn();
                $('.search').css('visibility', 'visible');
                $('.search-field').removeClass('none-search');
                $('.search-field').addClass('block-search');
                return false;
            }
        });
        $('.search-frm').on('click', function(e) {
            if($(e.target).is('.close-search, .close-search i')){
                $('.close-search').hide();
                $('.search').css('visibility', 'hidden');
                $('.search-field').removeClass('block-search');
                $('.search-field').addClass('none-search');
                return false;
            }
        });
    });
</script>