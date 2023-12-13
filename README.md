## Vocational Center - Coachteen

<p>This project is an automatable approximation of the tests that Coachteen has available.</p>

### Instalation

```shell
#run migration
php artisan migrate:fresh
#keep this order
php artisan db:seed --class=DviAssetsSeeder
php artisan db:seed --class=DviInterestsSeeder
php artisan db:seed --class=DviQuestionSeeder
#Docker version - keep this order
sail artisan db:seed --class=DviAssetsSeeder
sail artisan db:seed --class=DviInterestsSeeder
sail artisan db:seed --class=DviQuestionSeeder
```

