<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>НСА. Общий поиск по карточкам документов</title>

    <link rel="icon" type="image/ico" href="favicon.png" />

    <link rel="stylesheet" href="../../src/css/style.css" />

    <link rel="stylesheet" href="/ktk/css/mvckb.css" />
    <link rel="stylesheet" href="/ktk/css/create_man.css">
    <link rel="stylesheet" href="/ktk/css/create_card_man.css">
    <link rel="stylesheet" href="/ktk/css/create_man_id.css">

    <style>
		body {
			margin		: 0px;
			padding		: 0px;
			/*text-align	: left;*/
		}
		
		.user-line {
			/*margin		: 0px;*/
			padding			: 2px;
			padding-right	: 10px;
			width			: auto;/*100%;*/
			height			: 20px;
			font-size		: 18px;
			background		: silver;
			text-align		: right;
		}
		
		.logo-line {
			margin		: 0px;
			padding			: 0px;
			/*padding-right	: 10px;*/
			width			: 100%;
			height			: 32px;
			font-size		: 32px;
			/*background		: silver;*/
			text-align		: left;
		}
		
		.body-page {
			margin			: 5px;
			padding			: 0px;
			padding-left	: 5px;
		}
		
		.menu-line {
			display			: flex;
			margin			: 3px;
			border-top		: solid 1px;
			border-bottom	: solid 1px;
		}

		.menu-line > div {
			display			: flex;
			margin			: 3px;
		}

        /* // ////////////// */

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

<!-- <script src="/ensa/js/ensa.js"></script> -->
</head>
<body>

<?php
// var_dump($this);
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

<div>
	<div class="user-line">
		<?php

	        if ($user!==null)
	        {

	            $user_profile_link_1  = "/users/profile/";//.$user->getId();
	            $user_profile_link_2  = "/users/logout/";//.$user->getId();
	            $logined = 'Привет, <a href="'.$user_profile_link_1.'">'. $user->getNickname().'</a> | <a href="'.$user_profile_link_2.'">Выйти</a>';
	            $logined = '<a href="'.$user_profile_link_1.'">'. $user->getFio().'('.$user->getRoleName().')</a> | <a href="'.$user_profile_link_2.'">Выйти</a>';
	            echo $logined;
	        }
	        else{
	
	            // не авторизованная загрузка страница
	            $not_logined     =  '<a href="/users/login">Войти</a>';
	            // $not_logined    .=  ' | <a href="/users/signup/">Зарегистрироваться</a>';
	            echo $not_logined;
	        }
		?>
	</div>
	
	<div class="logo-line">
		НСА 2021
		<!--&nbsp;-->
	</div>

	<div class="menu-line">
		<!--&nbsp;-->
		<?=$UserMenu;?>
	</div>
</div>

    <div class="header_page">
        <!-- <h2> -->
            Фильтр поиска: 
        <!-- </h2> -->
    </div>

<form id="filtr" name="filtr" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>" >

<div class="cardLine">
    <div class="cardFieldName">
        Тип документа
    </div>
    <?php
    // $eve
    ?>
     <!-- <div class="cardFieldValue" > -->
     <div class="cardFieldValue"   style="width:80%;">
     
     <select  name="doc_type_filtr" style="width: 10%;">
        <option value="0" <?=((isset($_REQUEST["doc_type_filtr"]))&&($_REQUEST["doc_type_filtr"]=="0"))?"selected":"";?>>Не задано</option>
        <option value="1" <?=((isset($_REQUEST["doc_type_filtr"]))&&($_REQUEST["doc_type_filtr"]=="1"))?"selected":"";?>>Равно</option>
        <option value="2" <?=((isset($_REQUEST["doc_type_filtr"]))&&($_REQUEST["doc_type_filtr"]=="2"))?"selecte='selected'":"";?>>Не равно</option>
        <option value="3" <?=((isset($_REQUEST["doc_type_filtr"]))&&($_REQUEST["doc_type_filtr"]=="3"))?"selected":"";?>>Контекст</option>
        <option value="4" <?=((isset($_REQUEST["doc_type_filtr"]))&&($_REQUEST["doc_type_filtr"]=="4"))?"selected":"";?>>Содержит в списке</option>
    </select>
        <!-- <textarea name="doc_type"><?//=$card->getDocType(); ?></textarea> -->
        <input type="text" name="doc_type" value="<?=((isset($_REQUEST["doc_type"])))?$_REQUEST["doc_type"]:"";?>" width="250px;">
    </div>
