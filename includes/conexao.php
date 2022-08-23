<?php

define('HOST','10 97 46 107');
define('USUARIO','root');
define('SENHA','');
define('DB','db_restaurante');

$conexao = mysqli_connect(HOST,USUARIO,SENHA,DB) 
or die ('Não foi possível conectar');

