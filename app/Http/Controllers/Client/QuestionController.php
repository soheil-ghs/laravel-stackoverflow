<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Question;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class QuestionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index() {
        $questions = Question::paginate(5);
        return view('front.questions.index',
            compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create() {
        return view('front.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required'
        ]);

        Question::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::user()->id
        ]);

        session()->flash('create_question', 'Your Question was created successfully');
        return redirect()->route('front.questions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|Response|View
     */
    public function show($id) {
        $question = Question::findOrFail($id);
        $answers = $question->answers()->with('comments')->get();
        return view('front.questions.show',
            compact('question', 'answers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id) {
        //
    }
}
