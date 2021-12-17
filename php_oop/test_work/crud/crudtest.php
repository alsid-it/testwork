<?php

require_once 'crud.php';
$crud = new Crud();

$crud->read('testtest10', '1234asd');
echo '<br>';
echo '<br>';

$crud->create('test', "1234", "test30@222ru", 'A');
echo '<br>';
$crud->create('testtest30', "1234asd", "test30@mail.ru", 'Vova');
echo '<br>';
echo '<br>';

$crud->update('testtest20', '1234asd', 'test2020@mail.ru', 'Twenty');
echo '<br>';
echo '<br>';

$crud->delete('testtest13', '1234asd');
echo '<br>';
echo '<br>';


