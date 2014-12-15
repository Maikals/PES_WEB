<?php

class ValsController extends BaseController {

	/**
	 * Val Repository
	 *
	 * @var Val
	 */
	protected $val;

	public function __construct(Val $val)
	{
		$this->val = $val;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$vals = $this->val->all();

		$email = "admin@mail.com";
		$subscriptor = \Subscriptor::where('email', '=', $email)->first();



        $apivals = \Val::where('data', '=', new DateTime('today'))->where('idSubscriptor', '=', $subscriptor->id)->get();

		return View::make('vals.index', compact('vals'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('vals.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$input['idSubscriptor'] = Auth::id();
		$validation = Validator::make($input, Val::$rules);

		if ($validation->passes())
		{
			$this->val->create($input);

			return Redirect::route('vals.index');
		}

		return Redirect::route('vals.create')
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
		$val = $this->val->findOrFail($id);

		return View::make('vals.show', compact('val'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$val = $this->val->find($id);

		if (is_null($val))
		{
			return Redirect::route('vals.index');
		}

		return View::make('vals.edit', compact('val'));
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
		$validation = Validator::make($input, Val::$rules);

		if ($validation->passes())
		{
			$val = $this->val->find($id);
			$val->update($input);

			return Redirect::route('vals.show', $id);
		}

		return Redirect::route('vals.edit', $id)
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
		$this->val->find($id)->delete();

		return Redirect::route('vals.index');
	}

}
