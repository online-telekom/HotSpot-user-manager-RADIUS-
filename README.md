# HotSpot user manager for RADIUS
Manage your HotSpot network with time bon for connections.

This software allow you to creat some coupns or ticket for access to wifi or lan HOTSPOT network.
You need have FREERADIUS server with MYSQL database for acct. 

PROGRAM ALLOW YOU TO:
- Creat new access (new users witch is random generated and set expiration time for user)
- Password is same for all users
- Print your data for customers
- Show created coupuns

MANUAL (How setup code)

1. SYSTEM REQUESTMENT
  - PHP 5.3 or hight with PHP MYSQLI module
  - Apache or any WEB server
2. CONFIGURATION
  - you need creat some mysql database and import default.sql from mysql folder
  - you need creat some user who can access to mysql server
  - change mysql database for program in (includes/configuration/config.php)
  - change default path for include in (includes/configuration/core_settings.class.php) // you need provide your path on server
  - change radius database settings in (includes/classes/radius.db.php) where $rdpassword was default password for connections to       HotSpot network
3. WEB MYSQL CONFIGURE
  - TABLE core_settings
      - WWW was your acces to web page 
      - ADMIN_LEVEL if you dont change your code please dont change it
      - THEME_NAME if you dont change your code please dont change it
  - TABLE users
      - DEFAULT LOGIN is admin/admin
      - Password is in MD5 encryption
