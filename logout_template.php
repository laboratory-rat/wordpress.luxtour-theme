<?
/**
 * Template Name: logout_template
 */

if (is_user_logged_in())
{
    wp_logout();
    wp_redirect(get_site_url());
}
else
{
    wp_redirect(get_site_url());
}
?>
