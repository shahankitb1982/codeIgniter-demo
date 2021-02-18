# codeigniter-demo

Version : 3.1.11

Includes CRUD operations &amp; API Demo

1. Create database named `codeigniter` in MySQL, then import `codeigniter.sql` file
2. Set base URL in `application/config/config.php`

```
$config['base_url'] = 'http://localhost:8001';
```
3. Set database configuration in `application/config/database.php`

```
$db['default'] = array(
	'hostname' => '127.0.0.1',
	'username' => 'root',
	'password' => '',
	'database' => 'codeigniter',
);  
```
4. Go to Terminal / CLI. On the project root folder `codeigniter-demo`, please run commnd `php -S localhost:8001`
On success you will get message like below

```
PHP 7.1.23 Development Server started at Thu Feb 18 23:18:19 2021
Listening on http://localhost:8001

```
5. Open browser and navigate to `http://localhost:8001/referrals/` 
   1. It will show lists of 2 records with the option `View`, `Edit`, `Delete`
   2. Have option to `Create New Referral Code` & `Validate Referral Code`
   3. `Validate Referral Code` will validate Referral Code via AJAX, if it's valid then show relevant data.

6. API is also created to Validate Referral code. Below is the Postman Code

```
curl --location --request POST 'http://localhost:8001/api/process' \
--header 'Content-Type: application/json' \
--data-raw '{
	"referralcode" : "AAAZZZ"
}'

```
