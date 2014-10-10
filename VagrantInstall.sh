#!/usr/bin/env bash

# Update the box
# --------------
# Downloads the package lists from the repositories
# and "updates" them to get information on the newest
# versions of packages and their dependencies
apt-get update

# Install Vim
apt-get install -y vim

# Apache
# ------
# Install
apt-get install -y apache2
# Add ServerName to httpd.conf
echo "ServerName localhost" > /etc/apache2/httpd.conf
# Setup hosts file (don't hesitate to change to suit your need)
VHOST=$(cat <<EOF
<VirtualHost *:80>
  DocumentRoot "/vagrant/public"
  ServerName localhost
  <Directory "/vagrant/public">
    AllowOverride All
    Require all granted
  </Directory>
</VirtualHost>
<VirtualHost *:80>
  DocumentRoot "/vagrant/public"

  # add your domain name server if you need it
  ServerName loc-my.getcentralapp.com

  <Directory "/vagrant/public">
    AllowOverride All
    Require all granted
  </Directory>
</VirtualHost>
EOF
)
echo "${VHOST}" > /etc/apache2/sites-enabled/000-default
# Enable mod_rewrite
a2enmod rewrite
# Restart apache
service apache2 restart

# PHP
# -------
apt-get install -y libapache2-mod-php5
# Add add-apt-repository binary
apt-get install -y python-software-properties
# Install PHP
add-apt-repository ppa:ondrej/php5
# Update
apt-get update

# PHP stuff
# ---------
# Command-Line Interpreter
apt-get install -y php5-cli
# MySQL database connections directly from PHP
apt-get install -y php5-mysql
# cURL is a library for getting files from FTP, GOPHER, HTTP server
apt-get install -y php5-curl
# Module for MCrypt functions in PHP
apt-get install -y php5-mcrypt
# Module for json functions in PHP
apt-get install -y php5-json
# activate mcrypt (fix bug)
php5enmod mcrypt
service apache2 restart

# Module for Imagick functions in PHP (optionnal)
apt-get install -y php5-imagick
# Install FFMPEG (optionnal)
apt-get install libavcodec53 libavdevice53 libavformat53 libavutil51 libpostproc52 libswscale2 ffmpeg

# Install Xdebug
# --------------

xdebug="1"

if [ -n "$xdebug" ]; then
echo "--- Installing and configuring Xdebug ---"
sudo apt-get install -y php5-xdebug

cat << EOF | sudo tee -a /etc/php5/mods-available/xdebug.ini
xdebug.scream=1
xdebug.cli_color=1
xdebug.show_local_vars=1
EOF

sed -i "s/error_reporting = .*/error_reporting = E_ALL/" /etc/php5/apache2/php.ini
sed -i "s/display_errors = .*/display_errors = On/" /etc/php5/apache2/php.ini

sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

echo "--- Enabling mod-rewrite ---"
sudo a2enmod rewrite
fi


# Install cURL
# ------------
apt-get install -y curl

# Install Mysql
# -------------
# Ignore the post install questions
export DEBIAN_FRONTEND=noninteractive

pass="root"
echo "Password: $pass"

echo "Setup MySQL"
echo "mysql-server mysql-server/root_password password $pass" | debconf-set-selections
echo "mysql-server mysql-server/root_password_again password $pass" | debconf-set-selections
apt-get install -y -qq mysql-server mysql-common mysql-client


# Install Git
# -----------
apt-get install -y git-core

# Install SVN (optional)
# -----------
# apt-get install subversion


# Install Composer
# ----------------
curl -s https://getcomposer.org/installer | php
# Make Composer available globally
mv composer.phar /usr/local/bin/composer

# Install Node js
# ---------------
apt-get install -y python-software-properties python g++ make
add-apt-repository -y ppa:chris-lea/node.js
apt-get update
apt-get install -y nodejs

echo "--- Installing Ruby ---"

\curl -L https://get.rvm.io | bash -s stable
source /usr/local/rvm/scripts/rvm
rvm requirements
rvm install ruby
rvm use ruby --default
rvm rubygems current

# Upgrade NPM
npm update -g npm

# Install Bower
# -------------
npm install -g bower

# Install Grunt
# -------------
npm install -g grunt-cli

# Install Redis (optional)

REDIS="1"
if [ -n "$REDIS" ]; then
    #wget http://download.redis.io/redis-stable.tar.gz && tar xvzf redis-stable.tar.gz && cd redis-stable && make
    sudo apt-get install -y redis-server
    redis-server
fi

# Install Beanstalkd

BEANSTALKD="1"
if [ -n "$BEANSTALKD" ]; then
    sudo apt-get install beanstalkd
    service beanstalkd start
fi

# Create Database
# ---------------
#mysql -uroot -e 'create database `yourdb`;'
#mysql -uroot -e 'grant all on `yourdb`.* to `root@localhost`;'

# Setting Alias

alias artisan='php artisan'
alias art='php artisan'

#Synchro time
sudo ntpdate -s time.nist.gov