</div>
<!-- <hr> -->
<div class="cardLine">
    <div class="cardFieldName">
        Дата события
    </div>


    <!-- <div class="cardFieldValue"   style="width:25%;"> -->
    <div class="cardFieldValue"   style="width:80%;">
    <select  name="event_date_filtr" style="width: 10%;">
        <option value="0" <?=((isset($_REQUEST["event_date_filtr"]))&&($_REQUEST["event_date_filtr"]=="0"))?"selected":"";?>>Не задано</option>
        <option value="1" <?=((isset($_REQUEST["event_date_filtr"]))&&($_REQUEST["event_date_filtr"]=="1"))?"selected":"";?>>Равно</option>
        <option value="2" <?=((isset($_REQUEST["event_date_filtr"]))&&($_REQUEST["event_date_filtr"]=="2"))?"selected":"";?>>Не равно</option>
        <option value="3" <?=((isset($_REQUEST["event_date_filtr"]))&&($_REQUEST["event_date_filtr"]=="3"))?"selected":"";?>>Контекст</option>
        <option value="4" <?=((isset($_REQUEST["event_date_filtr"]))&&($_REQUEST["event_date_filtr"]=="4"))?"selected":"";?>>Содержит в списке</option>
    </select>
        <!-- <textarea name="event_date" ><?//=$card->getEventDate(); ?></textarea> -->
        <input type="text" name="event_date"   value="<?=((isset($_REQUEST["event_date"])))?$_REQUEST["event_date"]:"";?>" >
    </div>
</div>
<!-- <hr> -->
<div class="cardLine">
    <div class="cardFieldName"   style="width:25%;">
        Дата составления документа
    </div>
  
    <!-- <div style="width:10%;">
        <select>
            <option>Равно</option>
            <option>Не равно</option>
            <option>Контекст</option>
            <option>Содержит в списке</option>
        </select>
    </div> -->

    <!-- <div class="cardFieldValue"   style="width:25%;"> -->
    <div class="cardFieldValue"   style="width:80%;">
    <select  name="card_date_filtr" style="width: 10%;">
        <option value="0" <?=((isset($_REQUEST["card_date_filtr"]))&&($_REQUEST["card_date_filtr"]=="0"))?"selected":"";?>>Не задано</option>
        <option value="1" <?=((isset($_REQUEST["card_date_filtr"]))&&($_REQUEST["card_date_filtr"]=="1"))?"selected":"";?>>Равно</option>
        <option value="2" <?=((isset($_REQUEST["card_date_filtr"]))&&($_REQUEST["card_date_filtr"]=="2"))?"selected":"";?>>Не равно</option>
        <option value="3" <?=((isset($_REQUEST["card_date_filtr"]))&&($_REQUEST["card_date_filtr"]=="3"))?"selected":"";?>>Контекст</option>
        <option value="4" <?=((isset($_REQUEST["card_date_filtr"]))&&($_REQUEST["card_date_filtr"]=="4"))?"selected":"";?>>Содержит в списке</option>
    </select>
        <!-- <textarea name="card_date" ><?//=$card->getCardDate(); ?></textarea> -->
        <input type="text" name="card_date"  value="<?=((isset($_REQUEST["card_date"])))?$_REQUEST["card_date"]:"";?>" >
