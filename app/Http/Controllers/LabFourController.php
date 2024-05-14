<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LabFour;
use App\Models\Author;

class LabFourController extends Controller
{
    public function showBooks(Request $request)
    {
        $authorId = $request->input('author_id');
        $author = Author::findOrFail($authorId);
        $books = LabFour::where('author_id', $authorId)->get();
        return view('labfour.books', ['author' => $author, 'books' => $books]);
    }
    public function minMaxPages()
    {
        $bookWithMinPages = LabFour::orderBy('book_pages', 'asc')->first();
        $bookWithMaxPages = LabFour::orderBy('book_pages', 'desc')->first();
        
        return view('labfour.pages', [
            'bookWithMinPages' => $bookWithMinPages,
            'bookWithMaxPages' => $bookWithMaxPages,
        ]);
    }
    public function showBookWithMaxLengthName()
    {
        $bookWithMaxLengthName = LabFour::orderByRaw('CHAR_LENGTH(book_name) DESC')->first();
        return view('labfour.length', ['book' => $bookWithMaxLengthName]);
    }
    public function booksPerAuthor()
    {
        $booksPerAuthor = LabFour::select('author_id', \DB::raw('count(*) as book_count'))
            ->groupBy('author_id')
            ->get();

        return view('labfour.perauthor', ['booksPerAuthor' => $booksPerAuthor]);
    }
    public function authorsByFirstLetter()
    {
        $authors = Author::all();
        $authorsByFirstLetter = Author::select(\DB::raw('SUBSTRING(author_surname, 1, 1) as first_letter, count(*) as author_count'))
            ->groupBy('first_letter')
            ->orderBy('first_letter')
            ->get();

        return view('labfour.byletter', ['authorsByFirstLetter' => $authorsByFirstLetter, 'authors' => $authors]);
    }
    public function authorsWithSurnameEndingInKo()
    {
        $authors = Author::where('author_surname', 'LIKE', '%ko')->get();
        return view('labfour.surnameko', ['authors' => $authors]);
    }
    public function authorsWithBirthdayToday()
    {
        $today = now();
        $day = $today->day;
        $month = $today->month;
        $authors = Author::whereDay('created_at', $day)
                         ->whereMonth('created_at', $month)
                         ->get();
        return view('labfour.birthday', ['authors' => $authors]);
    }
    public function booksAddedMoreThan4YearsAgo()
    {
        $books = LabFour::whereDate('created_at', '<', now()->subYears(4))->get();
        return view('labfour.booksyearsago', ['books' => $books]);
    }
    public function leapYearBooks()
    {
        $books = LabFour::whereYear('created_at', date('Y'))->get();
        return view('labfour.leapyearbooks', ['books' => $books]);
    }
    public function yearsSinceCreation()
    {
        $books = LabFour::all();
        $data = [];
        foreach ($books as $book) {
            $yearsOld = now()->diffInYears($book->created_at);
            $data[] = [
                'Name' => $book->book_name,
                'Years_old' => $yearsOld,
            ];
        }
        return view('labfour.sincecreation', ['data' => $data]);
    }
    

    public function index()
    {
        $authors = Author::all();
        $books = LabFour::all();
        return view('labfour.labfour', ['books' => $books, 'authors' => $authors]);
    }
    public function create()
    {
        $authors = Author::all();
        return view('labfour.create', ['authors' => $authors]);
    }   
    public function store(Request $request)
    {
        $data = request()->validate([
            'book_name' => 'required|string',
            'book_pages' => 'required',
            'author_id' => 'required',
        ]);
        LabFour::create($data);
        $books = LabFour::all();
        return view('labFour', ['books' => $books]);
    }
    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        $book = LabFour::findOrFail($id);
        $authors = Author::all();
        return view('labfour.edit', ['book' => $book, 'authors' => $authors]);
    }
    public function update(Request $request, string $id)
    {
        $data = request()->validate([
            'book_name' => 'required|string',
            'book_pages' => 'required',
            'author_id' => 'required',
        ]);
        $book = LabFour::findOrFail($id);
        $book->update($data);
        return redirect()->route('labfour.edit', $id)->with('success_message', 'Book updated successfully');
    }
    public function destroy(string $id)
    {
        $book = LabFour::findOrFail($id);
        $book->delete();
        return redirect()->route('labFour');
    }
}
