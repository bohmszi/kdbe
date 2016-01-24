#! /usr/bin/env bash

apt-get update -qy
apt-get install -qqy php5-cli nginx postgresql postgresql-contrib libdbi-perl libdbd-pg-perl liblist-moreutils-perl libjson-perl libpq-dev php5-fpm postgresql postgresql-contrib php5-pgsql

# Set vi as default editor
sudo rm /etc/alternatives/editor
sudo ln -s /usr/bin/vim.basic /etc/alternatives/editor

# Enable "page up" and "page down" to search the history
sudo sed -i 's/# \(.*\)history-search\(.*\)/\1history-search\2/g' /etc/inputrc

echo "Apply nginx settings"
mkdir /etc/nginx/bkp
mv /etc/nginx/sites-enabled/default /etc/nginx/bkp
cat << EOF > /etc/nginx/sites-enabled/pince
server {
    location        / {
        proxy_pass      http://localhost:8001;
    }
}
EOF

echo "Setup PHP"
sed -i 's/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/' /etc/php5/fpm/php.ini

echo "Copy EngineX config files"
cp /vagrant/nginx_conf/enabled/default /etc/nginx/sites-enabled/
cp /vagrant/nginx_conf/available/default /etc/nginx/sites-available/

echo "------------------------------------------------------------------------------"
echo "Setup PHP"
sed -i 's/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/' /etc/php5/fpm/php.ini

echo "Restart services"
service php5-fpm restart
service nginx restart
