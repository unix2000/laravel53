<?php
namespace App\Transformer;
use App\Models\Items;
use League\Fractal;
//use League\Fractal\TransformerAbstract;

class ItemsTransformer extends Fractal\TransformerAbstract {
	public function transform(Items $items) 
	{
		//api return data format
		return [
	        'id'      => (int) $items->id,
	        'name'   => $items->name,
	        'email'   => $items->email,
	        'address'   => $items->address,
	        'author' => [
	        	'name'   => $items->name,
	        	'email'   => $items->email,
	        ],
            'links'   => [
                [
                    'rel' => 'self',
                    'uri' => '/items/'.$items->id,
                ]
            ],
	    ];
	}
}