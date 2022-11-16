<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>КТК.Карточка документа.</title>

    <link rel="icon" type="image/ico" href="favicon.png" />

    <link rel="stylesheet" href="../../src/css/style.css" />

    <link rel="stylesheet" href="/ktk/css/mvckb.css" />
    <link rel="stylesheet" href="/ktk/css/create_man.css">
    <link rel="stylesheet" href="/ktk/css/create_card_man.css">
    <link rel="stylesheet" href="/ktk/css/create_man_id.css">
            


    <style>
        .delete-btn {
            background      : red;
            color           : white;
            font-weight     : bold;
            border          :0px;
            padding         :5px;
        }
        /* #thems_list_box {
            padding     : 0px;
        } */

        .header_page{
            font-size: 20px;
            font-style:bold;
            border-bottom: solid 1px;
            color: red;
        }

        /* #myThems {
            width   : 50%;
        } */

        .cardThem {
            width		: 50%;
            margin	: 3px;
        }

        .cardLine {
            display     : flex;
            margin      : 3px;
            justify-content:flex-start;
        }

        .cardFieldName {
            
            display     : flex;
            width       : 25%;
            /* text-align  : center; */
            text-align  : right;
            align       : right;
            font-style   : italic;
            font-weight: bold;
        }
        

        .cardFieldName > div {
            
            /* display     : flex; */
            /* width       : 15%; */
            /* text-align  : center; */
            text-align  : right;
            align       : right;
        }
        
        .cardFieldValue{
            
            align       : right;
            display     : flex;
            width       : 75%;
        }
        
        .cardFieldValue input, select, textarea{
            
            /* display     : flex; */
            width       : 75%;
        }
        
        /* input > 
        #myThems {
            
            width       : 75%;

        } */

        .finder_box{
            display:    flex;
            /* justify-content: start; */
        }

        .finder-box-value {
            display     : flex;
            width       : 60%;
        }     

        .finder {
            /* display:    flex; */
            width   : 20%;
        }

        /* .finder > div {

            width   : inherit;
            width   : 50%;
            width   : 50%;
        }  */
        
        .finder-name {
            width           : auto;
            margin-right    : 3px;
        }
        
        .finder-value{
            /* display : inline; */
            /* width           : inherit;  */
            /* width           : auto; */
            width           : 80%;
        }

        .finder-value > input {
            width           : inherit; 
            /* width           : 100%;  */
            /* width           : auto; */
            

        }



    </style>


</head>
<body>

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

    <div class="header_page">
        <!-- <h2> -->
            Карточка ("документа") № <?=$card->getId();?>
            <?= ($card->deleted==1)?"(УДАЛЕНА)":"";?>
            
        <!-- </h2> -->
    </div>
<form id="new_ref"  name="new_ref"  method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>" >



<div class="cardLine">
    <div class="cardFieldName">
        Тип документа
        </div>
     <div class="cardFieldValue"  style="width:25%;">
        <!-- <textarea name="doc_type"><?//=$card->getDocType(); ?></textarea> -->
        <input type="text" name="doc_type" value="<?=$card->getDocType();?>" width="250px;">
    </div>
</div>
<!-- <hr> -->
<div class="cardLine">
    <div class="cardFieldName">
        Дата события
        </div>
    <div class="cardFieldValue"   style="width:25%;">
        <!-- <textarea name="event_date" required><?//=$card->getEventDate(); ?></textarea> -->
        <input type="text" name="event_date" required value="<?=$card->getEventDate(); ?>">
    </div>
</div>
<!-- <hr> -->
<div class="cardLine">
    <div class="cardFieldName"   style="width:25%;">
        Дата составления документа
    </div>
    <div class="cardFieldValue"   style="width:25%;">
        <!-- <textarea name="card_date" required><?//=$card->getCardDate(); ?></textarea> -->
        <input type="text" name="card_date" required value="<?=$card->getCardDate(); ?>" >
</div>
</div>
<!-- <hr> -->
<div class="cardLine">
    <div class="cardFieldName">
        Место события
    </div>
    <div class="cardFieldValue"   style="width:25%;">
        <!-- <textarea name="event_place" required><?//=$card->getEventPlace(); ?></textarea> -->
        <input type="text" name="event_place" required value="<?=$card->getEventPlace(); ?>">
	</div>
</div>
<!-- <hr> -->
<div class="cardLine">
    <div class="cardFieldName">
        Место составления документа
    </div>
    <div class="cardFieldValue"   style="width:25%;">
        <!-- <textarea name="card_place" required><?//=$card->getCardPlace(); ?></textarea> -->
        <input type="text" name="card_place" required value="<?=$card->getCardPlace(); ?>">
		</div>
