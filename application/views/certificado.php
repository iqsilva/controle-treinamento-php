<?php


$this->load->library('PHPImage');
//require_once('../application/helpers/PHPImage.php');

$bg = 'assets/img/certificado-azul.jpg';
$overlay = 'assets/img/azul.png';
$overlay2 = 'assets/img/signature.png';


$nome = 'Senhor Xiuaua';
$curso = 'Direção Ofensiva';
$hoje = '04/12/17';
$validade = '30/12/25';
$horas = '50';


// Avatar instance
$avatar = new PHPImage();
$avatar->setDimensionsFromImage($overlay);
$avatar->draw($overlay);
$avatar->resize(1000, 1000, false, false);

// Avatar instance
$avatar2 = new PHPImage();
$avatar2->setDimensionsFromImage($overlay2);
$avatar2->draw($overlay2);
$avatar2->resize(1000, 1000, false, false);

// Main image
$image = new PHPImage();
$image->setDimensionsFromImage($bg);
$image->draw($bg);
$image->setFont('assets/font/arial.ttf');
$image->setTextColor(array(255, 255, 255));
$image->setStrokeWidth(1);
$image->setStrokeColor(array(0, 0, 0));
$image->text('CERTIFICADO', array('fontSize' => 50, 'x' => 420, 'y' => 350));

$image->setFont('assets/font/arial.ttf');
$image->setTextColor(array(255, 255, 255));
$image->setStrokeWidth(1);
$image->setStrokeColor(array(0, 0, 0));
$image->text('Certificamos que '.$nome, array('fontSize' => 25, 'x' => 300, 'y' => 450));
$image->text('Participou do curso: '.$curso, array('fontSize' => 25, 'x' => 300, 'y' => 500));
$image->text('Realizada pela Azul Treinamentos. ', array('fontSize' => 25, 'x' => 300, 'y' => 550));
$image->text('Valido até '.$validade.', com duração de '.$horas.' horas.', array('fontSize' => 25, 'x' => 325, 'y' => 600));
$image->text('Indaiatuba, '.$hoje, array('fontSize' => 15, 'x' => 800, 'y' => 725));

// Draw Avatar on main image
$image->rectangle(50, 450, 100, 100, array(255, 255, 255), 0.25);
$image->draw($avatar, 500, 75);
$image->draw($avatar2, 500, 750);
$image->show();



?>