#! /usr/bin/env bash

apt-get update -qy
apt-get install -qqy php5-cli nginx postgresql postgresql-contrib libdbi-perl libdbd-pg-perl liblist-moreutils-perl libjson-perl libpq-dev php5-fpm postgresql postgresql-contrib php5-pgsql

# Set vi as default editor
sudo rm /etc/alternatives/editor
sudo ln -s /usr/bin/vim.basic /etc/alternatives/editor

# Enable "page up" and "page down" to search the history
sudo sed -i 's/# \(.*\)history-search\(.*\)/\1history-search\2/g' /etc/inputrc

echo "------------------------------------------------------------------------------"
echo "Apply nginx settings"
mkdir /etc/nginx/bkp
mv /etc/nginx/sites-enabled/default /etc/nginx/bkp
mv /etc/nginx/sites-available/default /etc/nginx/bkp
#cat << EOF > /etc/nginx/sites-enabled/pince
#server {
#    location        / {
#        proxy_pass      http://localhost:8001;
#    }
#}
#EOF

echo "------------------------------------------------------------------------------"
echo "Copy EngineX config files"
cp /vagrant/nginx_conf/enabled/default /etc/nginx/sites-enabled/
cp /vagrant/nginx_conf/available/default /etc/nginx/sites-available/

echo "------------------------------------------------------------------------------"
echo "Setup PHP"
sed -i 's/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/' /etc/php5/fpm/php.ini

echo "------------------------------------------------------------------------------"
echo "Restart services"
service php5-fpm restart
service nginx restart

echo "------------------------------------------------------------------------------"
echo "Setup database"
echo "------------------------------------------------------------------------------"
echo "Create DB user admin"
sudo -u postgres createuser vagrant;
sudo -u postgres psql -c "ALTER USER vagrant SUPERUSER;"
sudo -u postgres psql -c "ALTER USER vagrant CREATEUSER CREATEDB CREATEROLE REPLICATION;"
sudo -u postgres psql -c "ALTER USER vagrant CREATEUSER CREATEDB CREATEROLE"
sudo -u postgres psql -c "ALTER ROLE vagrant WITH PASSWORD '5hx1oaMU';"
echo "------------------------------------------------------------------------------"
echo "Create Database for KDBE"
sudo -u vagrant psql -d postgres -c "create database pince;"
sudo -u vagrant psql -d pince -c "create schema pince;"
sudo -u vagrant psql -d pince -c "grant all on schema pince to vagrant;"
echo "------------------------------------------------------------------------------"
echo "Create Web user"
sudo -u vagrant createuser webuser;
sudo -u postgres psql -c "ALTER ROLE webuser WITH PASSWORD 't1tK0s';"
sudo -u vagrant psql -d pince -c "set search_path to movies; grant all on schema pince to webuser;"
echo "------------------------------------------------------------------------------"
echo "Create database tables"
sudo -u vagrant psql -d pince -c "create table pince.info(ID SERIAL PRIMARY KEY, TITLE TEXT NOT NULL, DETAIL TEXT NOT NULL);"
sudo -u vagrant psql -d pince -c "create table pince.users(ID SERIAL PRIMARY KEY, LOGIN_NAME TEXT NOT NULL, ADMIN BOOLEAN DEFAULT FALSE, NAME TEXT NOT NULL, EMAIL VARCHAR(254) NOT NULL, PHONE TEXT NOT NULL, PASSWORD TEXT NOT NULL);"
echo "------------------------------------------------------------------------------"
