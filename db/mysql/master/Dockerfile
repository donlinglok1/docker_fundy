## mysql 8 are unstable, using 5.7 instead.
FROM mysql:5.7

WORKDIR /files

COPY files/server_audit-1.4.0/linux-x86-64/server_audit.so /usr/lib/mysql/plugin/server_audit.so

COPY my.cnf /etc/mysql/conf.d/my.cnf
RUN chown mysql:mysql /etc/mysql/conf.d/my.cnf
RUN chmod 600 /etc/mysql/conf.d/my.cnf

COPY files/log /var/mysql/log
RUN chown -R mysql:mysql /var/mysql/log
RUN chmod -R 600 /var/mysql/log

## docker mysql will auto run .sh and .sql file in 'docker-entrypoint-initdb.d' folder
COPY files/init /docker-entrypoint-initdb.d