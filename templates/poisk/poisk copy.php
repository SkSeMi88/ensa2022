<?php
    echo "<div>";
    if (!empty($errors))
    {
        foreach($errors AS $error)
        {
            echo "<div>";
            echo $error;
            echo "</div>";
        }
    }
    echo "</div>";

    echo "<div>";
    if (!empty($msgs))
    {
        foreach($msgs AS $msg)
        {
            echo "<div>";
            echo $msg;
            echo "</div>";
        }
    }
    echo "</div>";
?>



<?php
// var_dump($UserMenu);

$title_page = "НСА. Общий поиск";
?>

<?php include __DIR__ . '/../header2.php'; ?>


<div class="header_page">
        <!-- <h2> -->
            Создание карточки "документа"
        <!-- </h2> -->
    </div>
<form id="new_ref"  name="new_ref"  method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>" >
<!-- <div>
    <div>Тип документа</div>
    <div> -->
        <!-- <textarea name="doc_type"><?php //if (isset($_POST["doc_type"])){echo $_POST["doc_type"];}?></textarea> -->
    <!-- </div>
</div> -->

<div class="cardLine">
    <div class="cardFieldName">
        Тип документа
        </div>
     <div class="cardFieldValue"  style="width:25%;">
        <!-- <textarea name="doc_type"><?//=$card->getDocType(); ?></textarea> -->
        <input type="text" name="doc_type" value="<?php if (isset($_POST["doc_type"])){echo $_POST["doc_type"];}?>" width="250px;">
    </div>
</div>

<!-- <hr> -->

<div class="cardLine">
    <div class="cardFieldName">
        Дата события
        </div>
     <div class="cardFieldValue"   style="width:25%;">
		 <!-- <textarea name="event_date" required><?//=$card->getEventDate(); ?></textarea> -->
		 <input type="text" name="event_date" required value="<?php if (isset($_POST["event_date"])){echo $_POST["event_date"];}?>">
		</div>
</div>
<!-- <hr> -->
<div class="cardLine">
    <div class="cardFieldName"   style="width:25%;">
        Дата составления документа
    </div>
     <div class="cardFieldValue"   style="width:25%;">
		 <!-- <textarea name="card_date" required><?//=$card->getCardDate(); ?></textarea> -->
		 <input type="text" name="card_date" required value="<?php if (isset($_POST["card_date"])){echo $_POST["card_date"];}?>" >
	</div>
</div>
<!-- <hr> -->
<div class="cardLine">
    <div class="cardFieldName">
        Место события
    </div>
     <div class="cardFieldValue"   style="width:25%;">
		 <!-- <textarea name="event_place" required><?//=$card->getEventPlace(); ?></textarea> -->
		 <input type="text" name="event_place" required value="<?php if (isset($_POST["event_place"])){echo $_POST["event_place"];}?>">
	</div>
</div>
<!-- <hr> -->
<div class="cardLine">
    <div class="cardFieldName">
		 Место составления документа
    </div>
    <div class="cardFieldValue"   style="width:25%;">
		 <!-- <textarea name="card_place" required><?//=$card->getCardPlace(); ?></textarea> -->
		 <input type="text" name="card_place" required value="<?php if (isset($_POST["card_place"])){echo $_POST["card_place"];}?>">
		</div>
</div>

<!-- <hr> -->


<div class="cardLine">
    <div class="cardFieldName">
        Заголовок документа
    </div>
    <div class="cardFieldValue">
    <!-- <textarea name="doc_header" required><?//=$card->getDocHeader(); ?></textarea> -->
    <input type="text" name="doc_header" required value="<?php if (isset($_POST["doc_header"])){echo $_POST["doc_header"];}?>">
    </div>
</div>



<!-- <div>
    <div>Дата события</div>
    <textarea name="event_date" required><?php //if (isset($_POST["event_date"])){echo $_POST["event_date"];}?></textarea>
</div> -->
<!-- <hr> -->
<!-- <div>
    <div>Дата составления документа</div>
    <textarea name="card_date" required><?php //if (isset($_POST["card_date"])){echo $_POST["card_date"];}?></textarea>
