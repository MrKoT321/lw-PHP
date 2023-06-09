#!/usr/bin/env bash

set -o errexit

PROJECT_DIR=$(dirname "$(dirname "$0")")

exec php -S localhost:8000 -t "$PROJECT_DIR/public"