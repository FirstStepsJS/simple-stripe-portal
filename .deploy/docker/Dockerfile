FROM centos:latest

RUN yum update -y
RUN yum install -y epel-release
RUN yum -y install http://rpms.remirepo.net/enterprise/remi-release-7.rpm
RUN yum -y install yum-utils
RUN yum -y update

RUN yum-config-manager --enable remi-php73
RUN yum -y install php
RUN echo "log_errors = 1" >> /etc/php.ini
RUN echo "error_log=/var/log/php.log" >> /etc/php.ini
RUN echo "log_errors_max_len=102400" >> /etc/php.ini
RUN echo "track_errors=1" >> /etc/php.ini

RUN php -v

COPY . /app

RUN curl -sL https://rpm.nodesource.com/setup_10.x | bash -
RUN yum -y install nodejs
RUN node --version
RUN npm install yarn -g
RUN cd /app && yarn

COPY ./docker-start.sh /
CMD bash docker-start.sh


