<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Board;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = [
            'boards' => Board::join('users', 'boards.author_id', '=', 'users.id')
            ->select('boards.*', 'users.name', 'users.id as user_id')
            ->orderBy('id', 'desc')
            ->paginate(5)
        ];
        
        return view('index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
       
       $this->validate($request, [
           'title' => 'required|max:300|min:3',
           'description' => 'required|min:5'
       ]);

       $board = new Board;
       $board->author_id = Auth::user()->id;
       $board->title = $request->title;
       $board->description = $request->description;
       
       $board->save();
       
       $last = Board::orderBy('id','desc')->get()->pluck('id');
       
       return redirect('/' . $last[0]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'boards' => Board::join('users', 'boards.author_id', '=', 'users.id')
            ->select('boards.*', 'users.name', 'users.id as user_id')
            ->where('boards.id', $id)
            ->paginate(5)
        ];
        
        return view('index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id='')
    {   
        $data = [
            'boards' => Board::where('boards.id', $id)->get()
        ];
        
        return view('created', $data);
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
        $this->validate($request, [
           'title' => 'required|max:300|min:3',
           'description' => 'required|min:5'
        ]);
        
        $board = Board::find($id);

        $board->title = $request->title;
        $board->description = $request->description;

        $board->save();
        
        return redirect('/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        Board::destroy($id);
        return redirect('/');
    }
    
}