</div>
</div>
<!-- <hr> -->
<div class="cardLine">
    <div class="cardFieldName">
        Место события
    </div>
    
    <!-- <div style="width:10%;">
        <select>
            <option>Равно</option>
            <option>Не равно</option>
            <option>Контекст</option>
            <option>Содержит в списке</option>
        </select>
    </div> -->

    <!-- <div class="cardFieldValue"   style="width:25%;"> -->
    <div class="cardFieldValue"   style="width:80%;">
    <select  name="event_place_filtr" style="width: 10%;">
        <option value="0" <?=((isset($_REQUEST["event_place_filtr"]))&&($_REQUEST["event_place_filtr"]=="0"))?"selected":"";?>>Не задано</option>
        <option value="1" <?=((isset($_REQUEST["event_place_filtr"]))&&($_REQUEST["event_place_filtr"]=="1"))?"selected":"";?>>Равно</option>
        <option value="2" <?=((isset($_REQUEST["event_place_filtr"]))&&($_REQUEST["event_place_filtr"]=="2"))?"selected":"";?>>Не равно</option>
        <option value="3" <?=((isset($_REQUEST["event_place_filtr"]))&&($_REQUEST["event_place_filtr"]=="3"))?"selected":"";?>>Контекст</option>
        <option value="4" <?=((isset($_REQUEST["event_place_filtr"]))&&($_REQUEST["event_place_filtr"]=="4"))?"selected":"";?>>Содержит в списке</option>
    </select>
        <!-- <textarea name="event_place" ><?//=$card->getEventPlace(); ?></textarea> -->
        <input type="text" name="event_place"  value="<?=((isset($_REQUEST["event_place"])))?$_REQUEST["event_place"]:"";?>">
	</div>
</div>
<!-- <hr> -->
<div class="cardLine">
    <div class="cardFieldName">
        Место составления документа
    </div>
    
    <!-- <div style="width:10%;">
        <select>
            <option>Равно</option>
            <option>Не равно</option>
            <option>Контекст</option>
            <option>Содержит в списке</option>
        </select>
    </div> -->

    <!-- <div class="cardFieldValue"   style="width:25%;"> -->
    <div class="cardFieldValue"   style="width:80%;">
    <select  name="card_place_filtr" style="width: 10%;">
        <option value="0" <?=((isset($_REQUEST["card_place_filtr"]))&&($_REQUEST["card_place_filtr"]=="0"))?"selected":"";?>>Не задано</option>
        <option value="1" <?=((isset($_REQUEST["card_place_filtr"]))&&($_REQUEST["card_place_filtr"]=="1"))?"selected":"";?>>Равно</option>
        <option value="2" <?=((isset($_REQUEST["card_place_filtr"]))&&($_REQUEST["card_place_filtr"]=="2"))?"selected":"";?>>Не равно</option>
        <option value="3" <?=((isset($_REQUEST["card_place_filtr"]))&&($_REQUEST["card_place_filtr"]=="3"))?"selected":"";?>>Контекст</option>
        <option value="4" <?=((isset($_REQUEST["card_place_filtr"]))&&($_REQUEST["card_place_filtr"]=="4"))?"selected":"";?>>Содержит в списке</option>
    </select>
        <!-- <textarea name="card_place" ><?//=$card->getCardPlace(); ?></textarea> -->
        <input type="text" name="card_place"  value="<?=((isset($_REQUEST["card_place"])))?$_REQUEST["card_place"]:"";?>">
		</div>
</div>

<div class="cardLine">
    <div class="cardFieldName">
        Заголовок документа
    </div>

    
    <!-- <div style="width:10%;">
        <select>
            <option>Равно</option>
            <option>Не равно</option>
            <option>Контекст</option>
            <option>Содержит в списке</option>
        </select>
    </div> -->


    <!-- <div class="cardFieldValue"> -->
    <div class="cardFieldValue"   style="width:80%;">

    <select  name="doc_header_filtr"  style="width: 10%; height:20px;">
        <option value="0" <?=((isset($_REQUEST["doc_header_filtr"]))&&($_REQUEST["doc_header_filtr"]=="0"))?"selected":"";?>>Не задано</option>
        <option value="1" <?=((isset($_REQUEST["doc_header_filtr"]))&&($_REQUEST["doc_header_filtr"]=="1"))?"selected":"";?>>Равно</option>
        <option value="2" <?=((isset($_REQUEST["doc_header_filtr"]))&&($_REQUEST["doc_header_filtr"]=="2"))?"selected":"";?>>Не равно</option>
        <option value="3" <?=((isset($_REQUEST["doc_header_filtr"]))&&($_REQUEST["doc_header_filtr"]=="3"))?"selected":"";?>>Контекст</option>
        <option value="4" <?=((isset($_REQUEST["doc_header_filtr"]))&&($_REQUEST["doc_header_filtr"]=="4"))?"selected":"";?>>Содержит в списке</option>
    </select>
    <!-- <textarea name="doc_header" ><?//=$card->getDocHeader(); ?></textarea> -->
    <!--<input type="text" name="doc_header"  value="<?//=$card->getDocHeader(); ?>"-->
    <textarea  name="doc_header"  style="height:50px;"><?=(isset($_REQUEST["doc_header"]))?$_REQUEST["doc_header"]:"";?></textarea>
    </div>
