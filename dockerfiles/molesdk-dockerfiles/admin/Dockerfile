# stage 1
FROM node:12.22.7 as frontend
ADD files/molesdk-pro-administrator.tar.gz /app/
ENV VUE_APP_PREVIEW=false VUE_APP_API_BASE_URL='http://sdk.misify.com/'
RUN cd /app \
    && npm install 
RUN cd /app \
    && npm run build
# stage 2
FROM nginx:1.21.4
ADD files/molesdk-pro-administrator.tar.gz /data/molesdk-pro-administrator/
COPY --from=frontend /app/dist/ /data/molesdk-pro-administrator/dist/
COPY files/nginx.conf /etc/nginx/nginx.conf
COPY files/front.conf /etc/nginx/conf.d/
CMD ["nginx","-g","daemon off;"]
