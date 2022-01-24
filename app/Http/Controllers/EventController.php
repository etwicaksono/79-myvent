<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Throwable;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('my-events', ["title" => "Home", "data" => "data"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::take(10)->get();
        return view("add-event", \compact("user"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "title" => "required",
            "location" => "required",
            "participant" => "required",
            "date" => "required",
            "note" => "required",
            'picture'  => 'required|mimes:jpg,jpeg,png|max:2048'
        ]);

        try {
            $picture = "event-default.png";
            if ($image = $request->file("picture")) {
                $picture = Str::slug($image->getClientOriginalName()) . "." . $image->getClientOriginalExtension();
                $image->storeAs("img/events", $picture);
            }

            $event = new Event();
            $event->title = $request->title;
            $event->location = $request->location;
            $event->participant = $request->participant;
            $event->date = $request->date;
            $event->note = $request->note;
            $event->picture = $picture;
            $event->save();

            return \response()->json([
                "error" => false,
                "message" => "Event added successfully"
            ], \http_response_code());
        } catch (Throwable $t) {
            return \response()->json([
                "error" => true,
                "message" => $t->getMessage()
            ], \http_response_code());
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function dashboard()
    {
        return view("dashboard");
    }

    public function getSelect2ForUser(Request $request)
    {
        if ($request->search != "") {
            $user = User::where("name", "like", "%" . $request->search . "%")
                ->orderBy("name", "asc")
                ->get();
        } else {
            $user = User::orderBy("name", "asc")->get()->take(10);
        }

        $result = [];
        foreach ($user as $key => $val) {
            $result[$key]["id"] = $val->id;
            $result[$key]["text"] = $val->name;
        }

        return \response()->json($result);
    }
}