</div>

<!-- <hr> -->
    <div class="finder_box">
        <div class="cardFieldName">
            <span>
                Поисковые данные НА РК,
            </span>
        </div>

        
    <!-- <div style="width:20%;">
    </div>
     -->
    
    <!-- <div style="display:flex;width:75%"> -->
        <div class="finder-box-value">
        <select style="width: 10%; height:20px;" disabled>
            <option value="1" <?=((isset($_REQUEST["doc_header_filtr"]))&&($_REQUEST["doc_header_filtr"]=="0"))?"selected":"";?>>Не задано</option>
            <option value="2" <?=((isset($_REQUEST["doc_header_filtr"]))&&($_REQUEST["doc_header_filtr"]=="1"))?"selected":"";?>>Равно</option>
            <option value="3" <?=((isset($_REQUEST["doc_header_filtr"]))&&($_REQUEST["doc_header_filtr"]=="2"))?"selected":"";?>>Не равно</option>
            <option value="4" <?=((isset($_REQUEST["doc_header_filtr"]))&&($_REQUEST["doc_header_filtr"]=="3"))?"selected":"";?>>Контекст</option>

        </select>
        </select>
            <div class="finder">
                <div class="finder-name">
                    Фонд
                </div>
                <div class="finder-value">
                    <Input type="text" id="new_fond"  name="new_fond" placeholder="Фонд" value="<?=(isset($_REQUEST["new_fond"]))?$_REQUEST["new_fond"]:"";?>" >
                </div>
            </div>
            <div class="finder">
                <div class="finder-name">
                    Опись
                </div>
                <div class="finder-value">
                    <Input type="text" id="new_opis"  name="new_opis" placeholder="Опись" value="<?=(isset($_REQUEST["new_opis"]))?$_REQUEST["new_opis"]:"";?>" >
                </div>
            </div>
            <div class="finder">
                <div class="finder-name">
                    Дело
                </div>
                <div class="finder-value">
                    <Input type="text" id="new_delo"  name="new_delo" placeholder="Дело" value="<?=(isset($_REQUEST["new_delo"]))?$_REQUEST["new_delo"]:"";?>" >
                </div>
            </div>
            <div class="finder">
                <div class="finder-name">
                    Лист
                </div>
                <div class="finder-value">
                    <Input type="text" id="new_list"  name="new_list" placeholder="Лист"  value="<?=(isset($_REQUEST["new_list"]))?$_REQUEST["new_list"]:"";?>" >
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

<!-- 
    <div style="width:20%;">
        <select>
            <option>Равно</option>
            <option>Не равно</option>
        </select>
    </div> -->


    <div class="cardFieldValue" style="width:80%;">
    <!-- <select style="width: 10%; height:20px;">
        <option>Равно</option>
        <option>Не равно</option>
        <option>Контекст</option>
        <option>Содержит в списке</option>
    </select> -->
    <select  name="original_filtr"  style="width: 10%; height:20px;">
        <option value="0" <?=((isset($_REQUEST["original_filtr"]))&&($_REQUEST["original_filtr"]=="0"))?"selected":"";?>>Не задано</option>
        <option value="1" <?=((isset($_REQUEST["original_filtr"]))&&($_REQUEST["original_filtr"]=="1"))?"selected":"";?>>Равно</option>
        <option value="2" <?=((isset($_REQUEST["original_filtr"]))&&($_REQUEST["original_filtr"]=="2"))?"selected":"";?>>Не равно</option>
        <option value="3" <?=((isset($_REQUEST["original_filtr"]))&&($_REQUEST["original_filtr"]=="3"))?"selected":"";?>>Контекст</option>
        <option value="4" <?=((isset($_REQUEST["original_filtr"]))&&($_REQUEST["original_filtr"]=="4"))?"selected":"";?>>Содержит в списке</option>
    </select>

        <!-- <textarea name="original" ><?//=$card->getOriginal();?></textarea> -->
        <input type="text" name="original"  value="<?=(isset($_REQUEST["original"]))?$_REQUEST["original"]:"";?>">
    </div>
