# Stage:1
FROM composer:1.8.3 as composer
COPY files/database/ /app/database/
COPY composer.json composer.lock /app/
RUN cd /app \
      && composer install \
           --optimize-autoloader \
           --ignore-platform-reqs \
           --prefer-dist \
           --no-interaction \
           --no-plugins \
           --no-scripts \
           --no-dev
# Stage:2
FROM centos:7
#更换容器内镜像源为国内源
RUN mkdir /etc/yum.repos.d/backup \
    && mv /etc/yum.repos.d/*.repo /etc/yum.repos.d/backup
COPY files/centos7.repo /etc/yum.repos.d/
#安装基础环境
RUN yum install -y http://rpms.remirepo.net/enterprise/remi-release-7.rpm \
&& yum-config-manager --enable remi-php73 \
&& yum install -y nginx wget yum-utils php php-redis php-common php-opcache php-mcrypt php-cli php-pecl-zip php-gd php-curl php-mysql php-xml php-zip php73-php-mbstring.x86_64  php-mbstring.x86_64 php-fpm \
&& mkdir /run/php-fpm 
#复制sdk-server环境导容器内
ADD files/molesdk-pro-server.tar.gz /data/molesdk-pro-server/
WORKDIR /data/molesdk-pro-server
COPY --from=composer /app/vendor/ /data/molesdk-pro-server/vendor/
RUN cp .env.example .env \
&& php artisan key:generate \
&& php artisan jwt:secret --force \
&& chown nginx storage -R
COPY files/entrypoint /usr/local/bin/
COPY files/molesdk-pro-server.conf /etc/nginx/conf.d/
COPY files/nginx.conf /etc/nginx/
COPY files/www.conf /etc/php-fpm.d/
#优化镜像
RUN yum clean all
ENTRYPOINT ["/usr/local/bin/entrypoint"]
