<?php

class NewsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /news
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::orderBy('date', 'desc')->paginate(6);

		return View::make('news.index', compact('posts'));
	}

	/**
	 * Display the specified resource.
	 * GET /news/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id, $slug = null)
	{
		$post = Post::findOrFail($id);

		return View::make('news.post', compact('post'));
	}
}
