FROM ubuntu:14.04

RUN apt-get -y update
RUN apt-get -y install curl
RUN apt-get -y install rsyslog
RUN apt-get -y install git

# Add these lines to your own Dockerfile
ADD files/crontab /app/crontab
RUN crontab /app/crontab
ADD files/bin/start-cron.sh /usr/bin/start-cron.sh
RUN chmod +x /usr/bin/start-cron.sh
RUN touch /var/log/cron.log

#RUN git clone https://github.com/certbot/certbot.git
#RUN cd certbot & ./certbot-auto certonly --standalone -d fundy.alllwork.com --email don.ling.lok@gmail.com --agree-tos

CMD /usr/bin/start-cron.sh