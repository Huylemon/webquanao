# !/bin/sh

# Run Laravel Pint
echo "Running Laravel Pint..."

docker compose exec -T app ./vendor/bin/pint --test

# Check Run Pint
if [ $? -ne 0 ]; then
  echo "Laravel Pint failed. Please fix the errors before committing."
  exit 1
fi

echo "Laravel Pint passed."

# Run PHPStan
echo "Running PHPStan analyse..."

docker compose exec -T app ./vendor/bin/phpstan analyse --memory-limit=2G

# Check run PHPStan
if [ $? -ne 0 ]; then
    echo "PHPStan analysis failed. Please fix the errors before committing."
    exit 1
fi

echo "PHPStan analysis passed."

echo "Run Yarn Check..."

pnpm format

if [ $? -ne 0 ]; then
    echo "Yarn format failed. Please fix the errors before committing."
    exit 1
fi

pnpm lint

if [ $? -ne 0 ]; then
    echo "yarn lint failed. Please fix the errors before committing."
    exit 1
fi

pnpm ts-check

if [ $? -ne 0 ]; then
    echo "yarn ts-check failed. Please fix the errors before committing."
    exit 1
fi
