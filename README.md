Sample Data Generator
=====================

NOTE:

1. Generator.php #50: $baseCount = 1000; // This is the count that you want to generator once.
2. All the generate rule is defined in *.php that under the Generator directory.

STEP:

1. cd /var/www/arosample/

2. php Generator.php 
  * This will generate the contacts at range 1~1000, and 1000 is depend on $baseCount on the above.
  * Re-Generate the sql and Rewrite the file sample.sql.
  * If you want apend sql to this sql file, please look the step 2+ as bellow:
    2+. php Generator.php 1000 (This will generate the contacts at range 1001~2000)
        php Generator.php 2000 (This will generate the contacts at range 2001~3000)
        ...
3. cd /var/www/arosoftware/arosoftware_rebuild

4. ant database-setup

5. mysql -u root -p

6. source /var/www/arosample/sample.sql