</div>

<div class="cardLine">
    <div class="cardFieldName">
        Заголовок документа
    </div>
    <div class="cardFieldValue">
    <!-- <textarea name="doc_header" required><?//=$card->getDocHeader(); ?></textarea> -->
    <!--<input type="text" name="doc_header" required value="<?//=$card->getDocHeader(); ?>"-->
    <textarea  name="doc_header" required style="height:50px;"><?=$card->getDocHeader();?></textarea>
    </div>
</div>

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
                    <Input type="text" id="new_fond"  name="new_fond" placeholder="Фонд" value="<?=$card->shifrFullName["fond"];?>" required>
                </div>
            </div>
            <div class="finder">
                <div class="finder-name">
                    Опись
                </div>
                <div class="finder-value">
                    <Input type="text" id="new_opis"  name="new_opis" placeholder="Опись" value="<?=$card->shifrFullName["opis"];?>" required>
                </div>
            </div>
            <div class="finder">
                <div class="finder-name">
                    Дело
                </div>
                <div class="finder-value">
                    <Input type="text" id="new_delo"  name="new_delo" placeholder="Дело" value="<?=$card->shifrFullName["delo"];?>" required>
                </div>
            </div>
            <div class="finder">
                <div class="finder-name">
                    Лист
                </div>
                <div class="finder-value">
                    <Input type="text" id="new_list"  name="new_list" placeholder="Лист"  value="<?=$card->shifrFullName["list"];?>" required>
                </div>
            </div>
        </div>
            <!-- <div class="finder"></div> -->
    </div>
<!-- <hr> -->

<div class="cardLine">
    <div class="cardFieldName">
        Подлинник/Копия
    </div>
    <div class="cardFieldValue">
        <!-- <textarea name="original" required><?//=$card->getOriginal();?></textarea> -->
        <input type="text" name="original" required value="<?=$card->getOriginal();?>">
    </div>
</div>

<!-- <hr> -->

<div class="cardLine">
    <div class="cardFieldName">
        Язык документа
    </div>
    <div class="cardFieldValue">
        <!-- <textarea name="langs" required><?//=$card->getLangs();?></textarea> -->
        <input type="text" name="langs" required value="<?=$card->getLangs();?>">
    </div>
</div>

<!-- <hr> -->

<div class="cardLine">
    <div class="cardFieldName">
        Способ воспроизведения документа
    </div>
    <div class="cardFieldValue">
        <!-- <textarea name="playback" required><?//=$card->getPlayBack();?></textarea> -->
        <input type="text" name="playback" required value="<?=$card->getPlayBack();?>" >
    </div>
</div>

<!-- <hr> -->

<div class="cardLine">
    <div class="cardFieldName">
        Физическое состояние документа
    </div>
    <div class="cardFieldValue">
        <select name="state" style="width:25%; margin:0px;">
				<?php
					$selected = ["",""];
					// $selected[$card->getState()] = $card->getState()?"selected":"";
					if ($card->getState()==0) {
						$selected[0]	= "selected";
					}
					if ($card->getState()==1) {
						$selected[1]	= "selected";
					}
				?>
            <option value="1" <?=$selected[1];?>> удовлетворительное</option>
            <option value="0" <?=$selected[0];?>> неудовлетворительное</option>
        </select>
    </div>
</div>

<!-- <hr> -->

<div class="cardLine">
    <div class="cardFieldName">
        Составитель карточки
    </div>
    <div class="cardFieldValue">
        <!-- <textarea name="compiler" required><?//=$card->getCompiler();?></textarea> -->
        <input type="text" name="compiler" required value="<?=$card->getCompiler();?>"   style="width:25%;">
        <div class="cardFieldName" style="margin-left:5px;text-align:right;">
            <b>
                <u>
                Дата составления карточки
                </u>
            </b>
        </div>
        <div class="cardFieldName" style="width:25%">
        <!-- <textarea name="compilation_date" required><?php //if (isset($card["compilation_date"])){echo $card["compilation_date"];}?></textarea> -->
        <!-- <textarea name="compilation_date" required><?//=$card->getCompilationDate();?></textarea> -->
        <input type="text" name="compilation_date" required value="<?=$card->getCompilationDate();?>"   style="width:100%;">
    </div>
    </div>
</div>
<!-- <div class="cardLine">
    <div class="cardFieldName">
        Дата составления карточки
    </div>
    <div class="cardFieldValue"> -->
        <!-- <textarea name="compilation_date" required><?php //if (isset($card["compilation_date"])){echo $card["compilation_date"];}?></textarea> -->
        <!-- <textarea name="compilation_date" required><?//=$card->getCompilationDate();?></textarea> -->
        <!-- <input type="text" name="compilation_date" required value="<?//=$card->getCompilationDate();?>"   style="width:25%;"> -->
    <!-- </div>