</div>

<!-- <hr> -->

<div class="cardLine">
    <div class="cardFieldName">
        Язык документа
    </div>

    <!-- <div style="width:20%;">
        <select>
            <option>Равно</option>
            <option>Не равно</option>
            <option>Контекст</option>
            <option>Содержит в списке</option>
        </select>
    </div> -->

    <div class="cardFieldValue" style="width:80%;">
        <select  name="langs_filtr"  style="width: 10%; height:20px;">
            <option value="0" <?=((isset($_REQUEST["langs_filtr"]))&&($_REQUEST["langs_filtr"]=="0"))?"selected":"";?>>Не задано</option>
            <option value="1" <?=((isset($_REQUEST["langs_filtr"]))&&($_REQUEST["langs_filtr"]=="1"))?"selected":"";?>>Равно</option>
            <option value="2" <?=((isset($_REQUEST["langs_filtr"]))&&($_REQUEST["langs_filtr"]=="2"))?"selected":"";?>>Не равно</option>
            <option value="3" <?=((isset($_REQUEST["langs_filtr"]))&&($_REQUEST["langs_filtr"]=="3"))?"selected":"";?>>Контекст</option>
            <option value="4" <?=((isset($_REQUEST["langs_filtr"]))&&($_REQUEST["langs_filtr"]=="4"))?"selected":"";?>>Содержит в списке</option>
        </select>
        <!-- <textarea name="langs" ><?//=$card->getLangs();?></textarea> -->
        <input type="text" name="langs"  value="<?=(isset($_REQUEST["langs"]))?$_REQUEST["langs"]:"";?>">
    </div>
</div>

<!-- <hr> -->

<div class="cardLine">
    <div class="cardFieldName">
        Способ воспроизведения документа
    </div>

    <!-- <div style="width:20%;">

    </div> -->

    <div class="cardFieldValue" style="width:80%;">

    <select  name="playback_filtr"  style="width: 10%; height:20px;">
        <option value="0" <?=((isset($_REQUEST["playback_filtr"]))&&($_REQUEST["playback_filtr"]=="0"))?"selected":"";?>>Не задано</option>
        <option value="1" <?=((isset($_REQUEST["playback_filtr"]))&&($_REQUEST["playback_filtr"]=="1"))?"selected":"";?>>Равно</option>
        <option value="2" <?=((isset($_REQUEST["playback_filtr"]))&&($_REQUEST["playback_filtr"]=="2"))?"selected":"";?>>Не равно</option>
        <option value="3" <?=((isset($_REQUEST["playback_filtr"]))&&($_REQUEST["playback_filtr"]=="3"))?"selected":"";?>>Контекст</option>
        <option value="4" <?=((isset($_REQUEST["playback_filtr"]))&&($_REQUEST["playback_filtr"]=="4"))?"selected":"";?>>Содержит в списке</option>
    </select>
        <!-- <textarea name="playback" ><?//=$card->getPlayBack();?></textarea> -->
        <input type="text" name="playback"  value="<?=(isset($_REQUEST["playback"]))?$_REQUEST["playback"]:"";?>" >
    </div>
</div>

<!-- <hr> -->

<div class="cardLine">
    <div class="cardFieldName">
        Физическое состояние документа
    </div>
<!-- 
    <div style="width:20%;">
   
    </div> -->

    <div class="cardFieldValue" style="width:80%;">
    <select  name="state_filtr"  style="width: 10%; height:20px;">
        <option value="0" <?=((isset($_REQUEST["state_filtr"]))&&($_REQUEST["state_filtr"]=="0"))?"selected":"";?>>Не задано</option>
        <option value="1" <?=((isset($_REQUEST["state_filtr"]))&&($_REQUEST["state_filtr"]=="1"))?"selected":"";?>>Равно</option>
        <option value="2" <?=((isset($_REQUEST["state_filtr"]))&&($_REQUEST["state_filtr"]=="2"))?"selected":"";?>>Не равно</option>
    </select>
        <select name="state" style="width:25%; margin:0px;">
				<?php
					// $selected = ["",""];
					// // $selected[$card->getState()] = $card->getState()?"selected":"";
					// if ($card->getState()==0) {
					// 	$selected[0]	= "selected";
					// }
					// if ($card->getState()==1) {
					// 	$selected[1]	= "selected";
					// }
				?>
            <option value="1" > удовлетворительное</option>
            <option value="0" > неудовлетворительное</option>
        </select>
    </div>