</div> -->
<!-- <hr> -->
<!-- <div>
    <div>Место события</div>
    <textarea name="event_place" required><?php //if (isset($_POST["event_place"])){echo $_POST["event_place"];}?></textarea>
</div> -->
<!-- <hr> -->
<!-- <div> -->
    <!-- <div>Место составления документа</div> -->

    <!-- <textarea name="card_place" required><?php //if (isset($_POST["card_place"])){echo $_POST["card_place"];}?></textarea> -->
<!-- </div> -->

<!-- <div> -->
    <!-- <div>Заголовок документа</div> -->
    <!-- <div> -->
    <!-- <textarea name="doc_header" required><?php //if (isset($_POST["doc_header"])){echo $_POST["doc_header"];}?></textarea> -->
    <!-- </div> -->
<!-- </div> -->


<!-- <hr> -->
<div class="finder_box">
        <div class="cardFieldName">
            <span>
                Поисковые данные НА РК,
            </span>
        </div>
        <!-- <div style="display:flex;width:75%"> -->
        <div class="finder-box-value">
            <div class="finder">
                <div class="finder-name">
                    Фонд
                </div>
                <div class="finder-value">
                    <Input type="text" id="new_fond"  name="new_fond" placeholder="Фонд" value="<?php if (isset($_POST["new_fond"])){echo $_POST["new_fond"];}?>" required>
                </div>
            </div>
            <div class="finder">
                <div class="finder-name">
                    Опись
                </div>
                <div class="finder-value">
                    <Input type="text" id="new_opis"  name="new_opis" placeholder="Опись" value="<?php if (isset($_POST["new_opis"])){echo $_POST["new_opis"];}?>" required>
                </div>
            </div>
            <div class="finder">
                <div class="finder-name">
                    Дело
                </div>
                <div class="finder-value">
                    <Input type="text" id="new_delo"  name="new_delo" placeholder="Дело" value="<?php if (isset($_POST["new_delo"])){echo $_POST["new_delo"];}?>" required>
                </div>
            </div>
            <div class="finder">
                <div class="finder-name">
                    Лист
                </div>
                <div class="finder-value">
                    <Input type="text" id="new_list"  name="new_list" placeholder="Лист"  value="<?php if (isset($_POST["new_list"])){echo $_POST["new_list"];}?>" required>
                </div>
            </div>
        </div>
            <!-- <div class="finder"></div> -->
    </div>
<!-- <hr>
    <div class="finder_box">
        <div>
            <span>
                Поисковые данные НА РК,
            </span>
        </div>
        <div class="finder">
            <span>Фонд</span>
            <Input type="text" id="new_fond"  name="new_fond" placeholder="Фонд" value="<?php //if (isset($_POST["new_fond"])){echo $_POST["new_fond"];}?>" required></Input>
        </div>
        <div class="finder">
            <span>Опись</span>
            <Input type="text" id="new_opis"  name="new_opis" placeholder="Опись" value="<?php //if (isset($_POST["new_opis"])){echo $_POST["new_opis"];}?>" required></Input>
        </div>
        <div class="finder">
            <span>Дело</span>
            <Input type="text" id="new_delo"  name="new_delo" placeholder="Дело" value="<?php //if (isset($_POST["new_delo"])){echo $_POST["new_delo"];}?>" required></Input>
        </div>
        <div class="finder">
            <span>Лист</span>
            <Input type="text" id="new_list"  name="new_list" placeholder="Лист" value="<?php //if (isset($_POST["new_list"])){echo $_POST["new_list"];}?>" required></Input>
        </div>
        <div class="finder"></div>
        <div class="finder"></div>
    </div>
<hr> -->

<!-- <div>
    <div>Подлинник/Копия</div>
    <div>
        <textarea name="original" required><?php //if (isset($_POST["original"])){echo $_POST["original"];}?></textarea>
    </div>
</div> -->

<div class="cardLine">
    <div class="cardFieldName">
        Подлинник/Копия
    </div>
    <div class="cardFieldValue">
        <!-- <textarea name="original" required><?//=$card->getOriginal();?></textarea> -->
        <input type="text" name="original" required value="<?php if (isset($_POST["original"])){echo $_POST["original"];}?>">
    </div>
</div>

