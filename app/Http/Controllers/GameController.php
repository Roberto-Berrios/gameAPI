<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Game;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
      $datos= DB::table('games')
            ->select('games.*')
            ->get();


        return json_encode(["status"=>"success",
            "datos"=>$datos]);

        /*Game::all();
        return response()->json([
            'status'=>true,
            'message'=> 'm'
        ],200);  */
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $game = new Game($request->all());
        $title = $request->title;
        $title =str_replace(' ', '', $title);
        $path = $request->image->storeAs('', $title. '.' . $request->image->extension());
        $game->image = $path;
        $game->save();
   
        return response()->json(['success'=>true]);
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
        return Game::find($id);

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
    $game = Game::find($id);
    unlink(storage_path('app/'.$game->image));
    $game -> delete();
      
    return response()->json(['success'=>true]);     
    }
}

