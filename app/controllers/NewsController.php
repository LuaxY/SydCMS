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
	public function show($id, $slug)
	{
		$post = Post::findOrFail($id);
		$comments = Comment::where('post_id', $id)->orderBy('date', 'desc')->paginate(10);

		return View::make('news.post', array("post" => $post, "comments" => $comments));
	}
}
