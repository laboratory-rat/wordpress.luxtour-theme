<?
$log = "";

if(!is_user_logged_in())
{
    $log = "No log";
}
else
{
    $log = "You are user";
}
?>
<? get_header(); ?>


<article id="main_body">
<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <span><? the_title(); ?></span>
        </div>
    </div>


    <div class="row">

        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

                    <? if ( have_posts() ) : while ( have_posts() ) : the_post() ?>

                        <!-- Here we can put some data -->
                        <div> <? the_content(); ?> </div>


                    <? endwhile; ?>

                    <?
                    else: ?>
                        <p>Nope</p>
                    <? endif; ?>



        </div>

    </div>


</div>
</article>

<? get_footer(); ?>
