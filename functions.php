<?

register_nav_menus(array(
	'top_basic_uk' => 'Main top menu uk',
	'top_anonymus_uk' => "Top menu for anonymus user uk",

	'top_basic_en' => 'Main top menu en',
	'top_anonymus_en' =>'Top menu for anonymus user en',

	'top_basic_ru' => 'Main top menu ru',
	'top_anonymus_ru' => 'Top menu for anonymus user ru',
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
