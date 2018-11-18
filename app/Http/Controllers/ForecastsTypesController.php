<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forecasts_type;

class ForecastsTypesController extends Controller
{

    protected $header;
    protected $headerList;
    protected $headerUpdate;

    public function __construct()
    {
        $this->header = 'Create Forecasts Type';
        $this->headerList = 'Forecasts Types List';
        $this->headerUpdate = 'Update Forecasts Type';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forecasts_types = Forecasts_type::paginate(10);

        return view('forecasts.types.index')->with(['headerList' => $this->headerList,
            'forecasts_types' => $forecasts_types

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forecasts.types.create')->with(['header' => $this->header,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $name = trim(strip_tags($request->name));


        $this->validate($request, [
            'name' => 'required|min:3|max:255',
        ]);

        Forecasts_type::create(array(
            'name' => $name,
        ));

        return redirect()->back()->with('success', "Тип прогноза добавлен.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $showForecastsType = Forecasts_type::where('id', $id)->first();

        return view('forecasts.types.edit')->with(['headerUpdate' => $this->headerUpdate,
            'showForecastsType' => $showForecastsType,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = trim(strip_tags($request->name));

        $validator = \Validator::make($request->all(), [
            'name' => 'required|min:3|max:255|unique:forecasts_types,name',
        ]);

        $unique = Forecasts_type::where([

            ['name', $request->name],

        ])->first();

        if (!empty($unique) && $unique->id === $id) {
            $validator->errors()->add('unique', "The :attribute 'name' already exist.");
            return redirect("/forecasts-types/$id/edit")->withErrors($validator->errors());
        }


        Forecasts_type::whereId($request->id)->update(array(
            'name' => $name
        ));

        return redirect()->back()->with('success', "Тип прогноза обновлен.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Forecasts_type::find($id)->delete();
        return redirect()->back()->with('success', "Тип прогноза удален.");
    }

}
