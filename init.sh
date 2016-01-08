# Install some more YUM repos
wget https://dl.fedoraproject.org/pub/epel/7/x86_64/e/epel-release-7-5.noarch.rpm
wget https://mirror.webtatic.com/yum/el7/webtatic-release.rpm
# wget https://yum.newrelic.com/pub/newrelic/el5/x86_64/newrelic-repo-5-3.noarch.rpm

rpm -ivh epel-release-7-5.noarch.rpm
rpm -Uvh webtatic-release.rpm
# rpm -Uvh newrelic-repo-5-3.noarch.rpm

# Get up to date
# yum update

# Git php v8js
git clone https://github.com/phpv8/v8js.git

# Install lots of dependancies
# removed nodejs npm to try to install v8 w/o node's old version
yum install -y nginx php56w-fpm.x86_64 php56w.x86_64 php56w-cli.x86_64 php56w-common.x86_64 php56w-devel.x86_64 php56w-gd.x86_64 php56w-intl.x86_64 php56w-mbstring.x86_64 php56w-mcrypt.x86_64 php56w-mysqlnd.x86_64 php56w-pdo.x86_64 php56w-pear.noarch php56w-pecl-apc.x86_64 php56w-pecl-imagick.x86_64 php56w-pecl-memcache.x86_64 php56w-pecl-memcached.x86_64 php56w-pecl-mongo.x86_64 php56w-pecl-redis.x86_64 php56w-soap.x86_64 php56w-suhosin.x86_64 php56w-xml.x86_64 git.x86_64 mlocate ruby.x86_64 newrelic-daemon.x86_64 newrelic-php5.x86_64 newrelic-php5-common.noarch newrelic-repo.noarch newrelic-sysmond.x86_64 vim

# Memcached server
yum -y install memcached

# Install development tools
# yum groupinstall "development tools"

# Suhosin 
wget https://download.suhosin.org/suhosin-0.9.37.1.tar.gz
tar -xzvf suhosin-0.9.37.1.tar.gz
cd suhosin-0.9.37.1
phpize
./configure
make
make install
cd ..

# Install phpv8/v8js
cd v8js
phpize
./configure
make && make install
cd ..

#
# Copy /etc/php.ini values (and other module .ini config files)
# php.ini value of note:
printf '\ndate.timezone = "America/Los_Angeles"' >> /etc/php.ini
printf '\nextension=v8js.so' >> /etc/php.ini

# install xdebug, needs to be configured
pecl install Xdebug

# install composer
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

# set php ownership to nginx
chown -R nginx:nginx /var/lib/php

