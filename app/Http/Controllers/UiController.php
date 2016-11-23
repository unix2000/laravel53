<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use App\Http\Requests;
use Charts;
use App\Models\Items;

class UiController extends Controller {
	public function index()
	{
		// $chart = Charts::create('line', 'highcharts')
  //           ->setTitle('highcharts图表')
  //           ->setLabels(['First', 'Second', 'Third'])
  //           ->setValues([5,10,20])
  //           ->setDimensions(660,360)
  //           ->setResponsive(true);
      //   $chart = Charts::multi('line', 'highcharts')
		    // ->setColors(['#ff0000', '#00ff00', '#0000ff'])
		    // ->setLabels(['One', 'Two', 'Three'])
		    // ->setDataset('Test 1', [1,2,3])
		    // ->setDataset('Test 2', [0,6,0])
		    // ->setDataset('Test 3', [3,4,1]);
		// $chart = Charts::database(Items::all(),'bar','highcharts');
		$chart = Charts::database(Items::limit(10)->get(),'bar','highcharts')
			->setElementLabel("email")
		    ->setDimensions(520, 360)
		    ->setResponsive(true)
		    ->groupBy('email');;
		// dump($chart);
        return view('ui.index', ['chart' => $chart]);
	}
}
