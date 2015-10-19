<?php

use PhpSchool\CliMenu\CliMenu;
use PhpSchool\CliMenu\CliMenuBuilder;

require_once(__DIR__ . '/../vendor/autoload.php');

$itemCallable = function (CliMenu $menu) {
    echo $menu->getSelectedItem()->getText();
};

$menu = (new CliMenuBuilder)
    ->setTitle('CLI Menu')
    ->addItem('First Item', $itemCallable)
    ->addItem('Second Item', $itemCallable)
    ->addLineBreak('-')
    ->addSubMenu('Options')
        ->setTitle('CLI Menu > Options')
        ->addItem('First option', function (CliMenu $menu) {
            echo sprintf('Executing option: %s', $menu->getSelectedItem()->getText());
        })
        ->addLineBreak('-')
        ->end()
    ->setWidth(70)
    ->setBackgroundColour('yellow')
    ->build();

$menu->display();