</div>

<!-- <hr> -->

<div class="cardLine">
    <div class="cardFieldName">
        Составитель карточки
    </div>

    <div class="cardFieldValue">
    <select  name="compiler_filtr"  style="width: 10%; height:20px;">
        <option value="0" <?=((isset($_REQUEST["compiler_filtr"]))&&($_REQUEST["compiler_filtr"]=="0"))?"selected":"";?>>Не задано</option>
        <option value="1" <?=((isset($_REQUEST["compiler_filtr"]))&&($_REQUEST["compiler_filtr"]=="1"))?"selected":"";?>>Равно</option>
        <option value="2" <?=((isset($_REQUEST["compiler_filtr"]))&&($_REQUEST["compiler_filtr"]=="2"))?"selected":"";?>>Не равно</option>
        <option value="3" <?=((isset($_REQUEST["compiler_filtr"]))&&($_REQUEST["compiler_filtr"]=="3"))?"selected":"";?>>Контекст</option>
        <option value="4" <?=((isset($_REQUEST["compiler_filtr"]))&&($_REQUEST["compiler_filtr"]=="4"))?"selected":"";?>>Содержит в списке</option>
    </select>
        <!-- <textarea name="compiler" ><?//=$card->getCompiler();?></textarea> -->
        <input type="text" name="compiler"  value="<?=(isset($_REQUEST["compiler"]))?$_REQUEST["compiler"]:"";?>"   style="width:25%;">

        <div class="cardFieldName" style="margin-left:5px;text-align:right;">
            <select  name="compilation_date_filtr"  style="width: auto; height:20px;">
                <option value="0" <?=((isset($_REQUEST["compilation_date_filtr"]))&&($_REQUEST["compilation_date_filtr"]=="0"))?"selected":"";?>>Не задано</option>
                <option value="1" <?=((isset($_REQUEST["compilation_date_filtr"]))&&($_REQUEST["compilation_date_filtr"]=="1"))?"selected":"";?>>Равно</option>
                <option value="2" <?=((isset($_REQUEST["compilation_date_filtr"]))&&($_REQUEST["compilation_date_filtr"]=="2"))?"selected":"";?>>Не равно</option>
                <option value="3" <?=((isset($_REQUEST["compilation_date_filtr"]))&&($_REQUEST["compilation_date_filtr"]=="3"))?"selected":"";?>>Контекст</option>
                <option value="4" <?=((isset($_REQUEST["compilation_date_filtr"]))&&($_REQUEST["compilation_date_filtr"]=="4"))?"selected":"";?>>Содержит в списке</option>
            </select>
            <!-- <span style="margin-left:2px; "> -->
            <span>

                <b>
                    <u>
                        Дата составления карточки
                    </u>
                </b>
            </span>
        </div>
        <div class="cardFieldName" style="width:20%; ">
        <!-- <textarea name="compilation_date" ><?php //if (isset($card["compilation_date"])){echo $card["compilation_date"];}?></textarea> -->
        <!-- <textarea name="compilation_date" ><?//=$card->getCompilationDate();?></textarea> -->
        <input type="text" name="compilation_date"  value="<?=(isset($_REQUEST["compilation_date"]))?$_REQUEST["compilation_date"]:"";?>"   style="width:100%;">
    </div>
    </div>
</div>
<!-- <div class="cardLine">
    <div class="cardFieldName">
        Дата составления карточки
    </div>
    <div class="cardFieldValue"> -->
        <!-- <textarea name="compilation_date" ><?php //if (isset($card["compilation_date"])){echo $card["compilation_date"];}?></textarea> -->
        <!-- <textarea name="compilation_date" ><?//=$card->getCompilationDate();?></textarea> -->
        <!-- <input type="text" name="compilation_date"  value="<?//=$card->getCompilationDate();?>"   style="width:25%;"> -->
    <!-- </div>
