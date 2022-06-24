# MyHospital

Web based hospital management system.
Designed by Clover 🍀

|<img width="960" alt="Annotation 2021-05-18 233535" src="https://user-images.githubusercontent.com/14845590/175568429-e78cb7ae-8d9c-4702-8d74-345dce3a0dba.png">|<img width="960" alt="Annotation 2021-05-18 233553" src="https://user-images.githubusercontent.com/14845590/175568435-7265e856-2e74-4ab2-b652-cd88835fdc1c.png">|
|-|-|
|<img width="960" alt="Annotation 2021-05-18 233616" src="https://user-images.githubusercontent.com/14845590/175568454-51c5cac4-a2bc-4585-86b6-11966d7c2bcd.png">|<img width="960" alt="Annotation 2021-05-18 233703" src="https://user-images.githubusercontent.com/14845590/175568465-899d9f04-9332-4fda-9e42-93bfc9e90ed8.png">|
|<img width="960" alt="Annotation 2021-05-18 233934" src="https://user-images.githubusercontent.com/14845590/175568476-0edfe960-b296-421d-9011-a18f989c871f.png">|<img width="960" alt="Annotation 2021-05-18 234018" src="https://user-images.githubusercontent.com/14845590/175568493-c2082bb3-7d0f-493b-b489-3694d27730cc.png">|
|<img width="960" alt="Annotation 2021-05-18 234045" src="https://user-images.githubusercontent.com/14845590/175568509-d08796a9-477e-4dda-93e5-f4daa5fbb633.png">|<img width="960" alt="Annotation 2021-05-18 234212" src="https://user-images.githubusercontent.com/14845590/175568519-ee0aac87-44d6-4660-8a4e-5c0c3aaaade9.png">|
|<img width="960" alt="Annotation 2021-05-18 234235" src="https://user-images.githubusercontent.com/14845590/175568533-54d6def7-3dba-4a16-8314-2a8b71f1106e.png">|<img width="960" alt="Annotation 2021-05-18 234324" src="https://user-images.githubusercontent.com/14845590/175568545-2cf05244-5f6e-4c3b-ad64-e90683cb2391.png">|

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
