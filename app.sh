#!/bin/bash

whoami
sudo git pull
sudo composer install
php yii migrate --interactive=0
