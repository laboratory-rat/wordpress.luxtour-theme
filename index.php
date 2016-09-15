<?
/**
 * Файл Index.php
 *
 *
 * Отображает страницы сайта, работающего на WordPress
 *
 * @package WordPress
 * @subpackage luxtour partners
 * @since v0.1
 */

/*
    Init vars
*/

if(!session_id()) {
    session_start();
}

if (!empty($_POST["login"]) && !empty($_POST["password"]) && !empty($_POST["confirm"]) && !empty($_POST["name"]) && !empty($_POST["second_name"]))
{
    $f_login = $_POST["login"];
    $f_pass = $_POST["password"];
    $f_confirm = $_POST["confirm"];
    $f_name = $_POST["name"];
    $f_second_name = $_POST["second_name"];

    $_SESSION["login"] = $f_login;
    $_SESSION["name"] = $f_name;
    $_SESSION["second_name"] = $f_second_name;

    if ($f_pass === $f_confirm)
    {
        $luw = new luxtour_user_worker();

        if(method_exists($luw, "add_new_user"))
        {
            $luw = new luxtour_user_worker();
            $args = array
            (
                "email" => $f_login,
                "name" => $f_name,
                "second_name" => $f_second_name,
                "password" => $f_pass,
                "confirm" => $f_confirm,
            );
            $result = $luw->add_new_user($args);
            if ($result == "")
            {
                $_SESSION["reg_success"] = "Registration success";
                wp_redirect($luxtour_redirect_url);
            }
            else
            {
                $_SESSION["reg_error"] = $result;
                wp_redirect( $luxtour_redirect_url . "/registration");
            }

            exit();

        }
        else
        {
            $_SESSION["reg_error"] = "No function";
        }
    }
    else
    {
        $_SESSION["reg_error"] = "bad passwords";
        wp_redirect( $luxtour_redirect_url . "/registration");
        exit();
    }


}



?>

<? get_header(); ?>


<? get_footer(); ?>
</body>
</html>





