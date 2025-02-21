model-ide-helper:
	@php artisan ide-helper:models -RW

local-ready:
	@echo "starting mysql service..."
	@sudo service mysql start
	@echo "mysql started."

	@echo "starting redis service..."
	@sudo service redis-server start
	@echo "redis started."

	@echo "starting apache2"
	@sudo service apache2 start
	@echo "apache2 started."

.PHONY: model-ide-helper local-ready