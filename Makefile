#!/usr/bin/make

SHELL = /bin/sh

.PHONY : help build latest install lowest test 'shell' clean
.DEFAULT_GOAL : help

help: ## Show this help
	@printf "\033[33m%s:\033[0m\n" 'Available commands'
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "  \033[32m%-14s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

deptrac-build: ## Execute PHPUnit tests
	docker build -f docker/deptrac/Dockerfile --tag gomzyakov/deptrac . --no-cache

deptrac-analyse: ## Execute PHPUnit tests
	docker run -v "$(shell pwd)/:/src" --rm gomzyakov/deptrac php deptrac.phar analyse

deptrac-report-uncovered: ## Execute PHPUnit tests
	docker run -v "$(shell pwd)/:/src" --rm gomzyakov/deptrac php deptrac.phar --report-uncovered

deptrac-shell: ## Execute PHPUnit tests
	docker run --rm -it gomzyakov/deptrac sh
