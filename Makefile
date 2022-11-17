install:
	composer install
validate:
	composer validate
lint:
	composer exec --verbose phpcs -- --standart=PSR12 src bin
brain-games:
	./bin/brain-games
