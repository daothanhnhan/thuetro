<nav class="gb-main-menu_ldpvinhome" >
     <!-- <div class="col-md-1" style="    z-index: 99999;
    position: relative;">
                            <a href="/"><img src="/images/<?=$rowConfig['web_logo']?>" alt="" class="logo"></a>
                        </div> -->
    <div class="col-md-12">
        <div class="main-navigation uni-menu-text_ldpvinhome">
        <div class="cssmenu">
            
            <?php 
                $list_menu = $menu->getListMainMenu_byOrderASC();
                $menu->showMenu_byMultiLevel_mainMenuTraiCam_lang($list_menu,0,$lang,0);
            ?>
        </div>
    </div>
    </div>
    <!-- <div class="col-md-1">
                            <div class="search">
                                <div class="header_search search_form" onclick="">
                                    <span class="icon-click-search"><i class="fa fa-search"></i></span>
                                    <form class="input-group search-bar search_form" action="/search-news/0" method="post" role="search">
                                        <input type="search" name="q" value="" placeholder="Tìm kiếm... " class="input-group-field st-default-search-input search-text" autocomplete="off">
                                    
                                        <span class="input-group-btn">
                                            <button class="btn icon-fallback-text">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </form>
                                </div>
                            </div>
                        </div> -->
</nav>

<script src="/plugin/sticky/jquery.sticky.js"></script>
<script>
    $(document).ready(function () {
        var headerHeight = $('.gb-main-menu_ldpvinhome').outerHeight();

        $('.slide-section').click(function () {
            var linkHref = $(this).attr('href');
            $('html, body').animate({
                scrollTop: $(linkHref).offset().top - headerHeight
            }, 1000);
            e.preventDefault();
        });

        $(".sticky-menu").sticky({topSpacing:0});
    });
</script>
