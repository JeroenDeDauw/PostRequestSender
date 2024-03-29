.PHONY: ci cs test phpunit psalm phpstan stan

ci: phpstan phpunit psalm
cs: phpstan psalm
test: phpunit

phpunit:
	php ./vendor/bin/phpunit -c phpunit.xml.dist

coverage-html:
	php ./vendor/bin/phpunit -c phpunit.xml.dist --coverage-html=./build/coverage/html

psalm:
	./vendor/bin/psalm

stan:
	./vendor/bin/phpstan analyse -c phpstan.neon --no-progress

phpstan: stan
