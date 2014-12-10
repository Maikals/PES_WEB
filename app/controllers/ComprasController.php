<?php

class ComprasController extends BaseController {

	/**
	 * Compra Repository
	 *
	 * @var Compra
	 */
	protected $compra;

	public function __construct(Compra $compra)
	{
		$this->compra = $compra;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$compras = $this->compra->all();

		return View::make('compras.index', compact('compras'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('compras.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Compra::$rules);

		if ($validation->passes())
		{
			$this->compra->create($input);

			return Redirect::route('compras.index');
		}

		return Redirect::route('compras.create')
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
		$compra = $this->compra->findOrFail($id);

		return View::make('compras.show', compact('compra'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$compra = $this->compra->find($id);

		if (is_null($compra))
		{
			return Redirect::route('compras.index');
		}

		return View::make('compras.edit', compact('compra'));
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
		$validation = Validator::make($input, Compra::$rules);

		if ($validation->passes())
		{
			$compra = $this->compra->find($id);
			$compra->update($input);

			return Redirect::route('compras.show', $id);
		}

		return Redirect::route('compras.edit', $id)
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
		$this->compra->find($id)->delete();

		return Redirect::route('compras.index');
	}

}