<!-- <hr> -->

<!-- <div>
    <div>Язык документа</div>
    <div>
        <textarea name="langs" required><?php //if (isset($_POST["langs"])){echo $_POST["langs"];}?></textarea>
    </div>
</div> -->

<div class="cardLine">
    <div class="cardFieldName">
        Язык документа
    </div>
    <div class="cardFieldValue">
        <!-- <textarea name="langs" required><?//=$card->getLangs();?></textarea> -->
        <input type="text" name="langs" required value="<?php if (isset($_POST["langs"])){echo $_POST["langs"];}?>">
    </div>
</div>


<!-- <hr>

<div>
   <div>Способ воспроизведения документа</div>
   <div>
      <textarea name="playback" required><?php //if (isset($_POST["playback"])){echo $_POST["playback"];}?></textarea>
   </div>
</div> -->

<div class="cardLine">
    <div class="cardFieldName">
        Способ воспроизведения документа
    </div>
    <div class="cardFieldValue">
        <input type="text" name="playback" required value="<?php if (isset($_POST["playback"])){echo $_POST["playback"];}?>" >
    </div>
</div>

<!-- <hr> -->

<!-- <div>
	<div>Физическое состояние документа</div>
	<div>
		<select name="state">
				<option value="1"> удовлетворительное</option>
				<option value="0"> неудовлетворительное</option>
		</select>
	</div>
</div> -->

<!-- fonds = [
	"items"	=>[],
	id	=> [
		items => [],
		opis_id => [
		
			"items"	=> [
				
			]

			delo_id 	=> [

				"items"	=> []
				list_id	=> [
				
				]
			]
		]

	]
] -->
<div class="cardLine">
	<div class="cardFieldName">
		Физическое состояние документа
	</div>
	<div class="cardFieldValue">
		<select name="state" style="width:25%; margin:0px;">
			<?php
				$selected = ["",""];

				if ((isset($_POST["state"]))&&($_POST["state"]==0)) {
					$selected[0]	= "selected";
				}

				if ((isset($_POST["state"]))&&($_POST["state"]==1)) {
					$selected[1]	= "selected";
				}
			?>
			<option value="1" <?=$selected[1];?>> удовлетворительное</option>
			<option value="0" <?=$selected[0];?>> неудовлетворительное</option>
		</select>
	</div>
</div>

<!-- <hr> -->

<!-- <div>
    
    <div>Составитель карточки</div>
    <div>
        <textarea name="compiler" required><?php //if (isset($_POST["compiler"])){echo $_POST["compiler"];}?></textarea>
    </div>
</div>

<hr>

<div>
    
    <div>Дата составления карточки</div>
    <div>
        <!-- <textarea name="compilation_date" required><?php //if (isset($_POST["compilation_date"])){echo $_POST["compilation_date"];}?></textarea> -->
        <!-- <textarea name="compilation_date" required><?//= date("Y-m-d H:i:s");?></textarea>
    </div>
</div> -->



<div class="cardLine">
	<div class="cardFieldName">
		Составитель карточки
	</div>
	<div class="cardFieldValue">
		<!-- <input type="text" name="compiler" required value="<?//php// if (isset($_POST["compiler"])){echo $_POST["compiler"];}?>"   style="width:25%;"> -->
		<input type="text" name="compiler" required value=""   style="width:25%;">
		<div class="cardFieldName" style="text-align:center;">
			<div style="margin-left:75px;">
			<!-- <div style="text-align:center;"> -->
				<b>
					<u>
						Дата составления карточки
					</u>
				</b>
			</div>
		</div>
		<div class="cardFieldName" style="width:25%">
			<input type="text" name="compilation_date" required value="<?= date("Y-m-d H:i:s");?>"   style="width:100%;">
		</div>
	</div>
</div>


<!-- <hr> -->

<!-- <div>
    
    <div>Аннотация</div>
    <div>
        <textarea name="summary" ><?php //if (isset($_POST["summary"])){echo $_POST["summary"];}?></textarea>
    </div>
</div> -->

<div class="cardLine">
    <div class="cardFieldName">
        Аннотация
    </div>
    <div class="cardFieldValue">
        <textarea name="summary" style="height:18px;width:inherit;"><?php if (isset($_POST["summary"])){echo $_POST["summary"];}?></textarea>
    </div>
