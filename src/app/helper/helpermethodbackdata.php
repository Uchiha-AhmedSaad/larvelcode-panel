<?php 
use App\sitesetting;
// images directory
function imagesdirectory()
{
	return 'public';
}
function longstr($element,$length)
{
	return wordwrap($element,$length);
}
function genralsettings($var = 'no value')
{
	$settings = sitesetting::where('slug',$var)->get(['value'])[0]->toArray(); 
	foreach ($settings as $key => $value) {
		return $value;
	}
}

/**
* 
*/
class Maker
{
	
public function hi()
{
	echo 'ahmed';
}
}

?>