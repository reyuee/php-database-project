<?php session_start(); ?>
<!DOCTYPE html>
<html lang="sv">
<head>
<meta charset="UTF-8">
<title>Min blogg</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/6/w3.css">
<link rel="stylesheet" href="fonts.googleapis.comhttps://fonts.googleapis.com/css?family=Oswald">
<link rel="stylesheet" href="fonts.googleapis.comhttps://fonts.googleapis.com/css?family=Open+Sans">
<style>
h1,h2,h3,h4,h5,h6 {font-family:"Oswald",sans-serif}
body {font-family:"Open Sans",sans-serif}
.blog-grid {display:grid;grid-template-columns:1fr}
@media (min-width:993px) {.blog-grid {grid-template-columns:2fr 1fr}}
</style>
</head>
<body class="w3-light-grey">

<nav class="w3-black w3-padding">
  <a href="index.php" class="w3-button">Start</a>
  <?php if (isset($_SESSION['username'])): ?>
    <span class="w3-button">Inloggad som <?= $_SESSION['username'] ?></span>
    <a href="logout.php" class="w3-button">Logga ut</a>
  <?php else: ?>
    <a href="login.php" class="w3-button">Logga in</a>
  <?php endif; ?>
</nav>

<div class="w3-content" style="max-width:1600px">

<header class="w3-container w3-center w3-padding-48 w3-white">
  <h1 class="w3-xxxlarge"><b>MIN BLOGG</b></h1>
  <h6>Välkommen till <span class="w3-tag">min bloggsida</span></h6>
</header>

<div class="blog-grid w3-padding w3-border">

<main>
