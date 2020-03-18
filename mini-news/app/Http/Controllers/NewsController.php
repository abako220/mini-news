<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsFormRequest;
use Illuminate\Http\Request;
use App\Repository\contract\NewsInterface;

class NewsController extends Controller
{
    protected $news;

    public function __construct(NewsInterface $news)
    {
        $this->news = $news;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(['status'=> true, 'data'=> $this->news->index()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Http\Requests\NewsFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function create(NewsFormRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $request->validator->messages()
             ], 404);
        }
        $data = $request->all();
        $response = $this->news->create($data);
        return response()->json([
            'status' => true,
            'data' => $response,
            'message' => 'News successfully created'
        ], 201);
    }


    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->route('id');
        $response = $this->news->find(intval($id));
        return response()->json([
            'status' => true,
            'data' => $response
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->route('id');
        $data = $request->all();

        if (isset($request->validator) && $request->validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $request->validator->messages()
             ], 404);
        }
        $response = $this->news->update($id, $data);
        return response()->json([
            'status' => true,
            'data' => $response,
            'message' => 'News successfully updated'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->route('id');

        $response = $this->news->delete($id);
        if($response == null) {
            return response()->json([
                'status' => false,
                'data' => $id,
                'message'=> 'News Id does not exist'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $id,
            'message'=> 'News successfully deleted'
        ], 404);
    }
}
