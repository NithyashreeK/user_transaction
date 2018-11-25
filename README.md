# user_transaction

This is an exercise to work with data obtained from randomuser.me
Database:
•	Created a database to hold user information and transactions for all users
•	Each user has a unique transaction ID generated using “uniqid('txn_')”, a random transaction amount generated using “FLOOR(RAND() * 401) + 100”, range was 100 - 400, andom timestamp for each transaction was generated using “FROM_UNIXTIME(UNIX_TIMESTAMP('2018-04-30 14:53:27') + FLOOR(0 + (RAND() * 63072000)))” and a random assignment of transaction statuses done using “array_rand” on an array containing 3 different statuses: expired, expires soon and active
•	Assignment of payment method also followed the same step as transaction statuses i.e, using “array_rand” on an array containing 8 different methods: Visa, Mastercard, Discover, American Express, Diners Club, JCB, UnionPay, eCheck

Tables and user details page:
•	Two separate tables, one for user information and one for transaction information is displayed in the index page
•	Clicking on any user ID in the user information table displays list.php page with the corresponding user’s information
Dynamic table sorting and pagination was added using jQuery and datatables plug-ins
