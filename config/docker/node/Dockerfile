# build environment
FROM node:current-alpine3.12 as build
WORKDIR /web_front/app
ENV PATH /web_front/app/node_modules/.bin:$PATH
COPY package.json ./
COPY package-lock.json ./
RUN npm ci --silent
RUN npm install react-scripts@3.4.1 -g --silent
COPY . ./
RUN npm run build