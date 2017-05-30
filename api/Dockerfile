FROM node:slim

EXPOSE 3000

ADD nodeexpress /nodeexpress
RUN cd nodeexpress && npm install

ADD run.sh /run.sh
RUN chmod -v +x run.sh

CMD ["/run.sh"]
#CMD ["/bin/bash"]