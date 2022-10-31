<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Book::all();

    //    return $data;
    return response()->json([
        "message" => "Load data success",
        "data" => $table
    ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $table = Siswa::create([
        //     "name" => $request->name,
        //     "gender" => $request->gender,
        //     "age" => $request->age
        // ]);

        $table = new Book();
        $table->title = $request->title ? $request->title : $table->title;
        $table->description = $request->description ? $request->description : $table->description;
        $table->author = $request->author ? $request->author : $table->author;
        $table->publisher = $request->publisher ? $request->publisher : $table->publisher;
        $table->date_of_issue = $request->date_of_issue ? $request->date_of_issue : $table->date_of_issue;
        $table->save();

        // return $table;
        return response()->json([
            "message" => "Store success",
            "data" => $table
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Book::find($id);
        if($table){
            return $table;
        }else{
            return ["message" => "Data not found"];
        }
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
        $table = Book::find($id);
        if ($table){
            $table->title = $request->title ? $request->title : $table->title;
            $table->description = $request->description ? $request->description : $table->description;
            $table->author = $request->author ? $request->author : $table->author;
            $table->publisher = $request->publisher ? $request->publisher : $table->publisher;
            $table->date_of_issue = $request->date_of_issue ? $request->date_of_issue : $table->date_of_issue;
            $table->save();

            return $table;
        }else{
            return ["message" => "Data not found"];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Book::find($id);
        if ($table){
            $table->delete();
            return ["message" => "Delete succes"];
        }else{
            return ["message" => "Data not found"];
        }
    }
}