</div> -->

<!-- <hr> -->


<!-- <hr> -->

<div class="cardLine">
    <div class="cardFieldName">
        Аннотация
    </div>

    <!-- <div style="width:20%;">
    </div> -->
    
    <div class="cardFieldValue">

        <select  name="summary_filtr"  style="width: 10%; height:20px;">
            <option value="0" <?=((isset($_REQUEST["summary_filtr"]))&&($_REQUEST["summary_filtr"]=="0"))?"selected":"";?>>Не задано</option>
            <option value="1" <?=((isset($_REQUEST["summary_filtr"]))&&($_REQUEST["summary_filtr"]=="1"))?"selected":"";?>>Равно</option>
            <option value="2" <?=((isset($_REQUEST["summary_filtr"]))&&($_REQUEST["summary_filtr"]=="2"))?"selected":"";?>>Не равно</option>
            <option value="3" <?=((isset($_REQUEST["summary_filtr"]))&&($_REQUEST["summary_filtr"]=="3"))?"selected":"";?>>Контекст</option>
            <option value="4" <?=((isset($_REQUEST["summary_filtr"]))&&($_REQUEST["summary_filtr"]=="4"))?"selected":"";?>>Содержит в списке</option>
        </select>
        <textarea name="summary" style="height:20px;width:inherit;"><?=(isset($_REQUEST["summary"]))?$_REQUEST["summary"]:"";?></textarea>
    </div>
</div>

<!-- <hr> -->

<div class="cardLine">
    <!-- <div style="width:25%;"> -->
    <div class="cardFieldName">
    <!-- <div  style="width:10%;"> -->
        Тематика
    </div>

    <!-- <div class="cardFieldValue"> -->
        <div style="width:70%;">

        <select  name="thems_filtr"  style="width: 10%; height:20px;">
            <option>Равно</option>
            <option>Не равно</option>
            <option>Контекст</option>
            <option>Содержит в списке</option>
        </select>

		<input list="myThem" id="myThems" name="new_them" style="width:inherit;">
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
    <div style="width:70%;">

        <span>
            Добавленые тематики в этот фильтр поиска:
        </span>

        <div id="thems_list_box" name="thems_list_box">
            <?php

                $thems          = [];
                $tmp_thems      = [];

                if ((isset($_REQUEST["new_them"])&&(strlen($_REQUEST["new_them"])>0))){
                    $thems[]    = $_REQUEST["new_them"];

                }

                if ((isset($_REQUEST["thems"]))&&(count($_REQUEST["thems"])>0)){
                    $thems  = array_merge($thems, $_REQUEST["thems"]);

                }

                if ((isset($_REQUEST["new_thems"]))&&(count($_REQUEST["new_thems"])>0)){
                    $thems  = array_merge($thems, $_REQUEST["new_thems"]);
                }

                foreach($thems AS $k => $thema)
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
		<textarea name="persons" style="height:18px;width:inherit;"><?//= $card->getPersons();?></textarea>
	</div> -->

    <div style="width:70%;">

        <select  name="persons_filtr"  style="width: 10%; height:20px;">
            <option>Не задано</option>
            <option>Равно</option>
            <option>Не равно</option>
            <option>Контекст</option>
            <option>Содержит в списке</option>
        </select>

        <input list="myPerson" id="myPersons" name="new_person" style="width:inherit;">
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
    <!-- <div class="cardFieldName">
    Содержит
    </div> -->
    <div style="width:70%;">

        <span>
<<<<<<< HEAD
            Добавленые персоналии в этот фильтр поиска:
=======
            Добавленые персоналии в этот филтр поиска:
