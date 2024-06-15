<?php

namespace App\Http\Controllers;

use App\DataTables\FeedBackDataTable;
use App\Models\FeedBack;
use Illuminate\Http\Request;

class FeedBackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FeedBackDataTable $dataTable)
    {
        return $dataTable->render('admin.feedback.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $feedback = new FeedBack();
        $feedback->name = $request->name;
        $feedback->email = $request->email;
        $feedback->subject = $request->subject;
        $feedback->message = $request->message;
        $feedback->save();

        return redirect('/')->with('suksesguestfeedback','Terima Kasih telah memberikan masukan untuk kemajuan website ini');
    }

    public function simpan(Request $request)
    {
        $feedback = new FeedBack();
        $feedback->name = $request->name;
        $feedback->email = $request->email;
        $feedback->subject = $request->subject;
        $feedback->message = $request->message;
        $feedback->save();

        return redirect('/pelanggan')->with('suksesuserfeedback','Terima Kasih telah memberikan masukan untuk kemajuan website ini');
    }

    /**
     * Display the specified resource.
     */
    public function show(FeedBack $feedBack)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeedBack $feedBack)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FeedBack $feedBack)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeedBack $feedBack)
    {
        //
    }
}
