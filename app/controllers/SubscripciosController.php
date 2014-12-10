<?php

class SubscripciosController extends BaseController {

	/**
	 * Subscripcio Repository
	 *
	 * @var Subscripcio
	 */
	protected $subscripcio;

	public function __construct(Subscripcio $subscripcio)
	{
		$this->subscripcio = $subscripcio;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$subscripcios = $this->subscripcio->all();

		return View::make('subscripcios.index', compact('subscripcios'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('subscripcios.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Subscripcio::$rules);

		if ($validation->passes())
		{
			$this->subscripcio->create($input);

			return Redirect::route('subscripcios.index');
		}

		return Redirect::route('subscripcios.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$subscripcio = $this->subscripcio->findOrFail($id);

		return View::make('subscripcios.show', compact('subscripcio'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$subscripcio = $this->subscripcio->find($id);

		if (is_null($subscripcio))
		{
			return Redirect::route('subscripcios.index');
		}

		return View::make('subscripcios.edit', compact('subscripcio'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Subscripcio::$rules);

		if ($validation->passes())
		{
			$subscripcio = $this->subscripcio->find($id);
			$subscripcio->update($input);

			return Redirect::route('subscripcios.show', $id);
		}

		return Redirect::route('subscripcios.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->subscripcio->find($id)->delete();

		return Redirect::route('subscripcios.index');
	}

}
