<?php

namespace MyProject\Models\Opisi;

use MyProject\Models\Users\User;
use MyProject\Models\Fonds\Fond;

use MyProject\Services\Db;
use MyProject\Models\ActiveRecordEntity;




class Opis extends ActiveRecordEntity
{
    // /** @var string */
    // protected $id;

	/** @var int */
	protected $fondId;

	/** @var string */
	protected $name;

	/** @var string */
	protected $title;

	/** @var string */
	protected $date;

	/** @var string */
	protected $path;

	public function getFondId(): string
	{
		return $this->fondId;
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
    public function getDate(): string
    {
        return $this->date;
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
		return 'opisi';
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

	public function setName($name): string
	{
		return $this->name		= $name;
	}

	public function setTitle($title): string
	{
		return $this->title		= $title;
	}

	public function setDate($date): string
	{
		return $this->date		= $date;
	}

	public function setPath($path): string
	{
		return $this->path		= $path;
	}

	public static function getRecordByFields($fond)
	{
//        echo "start:";
//        var_dump($fond);
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

	public function createFinderRecord(array $fields)
	{
		$SQL = 'INSERT INTO '. $this->getTableName(). "('name', 'title', 'dates','path') VALUES (:name, :title, :dates, :path);";

		$db = Db::getInstance();
		$result = $db->query(
			$SQL,
			[
				":name"		=> $fields["name"],
			":title"	=> $fields["title"],
			":dates"	=> $fields["dates"],
			":path"		=> $fields["path"],
			]
//            ,            static::class
		);
//        echo "~~~";

//        foreach($fields AS $k=>$field){
//        }
//        echo $SQL;

		$result["id"]   = $db->getLastInsertId();
//        echo "<hr> result= ";
//        var_dump($result);
		if ($result === []) {
			return Null;
		}
		return $result;
	}

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

	
	public static function createFromСard($fond_id, $opis_name)
	{

		$opis   = new Opis;
		$opis->setFondId($fond_id);
		$opis->setName($opis_name);
		$opis->setTitle('Название описи фонда');
		$opis->setDate('');
		$opis->setPath('');

		$opis->save();
		return($opis);
	}

	public static function convertOpisName($value)
	{
		// раздeляем подготовленную строку имени фонда на буквенную и числовую части
		$tmp	= explode(".", $value);

		// Отделяем последнюю (ЧИСЛОВУЮ) часть шифра у фонда
		$opis_Number    = $tmp[count($tmp)-1];

		if (count($tmp)==1)
		{
			$value	= "op.".$opis_Number;
			return($value);
		}
		return($value);
	}
}