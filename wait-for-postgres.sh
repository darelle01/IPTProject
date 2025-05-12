#!/bin/bash

set -e

host="${DB_HOST}"
port="${DB_PORT:-5432}"
max_attempts=30
attempts=0

echo "Waiting for PostgreSQL at $host:$port..."

until pg_isready -h "$host" -p "$port" > /dev/null 2>&1; do
  attempts=$((attempts+1))
  if [ "$attempts" -ge "$max_attempts" ]; then
    echo "Failed to connect to PostgreSQL at $host:$port after $max_attempts attempts."
    exit 1
  fi
  echo "Attempt $attempts: PostgreSQL is unavailable — sleeping 1s..."
  sleep 1
done

echo "PostgreSQL is ready."
