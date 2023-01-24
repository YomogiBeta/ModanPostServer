up:
	./vendor/bin/sail up -d

down:
	./vendor/bin/sail down

stop:
	./vendor/bin/sail stop

migrate:
	./vendor/bin/sail php artisan migrate:fresh --seed