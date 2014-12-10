<?php

class QuioscsController extends BaseController {

	/**
	 * Quiosc Repository
	 *
	 * @var Quiosc
	 */
	protected $quiosc;

	public function __construct(Quiosc $quiosc)
	{
		$this->quiosc = $quiosc;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$quioscs = $this->quiosc->all();

		return View::make('quioscs.index', compact('quioscs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('quioscs.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Quiosc::$rules);

		if ($validation->passes())
		{
			$this->quiosc->create($input);

			return Redirect::route('quioscs.index');
		}

		return Redirect::route('quioscs.create')
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
		$quiosc = $this->quiosc->findOrFail($id);

		return View::make('quioscs.show', compact('quiosc'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$quiosc = $this->quiosc->find($id);

		if (is_null($quiosc))
		{
			return Redirect::route('quioscs.index');
		}

		return View::make('quioscs.edit', compact('quiosc'));
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
		$validation = Validator::make($input, Quiosc::$rules);

		if ($validation->passes())
		{
			$quiosc = $this->quiosc->find($id);
			$quiosc->update($input);

			return Redirect::route('quioscs.show', $id);
		}

		return Redirect::route('quioscs.edit', $id)
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
		$this->quiosc->find($id)->delete();

		return Redirect::route('quioscs.index');
	}

}