>>>>>>> a30208e1742a64943574920e2df4fe8fc7726c92
        </span>

        <div id="persons_list_box" name="persons_list_box">
            <?php
                $persons        = [];
                $tmp_persons    = [];


                // уже имеющиеся персоналии
                if ((isset($_REQUEST["persons"])))
                {
                    // если были уже ввиде отдельных уже добавленных ранее персоналий
                    if ((gettype($_POST["persons"])!="string")&&(count($_REQUEST["persons"])>0))
                    {
                        // $tmp_persons    = array_merge($persons, $_REQUEST["persons"]);
                        $persons    = $_REQUEST["persons"];
                    }
                    
                    // // если было значение в строке ввода
                    // if ((gettype($_POST["persons"])=="string")&&(strlen($_REQUEST["persons"])>0))
                    // {
                    //     $persons    = array_merge($tmp_persons, [$_REQUEST["persons"]]);
                    // }
                }

                // // &&(strlen($_REQUEST["persons"])>0)){
                // if ((isset($_REQUEST["persons"]))&&(strlen($_REQUEST["persons"])>0)){
                //     $tmp_persons    = array_merge($persons, [$_REQUEST["persons"]]);

                // }
 
                // if ((isset($_REQUEST["new_persons"]))&&(count($_REQUEST["new_persons"])>0)){
                //     $persons        = array_merge($tmp_persons, $_REQUEST["new_persons"]);
                // }

                // обнулим временный массив для добавления имеющихся/введенных значений персоналий
                $tmp_persons    = [];
                if ((isset($_REQUEST["new_persons"])))
                {
                    // if ((gettype($_POST["new_persons"])=="string")&&(strlen($_REQUEST["new_persons"])>0))
                    // {
                    //     // $tmp_persons    = array_merge($tmp_persons, [$_REQUEST["new_persons"]]);
                    //     $tmp_persons[]      = $_REQUEST["new_persons"];
                    // }
                    if ((gettype($_POST["new_persons"])!="string")&&(count($_REQUEST["new_persons"])>0))
                    {
                        $persons    = array_merge($persons, $_REQUEST["new_persons"]);
                    }
<<<<<<< HEAD
=======

>>>>>>> a30208e1742a64943574920e2df4fe8fc7726c92
                }

                if ((isset($_REQUEST["new_person"])))
                {
                    if ((gettype($_POST["new_person"])=="string")&&(strlen($_REQUEST["new_person"])>0))
                    {
                        $persons[]  = $_REQUEST["new_person"];
                    }
<<<<<<< HEAD
                }
                
                // $persons = $tmp_persons;


                foreach($persons AS $k => $person)
                {
                    echo '<div id="line_person_id_'.$k.'">';
                    echo '<input type="text" id="persons_'.$k.'" name="persons['.$k.']" value="'.$person.'"  class="cardThem">';
                    echo '<input type="button" name="" value="X" onClick="deleteCardPerson('.$k.')">';
                    $btn_link = "document.location.href='../../persons/card/".$k."'";
                    echo '<input type="button" name="" value="->" onClick='.$btn_link.'>';
                    echo '</div>';
=======

                }
                
                // $persons = $tmp_persons;


                foreach($persons AS $k => $person)
                {
                    echo '<div id="line_person_id_'.$k.'">';
                    echo '<input type="text" id="persons_'.$k.'" name="persons['.$k.']" value="'.$person.'"  class="cardThem">';
                    echo '<input type="button" name="" value="X" onClick="deleteCardPerson('.$k.')">';
                    $btn_link = "document.location.href='../../persons/card/".$k."'";
                    echo '<input type="button" name="" value="->" onClick='.$btn_link.'>';
                    echo '</div>';

>>>>>>> a30208e1742a64943574920e2df4fe8fc7726c92
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
        <input type="submit" value="Найти" name="edit_card">
        <input type="button" value="Сбросить фильтр(ы)" onclick="resetPoiskFiltr();">
        <input type="button" value="Reset" onclick="resetPoiskFiltr();">
<?php 
    }
?>
<?php

?>

</form>

<hr>
<div>
<<<<<<< HEAD
    <?php $count_cards   = count($cards);?>
    Результат поиска <?= $count_cards;?>
</div>

<?php


if ($count_cards>0)
{
    $i=1;
    foreach($cards AS $card)
    {

        echo"<div>".($i)."</div>";
        // echo"<div>".$card->shifr()."</div>";
        echo(implode(" ", $card->shifrFullName));//->shifr()."</div>";
        $i++;
    }
    
}


?>

=======
    Результат поиска
</div>

>>>>>>> a30208e1742a64943574920e2df4fe8fc7726c92
<script src="/ensa/js/ensa.js"></script>
</body>

</html>