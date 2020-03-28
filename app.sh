#!/bin/bash

sudo git pull
sudo composer install
php yii migrate --interactive=0
