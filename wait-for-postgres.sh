#!/bin/bash

set -e

host="$DB_HOST"
port="${DB_PORT:-5432}"

echo "Waiting for PostgreSQL at $host:$port..."

until pg_isready -h "$host" -p "$port" > /dev/null 2>&1; do
  sleep 1
done

echo "PostgreSQL is ready."
