#! /bin/bash

composer install --no-dev --no-ansi --no-interaction --no-plugins --no-progress --no-scripts --optimize-autoloader
npm ci
npm run prod
