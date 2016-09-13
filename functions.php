<?

register_nav_menus(array(
'top_basic' => 'Main top menu',
'top_anonymus' => "Top menu for anonymus user",
));


$luxtour_redirect_url = "http://wp-test.in/";


function get_user_role()
{
    if ( is_user_logged_in() )
    {


    }
}

function clear_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
