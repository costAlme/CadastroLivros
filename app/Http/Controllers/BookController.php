<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Book;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Response;





class BookController extends Controller
{
  private $objUser;
  private $objBook;



  public function __construct()
  {
    $this->objUser = new User();
    $this->objBook = new Book();
  }

  public function index()
  {
    // dd($this->objBook->find(1)->relUser);
   // dd($this->objUser->find(1)->relBooks);
    // dd($this->objBook->find(1)->relUsers);
    $book = Book::paginate(5);
    return view('index', compact('book'));
    // dd($this->objUser->find(1)->relBooks);
    // return $this->book->where('id', 2)->get();
    // return $this->book->findOrFail(1);
    // return $this->book->where('id', '<', 2)->get();
  }

  /*
   * Display the specified resource;
   *
   * @param  int  $id
   * @return \Illuminate\View\View
   */
  public function show($id)
  {
    $book = $this->objBook->find($id);
    return view('show', compact('book'));

    //  echo $id;
  }

  /*
   * Show the form for editing the specified resource.
   *
   *@param  int  $id
   *@return \Illuminate\View\View
   */

  public function create()
  {

    $users = $this->objUser->all();
    return view('create', compact('users'));
  }

  /*
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function store(BookRequest $request)
  {
    $cad = $this->objBook->create([
      'title' => $request->title,
      'pages' => $request->pages,
      'price' => $request->price,
      'id_user' => $request->id_user
    ]);
    if ($cad) {
      return redirect('books');
    }
  }

  /*
   * show a newly created resource in storage.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */

  public function edit($id)
  {
    $users = $this->objUser->all();
    $book = $this->objBook->with('relUsers')->findOrFail($id);
    return view('edit', compact(
       'book', 'users'
      ));
  }

  /*
  * show a newly created resource in storage.
  *
  * @param  @param \illuminate\Http\Request $request
  @param int $id
  * @return \Illuminate\Http\Response
  */

  public function update(BookRequest $request)
  {
    Book::findOrFail($request->id)->update($request->all());
    
    return redirect('books')->with('msg', 'Evento editado com sucesso!');
  }

  public function destroy($id)
  {
    Book::findOrFail($id)->delete();

    return redirect('books');
  }

}