# MyHospital

Web based hospital management system.
Designed by Clover 🍀

## Setup

1. Clone repo.
2. Run `php spark serve` from your local repo directory.
3. Start your MySQL server.
4. Create a database named `dbmyhospital` in your phpmyadmin.
5. Run database migrations and seeders using the following commands.

```
php spark migrate -all
php spark db:seed DokterSeeder
php spark db:seed RegistrasiPerawatanSeeder
php spark db:seed PasienSeeder
php spark db:seed PemberianTindakanSeeder
php spark db:seed PemberianObatSeeder
php spark db:seed ObatSeeder
php spark db:seed UsersSeeder
php spark db:seed KeuanganSeeder
php spark db:seed ProdusenSeeder
```

6. Open `http://localhost:8080/` in your web browser.
7. Login with the following credential.

```
username : admin
password : coolhand
```

8. You are good to go.