</div>

<!-- <hr> -->



<div class="cardLine">
	<div class="cardFieldName">
		Тематики
	</div>
	<div style="width:70%;">

		<input list="myThem" id="myThems" name="thems" style="width:inherit;">
		<datalist id="myThem">
			<?php
					foreach($ThemList AS $thema)
					{
						echo '<option value="'.$thema->getName().'">';
					}
			?>

		</datalist>

		<!-- <input type="button" value="Добавить тему" onclick="addField(document.querySelector('#myThems').value);"> -->
		<input type="button" value="Добавить в карточку" onclick="addField(document.querySelector('#myThems').value);">
	</div>
</div>

<div class="cardLine">
	<div class="cardFieldName">
		&nbsp;
	</div>
	<div style="width:75%;">

		<span>
			Добавленые тематики в эту карточку:
		</span>

        <div id="thems_list_box" name="thems_list_box">
            <?php
                if ((isset($_POST["thems"]))&&(strlen($_POST["thems"])>3)){
                    echo '<div><input type="text" name="" value="'.$_POST["thems"].'">';
                    echo '<input type="button" name="" value="X"></div>';
                }
                
                if ((isset($_POST["new_thems"]))&&(count($_POST["new_thems"])>0)){
                    foreach($_POST["new_thems"] AS $k => $thema)
                    {
                        echo '<div><input type="text" id="new_thems'.$k.'" name="new_thems[]" value="'.$thema.'">';
                        echo '<input type="button" name="" value="X"></div>';

                    }
                }
            ?>
        </div>
    </div>
</div>
<hr>
<div class="cardLine">
	<div class="cardFieldName">
		Персоналии
	</div>
	<div style="width:70%;">
        

		<input list="myPerson" id="myPersons" name="persons" style="width:inherit;">
		<datalist id="myPerson">
            
            <?php
                // var_dump($PersonList);
                    foreach($PersonList AS $person)
                    {
                        echo '<option value="'.$person->getName().'"></option>';
                    }
            ?>

		</datalist>

		<!-- <input type="button" value="Добавить тему" onclick="addField(document.querySelector('#myThems').value);"> -->
		<!-- <input type="button" value="Добавить в карточку" onclick="addField(document.querySelector('#myThems').value);"> -->
        <!-- <input type="button" value="Добавить в карточку" onclick="addPField(document.querySelector('#myPersons').value);"> -->
        <input type="button" value="Добавить в карточку" onclick="addPersonField(document.querySelector('#myPersons').value);">
	</div>
</div>

<div class="cardLine">
	<div class="cardFieldName">
		&nbsp;
	</div>
	<div style="width:75%;">

		<span>
			Добавленые персоналии в эту карточку:
		</span>

        <div id="persons_list_box" name="persons_list_box">
            <?php
                if ((isset($_POST["persons"]))&&(strlen($_POST["persons"])>3)){
                    echo '<div><input type="text" name="new_persons[]" value="'.$_POST["persons"].'">';
                    echo '<input type="button" name="" value="X"></div>';
                }
                
                if ((isset($_POST["new_persons"]))&&(count($_POST["new_persons"])>0)){
                    foreach($_POST["new_persons"] AS $k => $thema)
                    {
                        echo '<div><input type="text" id="new_persons'.$k.'" name="new_persons[]" value="'.$thema.'">';
                        echo '<input type="button" name="" value="X"></div>';

                    }
                }
            ?>
        </div>
    </div>
</div>

<!-- <hr>
<div class="cardLine">
	<div class="cardFieldName">
		Персоналии
	</div>
	<div class="cardFieldValue">
		<textarea name="persons" style="height:18px;width:inherit;"><?php //if (isset($_POST["persons"])){echo $_POST["persons"];}?></textarea>
	</div>
</div> -->

<hr>
<input type="submit" value="Создать" >
<input type="reset" value="Сбросить">
<input type="button" value="Отемнить создание карточки" onClick="document.location.href = '../../';">
</form>
</body>
</html>

<?php include __DIR__ . '/../footer.php'; ?>