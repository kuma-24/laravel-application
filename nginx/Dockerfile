FROM nginx:1.20-alpine

SHELL ["/bin/ash", "-oeux", "pipefail", "-c"]

ENV TZ=UTC

RUN apk update && \
  apk add --update --no-cache --virtual=.build-dependencies g++

COPY ./nginx/*.conf /etc/nginx/conf.d/

WORKDIR /laravel-application