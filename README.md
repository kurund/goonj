# CiviCRM

## Preparing development environment

### Pre-requisite

1. PHP 8.x
2. WP-CLI
   1. [Installing via Homebrew](https://make.wordpress.org/cli/handbook/guides/installing/#installing-via-homebrew) would be the easiest option for macOS users.
   2. If not, all other installation options can be found in the same page.
3. MySQL 5.7.5+ or MariaDB 10.2+


### Steps (from this repository)

#### WordPress site setup

First we will setup a WordPress site on top of which we will setup CiviCRM. For creating the WordPress site we will require a database.

1. Login to the MySQL terminal
   ```sh
   mysql -u root -p
   ```

1. From the MySQL terminal, create a database
   ```sql
   create database goonj_crm;
   exit
   ```

1. Clone this repository
   ```sh
   git clone https://github.com/ColoredCow/goonj-crm.git
   ```

1. Change to project root directory
   ```sh
   cd civicrm
   ```

1. Create the WordPress config file (**specify the correct database credentials**)
   ```sh
   wp config create --dbname=goonj_crm --dbuser=root --dbpass=
   ```

1. Install WordPress and create admin
   ```sh
   wp core install --url=goonj-civicrm.test --title="Goonj-CiviCRM" --admin_user=admin --admin_password=admin --admin_email=admin@example.com
   ```

1. Set the WordPress permalink structure to "postname"
   ```sh
   wp rewrite structure '/%postname%/'
   ```

1. Create a virtual host
   ```sh
   valet link goonj-civicrm
   ```

1. Secure the virtual host
   ```sh
   valet secure goonj-civicrm
   ```
#### Setup CiviCRM

1. Activate the plugin
   ```sh
   wp plugin activate civicrm
   ```

2. Go to `https://goonj-civicrm.test/wp-admin` and configure CiviCRM.
   1. Check all the Components
   2. And click on `Install CiviCRM`

### Steps (from scratch)

> _You probably don't need to do it. These steps has already done these and pushed it in this repository._
#### WordPress site setup

First we will setup a WordPress site on top of which we will setup CiviCRM. For creating the WordPress site we will require a database.

1. Login to the MySQL terminal
   ```sh
   mysql -u root -p
   ```

1. From the MySQL terminal, create a database
   ```sql
   create database goonj_crm;
   exit
   ```

1. Make project directory
   ```sh
   mkdir civicrm
   ```

1. Change to the project diretory
   ```sh
   cd civicrm
   ```

1. Download the WordPress core files in the current diretory
   ```sh
   wp core download
   ```

1. Create the WordPress config file (**specify the correct database credentials**)
   ```sh
   wp config create --dbname=goonj_crm --dbuser=root --dbpass=
   ```

1. Install WordPress and create admin
   ```sh
   wp core install --url=goonj-civicrm.test --title="Goonj-CiviCRM" --admin_user=admin --admin_password=admin --admin_email=admin@example.com
   ```

1. Create a virtual host
   ```sh
   valet link goonj-civicrm
   ```

1. Secure the virtual host
   ```sh
   valet secure goonj-civicrm
   ```

1. Go to `https://goonj-civicrm.test/wp-admin` and login using the admin credentials step 7.

#### Setup CiviCRM

1. In the project directory, run the following command to download the CiviCRM plugin
   ```sh
   wp plugin install https://download.civicrm.org/civicrm-5.74.1-wordpress.zip
   ```

1. Activate the plugin
   ```sh
   wp plugin activate civicrm
   ```

1. Go to `https://goonj-civicrm.test/wp-admin` and configure CiviCRM.
   1. Check all the Components
   2. And click on `Install CiviCRM`
