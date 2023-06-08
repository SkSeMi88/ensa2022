<?php

// namespace MyProject\Models\Dela;
namespace MyProject\Models\Dela;

use MyProject\Models\Users\User;


use MyProject\Services\Db;


use MyProject\Models\ActiveRecordEntity;

class Delo extends ActiveRecordEntity
{
    // /** @var string */
    // protected $id;

	/** @var int */
	protected $fondId;

	/** @var int */
	protected $opisId;

	/** @var string */
	protected $name;

	/** @var string */
	protected $title;

	/** @var string */
	protected $dates;

	/** @var string */
	protected $path;

	// GETters

	public function getFondId(): string
	{
		return $this->fondId;
	}

	public function getOpisId(): string
	{
		return $this->opisId;
	}

	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @return string
	 */
	public function getDates(): string
	{
		return $this->dates;
	}

	/**
	 * @return string
	 */
	public function getPath(): string//mixed
	{
		return $this->path;
	}


	protected static function getTableName(): string
	{
		return 'delo';
	}

	public function getLastOpisId()
	{

		$LastOpis	= $this->getTableMaxId();
		var_dump($LastOpis);
		return($LastOpis);
	}

	//СЕТТЕРЫ

	public function setFondId($fondId): int
	{
		return $this->fondId		= $fondId;
	}

	public function setOpisId($opisId): int
	{
		return $this->opisId		= $opisId;
	}

	public function setName($name): string
	{
		return $this->name		= $name;
	}

	public function setTitle($title): string
	{
		return $this->title		= $title;
	}

	public function setDates($dates): string
	{
		return $this->dates		= $dates;
	}

	public function setPath($path): string
	{
		return $this->path		= $path;
	}

	public static function getRecordByFields($fond)
	{

		$db = Db::getInstance();

		$SQL = "SELECT * FROM ". self::getTableName();
		$WHR = [];

		$fields_names = ["name", "title", "dates", "path"];
		foreach($fields_names AS $field)
		{
			if (array_key_exists($field, $finder)){
					$WHR[] = "(".$field."='".$finder[$field]."')";
					continue;
			}
			$WHR[] = "(".$field." IS NULL)";
		}

		if (count($WHR)>0){
			$WHERE   = " WHERE ".implode((string)" AND ", $WHR);
			$SQL    .= $WHERE;
		}

		$SQL    .= ";";
//        echo "<hr>".$SQL;

		$result = $db->query(
			$SQL,
			[]
		);
//        echo "<hr> result= ";
//        var_dump($result);
		if ($result === []) {
//            echo "СОздание новой записи поисковых данных";
			$new_finder  = self::createFromArray($finder);
//            echo"QAZ";
//            var_dump($new_finder);
			return($new_finder->getId());
		}
		return $result[0]->id;
	}

	// public function createFinderRecord(array $fields)
	// {
	// 	$SQL = 'INSERT INTO '. $this->getTableName(). "('name', 'title', 'dates','path') VALUES (:name, :title, :dates, :path);";

	// 	$db = Db::getInstance();
	// 	$result = $db->query(
	// 		$SQL,
	// 		[
	// 			":name"		=> $fields["name"],
	// 		":title"	=> $fields["title"],
	// 		":dates"	=> $fields["dates"],
	// 		":path"		=> $fields["path"],
	// 		]

	// 	if ($result === []) {
	// 		return Null;
	// 	}
	// 	return $result;
	// }

//        public static function createFromArray(array $fields, User $author): Article
	public static function createFromArray(array $fields): Fond
	{
//            if (empty($fields['name'])) {
//                throw new InvalidArgumentException('Не передано название статьи');
//            }
//
//            if (empty($fields['text'])) {
//                throw new InvalidArgumentException('Не передан текст статьи');
//            }

		// echo "!>>>>>>>>>>>";
		$fond = new Fond();

		$fond->setName($fields['name']);
		$fond->setTitle($fields['title']);
		$fond->setDates($fields['dates']);
		$fond->setPath($fields['path']);

		$fond->save();

		return $fond;
	}

	public function updateFromArray(array $fields): Fond
	{
		if (empty($fields['name'])) {
				throw new InvalidArgumentException('Не передан код фонда');
		}

		if (empty($fields['title'])) {
				throw new InvalidArgumentException('Не передано название фонда');
		}

		$this->setName($fields['name']);
		$this->setTitle($fields['text']);
		$this->setDates($fields['dates']);
		$this->setPath($fields['path']);

		$this->save();

		return $this;
	}

		
	public static function createFromСard($fond_id, $opis_id, $delo_name)
	{

		$delo   = new Delo;
		$delo->setFondId($fond_id);
		$delo->setOpisId($opis_id);
		$delo->setName($delo_name);
		$delo->setTitle('Название дела в описи фонда');
		// $delo->setDates('');
		// $delo->setPath('');

		$delo->save();
		return($delo);
	}

	public static function convertDeloName($value)
	{
		$value	= "d.".str_replace(["/"], ["_"], $value);
		return $value;
	}
}