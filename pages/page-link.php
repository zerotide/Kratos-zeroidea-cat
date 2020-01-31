<?php
/**
template name: 友情链接模板
*/
get_header();get_header('abstract'); ?>
    <div class="container">
        <div class="row">
            <?php if(kratos_option('page_side_bar')=='left_side'&&!wp_is_mobile()){ ?>
                <aside id="kratos-widget-area" class="col-md-4 hidden-xs hidden-sm scrollspy">
                    <div id="sidebar">
                        <?php dynamic_sidebar('sidebar_tool'); ?>
                    </div>
                </aside>
            <?php } ?>
            <section id="main" class='<?php echo (kratos_option('page_side_bar')=='center')?'col-md-12':'col-md-8'; ?>'>
            <?php if(have_posts()){the_post(); ?>
                <article>
                    <div class="kratos-hentry kratos-post-inner clearfix">
                        <div class="kratos-post-content">
                        <h2 class="title-h2" style="text-align:center;font-size:18pt">小可爱们</h2>
                        <p style="text-align:center"><span style="color:#999999">小可爱们的链接，每次刷新随机排序~</span></p>
                        <div class="linkpage">
                            <hr/>
                            <ul><?php
                            $bookmarks = get_bookmarks(array('orderby'=>'rand'));
                            if(!empty($bookmarks)){
                                foreach($bookmarks as $bookmark){
                                    $friendimg = $bookmark->link_image;
                                    if(empty($friendimg)){
                                        echo '<li><a href="'.$bookmark->link_url.'" target="_blank" rel="nofollow"><img src="'.get_template_directory().'/images/avatar.png"><h4>'.$bookmark->link_name.'</h4><p>'.$bookmark->link_description.'</p></a></li>';
                                    } else {
                                        echo '<li><a href="'.$bookmark->link_url.'" target="_blank" rel="nofollow"><img src="'.$bookmark->link_image.'"><h4>'.$bookmark->link_name.'</h4><p>'.$bookmark->link_description.'</p></a></li>';
                                    }
                                }
                            } ?>
                        </div>
                        <?php the_content(); ?>
                        </div>
                    </div>
                    <?php comments_template(); ?>
                </article>
            <?php } ?>
            </section>
            <?php if(kratos_option('page_side_bar')=='right_side'&&!wp_is_mobile()){ ?>
            <aside id="kratos-widget-area" class="col-md-4 hidden-xs hidden-sm scrollspy">
                <div id="sidebar">
                    <?php dynamic_sidebar('sidebar_tool'); ?>
                </div>
            </aside>
            <?php } ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>