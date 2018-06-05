## please test after you upgrade the ubuntu version.
FROM ubuntu:16.04

## update for install software
RUN apt-get -y update

## log to show cronjob detail
RUN apt-get -y install rsyslog

## for curl on cronjobs
RUN apt-get -y install curl

## for using git on cronjobs
#RUN apt-get -y install git

## for mysqldump on cronjobs
RUN apt-get -y install mysql-client

## init your crontab service
COPY crontab /app/crontab
RUN crontab /app/crontab

## move file to container and change access right
COPY files/run.sh /usr/bin/run.sh
RUN chmod 755 /usr/bin/run.sh

COPY files /files

## docker entrypoint
CMD /usr/bin/run.sh
