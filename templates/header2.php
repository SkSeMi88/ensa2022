<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>НСА НА РК 2021. <?=isset($title_page)?$title_page:"";?></title>
	<link rel="stylesheet" href="/styles.css">
	<link rel="stylesheet" href="/mvcnsa21.css">

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

	</style>
</head>

<body>
<div>
	<div class="user-line">
		<?php

			// var_dump($this);

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
<div class="body-page">
	
<!--</div>-->
