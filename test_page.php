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


Hello.I am test page;

<? get_footer(); ?>
