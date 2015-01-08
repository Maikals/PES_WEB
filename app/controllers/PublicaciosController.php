<?php

class PublicaciosController extends BaseController {

	/**
	 * Publicacio Repository
	 *
	 * @var Publicacio
	 */
	protected $publicacio;

	public function __construct(Publicacio $publicacio)
	{
		$this->publicacio = $publicacio;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$publicacios = $this->publicacio->all();

		return View::make('publicacios.index', compact('publicacios'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('publicacios.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Publicacio::$rules);

		if ($validation->passes())
		{
			$this->publicacio->create($input);

			return Redirect::route('publicacios.index');
		}

		return Redirect::route('publicacios.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'Hi ha errors de validació.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$publicacio = $this->publicacio->findOrFail($id);

		return View::make('publicacios.show', compact('publicacio'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$publicacio = $this->publicacio->find($id);

		if (is_null($publicacio))
		{
			return Redirect::route('publicacios.index');
		}

		return View::make('publicacios.edit', compact('publicacio'));
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
		$validation = Validator::make($input, Publicacio::$rules);

		if ($validation->passes())
		{
			$publicacio = $this->publicacio->find($id);
			$publicacio->update($input);

			return Redirect::route('publicacios.index');
		}

		return Redirect::route('publicacios.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'Hi ha errors de validació.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->publicacio->find($id)->delete();

		$suscripcions = Subscripcio::where('idPublicacio', $id)->get();
		foreach($suscripcions as $s) {
			$s->delete();
		}

		return Redirect::route('publicacios.index');
	}

}
