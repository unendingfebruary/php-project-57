start:
	php artisan serve

start-front:
	npm run dev

install:
	composer install
	cp -n .env.example .env
	php artisan key:generate
	php artisan migrate --force
	npm ci
	npm run build

lint:
	composer exec --verbose phpcs -- --standard=PSR12 app database routes tests

lint-fix:
	composer exec --verbose phpcbf -- --standard=PSR12 app database routes tests

test:
	php artisan test

test-coverage:
	php artisan test --coverage-clover build/logs/clover.xml
