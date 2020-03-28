#!/bin/bash

git pull
composer install
php yii migrate --interactive=0
