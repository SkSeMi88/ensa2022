<?php

namespace MyProject\Controllers\Api;

use MyProject\Controllers\AbstractController;
use MyProject\Exceptions\NotFoundException;
use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;
use MyProject\Models\Cards\Card;

class PoiskApiController extends AbstractController
{
	public function filtr()
	{
		// return($_REQUEST);
		$cards = Card::findall();
		$this->view->displayJson($_REQUEST);
	}

	public function view(int $articleId)
	{

		$method	= $this->getMethodData();
		if ($method!=="GET"){

			$response = [
				"status"	=> false,
				"error"	=> "Неверный метод запроса"
			];

			$this->sendMsg($response, 401);
			return;
		}

		$article = Article::getById($articleId);

		if ($article === null) {
			throw new NotFoundException();
		}

		$this->view->displayJson([
			'articles' => [$article]
		]);
	}

	public function add1()
	{


		// echo "qwerty";
		$input = json_decode(
			file_get_contents('php://input'),
			true
		);
		var_dump($input);
	}

	public function add()
	{
		$method	= $this->getMethodData();
		if ($method!=="POST"){

			$response = [
				"status"	=> false,
				"error"	=> "Неверный метод запроса"
			];

			$this->sendMsg($response, 401);
			return;
		}
		// var_dump($this);
		// var_dump(json_decode(file_get_contents("php://input")));
		$input = $this->getInputData();

		$articleFromRequest = $input['articles'][0];

		$authorId = $articleFromRequest['author_id'];
		$authorId = $articleFromRequest['author_id']??1;
		// var_dump($articleFromRequest);
		$author = User::getById($authorId);

		$article = Article::createFromArray($articleFromRequest, $author);
		$article->save();

		header('Location: /api/articles/' . $article->getId(), true, 302);
	}

	public function test()
	{
		echo "test api";
	}
}