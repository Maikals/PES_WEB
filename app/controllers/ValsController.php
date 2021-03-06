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
		$vals = $this->val->where('idSubscriptor', '=', Auth::id())
                        ->where('data', '>=', date('m/d/Y'))
                        ->orderBy('idSubscripcio')->get();

        foreach($vals as $val) {
            $subscripcio = \Subscripcio::find($val->idSubscripcio);
            $idPublicacio = $subscripcio->idPublicacio;
            $publicacio = \Publicacio::find($idPublicacio);

            $val->nomPublicacio = $publicacio->nom;
            $val->idPublicacio = $idPublicacio;
        }

		return View::make('vals.index', compact('vals'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		$subs = Auth::user()->subscripcions()->get();

		$sf = array();
		$vf = array();

		foreach ($subs as $s) {
			$sf[$s->id] = Publicacio::find($s->idPublicacio)->nom;
			$vf[$s->id] = array();
			$valDates = Val::where('idSubscripcio', '=', $s->id)->get();
			foreach ($valDates as $vd) {
				$vf[$s->id][] = $vd->data;
			}
		}

		return View::make('vals.create')->with('subscripcions', $sf)->with('valDates', $vf);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$begin = new DateTime(Input::get('dataInici'));
		$end = new DateTime(Input::get('dataFi'));
		$end->modify('+1 day');

		$interval = DateInterval::createFromDateString('1 day');
		$period = new DatePeriod($begin, $interval, $end);

		foreach ( $period as $d ) {

			$val['idSubscripcio'] = Input::get('idSubscripcio');
			$val['idSubscriptor'] = Auth::id();
			$val['data'] = $d->format('m/d/Y');
			$val['cancelat'] = false;

			$exists = $this->val
				->where('idSubscripcio', '=', $val['idSubscripcio'])
				->where('idSubscriptor', '=', $val['idSubscriptor'])
				->where('data', '=', $val['data'])
				->first();

			if (is_null($exists)) {
				$validation = Validator::make($val, Val::$rules);
				if ($validation->passes())
				{
					$this->val->create($val);
				} else {
					return Redirect::route('vals.create')
						->withInput()
						->withErrors($validation)
						->with('message', 'There were validation errors.');
				}
			}
		}
		return Redirect::route('vals.index');

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
