<?php

class AdministradorsController extends BaseController {

	/**
	 * Administrador Repository
	 *
	 * @var Administrador
	 */
	protected $administrador;

	public function __construct(Administrador $administrador)
	{
		$this->administrador = $administrador;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$administradors = $this->administrador->all();

		return View::make('administradors.index', compact('administradors'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('administradors.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Administrador::$rules);

		if ($validation->passes())
		{
			$this->administrador->create($input);

			return Redirect::route('administradors.index');
		}

		return Redirect::route('administradors.create')
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
		$administrador = $this->administrador->findOrFail($id);

		return View::make('administradors.show', compact('administrador'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$administrador = $this->administrador->find($id);

		if (is_null($administrador))
		{
			return Redirect::route('administradors.index');
		}

		return View::make('administradors.edit', compact('administrador'));
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
		$validation = Validator::make($input, Administrador::$rules);

		if ($validation->passes())
		{
			$administrador = $this->administrador->find($id);
			$administrador->update($input);

			return Redirect::route('administradors.show', $id);
		}

		return Redirect::route('administradors.edit', $id)
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
		$this->administrador->find($id)->delete();

		return Redirect::route('administradors.index');
	}

}
