<?php

namespace Corona\Widget;

use XF\Widget\AbstractWidget;

class Corona extends AbstractWidget {

protected $defaultOptions = [
		'contry' => 'DZ'
	];


public function render()
{
  $options = $this->options;
	$contry = $options['contry'];
		
		$all = file_get_contents("https://corona.lmao.ninja/v2/all");
		$dz = file_get_contents("https://corona.lmao.ninja/v2/countries/".$contry);
		$xall = json_decode($all, true);
		$xcontry = json_decode($dz, true);		
		
		 $viewParams = [
		 'all'    => $xall,
		 'contrys'    => $xcontry
		 ];
		return $this->renderer('widget_Corona', $viewParams); 	       
}
public function verifyOptions(\XF\Http\Request $request, array &$options, &$error = null)
	{
		$options = $request->filter([
			'contry' => 'str'
		]);
		return true;
	}

}