FROM debian:stable

ENV REMOTE_HOST definir-ip-do-host
ENV REMOTE_USER definir-usuario-do-host
ENV REMOTE_PORT 22
ENV REMOTE_SERVICE 3306

ENV DB_HOST_TUNNEL definir-url-do-host
ENV DB_PORT_TENANCY 3306

RUN useradd docker \
	&& mkdir /home/docker \
	&& chown docker:docker /home/docker \
	&& addgroup docker staff

RUN apt-get update \
  && apt-get install -y --no-install-recommends openssh-client bindfs kmod \
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/

RUN mkdir /home/docker/.ssh \
  && mkdir /home/docker/.ssh-tunnel \
  && echo "bindfs#/home/docker/.ssh-tunnel /home/docker/.ssh fuse force-user=docker,force-group=docker,perms=0700: 0 0" >> /etc/fstab

RUN chown -R docker:docker /home/docker/.ssh-tunnel

ADD ./id_rsa /home/docker/.ssh-tunnel/id_rsa
RUN chmod 700 /home/docker/.ssh-tunnel/id_rsa

CMD ssh -o ServerAliveInterval=30 -o ServerAliveCountMax=1 -o StrictHostKeyChecking=no -o BatchMode=yes -i /home/docker/.ssh-tunnel/id_rsa -p $REMOTE_PORT -L *:$DB_PORT_TENANCY:$DB_HOST_TUNNEL:$REMOTE_SERVICE -N $REMOTE_USER@$REMOTE_HOST

EXPOSE $DB_PORT_TENANCY
