<?php

class LinksController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$links = Links::all();
		return View::make('home')->with('home', $links);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), array(
			'url' => 'required|url|max:255'
		));

		if($validator->fails()){
			return Redirect::action('home.index')->withInput()->withErrors($validator);
		}else{
			$url = Input::get('url');
			$code = null;
			$exists = Links::where('url', '=', $url);


			if($exists->count() === 1){
				$code = $exists->first()->code;
			}else{
				$created = Links::create(array(
					'url' => $url
				));

				if($created){
					$code = base_convert($created->id, 10, 26);

					Links::where('id', '=', $created->id)->update(array(
						'code' => $code
					)); 
				}
			}

			if($code){

				//redirect home
				return Redirect::action('home.index')->with('global','<label>Tu url es: <a href="'. URL::action('get', $code) .'">s.com/'. $code .'</a></label>');

			}
		}
		return Redirect::action('home.index')->with('global','Algo no anda bien');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($code)
	{
		$link = Links::where('code', '=', $code);

		if($link->count() === 1){
			return Redirect::to($link->first()->url);
		}else{
			return Redirect::action('home.index');
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
