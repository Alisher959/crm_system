// StudentController.php
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }
    /**
     * Store a newly created resource in storage.
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
        $product = new Crm;
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