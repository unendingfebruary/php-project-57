PORT ?= 8000
start:
	php artisan serve --host 0.0.0.0 --port $(PORT)
	npm run dev

start-local:
	php artisan serve

install:
	composer install
	cp -n .env.example .env
	php artisan key:generate
	npm ci
	npm run build

lint:
	composer exec --verbose phpcs -- --standard=PSR12 app

lint-fix:
	composer exec --verbose phpcbf -- --standard=PSR12 app

test:
	php artisan test

test-coverage:
	php artisan test --coverage-clover build/logs/clover.xml
