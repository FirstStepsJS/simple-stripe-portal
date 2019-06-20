#!/bin/bash

set -x

echo "I'm docker-start.sh"

php -v

cd /app && php artisan serve --host 0.0.0.0
