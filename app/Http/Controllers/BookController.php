<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Publisher;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->session()->put('chave', 10);
        //
        //        session(['key' => 'value']);

        $value = $request->session()->get('chave');

        dd([$value, $request->session()->exists('chave')]);

        $book = new Book();

        return view('books.index', [
          'books' => $book->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $publishers = Publisher::all();

        return view('books.create', [
          'publishers' => $publishers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param BookRequest|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function store(BookRequest $request)
    {
        try {
            $data = $request->except('_token');
            $book = Book::create($data);

            return redirect()->route('book.index');
        } catch (\Exception $e) {
            throw $e;
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
        if (Book::find($id)) {
            return view('books.edit', [
                'book' => Book::find($id),
                'publishers' => Publisher::all()
            ]);
        }

        return redirect()->route('book.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request|BookRequest|\Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function update(BookRequest $request, $id)
    {
        try {
            if (Book::find($id)) {
                $book = Book::find($id);
                $book->update($request->except(['_token', '_method']));
            }

            return redirect()->route('book.index');
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        try {
            if (Book::find($id)) {
                $book = Book::find($id);
                $book->delete();
            }

            return redirect()->route('book.index');
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
