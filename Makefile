start:
	php artisan serve

install:
	composer install
	cp -n .env.example .env
	php artisan key:generate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 app

lint-fix:
	composer exec --verbose phpcbf -- --standard=PSR12 app

test:
	php artisan test

test-coverage:
	php artisan test --coverage-clover build/logs/clover.xml
