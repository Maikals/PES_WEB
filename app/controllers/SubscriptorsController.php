<?php

class SubscriptorsController extends BaseController {

	/**
	 * Subscriptor Repository
	 *
	 * @var Subscriptor
	 */
	protected $subscriptor;

	public function __construct(Subscriptor $subscriptor)
	{
		$this->subscriptor = $subscriptor;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$subscriptors = $this->subscriptor->all();

		return View::make('subscriptors.index', compact('subscriptors'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('subscriptors.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Subscriptor::$rules);

		if ($validation->passes())
		{
			$this->subscriptor->create($input);

			return Redirect::route('subscriptors.index');
		}

		return Redirect::route('subscriptors.create')
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
		$subscriptor = $this->subscriptor->findOrFail($id);

		return View::make('subscriptors.show', compact('subscriptor'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$subscriptor = $this->subscriptor->find($id);

		if (is_null($subscriptor))
		{
			return Redirect::route('subscriptors.index');
		}

		return View::make('subscriptors.edit', compact('subscriptor'));
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
		$validation = Validator::make($input, Subscriptor::$rules);

		if ($validation->passes())
		{
			$subscriptor = $this->subscriptor->find($id);
			$subscriptor->update($input);

			return Redirect::route('subscriptors.show', $id);
		}

		return Redirect::route('subscriptors.edit', $id)
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
		$this->subscriptor->find($id)->delete();

		return Redirect::route('subscriptors.index');
	}

}
