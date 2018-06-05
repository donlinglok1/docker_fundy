#!/bin/sh

## start rsyslog
rsyslogd

## save env.yml variable to a file
printenv | sed 's/^\([a-zA-Z0-9_]*\)=\(.*\)$/export \1="\2"/g' > /env.sh

## start cron
cron

## log on console
touch /var/log/cron.log
tail -F /var/log/syslog /var/log/cron.log