</div> -->

<!-- <hr> -->


<!-- <hr> -->

<div class="cardLine">
    <div class="cardFieldName">
        Аннотация
    </div>
    <div class="cardFieldValue">
        <textarea name="summary" style="height:18px;width:inherit;"><?= $card->getSummary();?></textarea>
    </div>
</div>

<!-- <hr> -->

<div class="cardLine">
    <!-- <div style="width:25%;"> -->
    <div class="cardFieldName">
        Тематика
    </div>
    <!-- <div class="cardFieldValue"> -->
        <div style="width:75%;">

		<input list="myThem" id="myThems" name="thems" style="width:inherit;">
		<datalist id="myThem" >
        <!-- style="width:100%;"> -->

            <?php
					foreach($ThemList AS $thema)
					{
						echo '<option value="'.$thema->getName().'">';
					}
            ?>

		</datalist>

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
                foreach($card->thems AS $k => $thema)
                {
                    echo '<div id="line_them_id_'.$k.'">';
                    echo '<input type="text" id="thems_'.$k.'" name="thems['.$k.']" value="'.$thema.'"  class="cardThem">';
                    echo '<input type="button" name="" value="X" onClick="deleteCardThem('.$k.')">';
                    echo '</div>';

                }
            ?>
        </div>
    </div>
</div>
<!-- </div> -->
<!-- <hr> -->
<div class="cardLine">
    <div class="cardFieldName">
        Персоналии
    </div>
    <!-- <div class="cardFieldValue">
		<textarea name="persons" style="height:18px;width:inherit;"><?= $card->getPersons();?></textarea>
	</div> -->

    <div style="width:75%;">

        <input list="myPerson" id="myPersons" name="persons" style="width:inherit;">
        <datalist id="myPerson" >
        <!-- style="width:100%;"> -->

            <?php
                    foreach($PersonList AS $person)
                    {
                        echo '<option value="'.$person->getName().'"></option>';
                        // echo '<option name="'.$person->getId().'" >'.$person->getName().'</option>';
                    }
            ?>

        </datalist>

        <!-- <input type="button" value="Добавить в карточку" onclick="addPerson(document.querySelector('#myPersons').value);"> -->
        <!-- <input type="button" value="Добавить в карточку" onclick="addPerson();"> -->
        <input type="button" value="Добавить в карточку" onclick="addPersonField(document.querySelector('#myPersons').value);">
        <!-- <input type="button" value="Добавить в карточку" onClick="testField(document.querySelector('#myPersons').value);"> -->
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
                foreach($card->persons AS $k => $person)
                {
                    echo '<div id="line_person_id_'.$k.'">';
                    echo '<input type="text" id="persons_'.$k.'" name="persons['.$k.']" value="'.$person.'"  class="cardThem">';
                    echo '<input type="button" name="" value="X" onClick="deleteCardPerson('.$k.')">';
                    $btn_link = "document.location.href='../../persons/card/".$k."'";
                    echo '<input type="button" name="" value="->" onClick='.$btn_link.'>';
                    echo '</div>';

                }
            ?>
        </div>
    </div>
</div>

<hr>
<?php
    // if(){}
?>

<?php
    // echo $user->getRoleName();
    if (($user!==null)&&(in_array($user->getRoleTitle(),["editor", "admin", "root"])))
    {
    ?>
        <input type="submit" value="Сохранить изменения" name="edit_card">
        <input type="reset" value="Сбросить изменения">
<?php 
    }
?>
<input type="button" value="Просмотр изображений карточки" onClick="document.location.href = '../cards/<?=$card->getId();?>/files';">
<?php
    // echo $user->getRoleName();
    if (($user!==null)&&(in_array($user->getRoleTitle(),["editor", "admin", "root"])))
    {
        $delete_btn    = "document.location.href='../../cards/".$card->getId()."/delete';";
        $delete_btn    = "document.location.href='../../cards/delete/".$card->getId()."';";
        // $delete_btn    = "document.location.href='/delete';";
        // echo '<input type="button" value="Удaлить карточку" onClick="document.location.href =/delete;" class="delete-btn">';
        echo '<input type="button" value="Удaлить карточку" onClick='.$delete_btn.' class="delete-btn">';
    }
?>
<input type="button" value="Перейти на главную страницу" onClick="document.location.href = '../../';">
<!-- <input type="button" value="Перейти на главную страницу" onClick="addPField('123');"> -->

</form>

<script src="/ensa/js/ensa.js"></script>
</body>

</html>