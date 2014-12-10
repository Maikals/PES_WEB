<?php

class QuiosquersController extends BaseController {

	/**
	 * Quiosquer Repository
	 *
	 * @var Quiosquer
	 */
	protected $quiosquer;

	public function __construct(Quiosquer $quiosquer)
	{
		$this->quiosquer = $quiosquer;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$quiosquers = $this->quiosquer->all();

		return View::make('quiosquers.index', compact('quiosquers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('quiosquers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Quiosquer::$rules);

		if ($validation->passes())
		{
			$this->quiosquer->create($input);

			return Redirect::route('quiosquers.index');
		}

		return Redirect::route('quiosquers.create')
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
		$quiosquer = $this->quiosquer->findOrFail($id);

		return View::make('quiosquers.show', compact('quiosquer'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$quiosquer = $this->quiosquer->find($id);

		if (is_null($quiosquer))
		{
			return Redirect::route('quiosquers.index');
		}

		return View::make('quiosquers.edit', compact('quiosquer'));
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
		$validation = Validator::make($input, Quiosquer::$rules);

		if ($validation->passes())
		{
			$quiosquer = $this->quiosquer->find($id);
			$quiosquer->update($input);

			return Redirect::route('quiosquers.show', $id);
		}

		return Redirect::route('quiosquers.edit', $id)
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
		$this->quiosquer->find($id)->delete();

		return Redirect::route('quiosquers.index');
	}

}
