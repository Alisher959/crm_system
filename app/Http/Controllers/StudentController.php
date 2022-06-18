<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Crm as Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::all();        
        $take = Student::sum('take');
        $give = Student::sum('give');
        $index = 0;
        $remained_all = ($take)-($give);

        
        return view('index', compact('student','index', 'take', 'give', 'remained_all'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|max:80',
            'person' => 'required|max:100',
            'take' => 'required',
            'give' => 'required',
            'message' => 'required|max:2000',
        ]);
        $product = new Student;
        $product->date = $request->date;
        $product->person = $request->person;
        $product->take = $request->take;
        $product->give = $request->give;
        $alisher = ($request->take)-($request->give);
        $product->remained = $alisher;
        $product->message = $request->message;
        $product->save();
        return redirect('/students')->with('completed', 'Student has been saved!');
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
        $student = Student::find($id);  
        return view('edit', compact('student'));
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
                    
        $request->validate([
            'date' => 'required|max:80',
            'person' => 'required|max:100',
            'take' => 'required',
            'give' => 'required',
            'message' => 'required|max:2000',
        ]);
        $product = Student::find($id);
        $product->date = $request->date;
        $product->person = $request->person;
        $product->take = $request->take;
        $product->give = $request->give;
        $alisher = ($request->take)-($request->give);
        $product->remained = $alisher;
        $product->message = $request->message;
        $product->update();
        return redirect('/students')->with('completed', 'Student has been updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect('/students')->with('completed', 'Student has been deleted');
    }
}