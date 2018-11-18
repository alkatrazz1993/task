<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forecast;
use App\Zodiac;
use App\Validator;
use App\Forecasts_type;
use Illuminate\Support\Carbon;

class ForecastsController extends Controller
{
    protected $header;
    protected $headerUpdate;
    protected $headerList;
    protected $headerShow;

    public function __construct()
    {
        $this->header = 'Create Forecast';
        $this->headerUpdate = 'Update Forecast';
        $this->headerList = 'Forecasts List';
        $this->headerShow = 'Show forecasts';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statistic = [];

        $forecast = Forecast::orderBy('created_at', 'DESC')->paginate(5);
        $forecastInfo = Forecast::where('date', date('Y-m-d'))->get();
        $zodiacs = Zodiac::select('id', 'name')->get();
        $forecasts_type = Forecasts_type::all();

        foreach ($forecastInfo as $fore){
            foreach ($zodiacs as $zodiac)
                if($zodiac->id == $fore['zodiacs_id']){
                    array_push($statistic, $zodiac->id);
                    continue;
                }
        }

        return view('forecasts.index')->with(['headerList' => $this->headerList,
            'forecast' => $forecast,
            'zodiacs' => $zodiacs,
            'statistic' => $statistic,
            'forecasts_type' => $forecasts_type

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statistic = [];
        $forecasts_type = Forecasts_type::all();
        $forecastsText = Forecast::select('text')->get();
        $date = date('Y-m-d');

        $zodiacName = Zodiac::select('id', 'name')->get();

        $forecastInfo = Forecast::where([
            ['date', $date]

        ])->get();

        foreach ($forecastInfo as $fore){
            foreach ($zodiacName as $zodiac)
                if($zodiac->id == $fore['zodiacs_id']){
                    array_push($statistic, $zodiac->id);
                    continue;
                }
        }

        return view('forecasts.create')->with(['header' => $this->header,
            'zodiacs' => $zodiacName,
            'forecasts' => $forecastsText,
            'date' => $date,
            'statistic' => $statistic,
            'forecasts_type' => $forecasts_type
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $zodiacId = trim(strip_tags($request->zodiacName));

        $date = trim(strip_tags($request->date));
        $text = trim(strip_tags($request->text));
        $forecast_type_id = trim(strip_tags($request->forecast_type_id));

        $validator = \Validator::make($request->all(), [
            'text' => "min:3|unique:forecasts,text"
        ]);



        $unique = Forecast::select('zodiac_id', 'date', 'forecasts_type_id')->where([
            ['zodiac_id', $zodiacId],
            ['date', $date],
            ['forecasts_type_id', $forecast_type_id]
        ])->first();

        if (!empty($unique)) {

            $validator->errors()->add('unique', "The :attribute 'Zodiac Name', 'Forecast Type', and 'Date' already exist.");
            return redirect("/forecasts/create")->withErrors($validator->errors());
        }


        Forecast::create(array(
            'zodiac_id' => $zodiacId,
            'date' => $date,
            'text' => $text,
            'forecasts_type_id' => $forecast_type_id
        ));


        return redirect()->back()->with('success', "Прогноз добавлен.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($zodiacId, $typeId)
    {
        $statistic = [];
        $forecasts_type = Forecasts_type::all();
        $zodiacs = Zodiac::select('id', 'name')->get();

        if($typeId == 0){
            $typeId = '1';
            $date = Carbon::now()->addMonth()->format("Y-m-01");
        }
        else if ($typeId == 1){
            $date = Carbon::now()->addMonth()->format("Y-m-01");
        }
        else if ($typeId == 2){
            $date = date('Y-m-d', strtotime("last Monday"));
        }
        else if ($typeId == 3){
            $date = Carbon::now()->subDay()->format("Y-m-d");
        }

        $forecast_type_name = Forecasts_type::select('name')->where('id', $typeId)->first();

        $forecastInfo = Forecast::where([
            ['date', $date],
            ['forecasts_type_id', $typeId]

        ])->get();

        $forecasts = Forecast::where([

            ['zodiac_id', $zodiacId],
            ['date', $date],
            ['forecasts_type_id', $typeId]

        ])->orderBy('created_at', 'DESC')->paginate(5);


        foreach ($forecastInfo as $fore){
            foreach ($zodiacs as $zodiac){
                if($zodiac->id == $fore['zodiac_id']){
                    array_push($statistic, $zodiac->id);
                    continue;
                }
            }
        }

        return view('forecasts.show')->with(['headerShow' => $this->headerShow,
            'forecasts' => $forecasts,
            'zodiacs' => $zodiacs,
            'zodiacId' => $zodiacId,
            'statistic' => $statistic,
            'forecasts_type' => $forecasts_type,
            'typeId' => $typeId,
            'forecast_type_name' => $forecast_type_name
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $forecast = Forecast::find($id);
        $zodiacs = Zodiac::all();
        $forecasts_type = Forecasts_type::all();

        return view('forecasts.edit')->with(['headerUpdate' => $this->headerUpdate,
            'forecast' => $forecast,
            'zodiacs' => $zodiacs,
            'forecasts_type' => $forecasts_type
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'text' => 'required|min:3|max:255|unique:forecasts,text'
        ]);

        $unique = Forecast::select('id', 'zodiac_id', 'date', 'forecasts_type_id')->where([

            ['forecasts_type_id', $request->forecasts_type_id],
            ['zodiac_id', $request->zodiacName],
            ['date', $request->date]

        ])->first();

        if (!empty($unique) && $unique->id === $id) {
            $validator->errors()->add('unique', "The :attribute 'Zodiac Name', 'Forecast Type' and 'Date' already exist.");
            return redirect("/forecasts/$request->id/edit")->withErrors($validator->errors());
        }

        $forecast_type_id = (int)trim(strip_tags($request->forecast_type_id));

        Forecast::whereId($request->id)->update(array(
            'zodiac_id' => $request->zodiacName,
            'date' => $request->date,
            'text' => $request->text,
            'forecasts_type_id' => $forecast_type_id
        ));

        return redirect()->back()->with('success', "Прогноз обновлен.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Forecast::find($id)->delete();

        return redirect()->back()->with('success', "Прогноз удален.");
    }
}
