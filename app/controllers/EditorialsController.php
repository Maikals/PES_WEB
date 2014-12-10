<?php

class EditorialsController extends BaseController {

	/**
	 * Editorial Repository
	 *
	 * @var Editorial
	 */
	protected $editorial;

	public function __construct(Editorial $editorial)
	{
		$this->editorial = $editorial;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$editorials = $this->editorial->all();

		return View::make('editorials.index', compact('editorials'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('editorials.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Editorial::$rules);

		if ($validation->passes())
		{
			$this->editorial->create($input);

			return Redirect::route('editorials.index');
		}

		return Redirect::route('editorials.create')
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
		$editorial = $this->editorial->findOrFail($id);

		return View::make('editorials.show', compact('editorial'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$editorial = $this->editorial->find($id);

		if (is_null($editorial))
		{
			return Redirect::route('editorials.index');
		}

		return View::make('editorials.edit', compact('editorial'));
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
		$validation = Validator::make($input, Editorial::$rules);

		if ($validation->passes())
		{
			$editorial = $this->editorial->find($id);
			$editorial->update($input);

			return Redirect::route('editorials.show', $id);
		}

		return Redirect::route('editorials.edit', $id)
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
		$this->editorial->find($id)->delete();

		return Redirect::route('editorials.index');
	}

}
