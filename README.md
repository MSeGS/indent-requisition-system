GoM Inventory Management System
=========================

## Installation and Initial Setup

### 1. Run Install
	
	$ php artisan command:install

### 2. Create store

Go to browser and open your application url and login using

	User Name: super
	Password: pass

Go to store from the menu and create store

### 3. Import default products and categories with default users

Import the sql script store1_import.sql at db folder.

### 4. Default Users

You can start login to application using default users

1.	Store Administrator: ati_admin / pass
2.	Store Keeper: ati_store / pass
3.	Indentor: ati_indentor / pass

### 5. Permission (Optional)

Login as Super Administrator and you can set user access permissions for pages


## Default Group Permissions

### 1. Super Administrator
Super Administrator have access to all pages on the application except the following tasks -

* Create New Indent - __indent.create__
* Message Notification

### 2. Store Administrator


### 3. Store Keeper


### 4. Indentor

